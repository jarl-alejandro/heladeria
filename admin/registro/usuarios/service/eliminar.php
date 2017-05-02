<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$delete = $pdo->query("DELETE FROM hel_rempl WHERE ced_rempl='$id'");

if($delete) {
  echo 2;
}