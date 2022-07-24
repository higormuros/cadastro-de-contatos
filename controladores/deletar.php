<?php

require "funcoes-globais.php";

if(
    isset($_REQUEST['id']) &&
    is_numeric($_REQUEST['id'])
){
    require $diretorioModelos."usuario.php";
    usuario::deletar($_REQUEST['id']);
    echo "deletado";
} else{
    echo "Erro: os dados do novo usuário foram informados incorretamente ou algum dado não foi informado.";
}