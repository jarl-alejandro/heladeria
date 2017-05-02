<?php
include "../conexion.php";

$id = $_POST["id"];

$new = $pdo->query("INSERT INTO tmp_mesa (mesa) VALUES ('$id')");

if ($new) {
  echo 2;
}