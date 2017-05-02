<?php
session_start();
include "../conexion.php";

$email = $_POST["email"];
$password = sha1($_POST["password"]);

$loginQuery = $pdo->query("SELECT * FROM hel_clien WHERE ema_clien='$email' AND pass_clien='$password'");

if($loginQuery->rowCount() == 1){
  $user = $loginQuery->fetch();

  $_SESSION["b81ac816c94556b2f033f9c1a6fce82e76cb90cb"] = $user["ced_clien"];
  $_SESSION["db78ff0a8439032f661fe9f0a13e09c2c5a7c435"] = "cliente";
  $_SESSION["b5945009161e239ef9164232db640cdfb1829e49"] = $user["nom_clien"]." ".$user["ape_clien"];

  echo 2;
}
else{
  echo 1;
}