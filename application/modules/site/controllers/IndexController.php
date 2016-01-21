<?php

class Site_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {

        // form de pesquisa
        $formSitePesquisa = new Form_Site_Pesquisa();
        $this->view->formSitePesquisa = $formSitePesquisa;
        
        // form nao presta
        $formSiteNaoPresta = new Form_Site_NaoPresta();
        $this->view->formSiteNaoPresta = $formSiteNaoPresta;
        
        // Piores
        
    }

}

