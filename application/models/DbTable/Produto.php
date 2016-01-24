<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produto
 *
 * @author Fernando Rodrigues
 */
class Model_DbTable_Produto extends App_Db_Table_Abstract {
    
    protected $_name = "produto";
    protected $_primary = "produto_id";
    
    public function getQueryAll() {        
        $select = parent::getQueryAll();
        
        $select->joinInner(array("marca"), "produto.marca_id = marca.marca_id", array("*"));
        $select->joinInner(array("fabricante"), "marca.fabricante_id = fabricante.fabricante_id", array("*"));
        
        return $select;
        
    }
    
}
