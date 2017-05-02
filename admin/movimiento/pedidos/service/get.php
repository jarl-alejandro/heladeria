<?php
include "../../../../conexion.php";

$id = $_POST["id"];
$productos = array();

$select = $pdo->query("SELECT * FROM vista_pedido WHERE mes_ped='$id' AND est_ped!='entregado'");
$fetch = $select->fetch();

$code = $fetch["cod_ped"];

$detalle_menu = $pdo->query("SELECT * FROM vista_pedido_menu WHERE codigo='$code'");
$detalle_prod = $pdo->query("SELECT * FROM vista_pedido_produc WHERE codigo='$code'");

while($row = $detalle_menu->fetch()) {
  $productos[] = $row;
}

while($row = $detalle_prod->fetch()) {
  $productos[] = $row;
}

$json = array('menu'=>$fetch, 'productos'=>$productos);

print json_encode($json);