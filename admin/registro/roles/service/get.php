<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$select = $pdo->query("SELECT * FROM hel_rol WHERE cod_rol='$id'");
$fetch = $select->fetch();

print json_encode($fetch);