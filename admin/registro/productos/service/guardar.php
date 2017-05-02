<?php
include "../../../../conexion.php";
include "../../../../helpers.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$cantidad = $_POST["cantidad"];
$maxima = $_POST["maxima"];
$minima = $_POST["minima"];
$valor = $_POST["valor"];
$unidad = $_POST["unidad"];
$tipo = $_POST["tipo"];
$categoria = $_POST["categoria"];
$codigo = setCode('PR-', 8, 'hel_prod', 'cont_prod');

if ($id == "") {
	$count = $pdo->query("SELECT * FROM hel_prod WHERE nom_prod='$nombre'");

	if($count->rowCount() > 0){
		echo 1;
		return false;
	}

	$new = $pdo->prepare("INSERT INTO hel_prod (cod_prod, nom_prod, cant_prod, max_prod, min_prod, 
				val_prod, uni_prod, tip_prod, cat_prod) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

	$new->bindParam(1, $codigo);
	$new->bindParam(2, $nombre);
	$new->bindParam(3, $cantidad);
	$new->bindParam(4, $maxima);
	$new->bindParam(5, $minima);
	$new->bindParam(6, $valor);
	$new->bindParam(7, $unidad);
	$new->bindParam(8, $tipo);
	$new->bindParam(9, $categoria);

	$new->execute();
	updateCode("cont_prod");
}
else {
		$new = $pdo->query("UPDATE hel_prod SET nom_prod='$nombre', cant_prod='$cantidad', 
				max_prod='$maxima', min_prod='$minima', val_prod='$valor', uni_prod='$unidad', tip_prod='$tipo', cat_prod='$categoria' WHERE cod_prod='$id'");

}

if($new) {
	echo 2;
}