<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$select = $pdo->query("SELECT * FROM hel_prod WHERE cod_prod='$id'");
$fetch = $select->fetch();

print json_encode($fetch);