<?php
include "../../../../conexion.php";

$id = $_POST["id"];

$select = $pdo->query("SELECT * FROM hel_cate WHERE cod_cate='$id'");
$fetch = $select->fetch();

print json_encode($fetch);