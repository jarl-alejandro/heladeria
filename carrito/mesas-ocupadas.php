<?php
include "../conexion.php";

$mesas = array();

$select = $pdo->query("SELECT * FROM tmp_mesa");

while ($fetch = $select->fetch()) {
  $mesas[] = $fetch;
}



print json_encode($mesas);