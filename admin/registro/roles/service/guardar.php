<?php
include "../../../../conexion.php";
include "../../../../helpers.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$detalle = $_POST["detalle"];
$codigo = setCode('RL-', 8, 'hel_rol', 'cont_rol');

if ($id == "") {
	$count = $pdo->query("SELECT * FROM hel_rol WHERE nom_rol='$nombre'");

	if($count->rowCount() > 0){
		echo 1;
		return false;
	}

	$new = $pdo->prepare("INSERT INTO hel_rol (cod_rol, nom_rol, det_rol) VALUES (?, ?, ?)");

	$new->bindParam(1, $codigo);
	$new->bindParam(2, $nombre);
	$new->bindParam(3, $detalle);

	$new->execute();
  updateCode("cont_rol");
}
else {
		$new = $pdo->query("UPDATE hel_rol SET nom_rol='$nombre', det_rol='$detalle' 
          WHERE cod_rol='$id'");

}

if($new) {
	echo 2;
}