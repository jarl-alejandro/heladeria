<?php
include "../../../../conexion.php";

$id = $_POST["id"];
$productos = array();

$select = $pdo->query("SELECT * FROM hel_menu WHERE cod_menu='$id'");
$fetch = $select->fetch();

$detalle_query = $pdo->query("SELECT * FROM vista_menu_detalle WHERE cod_menu='$id'");

while($row = $detalle_query->fetch()) {
  $productos[] = $row;
}

$json = array('menu'=>$fetch, 'productos'=>$productos);

print json_encode($json);