<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PesquisaController
 *
 * @author Fernando Rodrigues
 */
class Site_PesquisaController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        
        // form de pesquisa
        $formSitePesquisa = new Form_Site_Pesquisa();
        $this->view->formSitePesquisa = $formSitePesquisa;
        
        // busca o(s) produto(s)
        $produto_pesquisa = $this->getRequest()->getParam("produto_pesquisa", null);        
                
        if ($produto_pesquisa) {
            
            // grava a pesquisa
            $this->gravaPesquisa($produto_pesquisa);
            
            $this->view->produto_pesquisa = $produto_pesquisa;
            $modelReclamacao = new Model_DbTable_Reclamacao();
            $produtos = $modelReclamacao->pesquisaProduto($produto_pesquisa);
            $this->view->produtos = $produtos;            
        }
        
    }
    
    private function gravaPesquisa($key) {
        $modelPesquisa = new Model_DbTable_Pesquisa();
        try {
            $modelPesquisa->insert(array(
                "pesquisa_produto" => $key,
                "pesquisa_ip" => $this->getRequest()->getClientIp()
            ));
            return true;
        } catch (Exception $ex) {
            return;
        }
    }
    
}
