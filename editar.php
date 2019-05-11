<?php
require 'config.php';

$id = 0;

if(isset($_GET['id']) && empty($_GET['id']) == false) {
	$id = addslashes($_GET['id']);
}

if(isset($_POST['marca']) && empty($_POST['marca']) == false) {
	$marca = addslashes($_POST['marca']);
	$produto = addslashes($_POST['produto']);
	$valor = addslashes($_POST['valor']);

	$sql = "UPDATE produtos SET marca = '$marca', produto = '$produto', valor = '$valor' WHERE id = '$id'";
	$pdo->query($sql);

	header("Location:index.php");
}

$sql = "SELECT * FROM produtos WHERE id = '$id'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
	$dado = $sql->fetch();
} else {
	header("Location:index.php");
}
?>

<form method="POST">
	<fieldset>
		<legend>Editar produto</legend>
		<div>Marca:</div><div><input type="text" name="marca" value="<?php echo $dado['marca']; ?>" /></div>
		<div>Produto:</div><div><input type="text" name="produto" value="<?php echo $dado['produto']; ?> "/></div>
		<div>Valor:</div> <input type="text" name="valor" value="<?php echo $dado['valor']; ?> "/></div>
		<div><input type="submit" value="Atualizar" value="" /></div>
	</fieldset>
</form>