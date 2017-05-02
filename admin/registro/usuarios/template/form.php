<?php
include "../../../conexion.php";
$roles = $pdo->query("SELECT * FROM hel_rol");
$empleados = $pdo->query("SELECT * FROM hel_emple");
?>
<h2 class="text-center title-card">Nuevo <?=$form?></h2>
<input type="hidden" id="id">
<div class="mui-select col-xs-12 col-md-6">
	<select id="rol">
		<option value="">Ingrese el rol</option>
		<?php while($rol = $roles->fetch()){ ?>
		<option value="<?= $rol['cod_rol'] ?>"><?= $rol['nom_rol'] ?></option>
		<?php } ?>
	</select>
	<label>Ingrese el rol</label>
</div>
<div class="mui-select col-xs-12 col-md-6">
	<select id="empleado">
		<option value="">Ingrese el empleado</option>
		<?php while($row = $empleados->fetch()){ ?>
		<option value="<?= $row['ced_empl'] ?>"><?= $row['nom_empl']." ".$row['ape_empl'] ?></option>
		<?php } ?>
	</select>
	<label>Ingrese el empleado</label>
</div>
<div class="text-center">
	<button class="mui-btn mui-btn--primary mui-btn--raised" id="guardar">Guardar</button>
	<button class="mui-btn mui-btn--danger mui-btn--raised" id="cancelar">Cancelar</button>
</div>