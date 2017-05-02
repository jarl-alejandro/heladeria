<?php
include "../../../../conexion.php";
include "../../../../helpers.php";


$id = $_POST["id"];
$nombre = $_POST["nombre"];
$detalle = $_POST["detalle"];
$productos = $_POST["detalles"];
$is_imagen = $_POST["is_imagen"];
$total = $_POST["total"];
$productos = json_decode($productos);

$codigo = setCode('CM-', 8, 'hel_cate', 'cont_menu');
$code_image = setCode('IMG-', 8, 'hel_cate', 'cont_img');

$det = $pdo->prepare("INSERT INTO hel_menu_det (cod_menu, cant_menu, code_prod, val_prod) 
										VALUES (?, ?, ?, ?)");

if ($id == "") {

	$count = $pdo->query("SELECT * FROM hel_menu WHERE nom_menu='$nombre'");

	if($count->rowCount() > 0){
		echo 1;
		return false;
	}

  $img_menu = upload_image($code_image, "menu");

	$new = $pdo->prepare("INSERT INTO hel_menu (cod_menu, nom_menu, det_menu, ima_menu, tot_menu) 
										VALUES (?, ?, ?, ?, ?)");

	$new->bindParam(1, $codigo);
	$new->bindParam(2, $nombre);
	$new->bindParam(3, $detalle);
	$new->bindParam(4, $img_menu);
	$new->bindParam(5, $total);

	$new->execute();
	updateCode("cont_img");
  updateCode('cont_menu');

	foreach ($productos as $producto) {
		$code = $producto->code;
		$name = $producto->name;
		$valor = $producto->valor;
		$cant = $producto->cant;
		$total = $producto->total;

		$det->bindParam(1, $codigo);
		$det->bindParam(2, $cant);
		$det->bindParam(3, $code);
		$det->bindParam(4, $valor);
		$det->execute();
	}
}
else {
	$pdo->query("DELETE FROM hel_menu_det WHERE cod_menu='$id'");

	if($is_imagen == 0){
		$new = $pdo->query("UPDATE hel_menu SET nom_menu='$nombre', det_menu='$detalle', 
			tot_menu='$total' WHERE cod_menu='$id'");
	}
	else{
		$img_menu = upload_image($code_image, "menu");		
		$new = $pdo->query("UPDATE hel_menu SET nom_menu='$nombre', det_menu='$detalle',
		ima_menu='$img_menu', tot_menu='$total' WHERE cod_menu='$id'");
		updateCode("cont_img");		
	}

	foreach ($productos as $producto) {
		$code = $producto->code;
		$name = $producto->name;
		$valor = $producto->valor;
		$cant = $producto->cant;
		$total = $producto->total;

		$det->bindParam(1, $id);
		$det->bindParam(2, $cant);
		$det->bindParam(3, $code);
		$det->bindParam(4, $valor);
		$det->execute();
	}

}

if($new) {
	echo 2;
}