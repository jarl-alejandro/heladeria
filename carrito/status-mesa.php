<?php
include "../conexion.php";

$id = $_POST["id"];

$select = $pdo->query("SELECT * FROM hel_ped WHERE mes_ped='$id' AND est_ped!='pagado'");
$fetch = $select->fetch();

print json_encode($fetch);