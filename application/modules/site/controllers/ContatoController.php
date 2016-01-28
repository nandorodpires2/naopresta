<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContatoController
 *
 * @author Fernando Rodrigues
 */
class Site_ContatoController extends Zend_Controller_Action {
    
    public function init() {
        
    }
    
    public function indexAction() {
        
        $formContato = new Form_Site_Contato();
        $this->view->formContato = $formContato;
        
        if ($this->getRequest()->isPost()) {
            $dadosPost = $this->getRequest()->getPost();
            if ($formContato->isValid($dadosPost)) {
                $dadosPost = $formContato->getValues();
                
                try {
                    $modelContato = new Model_DbTable_Contato();
                    $modelContato->insert($dadosPost);
                    
                    // grava na fila de emails                    
                    
                    $this->_helper->flashMessenger->addMessage(array(
                        'success' => 'Contato enviado com sucesso! Em breve retornaremos seu contato'
                    ));
                    
                } catch (Exception $ex) {
                    $this->_helper->flashMessenger->addMessage(array(
                        'danger' => 'Falha ao enviar o contato. Favor tente novamente mais tarde! - ' . $ex->getMessage()
                    ));
                }
                
                $this->_redirect("contato/");
                
            }
        }
                
    }
    
}
