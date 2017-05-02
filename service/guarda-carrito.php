<?php
session_start();
date_default_timezone_set('America/Guayaquil');

include "../conexion.php";

function setCode($letra=NULL, $digitos=NULL, $tabla=NULL, $fila){
  global $pdo;

  $query = $pdo->query("SELECT * FROM hel_param");
  $row = $query->fetch();
  $cant = $row[$fila];
  $str_ceros = "";

  $nletra = strlen($letra);
  $ncant = strlen($cant);

  $ceros = $digitos - ($nletra + $ncant);
  $i = 1;

  while($i <= $ceros){
    $str_ceros .= "0";
    $i += 1;
  }

  $cant++;
  $codigo = $letra.$str_ceros.$cant;
  return $codigo;
}
function updateCode($campo) {
  global $pdo;

  $query1 = $pdo->query("SELECT * FROM hel_param WHERE hel_id=1");
  $row1 = $query1->fetch();
  $canta = $row1[$campo];
  $canta = $canta + 1;

  $pdo->query("UPDATE hel_param SET $campo='$canta' WHERE hel_id=1");
}

$id = $_POST["id"];
$codigo = setCode('PD-', 8, 'hel_ped', 'cont_ped');
$cliente = $_SESSION["b81ac816c94556b2f033f9c1a6fce82e76cb90cb"];
$productos = $_POST["productos"];
$mesa = $_POST["mesa"];
$iva = $_POST["iva"];
$subtotal = $_POST["subtotal"];
$fecha = date("d/m/Y");
$estado = "pedido";

if ($id == "") {

  $new = $pdo->prepare("INSERT INTO hel_ped(cod_ped, mes_ped, clie_ped, est_ped, fet_ped, iva_ped, sub_ped) 
                        VALUES(?, ?, ?, ?, ?, ?, ?)");

  $new->bindParam(1, $codigo);
  $new->bindParam(2, $mesa);
  $new->bindParam(3, $cliente);
  $new->bindParam(4, $estado);
  $new->bindParam(5, $fecha);
  $new->bindParam(6, $iva);
  $new->bindParam(7, $subtotal);

  $new->execute();
  updateCode("cont_ped");
}
else{
  $codigo = $id;
  $new = true;
}

$detail = $pdo->prepare("INSERT INTO ped_det (cod_ped, cod_prod, tip_ped, cant_ped, prec_ped) 
                                    VALUES (?, ?, ?, ?, ?)");

foreach ($productos as $producto){
  $id = $producto["id"];
  $name = $producto["name"];
  $precio = $producto["precio"];
  $tipo = $producto["tipo"];
  $cant = $producto["cant"];

  $detail->bindParam(1, $codigo);
  $detail->bindParam(2, $id);
  $detail->bindParam(3, $tipo);
  $detail->bindParam(4, $cant);
  $detail->bindParam(5, $precio);

  $detail->execute();
}

if ($new) {
  $response = array('status'=>2, 'codigo'=>$codigo);
  print json_encode($response);
}