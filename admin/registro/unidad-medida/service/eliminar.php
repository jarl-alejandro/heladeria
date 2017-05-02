<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$delete = $pdo->query("DELETE FROM hel_uni WHERE cod_uni='$id'");

if($delete) {
  echo 2;
}