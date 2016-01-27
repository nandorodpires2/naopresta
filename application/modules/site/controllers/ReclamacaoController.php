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
class Site_ReclamacaoController extends Zend_Controller_Action {

    public function init() {
        $this->view->headScript()->appendFile($this->view->baseUrl('views/js/site/reclamacao.js'));
    }
    
    public function indexAction() {
        
        $modelProduto = new Model_DbTable_Produto();
        
        $produto_nome = $this->getRequest()->getParam("produto", null);
        $this->view->produto_nome = $produto_nome;
        
        // parametro de mensagem de produto nao encontrado
        $this->view->msg = false;
        
        // grava a reclamacao
        $formSiteReclamacao = new Form_Site_Reclamacao();    
        
        // verifica se ha dados do produto
        if ($produto_nome) {
            $produto = $modelProduto->getById($produto_nome)->toArray();            
            $formSiteReclamacao->populate($produto);
            $formSiteReclamacao->produto_nome->setAttrib("readonly", true);
            $formSiteReclamacao->marca_nome->setAttrib("readonly", true);
            $formSiteReclamacao->fabricante_nome->setAttrib("readonly", true);
            
        }
        
        $this->view->formSiteReclamacao = $formSiteReclamacao; 
        
        if ($this->getRequest()->isPost()) {            
            // pesquisa o produto        
            $produto_naopresta = $this->getRequest()->getParam("produto_naopresta");
            $this->view->produto_naopresta = $produto_naopresta;            
            $where = $modelProduto->getDefaultAdapter()->quoteInto("produto_nome like ?", "%".$produto_naopresta."%");
            $produtos = $modelProduto->fetchAll($where);            
            $this->view->produtos = $produtos;     
            $this->view->msg = true;
        }
        
    }
    
    public function reclamarAction() {
        
        $modelProduto = new Model_DbTable_Produto();
        
        $produto_nome = $this->getRequest()->getParam("produto", null);
        $this->view->produto_nome = $produto_nome;
        
        // grava a reclamacao
        $formSiteReclamacao = new Form_Site_Reclamacao();    
        
        // verifica se ha dados do produto
        if ($produto_nome) {
            $produto = $modelProduto->getById($produto_nome)->toArray();            
            $formSiteReclamacao->populate($produto);
            $formSiteReclamacao->produto_nome->setAttrib("readonly", true);
            $formSiteReclamacao->marca_nome->setAttrib("readonly", true);
            $formSiteReclamacao->fabricante_nome->setAttrib("readonly", true);
        }
        
        if ($this->getRequest()->isPost()) {
            $dadosPost = $this->getRequest()->getPost();            
            if ($formSiteReclamacao->isValid($dadosPost)) {
                    
                try {
                
                    Zend_Db_Table_Abstract::getDefaultAdapter()->beginTransaction();

                    // fabrincante
                    $fabricante_id = $formSiteReclamacao->getValue("fabricante_id");

                    if (empty($fabricante_id)) {
                        $fabricante_id = $this->gravaFabricante($dadosPost);
                    }

                    // marca
                    $marca_id = $formSiteReclamacao->getValue("marca_id");
                    if (empty($marca_id)) {
                        $marca_id = $this->gravaMarca($dadosPost, $fabricante_id);
                    }

                    // produto
                    $produto_id = $formSiteReclamacao->getValue("produto_id");
                    if (empty($produto_id)) {
                        $produto_id = $this->gravaProduto($dadosPost, $marca_id);
                    }

                    // grava reclamacao
                    $dadosReclamacao = array(
                        'produto_id' => $produto_id,
                        'reclamacao_descricao' => $dadosPost['reclamacao_descricao'],
                        'reclamacao_nota' => $dadosPost['reclamacao_nota'],
                        'reclamacao_nome' => $dadosPost['reclamacao_nome'],
                        'reclamacao_email' => $dadosPost['reclamacao_email'],
                        'reclamacao_cidade' => $dadosPost['reclamacao_cidade'],
                        'reclamacao_estado' => $dadosPost['reclamacao_estado']
                    );
                    
                    $modelReclamacao = new Model_DbTable_Reclamacao();
                    $modelReclamacao->insert($dadosReclamacao);
                    
                    Zend_Db_Table_Abstract::getDefaultAdapter()->commit();
                    
                    $this->_helper->flashMessenger->addMessage(array(
                        'success' => "Sua reclamação foi enviada com sucesso!"
                    ));                    
                    $this->_helper->flashMessenger->addMessage(array(
                        'success' => "Agradecemos sua colaboração!"
                    ));                    
                
                } catch (Exception $ex) {
                    Zend_Db_Table_Abstract::getDefaultAdapter()->rollBack();
                    $this->_helper->flashMessenger->addMessage(array(
                        'danger' => $ex->getMessage()
                    ));
                }
                
                $this->_redirect("reclamacao/reclamar/produto/{$produto_id}");
                
            }
        }
        
        $this->view->formSiteReclamacao = $formSiteReclamacao;
        
    }
    
    private function gravaFabricante(array $data) {
        try {
            $modelFabricante = new Model_DbTable_Fabricante();
            return $modelFabricante->insert(array(
                'fabricante_nome' => $data['fabricante_nome']
            ));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
    
    private function gravaMarca(array $data, $fabricante_id) {
        try {
            $modelMarca = new Model_DbTable_Marca();
            return $modelMarca->insert(array(
                'fabricante_id' => $fabricante_id,
                'marca_nome' => $data['marca_nome']
            ));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
    
    private function gravaProduto(array $data, $marca_id) {
        try {
            $modelProduto = new Model_DbTable_Produto();
            return $modelProduto->insert(array(
                'marca_id' => $marca_id,
                'produto_nome' => $data['produto_nome']
            ));
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
    
}
