<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PoliticaController
 *
 * @author Fernando Rodrigues
 */
class Site_PoliticaController extends Zend_Controller_Action {
    
    public function init() {
        $this->_redirect("build/");
    }
    
}
