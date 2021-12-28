<?php
include('classes/classes.php');
$conn = new Pessoa('cadastro_db','localhost','root', '');
?>

<!DOCTYPE html>
<html>
<head>
	<title>CadPessoa</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
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
				<p>Preencha todos os campos!</p>
			<?php
				endif;
			?>
			<!--------Verifica campo vazio---------->

			<form action="" method="POST"><!--------FORMULARIO DE CADASTRO---------->
				<label for="nome">Nome: </label><br>
				<input type="name" name="nome" placeholder="Digite.." />
				  <br>
					<label for="telefone">Telefone: </label><br>
					<input type="name" name="telefone" placeholder="Digite.."/>
					  <br>
						<label for="nome">E-mail: </label><br>
						<input type="email" name="email" placeholder="Digite.."/>
						  <br>
				<input type="submit" name="submit"/><!--------FORMULARIO DE CADASTRO---------->
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
</body>
</html>