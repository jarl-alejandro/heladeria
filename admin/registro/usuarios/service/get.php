<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$select = $pdo->query("SELECT * FROM hel_rempl WHERE ced_rempl='$id'");
$fetch = $select->fetch();

print json_encode($fetch);