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
class Form_Site_Reclamacao extends Zend_Form {
    
    public function init() {
        
        // produto_nome
        
        // reclamacao_nome
        
        // reclamacap_email
        
        // reclamacao_cidade
        
        // reclamacao_estado
        
        // reclamacao_descricao
        
        // reclamacao_nota
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setLabel("Registrar Reclamação");
        $submit->setAttrib("class", 'form-control btn btn-success');
        
        $this->addElement($submit);
        
    }
    
}
