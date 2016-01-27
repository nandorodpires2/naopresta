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
        
        $this->setMethod("post");
        
        // produto_nome
        $produto_nome = new Zend_Form_Element_Text("produto_nome");
        $produto_nome->setLabel("Nome");
        $produto_nome->setRequired();
        $produto_nome->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe o nome do produto'
        ));
        
        // produto_id
        $produto_id = new Zend_Form_Element_Hidden("produto_id");
        
        // fabricante_nome
        $fabricante_nome = new Zend_Form_Element_Text("fabricante_nome");
        $fabricante_nome->setLabel("Fabricante");
        $fabricante_nome->setRequired();
        $fabricante_nome->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe o nome do fabricante'
        ));
        
        // fabricante_id
        $fabricante_id = new Zend_Form_Element_Hidden("fabricante_id");
        
        // marca_nome
        $marca_nome = new Zend_Form_Element_Text("marca_nome");
        $marca_nome->setLabel("Marca");
        $marca_nome->setRequired();
        $marca_nome->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe o nome da marca'
        ));
        
        // marca_id
        $marca_id = new Zend_Form_Element_Hidden("marca_id");
        
        // reclamacao_nome
        $reclamacao_nome = new Zend_Form_Element_Text("reclamacao_nome");
        $reclamacao_nome->setLabel("Nome");        
        $reclamacao_nome->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe seu nome'
        ));
        
        // reclamacap_email
        $reclamacao_email = new Zend_Form_Element_Text("reclamacao_email");
        $reclamacao_email->setLabel("E-mail");
        $reclamacao_email->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe seu e-mail'
        ));
        
        // reclamacao_empresa
        $reclamacao_empresa = new Zend_Form_Element_Text("reclamacao_empresa");
        $reclamacao_empresa->setLabel("Empresa onde comprou o produto");
        $reclamacao_empresa->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe seu e-mail'
        ));
        
        // reclamacao_cidade
        $reclamacao_cidade = new Zend_Form_Element_Text("reclamacao_cidade");
        $reclamacao_cidade->setLabel("Cidade");
        $reclamacao_cidade->setAttribs(array(
            'class' => 'form-control',
            'placeholder' => 'Informe sua cidade'
        ));
        
        // reclamacao_estado
        $reclamacao_estado = new Zend_Form_Element_Select("reclamacao_estado");
        $reclamacao_estado->setLabel("Estado");
        $reclamacao_estado->setAttribs(array(
            'class' => 'form-control'
        ));
        $reclamacao_estado->setMultiOptions($this->getEstados());
                
        // reclamacao_descricao
        $reclamacao_descricao = new Zend_Form_Element_Textarea("reclamacao_descricao");
        $reclamacao_descricao->setLabel("Descreva sua reclamação");
        $reclamacao_descricao->setRequired();
        $reclamacao_descricao->setDecorators(App_Forms_Decorators::$simpleElementDecorators);
        $reclamacao_descricao->setAttribs(array(
            'class' => 'form-control',
            'rows' => 5,
            'placeholder' => 'Informe porque você está insatisfeito com o produto',
            'maxlenght' => 500
        ));
        
        // reclamacao_nota
        $reclamacao_nota = new Zend_Form_Element_Radio("reclamacao_nota");
        $reclamacao_nota->setLabel("Dê sua nota para o produto");
        $reclamacao_nota->setRequired();
        $reclamacao_nota->setAttribs(array(
            'class' => ''
        ));
        $reclamacao_nota->setMultiOptions($this->getNotasHtml());
        $reclamacao_nota->setOptions(array('escape' => false));
        $reclamacao_nota->setSeparator(" ");
        $reclamacao_nota->setDecorators(App_Forms_Decorators::$checkboxElementDecorators);
        
        // submit
        $submit = new Zend_Form_Element_Submit("submit");
        $submit->setLabel("Registrar Reclamação");
        $submit->setAttrib("class", 'form-control btn btn-success');
        
        $this->addElements(array(
            $produto_nome,
            $fabricante_nome,
            $marca_nome,
            $reclamacao_descricao,
            //$reclamacao_empresa,
            $reclamacao_nome,
            $reclamacao_email,
            $reclamacao_cidade,
            $reclamacao_estado,
            $reclamacao_nota,
            $submit,
            $produto_id,
            $marca_id,
            $fabricante_id
        ));
        
    }
    
    private function getEstados() {
        
        $options = array("" => "Selecione...");
        
        $modelEstado = new Model_DbTable_Estado();
        $estados = $modelEstado->fetchAll();
        
        foreach ($estados as $estado) {
            $options[$estado->estado_sigla] = $estado->estado_nome;
        }
        
        return $options;
        
    }
    
    private function getNotasHtml() {
        return array(
            1 => "  
                <i class='text-warning fa fa-star'></i>
                <i class='fa fa-star-o'></i>
                <i class='fa fa-star-o'></i>
                <i class='fa fa-star-o'></i>
                <i class='fa fa-star-o'></i>
            ",
            2 => "  
                <i class='text-warning fa fa-star'></i>
                <i class='text-warning fa fa-star'></i>
                <i class='fa fa-star-o'></i>
                <i class='fa fa-star-o'></i>
                <i class='fa fa-star-o'></i>
            ",
            3 => "  
                <i class='text-warning fa fa-star'></i>
                <i class='text-warning fa fa-star'></i>
                <i class='text-warning fa fa-star'></i>
                <i class='fa fa-star-o'></i>
                <i class='fa fa-star-o'></i>
            ",
            4 => "  
                <i class='text-warning fa fa-star'></i>
                <i class='text-warning fa fa-star'></i>
                <i class='text-warning fa fa-star'></i>
                <i class='text-warning fa fa-star'></i>
                <i class='fa fa-star-o'></i>
            ",
            5 => "  
                <i class='text-warning fa fa-star'></i>
                <i class='text-warning fa fa-star'></i>
                <i class='text-warning fa fa-star'></i>
                <i class='text-warning fa fa-star'></i>
                <i class='text-warning fa fa-star'></i>
            "            
        );
    }
    
}
