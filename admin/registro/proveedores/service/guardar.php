<?php
include "../../../../conexion.php";
include "../../../../helpers.php";

$codigo = setCode('PR-', 8, 'hel_prove', 'cont_prove');

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$celular = $_POST["celular"];
$direccion = $_POST["direccion"];
$email = $_POST["email"];

$nombreContacto = $_POST["nombreContacto"];
$telefonoContacto = $_POST["telefonoContacto"];
$celularContacto = $_POST["celularContacto"];
$emailContacto = $_POST["emailContacto"];

if ($id == "") {
	$count = $pdo->query("SELECT * FROM hel_prove WHERE nom_prove='$nombre'");

	if($count->rowCount() > 0){
		echo 1;
		return false;
	}

	$count_email = $pdo->query("SELECT * FROM hel_prove WHERE ema_prove='$email'");

	if($count_email->rowCount() > 0){
		echo 3;
		return false;
	}

	$new = $pdo->prepare("INSERT INTO hel_prove (cod_prove, nom_prove, tel_prove, cel_prove, 
				dir_prove, ema_prove, nom_contac, tel_contac, cel_contac, 
				ema_contac) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	$new->bindParam(1, $codigo);
	$new->bindParam(2, $nombre);
	$new->bindParam(3, $telefono);
	$new->bindParam(4, $celular);
	$new->bindParam(5, $direccion);
	$new->bindParam(6, $email);
	$new->bindParam(7, $nombreContacto);
	$new->bindParam(8, $telefonoContacto);
	$new->bindParam(9, $celularContacto);
	$new->bindParam(10, $emailContacto);

	$new->execute();
	updateCode("cont_prove");
}
else {
		$new = $pdo->query("UPDATE hel_prove SET nom_prove='$nombre', tel_prove='$telefono',
				cel_prove='$celular', dir_prove='$direccion', ema_prove='$email',
				nom_contac='$nombreContacto', tel_contac='$telefonoContacto', cel_contac='$celularContacto',
				ema_contac='$emailContacto' WHERE cod_prove='$id'");

}

if($new) {
	echo 2;
}