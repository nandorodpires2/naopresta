<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reclamcao
 *
 * @author Fernando Rodrigues
 */
class App_Validate_Reclamacao extends Zend_Validate_Abstract {

    const NOT_VALID = 'notValid';

    protected $_messageTemplates = array(
        self::NOT_VALID => 'Descrição inválida'
    );

    public function isValid($value, $context = null) {
        
        // palavras que nao sao permitidas
        $notAllowed = $this->getNotAllowedWords();
        
        $words = explode(" ", $value);
        $wordsDenied = array();
        $errorMessage = "";
        
        foreach ($words as $word) {
            if (in_array($word, $notAllowed)) {
                $wordsDenied[] = $word;
            }
        }
        
        if (!empty($wordsDenied)) {
            
            $count = count($wordsDenied);            
            $wordsDenied = implode(", ", $wordsDenied);            
            $errorMessage = "As palavras {$wordsDenied} não são permitidas!";
            
            if ($count === 1) {
                $errorMessage = "A palavra {$wordsDenied} não é permitida!";
            }
            
            $this->_messageTemplates[self::NOT_VALID] = $errorMessage;
            $this->_error(self::NOT_VALID);
            return false;
        }
        
        return true;
        
    }
    
    private function getNotAllowedWords() {
        
        $notAllowed = array(
            "bosta",
            "porra",
            "merda"
        );
        
        return $notAllowed;
        
    }
    
}
