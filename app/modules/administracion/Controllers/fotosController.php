<?php
/**
 * Controlador de Fotos que permite la  creacion, edicion  y eliminacion de los foto del Sistema
 */
class Administracion_fotosController extends Administracion_mainController
{
	/**
	 * $mainModel  instancia del modelo de  base de datos foto
	 * @var modeloContenidos
	 */
	public $mainModel;

	/**
	 * $route  url del controlador base
	 * @var string
	 */
	protected $route;

	/**
	 * $pages cantidad de registros a mostrar por pagina]
	 * @var integer
	 */
	protected $pages;

	/**
	 * $namefilter nombre de la variable a la fual se le van a guardar los filtros
	 * @var string
	 */
	protected $namefilter;

	/**
	 * $_csrf_section  nombre de la variable general csrf  que se va a almacenar en la session
	 * @var string
	 */
	protected $_csrf_section = "administracion_fotos";

	/**
	 * $namepages nombre de la pvariable en la cual se va a guardar  el numero de seccion en la paginacion del controlador
	 * @var string
	 */
	protected $namepages;



	/**
	 * Inicializa las variables principales del controlador fotos .
	 *
	 * @return void.
	 */
	public function init()
	{
		$this->mainModel = new Administracion_Model_DbTable_Fotos();
		$this->namefilter = "parametersfilterfotos";
		$this->route = "/administracion/fotos";
		$this->namepages = "pages_fotos";
		$this->namepageactual = "page_actual_fotos";
		$this->_view->route = $this->route;
		if (Session::getInstance()->get($this->namepages)) {
			$this->pages = Session::getInstance()->get($this->namepages);
		} else {
			$this->pages = 20;
		}
		parent::init();
	}


	/**
	 * Recibe la informacion y  muestra un listado de  foto con sus respectivos filtros.
	 *
	 * @return void.
	 */
	public function indexAction()
	{
		$title = "Administración de foto";
		$this->getLayout()->setTitle($title);
		$this->_view->titlesection = $title;
		$this->filters();
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$filters = (object) Session::getInstance()->get($this->namefilter);
		$this->_view->filters = $filters;
		$filters = $this->getFilter();
		$order = "orden ASC";
		$list = $this->mainModel->getList($filters, $order);
		$amount = $this->pages;
		$page = $this->_getSanitizedParam("page");
		if (!$page && Session::getInstance()->get($this->namepageactual)) {
			$page = Session::getInstance()->get($this->namepageactual);
			$start = ($page - 1) * $amount;
		} else if (!$page) {
			$start = 0;
			$page = 1;
			Session::getInstance()->set($this->namepageactual, $page);
		} else {
			Session::getInstance()->set($this->namepageactual, $page);
			$start = ($page - 1) * $amount;
		}
		$this->_view->register_number = count($list);
		$this->_view->pages = $this->pages;
		$this->_view->totalpages = ceil(count($list) / $amount);
		$this->_view->page = $page;
		$this->_view->lists = $this->mainModel->getListPages($filters, $order, $start, $amount);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->album = $this->_getSanitizedParam("album");
	}

	/**
	 * Genera la Informacion necesaria para editar o crear un  foto  y muestra su formulario
	 *
	 * @return void.
	 */
	public function manageAction()
	{
		$this->_view->route = $this->route;
		$this->_csrf_section = "manage_fotos_" . date("YmdHis");
		$this->_csrf->generateCode($this->_csrf_section);
		$this->_view->csrf_section = $this->_csrf_section;
		$this->_view->csrf = Session::getInstance()->get('csrf')[$this->_csrf_section];
		$this->_view->album = $this->_getSanitizedParam("album");
		$id = $this->_getSanitizedParam("id");
		if ($id > 0) {
			$content = $this->mainModel->getById($id);
			if ($content->fotos_id) {
				$this->_view->content = $content;
				$this->_view->routeform = $this->route . "/update";
				$title = "Actualizar foto";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			} else {
				$this->_view->routeform = $this->route . "/insert";
				$title = "Crear foto";
				$this->getLayout()->setTitle($title);
				$this->_view->titlesection = $title;
			}
		} else {
			$this->_view->routeform = $this->route . "/insert";
			$title = "Crear foto";
			$this->getLayout()->setTitle($title);
			$this->_view->titlesection = $title;
		}
	}

	/**
	 * Inserta la informacion de un foto  y redirecciona al listado de foto.
	 *
	 * @return void.
	 */
	public function insertAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf) {
			$data = $this->getData();
			$uploadImage = new Core_Model_Upload_Image();
			if ($_FILES['fotos_foto']['name'] != '') {
				$data['fotos_foto'] = $uploadImage->upload("fotos_foto");
			}
			$id = $this->mainModel->insert($data);
			$this->mainModel->changeOrder($id, $id);
			$data['fotos_id'] = $id;
			$data['log_log'] = print_r($data, true);
			$data['log_tipo'] = 'CREAR FOTO';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		$album = $this->_getSanitizedParam("fotos_album");
		header('Location: ' . $this->route . '?album=' . $album . '');
	}

	/**
	 * Recibe un identificador  y Actualiza la informacion de un foto  y redirecciona al listado de foto.
	 *
	 * @return void.
	 */
	public function updateAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_getSanitizedParam("csrf_section")] == $csrf) {
			$id = $this->_getSanitizedParam("id");
			$content = $this->mainModel->getById($id);
			if ($content->fotos_id) {
				$data = $this->getData();
				$uploadImage = new Core_Model_Upload_Image();
				if ($_FILES['fotos_foto']['name'] != '') {
					if ($content->fotos_foto) {
						$uploadImage->delete($content->fotos_foto);
					}
					$data['fotos_foto'] = $uploadImage->upload("fotos_foto");
				} else {
					$data['fotos_foto'] = $content->fotos_foto;
				}
				$this->mainModel->update($data, $id);
			}
			$data['fotos_id'] = $id;
			$data['log_log'] = print_r($data, true);
			$data['log_tipo'] = 'EDITAR FOTO';
			$logModel = new Administracion_Model_DbTable_Log();
			$logModel->insert($data);
		}
		$album = $this->_getSanitizedParam("fotos_album");
		header('Location: ' . $this->route . '?album=' . $album . '');
	}

	/**
	 * Recibe un identificador  y elimina un foto  y redirecciona al listado de foto.
	 *
	 * @return void.
	 */
	public function deleteAction()
	{
		$this->setLayout('blanco');
		$csrf = $this->_getSanitizedParam("csrf");
		if (Session::getInstance()->get('csrf')[$this->_csrf_section] == $csrf) {
			$id = $this->_getSanitizedParam("id");
			if (isset($id) && $id > 0) {
				$content = $this->mainModel->getById($id);
				if (isset($content)) {
					$uploadImage = new Core_Model_Upload_Image();
					if (isset($content->fotos_foto) && $content->fotos_foto != '') {
						$uploadImage->delete($content->fotos_foto);
					}
					$this->mainModel->deleteRegister($id);
					$data = (array) $content;
					$data['log_log'] = print_r($data, true);
					$data['log_tipo'] = 'BORRAR FOTO';
					$logModel = new Administracion_Model_DbTable_Log();
					$logModel->insert($data);
				}
			}
		}
		$album = $this->_getSanitizedParam("album");
		header('Location: ' . $this->route . '?album=' . $album . '');
	}

	/**
	 * Recibe la informacion del formulario y la retorna en forma de array para la edicion y creacion de Fotos.
	 *
	 * @return array con toda la informacion recibida del formulario.
	 */
	private function getData()
	{
		$data = array();
		if ($this->_getSanitizedParam("fotos_estado") == '') {
			$data['fotos_estado'] = '0';
		} else {
			$data['fotos_estado'] = $this->_getSanitizedParam("fotos_estado");
		}
		$data['fotos_titulo'] = $this->_getSanitizedParam("fotos_titulo");
		$data['fotos_foto'] = "";
		$data['fotos_fecha'] = $this->_getSanitizedParam("fotos_fecha");
		$data['fotos_album'] = $this->_getSanitizedParamHtml("fotos_album");
		$data['fotos_descripcion'] = $this->_getSanitizedParamHtml("fotos_descripcion");
		$data['fotos_descripcion_en'] = $this->_getSanitizedParamHtml("fotos_descripcion_en");
		return $data;
	}

	public function cargamasivaAction()
	{


		$this->getLayout()->setTitle("Carga masiva de fotos");

		$this->_view->fotos_album = $this->_getSanitizedParam("fotos_album");
		if ($this->_view->fotos_album) {
			$albumModel = new Administracion_Model_DbTable_Album();
			$album = $albumModel->getById($this->_view->fotos_album);
			$this->_view->album = $album;
		}



	}

	public function uploadfotosAction()
	{
		$this->setLayout('blanco');
		$fotos_album = $this->_getSanitizedParam("fotos_album");


		$data = [];

		$uploadImage = new Core_Model_Upload_Image();
		if ($_FILES['fotos-file']['name'] != '') {
			$data['fotos_foto'] = $uploadImage->upload("fotos-file");
		}
		if ($fotos_album) {
			$data['fotos_album'] = $fotos_album;
		}

		$data['fotos_estado'] = 1;
		$data['fotos_titulo'] = $this->removeExtension($data['foto_foto']);

		$response['ok'] = 1;
		$response['carga'] = $data['foto_foto'];


		$id = $this->mainModel->insert($data);
		$this->mainModel->changeOrder($id, $id);


		echo json_encode($response);
	}
	
	public function removeExtension($filename)
	{
		return pathinfo($filename, PATHINFO_FILENAME);
	}
	/**
	 * Genera la consulta con los filtros de este controlador.
	 *
	 * @return array cadena con los filtros que se van a asignar a la base de datos
	 */
	protected function getFilter()
	{
		$filtros = " 1 = 1 ";
		$album = $this->_getSanitizedParam("album");
		$filtros = $filtros . " AND fotos_album = '$album' ";
		if (Session::getInstance()->get($this->namefilter) != "") {
			$filters = (object) Session::getInstance()->get($this->namefilter);
			if ($filters->fotos_titulo != '') {
				$filtros = $filtros . " AND fotos_titulo LIKE '%" . $filters->fotos_titulo . "%'";
			}
			if ($filters->fotos_foto != '') {
				$filtros = $filtros . " AND fotos_foto LIKE '%" . $filters->fotos_foto . "%'";
			}
			if ($filters->fotos_album != '') {
				$filtros = $filtros . " AND fotos_album LIKE '%" . $filters->fotos_album . "%'";
			}
		}
		return $filtros;
	}

	/**
	 * Recibe y asigna los filtros de este controlador
	 *
	 * @return void
	 */
	protected function filters()
	{
		if ($this->getRequest()->isPost() == true) {
			Session::getInstance()->set($this->namepageactual, 1);
			$parramsfilter = array();
			$parramsfilter['fotos_titulo'] = $this->_getSanitizedParam("fotos_titulo");
			$parramsfilter['fotos_foto'] = $this->_getSanitizedParam("fotos_foto");
			$parramsfilter['fotos_album'] = $this->_getSanitizedParam("fotos_album");
			Session::getInstance()->set($this->namefilter, $parramsfilter);
		}
		if ($this->_getSanitizedParam("cleanfilter") == 1) {
			Session::getInstance()->set($this->namefilter, '');
			Session::getInstance()->set($this->namepageactual, 1);
		}
	}
}