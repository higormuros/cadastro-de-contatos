Códigos em PHP que permitem criar, atualizar, consultar e excluir contatos de uma lista. O projeto consiste em 3 partes:

	1 - Um banco de dados MySQL/MariaDB
	2 - Uma API para manipulação do banco de dados e que inclui alguns mecanismos de validação dos dados enviados
	3 - Um cliente para consumir o banco de dados via API

Como testar em Localhost (servidor Xampp em Windows)

1 - Copie a API para a sua máquina seguindo estes passos:

	a - crie o banco de dados "cadastrocontatos"
	b - crie as tabelas usando nosso arquivo cadastroContatos.sql
	c - crie uma pasta chamada "cadastro-contatos-privado" dentro da pasta xampp que existe no seu c:
	d - dentro da pasta criada acima, copie nossas pastas "controladores" e "modelos"
	e - no htdocs, crie a pasta "cadastro-contatos"
	f - dentro da pasta criada no item "e", copie a pasta "api" deste repositório

2 - Copie "cadastro-contatos-cliente" para o htdocs da sua máquina

3 - Abra o index.php no seu navegador (usando o servidor Xampp)

4 - Realize as operações de inserir, selecionar, atualizar e deletar contatos
