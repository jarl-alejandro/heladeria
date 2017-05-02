<?php
include "../../../../conexion.php";
include "../../../../helpers.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$detalle = $_POST["detalle"];
$codigo = setCode('CT-', 8, 'hel_cate', 'cont_cant');

if ($id == "") {
	$count = $pdo->query("SELECT * FROM hel_cate WHERE nom_cate='$nombre'");

	if($count->rowCount() > 0){
		echo 1;
		return false;
	}

	$new = $pdo->prepare("INSERT INTO hel_cate (cod_cate, nom_cate, det_cate) VALUES (?, ?, ?)");

	$new->bindParam(1, $codigo);
	$new->bindParam(2, $nombre);
	$new->bindParam(3, $detalle);

	$new->execute();
  updateCode("cont_cant");
}
else {
		$new = $pdo->query("UPDATE hel_cate SET nom_cate='$nombre', det_cate='$detalle' 
          WHERE cod_cate='$id'");

}

if($new) {
	echo 2;
}