<?php session_start();
if(!isset($_SESSION["b81ac816c94556b2f033f9c1a6fce82e76cb90cb"])){
  header("Location: ../../../index.php");
}
else {
  $id = $_SESSION["b81ac816c94556b2f033f9c1a6fce82e76cb90cb"];
  $nombre = $_SESSION["b5945009161e239ef9164232db640cdfb1829e49"];
  if ($_SESSION["db78ff0a8439032f661fe9f0a13e09c2c5a7c435"] == "cliente") {
    header("Location: ../../../index.php");    
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title ?> | Dolce Coffe</title>
	<link href="../../../assets/css/bootstrap.css" rel="stylesheet" />
	<link href="../../../assets/css/mui.css" rel="stylesheet" />
	<link href="../../../assets/css/font-awesome.css" rel="stylesheet" />
	<link href="../../../assets/css/style.css" rel="stylesheet" />

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500,700" rel="stylesheet">
</head>
<body>
	<div id="toast">Dolce Coffe</div>
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<strong>Email: </strong>dolcecofe@hotmail.com &nbsp;&nbsp;
				<strong>Contactos: </strong>+90-897-678-44
			</div>
		</div>
	</div>
</header>