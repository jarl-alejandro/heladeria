<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$new = $pdo->query("UPDATE hel_ped SET est_ped='procesado' WHERE cod_ped='$id'");

if($new) {
	echo 2;
}