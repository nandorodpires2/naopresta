<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NaoPresta
 *
 * @author Fernando Rodrigues
 */
class Form_Site_NaoPresta extends Zend_Form {
    
    public function init() {
        
        $this->setAttribs(array(
            'id' => 'form-site-nao-presta'
        ));
        
        $this->setMethod("post")->setAction("reclamacao/");
        
        $produto_id = new Zend_Form_Element_Text("produto_naopresta");
        $produto_id->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'informe o nome completo do produto'
        ));
        
        $this->addElement($produto_id);
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setLabel("Esse não presta");
        $submit->setAttrib("class", 'form-control btn btn-danger');
        
        $this->addElement($submit);
        
    }
    
}
