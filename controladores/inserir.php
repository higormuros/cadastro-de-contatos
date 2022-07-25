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
        echo json_encode(array("Sucesso"=>"Inserido"));
    }else{
        echo json_encode(array("Erro"=>"Data informada incorretamente ou fora do formato aaaa-mm-dd."));
    }
} else{
    echo json_encode(array("Erro"=>"Dados informados incorretamente ou ausentes."));
}

