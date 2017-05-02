<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$delete = $pdo->query("DELETE FROM hel_prove WHERE cod_prove='$id'");

if($delete) {
  echo 2;
}