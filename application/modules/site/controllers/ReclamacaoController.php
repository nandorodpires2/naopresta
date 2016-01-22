<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reclamacao
 *
 * @author Fernando Rodrigues
 */
class Site_ReclamacaoController extends Zend_Controller_Action {

    public function init() {
        
    }
    
    public function indexAction() {
        
        if ($this->getRequest()->isPost()) {
        
            $produto_naopresta = $this->getRequest()->getParam("produto_naopresta");
            
            // pesquisa o produto        
            $this->view->produto_naopresta = $produto_naopresta;
            $modelProduto = new Model_DbTable_Produto();
            $where = $modelProduto->getDefaultAdapter()->quoteInto("produto_nome like ?", "%".$produto_naopresta."%");
            $produtos = $modelProduto->fetchAll($where);
            $this->view->produtos = $produtos; 

            // grava a reclamacao
            $formSiteReclamacao = new Form_Site_Reclamacao();
            $this->view->formSiteReclamacao = $formSiteReclamacao;            
            
        }
        
    }
    
}
