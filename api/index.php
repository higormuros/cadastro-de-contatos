<?php

$diretorio="../../../cadastro-contatos-privado/controladores/";
if (isset($_REQUEST["acao"])){
	switch ($_REQUEST["acao"]){
		case "inserir":
			require $diretorio."inserir.php";
			break;
		case "selecionar":
			require $diretorio."selecionar.php";
			break;
		case "atualizar":
			require $diretorio."atualizar.php";
			break;
		case "deletar":
			require $diretorio."deletar.php";
			break;
		default:
			echo "Erro: ação definida incorretamente.";
	}
}else{
	echo "Erro: ação não definida.";
}

