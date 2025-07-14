<?php

class Page_galeriaController extends Page_mainController
{
  public function indexAction()
  {
    $this->_view->banner = $this->template->bannerPrincipalInd(5);
    $this->_view->contenido = $this->template->getContentseccion("5");
  }
}
