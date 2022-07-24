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
        echo "atualizado";
    }else{
        echo "Erro: a data pode ter sido informada incorretamente ou não estava no formato aaaa-mm-dd.";
    }
} else{
    echo "Erro: os dados do novo usuário foram informados incorretamente ou algum dado não foi informado.";
}

