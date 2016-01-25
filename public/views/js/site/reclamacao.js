/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $('#fabricante_nome').autocomplete({
        serviceUrl: 'fabricante/buscar',
        onSelect: function (data) {
            alert('You selected: ' + data.fabricante_id + ', ' + data.fabricante_nome);
        }
    });
});


