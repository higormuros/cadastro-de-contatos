<?php

//require "../../cadastro-contatos-privado/modelos/usuario.php";
//$u=new usuario("Higor de souza","higorsouza@teste.com","(21) 99999-9999","1988-04-09","São Gonçalo-RJ");
//$u->inserir();
//var_dump($u);
/*usuario::atualizar(2,array(
	"nome"=>"Higor Teixeira",
	"email"=>"higor.teste@gmail.com",
	"telefone"=>"(21) 97913-7202",
	"nascimento"=>"2000-04-09",
	"cidade"=>"São Gonçalo"
));
echo "<pre>";
var_dump(usuario::select("nome","Higor Teixeira"));
echo "</pre>";*/
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

