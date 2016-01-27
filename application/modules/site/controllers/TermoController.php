<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TermoController
 *
 * @author Fernando Rodrigues
 */
class Site_TermoController extends Zend_Controller_Action {
    
    public function init() {
        $this->_redirect("build/");
    }
    
}
