<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pesquisa
 *
 * @author Fernando Rodrigues
 */
class Form_Site_Pesquisa extends Zend_Form {
    
    public function init() {
        
        $this->setAttribs(array(
            'id' => 'Form-site-pesquisa'
        ));
        
        $this->setMethod("post")->setAction("pesquisa/");
        
        $produto_id = new Zend_Form_Element_Text("produto_id");
        $produto_id->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'informe o nome do produto'
        ));
        
        $this->addElement($produto_id);
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setLabel("Pesquisar");
        $submit->setAttrib("class", 'form-control btn btn-success');
        
        $this->addElement($submit);
        
    }
    
}
