<?php

require "funcoes-globais.php";

if(
    isset($_REQUEST['nome']) && 
    isset($_REQUEST['email']) && 
    isset($_REQUEST['telefone']) &&
    isset($_REQUEST['nascimento']) &&
    isset($_REQUEST['cidade'])
){
    if(formatoData($_REQUEST['nascimento'])){
        require $diretorioModelos."usuario.php";
        $usuario=new usuario(
            $_REQUEST['nome'],
            $_REQUEST['email'],
            $_REQUEST['telefone'],
            $_REQUEST['nascimento'],
            $_REQUEST['cidade']
        );
        $usuario->inserir();
        echo "inserido";
    }else{
        echo "Erro: a data pode ter sido informada incorretamente ou não estava no formato aaaa-mm-dd.";
    }
} else{
    echo "Erro: os dados do novo usuário foram informados incorretamente ou algum dado não foi informado.";
}

