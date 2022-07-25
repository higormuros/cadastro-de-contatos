<?php

require "funcoes-globais.php";

if(
    isset($_REQUEST['id']) &&
    is_numeric($_REQUEST['id']) &&
    isset($_REQUEST['nome']) && 
    isset($_REQUEST['email']) && 
    isset($_REQUEST['telefone']) &&
    isset($_REQUEST['nascimento']) &&
    isset($_REQUEST['cidade'])
){
    if(formatoData($_REQUEST['nascimento'])){
        require $diretorioModelos."usuario.php";
        usuario::atualizar(
            $_REQUEST['id'],
            array(
                "nome"=>$_REQUEST['nome'],
                "email"=>$_REQUEST['email'],
                "telefone"=>$_REQUEST['telefone'],
                "nascimento"=>$_REQUEST['nascimento'],
                "cidade"=>$_REQUEST['cidade']
            )
        );
        echo json_encode(array("Sucesso"=>"Atualizado"));
    }else{
        echo json_encode(array("Erro"=>"Data informada incorretamente ou fora do formato aaaa-mm-dd."));
    }
} else{
    echo json_encode(array("Erro"=>"Dados informados incorretamente ou ausentes."));
}

