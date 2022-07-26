<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Higor Muros">
		<meta name="description" content="Página para consulta de contatos cadastrados">
		<meta name="keywords" content="contatos">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
		rel="stylesheet" 
		integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" 
		crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
		rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200&display=swap" rel="stylesheet"> 
		<link rel="stylesheet" 
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /><title>Cadastro de contatos</title>
		<!-- JQuery -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

		<style>
			.material-symbols-outlined.md-l { font-size: 50px; }
			.material-symbols-outlined.md-m { font-size: 30px; }
			body {
				background-image: url("bg.jpg");
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: fixed;
			}
		</style>
	</head>

	<body style="font-family: 'Roboto', sans-serif;">

		<div class="container bg-light py-5 px-4" style="margin-top:100px; margin-bottom:100px;">
			<div class="mb-4">
				<img src="logo.png" class="mx-auto d-block">
			</div>
			
			<form id="form">
				<div class="row">
					<div class="col-4 ps-4">
						<span 
							class="material-symbols-outlined md-l" 
							onclick="showModal('formInserir','Inserir','500px','Enviar','Limpar')"
							style="margin-top:2px; cursor:pointer;">add_box</span>
					</div>
					<div class="col-6" style="padding-right:50px;">
						<input oninput="enviarForm()" type="text" class="form-control mt-2" id="criterio" name="criterio" placeholder="Buscar...">
						<input type="hidden" name="acao" id="acao" value="selecionar">
						<input type="hidden" name="id" id="idUsuario" value="">
					</div>
					<div class="col-2 pe-4">
						<select onchange="enviarForm()" class="form-select mt-2" name="coluna" id="coluna">
							<option value="nome" selected>Nome</option>
							<option value="email">Email</option>
							<option value="telefone">Telefone</option>
							<option value="nascimento">Nascimento</option>
							<option value="cidade">Cidade</option>
						</select>
					</div>
				</div>
			</form>
			
			<hr class="text-secondary">
			<div class="row px-2">
				<div class="col-2"><strong>Nome</strong></div>
				<div class="col-2"><strong>Email</strong></div>
				<div class="col-2"><strong>Telefone</strong></div>
				<div class="col-2"><strong>Nascimento</strong></div>
				<div class="col-2"><strong>Cidade</strong></div>
			</div>
			<div id="resposta">
				
			</div>
		</div>
		<script>
		$(document).ready(function() {
			$(window).keydown(function(event){
					if(event.keyCode == 13) {
						event.preventDefault();
						return false;
					}
				});
			});
			function enviarForm(id="null"){
				coluna=document.getElementById("coluna").value;
				criterio=document.getElementById("criterio").value;
				if(id!=="null"){
					document.getElementById("acao").value="deletar";
					document.getElementById("idUsuario").value=id;
				}else{
					document.getElementById("acao").value="selecionar";
				}
				if(criterio!=="" && coluna!==""){
					$.ajax({
						type: "POST",
						url: "http://localhost/cadastro-contatos/api/",
						data: $("#form").serialize(),
						success: function(data) {
							meuObj = JSON.parse(data);
							if(id!=="null"){
								enviarForm();
							}else{
								if(meuObj.hasOwnProperty("Erro")){
									novoTexto="<hr class='text-secondary'>";
									novoTexto+="<div class='row px-2'>";
									novoTexto+="<div class='col-12'>"+meuObj.Erro+"</div>";
									novoTexto+="</div>";
								}else{
									novoTexto="";
									for(i=0;i<meuObj.length;i++){
										novoTexto+="<hr class='text-secondary'>";
										novoTexto+="<div class='row px-2'>";
										novoTexto+="<div id='nome"+i+"' class='col-2'>"+meuObj[i].nome+"</div>";
										novoTexto+="<div id='email"+i+"' class='col-2'>"+meuObj[i].email+"</div>";
										novoTexto+="<div id='telefone"+i+"' class='col-2'>"+meuObj[i].telefone+"</div>";
										novoTexto+="<div id='nascimento"+i+"' class='col-2'>"+meuObj[i].nascimento+"</div>";
										novoTexto+="<div id='cidade"+i+"' class='col-2'>"+meuObj[i].cidade+"</div>";
										novoTexto+="<div class='col-2'>";
										novoTexto+="<span onclick='atualizarUsuario("+meuObj[i].iduser+","+i+")' style='cursor:pointer;' class='material-symbols-outlined md-m ms-5'>";
										novoTexto+="edit";
										novoTexto+="</span>";
										novoTexto+="<span onclick='enviarForm("+meuObj[i].iduser+")' style='cursor:pointer;' class='material-symbols-outlined md-m ms-4'>";
										novoTexto+="delete_forever";
										novoTexto+="</span>";
										novoTexto+="</div>";
										novoTexto+="</div>";
									}
								}
								document.getElementById("resposta").innerHTML=novoTexto;
							}
							
						},
						error: function(data) {
							alert("Erro!");
						}
					});
				}
			}
			function atualizarUsuario(id,obj){
				showModal('formInserir','Atualizar','500px','Enviar','Limpar',id,obj);
			}
		</script>
		<?php 
		include "modal.php";
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
		integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" 
		crossorigin="anonymous"></script>
	</body>
</html>