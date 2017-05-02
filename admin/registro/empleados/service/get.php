<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$select = $pdo->query("SELECT * FROM hel_emple WHERE ced_empl='$id'");
$fetch = $select->fetch();

print json_encode($fetch);