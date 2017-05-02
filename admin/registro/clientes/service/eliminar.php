<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$delete = $pdo->query("DELETE FROM hel_clien WHERE ced_clien='$id'");

if($delete) {
  echo 2;
}