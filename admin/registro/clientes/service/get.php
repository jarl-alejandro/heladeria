<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$select = $pdo->query("SELECT * FROM hel_clien WHERE ced_clien='$id'");
$fetch = $select->fetch();

print json_encode($fetch);