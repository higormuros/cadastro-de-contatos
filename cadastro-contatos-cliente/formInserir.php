<form id="modalBodyForm">
	<div class="mb-3">
		<label for="nome" class="form-label">Nome:</label>
		<input type="text" class="form-control" id="nome" name="nome" required>
		<div class="form-text">Obrigatório</div>
	</div>
	<div class="mb-3">
		<label for="email" class="form-label">E-mail:</label>
		<input type="email" class="form-control" id="email" name="email" required>
		<div class="form-text">Obrigatório</div>
	</div>
	<div class="row">
		<div class="col-6">
			<div class="mb-3">
				<label for="telefone" class="form-label">Telefone:</label>
				<input type="text" class="form-control" id="telefone" name="telefone" required>
				<div class="form-text">Obrigatório</div>
			</div>
		</div>
		<div class="col-6">
			<div class="mb-3">
				<label for="nascimento" class="form-label">Data de nascimento:</label>
				<input type="text" class="form-control" id="nascimento" name="nascimento" placeholder="aaaa-mm-dd" required>
				<div class="form-text">Obrigatório</div>
			</div>
		</div>
	</div>
	<div class="mb-3">
		<label for="cidade" class="form-label">Cidade onde nasceu:</label>
		<input type="text" class="form-control" id="cidade" name="cidade" required>
		<div class="form-text">Obrigatório</div>
	</div>
	<input type="hidden" id="acao2" name="acao" value="inserir">
	<input type="hidden" id="idAtualizar" name="id" value="">
	<input type="hidden" id="modalSavePage" value="http://localhost/cadastro-contatos/api/">
	
</form>
