<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$delete = $pdo->query("DELETE FROM hel_cate WHERE cod_cate='$id'");

if($delete) {
  echo 2;
}