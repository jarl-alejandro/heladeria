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
	$count = $pdo->query("SELECT * FROM hel_emple WHERE ced_empl='$cedula'");

	if($count->rowCount() > 0){
		echo 1;
		return false;
	}

	$count_email = $pdo->query("SELECT * FROM hel_emple WHERE ema_empl='$email'");

	if($count_email->rowCount() > 0){
		echo 3;
		return false;
	}

	$new = $pdo->prepare("INSERT INTO hel_emple (ced_empl, nom_empl, ape_empl, tel_empl, cel_emp, 
				dir_empl, ema_empl, sex_empl, pass_empl) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

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
		$new = $pdo->query("UPDATE hel_emple SET nom_empl='$nombre', ape_empl='$apellido', 
				tel_empl='$telefono', cel_emp='$celular', dir_empl='$direccion', ema_empl='$email', sex_empl='$sexo' WHERE ced_empl='$id'");

}

if($new) {
	echo 2;
}