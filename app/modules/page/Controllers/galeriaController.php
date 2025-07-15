<?php

class Page_galeriaController extends Page_mainController
{
  public $botonactivo = 4;

  public function indexAction()
  {
    $this->_view->banner = $this->template->banner(4);
    $this->_view->contenido = $this->template->getContentseccion(4);

    $fotosModel = new Administracion_Model_DbTable_Fotos();
    $albumModel = new Administracion_Model_DbTable_Album();

    // Configuración de paginación
    $itemsPerPage = 9;
    $page = $this->_getSanitizedParam("page");

    // Obtener todos los álbumes para calcular el total
    $allAlbumes = $albumModel->getList("album_estado ='1'", "orden ASC");
    $totalAlbumes = count($allAlbumes);
    $totalPages = ceil($totalAlbumes / $itemsPerPage);

    // Validar página
    if (!$page || $page < 1) {
      $page = 1;
    } elseif ($page > $totalPages && $totalPages > 0) {
      // Si la página solicitada es mayor al total y hay álbumes, redirigir a la primera página
      header('Location: /page/galeria?page=1');
      exit;
    } elseif ($totalPages == 0) {
      // Si no hay álbumes, mostrar página 1
      $page = 1;
    }

    $start = ($page - 1) * $itemsPerPage;

    // Obtener álbumes paginados
    $albumes = $albumModel->getListPages("album_estado ='1'", "orden ASC", $start, $itemsPerPage);

    foreach ($albumes as $key => $album) {
      $fotos = $fotosModel->getList("fotos_album = '{$album->album_id}' AND fotos_estado ='1'", "orden ASC");
      $album->fotos = $fotos;
    }

    // Variables de paginación
    $this->_view->albumes = $albumes;
    $this->_view->page = $page;
    $this->_view->totalPages = $totalPages;
    $this->_view->itemsPerPage = $itemsPerPage;
    $this->_view->totalItems = $totalAlbumes;
  }
}
