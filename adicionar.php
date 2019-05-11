<?php
require 'config.php';

if(isset($_POST['marca']) && empty($_POST['marca']) == false) {
	$data = addslashes($_POST['data']);
	$marca = addslashes($_POST['marca']);
	$produto = addslashes($_POST['produto']);
	$valor = addslashes(str_replace(",", ".", $_POST['valor']));

	$sql = "INSERT INTO produtos SET data = '$data', marca = '$marca', produto = '$produto', valor='$valor'";
	$pdo->query($sql);

	header("Location: index.php");
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
	.container {
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		padding: 10px;
	}
	form {
		border: 1px solid #CCC;
		padding: 20px;
		border-radius: 5px;
	}
	label {
		text-align: right;
	}
	</style>
</head>
<body>
<div class="container bg-white">
	<h3>Cadastro de produto</h3>
	
	<form method="POST">
			<div class="form-group row">
				<label class="col-2 col-form-label">Data de entrada:</label> 
				<div class="col-2">
					<input class="form-control form-control-sm" type="date" name="data" />	
				</div>
			</div>

			<div class="form-group row">
				<label class="col-2 col-form-label">Marca:</label>
				<div class="col-6">
					<input class="form-control form-control-sm" type="text" name="marca" />
				</div>
			</div>

			<div class="form-group row">				
				<label class="col-2 col-form-label">Produto:</label>
				<div class="col-6">
					<input class="form-control form-control-sm" type="text" name="produto" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-2 col-form-label">Valor: (R$)</label>
				<div class="col-6">
					<input class="form-control form-control-sm" type="text" name="valor" />
				</div>
			</div>

			<div class="form-group row">
				<div class="col-12">
					<input class="col-12 btn btn-primary" type="submit" name="adicionar" value="Adicionar" />
				</div>
			</div>
	</form>
</div>

	<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>