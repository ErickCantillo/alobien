<?php

class Page_nosotrosController extends Page_mainController
{
  public function indexAction()
  {
    $this->_view->banner = $this->template->bannerPrincipalInd(3);
    $this->_view->contenido = $this->template->getContentseccion("3");
  }
}
