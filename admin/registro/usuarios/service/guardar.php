<?php
include "../../../../conexion.php";
include "../../../../helpers.php";

$id = $_POST["id"];
$rol = $_POST["rol"];
$empleado = $_POST["empleado"];

if ($id == "") {
	$count = $pdo->query("SELECT * FROM hel_rempl WHERE rol_rempl='$rol' AND ced_rempl='$empleado'");

	if($count->rowCount() > 0){
		echo 1;
		return false;
	}

	$new = $pdo->prepare("INSERT INTO hel_rempl (ced_rempl, rol_rempl) VALUES (?, ?)");

	$new->bindParam(1, $empleado);
	$new->bindParam(2, $rol);

	$new->execute();
  updateCode("cont_cant");
}
else {
		$new = $pdo->query("UPDATE hel_rempl SET ced_rempl='$empleado', rol_rempl='$rol' 
          WHERE ced_rempl='$id'");

}

if($new) {
	echo 2;
}