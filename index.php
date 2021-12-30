<?php
#classes
include('classes/classes.php');
#conexao com banco de dados
include('conexao.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>CadPessoa</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>

<body>

	<div class="title">
		<h2>Sistema de Cadastro</h2>
	</div>

	<div class="container">
		<div class="form-cadastro">

			<!--------Verifica campo vazio---------->
            <?php
				if(isset($_POST["submit"]) AND empty($nome) ):
			?>
				<p style="color: red;">Preencha todos os campos!</p>
			<?php
				endif;
			?>
			<!--------Verifica campo vazio---------->

			<!--------Editar dados---------->
			<?php	
				$id = $_GET["editar_id"];
				$conn->editarDado($id);
			?>
			<!--------Editar dados---------->

			<form action="" method="POST"><!--------FORMULARIO DE CADASTRO---------->
				<label for="nome">Nome: </label><br>
				<input type="name" name="nome" value="<?php if(isset($res)){echo $nome;} ?>" />
				  <br>
				<label for="telefone">Telefone: </label><br>
				<input type="name" name="telefone" value="<?php if(isset($res)){echo $tel;} ?>" />
				  <br>
				<label for="nome">E-mail: </label><br>
				<input type="email" name="email" value="<?php if(isset($res)){echo $email;} ?>" />
				  <br>
				<input type="submit" name="submit" value="<?php if(isset($res)){echo "Atualizar";} else{echo "Cadastrar";} ?>"/><!--------FORMULARIO DE CADASTRO---------->
			</form>

			<!--------Cadastrar pessoa---------->
			<?php 

			$nome = addslashes($_POST["nome"]);
			$telefone = addslashes($_POST["telefone"]);
			$email = addslashes($_POST["email"]);

			 if(isset($_POST["submit"]) AND !empty($nome) AND !empty($telefone) AND !empty($email)  )
			 {
				$conn->cadastrarUsuario($nome, $telefone, $email);
			 }	
			?>
			<!--------Cadastrar pessoa---------->


			<!--------Excluir dado---------->
			<?php 
				$id = $_GET["excluir_id"];
				if($conn->excluirDado($id)){
					header('Location: index.php');
				}
			?>
			<!--------Excluir dado---------->

		</div>
		<div class="lista-pessoa">
			<h2>Pessoas Cadastradas</h2>
			<div class="lista">
				<ul><!--------Busca registro---------->
					<?php $conn->buscarDados(); ?>
				</ul><!--------Busca registro---------->
			</div>
		</div>
	</div>


	<footer>
		<hr>
		<p>Todos os direitos reservados à </p><a style="color: red;" href="https://github.com/zGabdevz">zGabdevz<a/>
		<p> Feito e atualizado com dedicação</p>
		<p>2022</p>
	</footer>
</body>
</html>