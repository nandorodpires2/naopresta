<?php

class Site_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        $this->view->headScript()->appendFile($this->view->baseUrl('views/js/site/index.js'));
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
        $modelReclamacao = new Model_DbTable_Reclamacao();
        $produtos = $modelReclamacao->pesquisaProduto();
        $this->view->produtos = $produtos;
    }

}

