<?php

class Pessoa{

	private $pdo;

	public function __construct($dbname,$host,$user,$pass){
		try
		{
		 $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$pass);
		}
		catch(PDOexception $e)
		{
			echo "ERRO COM O BANCO DE DADOS: ".$e->getMessage();
		}
	}


	public function buscarDados(){

		$listagem = $this->pdo->prepare("SELECT * FROM pessoas");
		$listagem->execute();

		while($lista = $listagem->fetch(PDO::FETCH_ASSOC))
		{
			echo "<li>  Nome: ".$lista["nome"]."| Telefone: ".$lista["telefone"]." | Email: ".$lista["email"]."</li>"; 
		}
	
	}

	public function cadastrarUsuario($name, $telefone, $email)
	{
		$cmd = $this->pdo->prepare("INSERT INTO pessoas(nome, telefone, email) VALUES(:n, :t, :e)");
		$cmd->bindValue(':n',$name);
		$cmd->bindValue(':t',$telefone);
		$cmd->bindValue(':e',$email);
		$cmd->execute();
	}


}

