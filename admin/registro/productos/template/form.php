<?php
include "../../../conexion.php";
$select = $pdo->query("SELECT * FROM hel_uni");
$categorias = $pdo->query("SELECT * FROM hel_cate");

?>
<h2 class="text-center title-card">Nuevo <?=$form?></h2>
<input type="hidden" id="id">
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="nombre"  maxlength="140" onkeypress="textos()">
	<label>Ingrese el nombre del producto</label>
</div>
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="cantidad" maxlength="10" onkeypress="numeros()">
	<label>Ingrese la cantidad</label>
</div>
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="maxima" maxlength="10" onkeypress="numeros()">
	<label>Ingrese la cantidad maximo</label>
</div>
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="minima" maxlength="140">
	<label>Ingrese la cantidad minima</label>
</div>
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="valor" maxlength="80">
	<label>Ingrese valor</label>
</div>
<div class="mui-select col-xs-12 col-md-6">
	<select id="unidad">
		<option value="">Ingrese el unidad</option>
		<?php while ($row = $select->fetch()){ ?>
		<option value="<?= $row['cod_uni'] ?>"><?= $row['nom_uni'] ?></option>
		<?php } ?>
	</select>
	<label>Ingrese el unidad</label>
</div>
<div class="mui-select col-xs-12 col-md-6">
	<select id="tipo">
		<option value="">Ingrese el tipo de producto</option>
		<option value="consumo">consumo</option>
		<option value="venta">venta</option>
	</select>
	<label>Tipo de producto</label>
</div>
<div class="mui-select col-xs-12 col-md-6">
	<select id="categoria">
		<option value="">Ingrese la categoria</option>
		<?php while ($row = $categorias->fetch()){ ?>
		<option value="<?= $row['cod_cate'] ?>"><?= $row['nom_cate'] ?></option>
		<?php } ?>
	</select>
	<label>Ingrese la categoria</label>
</div>
<div class="text-center">
	<button class="mui-btn mui-btn--primary mui-btn--raised" id="guardar">Guardar</button>
	<button class="mui-btn mui-btn--danger mui-btn--raised" id="cancelar">Cancelar</button>
</div>