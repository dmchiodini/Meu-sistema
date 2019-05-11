<?php

$dns = "mysql:dbname=controle_produtos;host=localhost";
$dbuser = "root";
$dbpass = "";



try {
	$pdo = new PDO($dns, $dbuser, $dbpass);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
}


?>