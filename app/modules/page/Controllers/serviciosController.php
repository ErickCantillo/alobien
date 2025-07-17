<?php

class Page_serviciosController extends Page_mainController
{

  public $botonactivo = 3;
  public function indexAction()
  {
    $this->_view->banner = $this->template->banner(3);
    $this->_view->contenido = $this->template->getContentseccion(3);
  }
}
