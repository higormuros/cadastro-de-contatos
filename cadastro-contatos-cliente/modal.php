<?php ?>
<div class="modalBackground" id="modal">
	<div class="modalContent rounded bg-white">
		<div class="px-3 pt-3 d-flex justify-content-between">
			<span>
				<strong id="modalContentTitle">Custom Title</strong>
			</span>
			<span class="material-symbols-outlined" style="cursor:pointer;" onclick="hideModal();">
				close
			</span>
		</div>
		<hr>
		<div id="modalContentBody" class="p-3">
			<form id="modalBodyForm">
				<input type="hidden" name="idPost" value="null">
			</form>
		</div>
		<div id="modalContentFooter" class="px-3 pb-3">
			<input type="button" id="modalRedBtn" class="btn btn-dark" value="Cancel" onclick="clearModal();">
			<input type="button" id="modalGreenBtn" class="btn btn-dark ms-1" value="Save" onclick="sendModal();">
		</div>
	</div>
</div>

<style>
.modalBackground{
	width:100vw;
	height:100vh;
	background:rgba(0,0,0,0.5);
	position:fixed;
	top:0px;
	left:0px;
	z-index:2000;
	display:none;
	justify-content:center;
	align-items:center;
}

.modalContent{
	width:90%;
	max-width:800px;
}
</style>
<script>
function showModal(page="null",title="Important!",maxWidth="800px",greenBtn="Save",redBtn="Cancel",id="null",user="null"){
	document.getElementById("modal").style.display="flex";
    if(page!="null"){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("POST", page+".php", true);
		xmlhttp.send();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("modalContentBody").innerHTML = this.responseText;
				if(id!="null" && user!="null"){
					document.getElementById("idAtualizar").value=id;
					document.getElementById("acao2").value="atualizar";
					document.getElementById("nome").value=document.getElementById("nome"+user).innerHTML;
					document.getElementById("email").value=document.getElementById("email"+user).innerHTML;
					document.getElementById("telefone").value=document.getElementById("telefone"+user).innerHTML;
					document.getElementById("nascimento").value=document.getElementById("nascimento"+user).innerHTML;
					document.getElementById("cidade").value=document.getElementById("cidade"+user).innerHTML;
				}
			}
		};
	};
	
	document.getElementById("modalContentTitle").innerHTML = title;
	document.querySelector(".modalContent").style.maxWidth = maxWidth;
	document.getElementById("modalGreenBtn").value = greenBtn;
	document.getElementById("modalRedBtn").value = redBtn;
}
function hideModal(){
	document.getElementById("modal").style.display="none";
}
function sendModal(){
	$.ajax({
		type: "POST",
		url: document.getElementById("modalSavePage").value,
		data: $("#modalBodyForm").serialize(),
		success: function(data) {
			meuObj = JSON.parse(data);
			if(meuObj.hasOwnProperty("Erro")){
				alert(meuObj.Erro);
			}
			if(meuObj.hasOwnProperty("Sucesso")){
				alert(meuObj.Sucesso);
			}
		},
		error: function(data) {
			alert("Erro");
		}
	});
	hideModal();
	setTimeout(enviarForm, 1000);
}

function clearModal(){
	document.getElementById("nome").value="";
	document.getElementById("email").value="";
	document.getElementById("telefone").value="";
	document.getElementById("nascimento").value="";
	document.getElementById("cidade").value="";
}
	
</script>
<?php ?>