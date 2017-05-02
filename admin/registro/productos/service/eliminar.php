<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$delete = $pdo->query("DELETE FROM hel_prod WHERE cod_prod='$id'");

if($delete) {
  echo 2;
}