<?php
include "../../../../conexion.php";

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

function upload_image ($codeImage, $routeImage) {
  $imagen = $_FILES['imagen']['name'];
  $imagen = $codeImage . ".png";
  $ruta = $_FILES["imagen"]["tmp_name"];
  $destino = "../../../../media/$routeImage/$imagen";

  copy($ruta, $destino);
  return $imagen;
}
