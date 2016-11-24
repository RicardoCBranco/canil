/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function deleta(id){
    decisao = confirm("Deseja apagar o registro selecionado?");
    if(decisao){
       location.href="delete.php?id_raca="+id;
    }else{
       location.href="index.php";
    }
}

function edita(id){
    location.href="edit.php?id_raca="+id;
}

