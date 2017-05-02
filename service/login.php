<?php
session_start();
include "../conexion.php";

$email = $_POST["email"];
$password = sha1($_POST["password"]);

$loginQuery = $pdo->query("SELECT * FROM hel_emple WHERE ema_empl='$email' AND pass_empl='$password'");

if($loginQuery->rowCount() == 1){
  $user = $loginQuery->fetch();

  $_SESSION["b81ac816c94556b2f033f9c1a6fce82e76cb90cb"] = $user["ced_empl"];
  $_SESSION["db78ff0a8439032f661fe9f0a13e09c2c5a7c435"] = "empleado";
  $_SESSION["b5945009161e239ef9164232db640cdfb1829e49"] = $user["nom_empl"]." ".$user["ape_empl"];

  echo 2;
}
else{
  echo 1;
}