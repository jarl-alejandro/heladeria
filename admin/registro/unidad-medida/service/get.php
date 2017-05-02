<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$select = $pdo->query("SELECT * FROM hel_uni WHERE cod_uni='$id'");
$fetch = $select->fetch();

print json_encode($fetch);