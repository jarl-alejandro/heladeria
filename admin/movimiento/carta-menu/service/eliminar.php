<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$delete = $pdo->query("DELETE FROM hel_menu WHERE cod_menu='$id'");
$pdo->query("DELETE FROM hel_menu_det WHERE cod_menu='$id'");

if($delete) {
  echo 2;
}