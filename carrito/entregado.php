<?php
include "../conexion.php";

$productos = array();

$id = $_POST["mesa"];

$select = $pdo->query("SELECT * FROM vista_pedido WHERE est_ped='entregado' AND mes_ped='$id'");
$fetch = $select->fetch();


$json = array('menu'=>$fetch);

print json_encode($json);