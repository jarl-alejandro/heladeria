<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$select = $pdo->query("SELECT * FROM hel_prove WHERE cod_prove='$id'");
$fetch = $select->fetch();

print json_encode($fetch);