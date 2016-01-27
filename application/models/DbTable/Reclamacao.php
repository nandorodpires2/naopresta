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
class Model_DbTable_Reclamacao extends App_Db_Table_Abstract {
    
    protected $_name = "reclamacao";
    protected $_primary = "reclamacao_id";
    
    public function getQueryAll() {
        $select = parent::getQueryAll();
        $select->joinInner(array("produto"), "produto.produto_id = reclamacao.produto_id", array("*"));
        return $select;
    }

    public function pesquisaProduto($key = null) {        
        $select = $this->getQueryAll();
        $select->columns(array(
            "reclamacoes" => new Zend_Db_Expr("count(*)"),
            "taxa" => new Zend_Db_Expr("(100 - ((SUM(reclamacao.reclamacao_nota) / COUNT(*))*20))")
        ));
        if ($key) {
            $select->where("produto.produto_nome like ?", "%".$key."%");        
        }
        $select->group("produto.produto_id");
        $select->order("(100 - ((SUM(reclamacao.reclamacao_nota) / COUNT(*))*20)) desc");
        $select->limit(50);
        
        return $this->fetchAll($select);
    }
    
}
