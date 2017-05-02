<?php
include "../conexion.php";

$productos = array();

$id = $_POST["mesa"];

$new = $pdo->query("UPDATE hel_ped SET est_ped='pagado' WHERE mes_ped='$id'");
$pdo->query("DELETE FROM tmp_mesa where mesa='$id'");

if ($new) {
  echo 2;
}