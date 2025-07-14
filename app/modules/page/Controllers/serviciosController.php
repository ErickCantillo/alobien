<?php

class Page_serviciosController extends Page_mainController
{
  public function indexAction()
  {
    $this->_view->banner = $this->template->bannerPrincipalInd(4);
    $this->_view->contenido = $this->template->getContentseccion("4");
  }
}
