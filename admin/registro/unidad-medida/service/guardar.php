<?php
include "../../../../conexion.php";
include "../../../../helpers.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$detalle = $_POST["detalle"];
$codigo = setCode('UN-', 8, 'hel_uni', 'cont_uni');

if ($id == "") {
	$count = $pdo->query("SELECT * FROM hel_uni WHERE nom_uni='$nombre'");

	if($count->rowCount() > 0){
		echo 1;
		return false;
	}

	$new = $pdo->prepare("INSERT INTO hel_uni (cod_uni, nom_uni, equi_uni) VALUES (?, ?, ?)");

	$new->bindParam(1, $codigo);
	$new->bindParam(2, $nombre);
	$new->bindParam(3, $detalle);

	$new->execute();
	updateCode("cont_uni");
}
else {
		$new = $pdo->query("UPDATE hel_uni SET nom_uni='$nombre', equi_uni='$detalle' 
					WHERE cod_uni='$id'");

}

if($new) {
	echo 2;
}