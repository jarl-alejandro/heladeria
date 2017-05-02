<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$delete = $pdo->query("DELETE FROM hel_emple WHERE ced_empl='$id'");

if($delete) {
  echo 2;
}