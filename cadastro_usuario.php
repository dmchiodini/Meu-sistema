<?php
require 'config.php';

if(isset($_POST['nome']) && empty($_POST['nome']) == false) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha'])); 

	$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
	$pdo->query($sql);

	header("Location: login.php");
}
?>
<!DOCTYPE html>
	<head>
		<meta charset="UTF-9" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
	</head>

	<body>
		<div class="container">
			<form method="POST">
				<div class="input-group">
					<fieldset>
						<legend>Cadastrar usuário</legend>
						<div>Nome:</div> 
						<div><input type="name" name="nome" /></div>
						<div>E-mail:</div>
						<div><input type="email" name="email" /></div>
						<div>Senha:</div>
						<div><input type="password" name="senha" /></div>

						<div><input type="submit" value="Cadastrar" /></div>
					</fieldset>
			</div>
			</form>
		</div>
	</body>
</html>

