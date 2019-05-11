<?php
require 'config.php';

session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id'] == false)) {
	
} else {
	header("Location: login.php");
}

$sql = "SELECT * FROM usuarios";
$sql = $pdo->query($sql);

	if($sql->rowCount() > 0) {

		foreach ($sql->fetchAll() as $usuario) {

		}
		
	}


?>
<!DOCTYPE html>
	<head>
		<meta charset="UTF-9" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
	</head>
	<style type="text/css">
	body {
		background-color: #CCC;
	}
	.container {
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		padding: 10px;
	}
	</style>

	<body>
		<div class="container bg-white">
			<div class="row justify-content-between" style="padding: 10px 0;">
				<div class="col-1">
					<button class="btn btn-primary"><a  style="text-decoration: none; color:inherit;" href="adicionar.php">Cadastrar produto</a></button>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-hover table-sm" style="text-align: center;"> 
					<thead>
						<tr class="table-secondary">
							<th>Código</th>
							<th>Data de cadastro</th>
							<th>Marca</th>
							<th>Produto</th>
							<th>Preço</th>
							<th>Ações</th>
						</tr>
					</thead>
					<?php
					$sql = "SELECT * FROM produtos";
					$sql = $pdo->query($sql);


					if($sql->rowCount() > 0) {
						foreach($sql->fetchAll() as $tabela) {

							$data = $tabela['data'];
							$valor = $tabela['valor'];
							$valor = number_format($valor, 2,",",".");


							echo '<tbody>';
							echo '<tr>';
							echo '<td>'.$tabela['id'].'</td>';
							echo '<td>'.date('d/m/Y', strtotime($data)).'</td>';
							echo '<td>'.$tabela['marca'].'</td>';
							echo '<td>'.$tabela['produto'].'</td>';
							echo '<td>R$ '.$valor.'</td>';
							echo '<td><button class="btn btn-sm btn-info"><a style="text-decoration: none; color: inherit;" href="editar.php?id='.$tabela['id'].'">Editar</a></button> <button class="btn btn-sm btn-danger"><a style="text-decoration: none; color: inherit;" href="excluir.php?id='.$tabela['id'].'">Excluir</a></button></td>';
							echo '</tr>';
							echo '</tbody>';
						}
					}
					?>
				</table>
			</div>
		</div>
		<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
	</body>

</html>