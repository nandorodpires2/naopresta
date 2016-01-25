<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FabricanteController
 *
 * @author Fernando Rodrigues
 */
class Site_FabricanteController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        
    }
    
    public function buscarAction() {
        
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();
        
        $fabricante_nome = $this->getRequest()->getParam("query");
        
        try {
            $modelFabricante = new Model_DbTable_Fabricante();
            $where = $modelFabricante->getDefaultAdapter()->quoteInto("fabricante_nome like ?", "%".$fabricante_nome."%");
            $fabricantes = $modelFabricante->fetchAll($where);
            
            echo Zend_Json_Encoder::encode($fabricantes);
            
        } catch (Exception $ex) {

        }
        
    }
    
}
