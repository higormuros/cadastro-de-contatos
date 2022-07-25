<?php

require "funcoes-globais.php";
$colunas=array("nome","email","telefone","nascimento","cidade");

if(
    isset($_REQUEST['coluna']) && 
    isset($_REQUEST['criterio']) && 
    in_array($_REQUEST['coluna'],$colunas)
){
    require $diretorioModelos."usuario.php";
    $resultado=usuario::select($_REQUEST['coluna'],$_REQUEST['criterio']);
    if(sizeof($resultado)>0){
        echo json_encode($resultado);
    } else{
        echo json_encode(array("Erro"=>"Nenhum registro encontrado."));
    }
} else{
    echo json_encode(array("Erro"=>"Consulta incorreta."));
}