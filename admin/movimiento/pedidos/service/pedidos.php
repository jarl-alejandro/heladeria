<?php
include "../../../../conexion.php";

$productos = array();

$select = $pdo->query("SELECT * FROM vista_pedido WHERE est_ped='pedido'");
$fetch = $select->fetch();


$json = array('menu'=>$fetch);

print json_encode($json);