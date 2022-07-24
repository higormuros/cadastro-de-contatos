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
        echo "<pre>";
        var_dump($resultado);
        echo "</pre>";
    } else{
        echo "Erro: não foram encontrados contatos para os critérios informados.";
    }
} else{
    echo "Erro: coluna ou critério não definido ou definido incorretamente.";
}