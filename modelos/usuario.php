<?php

require "conexao.php";

class usuario{
    
    private $nome;
    private $email;
    private $telefone;
    private $nascimento;
    private $cidade;

    public function __construct($nome,$email,$telefone,$nascimento,$cidade){
        $this->nome=$nome;
        $this->email=$email;
        $this->telefone=$telefone;
        $this->nascimento=$nascimento;
        $this->cidade=$cidade;
    }

    public function inserir(){
        $query="
		INSERT INTO 
		usuarios
		(nome, email, telefone, nascimento, cidade) 
		VALUES ( :nome , :email , :telefone, :nascimento, :cidade);";
        $conexao=new conexao();
		$stmt = $conexao->conectar()->prepare($query);
		$stmt->bindValue(':nome',$this->nome);
		$stmt->bindValue(':email',$this->email);
		$stmt->bindValue(':telefone',$this->telefone);
        $stmt->bindValue(':nascimento',$this->nascimento);
        $stmt->bindValue(':cidade',$this->cidade);
		$stmt->execute();
    }

    public function select($coluna,$criterio){
        $query="select * from usuarios";
        $conexao=new conexao();
        $colunas=array("nome","email","telefone","nascimento","cidade");
        if(in_array($coluna,$colunas)){
            $query.=" where ".$coluna." = :criterio;";
            $stmt = $conexao->conectar()->prepare($query);
            $stmt->bindValue(':criterio',$criterio);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return null;
        }
    }

    public function atualizar($id,$valores){
        $query="UPDATE usuarios
        SET nome= :nome , email= :email , telefone= :telefone , nascimento= :nascimento , cidade= :cidade 
        WHERE iduser= :id ;";
        $conexao=new conexao();
        $stmt = $conexao->conectar()->prepare($query);
        $stmt->bindValue(':nome',$valores["nome"]);
        $stmt->bindValue(':email',$valores["email"]);
        $stmt->bindValue(':telefone',$valores["telefone"]);
        $stmt->bindValue(':nascimento',$valores["nascimento"]);
        $stmt->bindValue(':cidade',$valores["cidade"]);
        $stmt->bindValue(':id',$id);
        $stmt->execute();
    }

    public function deletar($id){
        $query="DELETE FROM usuarios WHERE iduser= :id ;";
        $conexao=new conexao();
		$stmt = $conexao->conectar()->prepare($query);
		$stmt->bindValue(':id',$id);
		$stmt->execute();
    }

}