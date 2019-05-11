<?php
require 'config.php';
session_start();

if(isset($_POST['email']) && empty($_POST['email']) == false) {
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));


try {

	$sql = $pdo->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");

	if($sql->rowCount() > 0) {

		$dado = $sql->fetch();

		$_SESSION['id'] = $dado['id'];

		header("Location: index.php");
	}

} catch (PDOException $e) {
	echo "ERRO: ".$e->getMessage();
}

}


?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-9" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />

<style type="text/css">
	body {
		background-color: #CCC;
	}
	.container{
		width: 340px;
    	margin: 50px auto;
	}
    .container form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
	<div class="container">
		<form method="POST">
			<h2 class="text-center">Logar</h2>       
	        <div class="form-group">
	            <input class="form-control" type="email" name="email" placeholder="E-mail" required="required">
	        </div>
			<div class="form-group">
	            <input type="password" class="form-control" name="senha" placeholder="Senha" required="required">
	        </div>
	        <div class="form-group">
	            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
	        </div>
			<div class="row justify-content-around">
		            <label class="pull-left checkbox-inline"><input type="checkbox"> Lembrar-me</label>
		            <a href="#" class="pull-right">Esqueceu a senha?</a>
		        </div>        
		    </form>
		    
	    <p class="text-center"><a href="cadastro_usuario.php">Cadastrar usuário</a></p>
	</div>

	<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>