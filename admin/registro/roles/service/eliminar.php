<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$delete = $pdo->query("DELETE FROM hel_rol WHERE cod_rol='$id'");

if($delete) {
  echo 2;
}