<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Avaliacao
 *
 * @author Fernando Rodrigues
 */
class Zend_View_Helper_Avaliacao extends Zend_View_Helper_Abstract {
    
    protected $_porcentual = 20;
    protected $_total_reclamacoes = 0;
    protected $_total_nota = 0;
    protected $_nota_media = 0;
    protected $_taxa_rejeição = 0;
    
    public function avaliacao($produto_id) {
        
        $modelReclamacao = new Model_DbTable_Reclamacao();
        $produtos = $modelReclamacao->fetchAll("produto_id = {$produto_id}");
        
        foreach ($produtos as $produto) {
            $this->_total_reclamacoes++;
            $this->_total_nota += $produto->reclamacao_nota;
        }
              
        $this->_nota_media = $this->_total_nota / $this->_total_reclamacoes;
        $this->_taxa_rejeição = 100 - ($this->_nota_media * $this->_porcentual);
        
        return number_format($this->_taxa_rejeição, 2);
        
    }
    
}
