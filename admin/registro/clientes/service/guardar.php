<?php
include "../../../../conexion.php";

$id = $_POST["id"];
$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$celular = $_POST["celular"];
$direccion = $_POST["direccion"];
$email = $_POST["email"];
$sexo = $_POST["sexo"];
$password = sha1($_POST["cedula"]);

if ($id == "") {
	$count = $pdo->query("SELECT * FROM hel_clien WHERE ced_clien='$cedula'");

	if($count->rowCount() > 0){
		echo 1;
		return false;
	}

	$count_email = $pdo->query("SELECT * FROM hel_clien WHERE ema_clien='$email'");

	if($count_email->rowCount() > 0){
		echo 3;
		return false;
	}

	$new = $pdo->prepare("INSERT INTO hel_clien (ced_clien, nom_clien, ape_clien, tel_clien, cel_clien, 
				dir_clien, ema_clien, sex_clien, pass_clien) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

	$new->bindParam(1, $cedula);
	$new->bindParam(2, $nombre);
	$new->bindParam(3, $apellido);
	$new->bindParam(4, $telefono);
	$new->bindParam(5, $celular);
	$new->bindParam(6, $direccion);
	$new->bindParam(7, $email);
	$new->bindParam(8, $sexo);
	$new->bindParam(9, $password);

	$new->execute();
}
else {
		$new = $pdo->query("UPDATE hel_clien SET nom_clien='$nombre', ape_clien='$apellido', 
				tel_clien='$telefono', cel_clien='$celular', dir_clien='$direccion', ema_clien='$email', sex_clien='$sexo' WHERE ced_clien='$id'");

}

if($new) {
	echo 2;
}