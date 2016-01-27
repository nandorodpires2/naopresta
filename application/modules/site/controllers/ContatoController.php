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
                
    }
    
}
