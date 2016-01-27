/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   
    $("#form-site-pesquisa").submit(function() {       
        var produto_pesquisa = $("#produto_pesquisa").val();
        
        if (produto_pesquisa === '') {
            alert("Por favor, informe o produto");
            return false;
        }
        
        return true;
        
    });
    
    $("#form-site-nao-presta").submit(function() {       
        var produto_pesquisa = $("#produto_naopresta").val();
        
        if (produto_pesquisa === '') {
            alert("Por favor, informe o produto");
            return false;
        }
        
        return true;
        
    });
});

