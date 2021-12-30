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

	public function cadastrarUsuario($name, $telefone, $email)
	{
		$cmd = $this->pdo->prepare("INSERT INTO pessoas(nome, telefone, email) VALUES(:n, :t, :e)");
		$cmd->bindValue(':n',$name);
		$cmd->bindValue(':t',$telefone);
		$cmd->bindValue(':e',$email);
		$cmd->execute();
	}

	public function buscarDados(){

		$listagem = $this->pdo->prepare("SELECT * FROM pessoas ORDER BY id DESC");
		$listagem->execute();

		while($lista = $listagem->fetch(PDO::FETCH_ASSOC))
		{
			$id = $lista["id"];
            $button_edit = "<div class='opcoes'><a style='color: white;' href='index.php?editar_id=".$id."'>Editar </a><a style='color: white;' href='index.php?excluir_id=".$id."'>Excluir</a></div>";
			echo "<li id='user_".$id."'>  Nome: ".$lista["nome"]." | Telefone: ".$lista["telefone"]." | Email: ".$lista["email"].$button_edit."</li>"; 
		}
	
	}
	
	public function editarDado($id){
		$editar = $this->pdo->prepare("SELECT * FROM pessoas WHERE id = :id");
		$editar->bindValue(':id',$id);
		$editar->execute();
		$res = array();
		while($res = $editar->fetch(PDO::FETCH_ASSOC))
		{
			$nome = $res['nome'];
			$tel = $res['telefone'];
			$email = $res['email'];
		}
	}

	public function excluirDado($id){
		$excluir = $this->pdo->prepare("DELETE FROM pessoas WHERE id = :id");
		$excluir->bindValue(":id",$id);
		$excluir->execute();
	}


}

