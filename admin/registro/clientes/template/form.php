<h2 class="text-center title-card">Nuevo <?=$form?></h2>
<input type="hidden" id="id">
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="cedula" maxlength="13" onkeypress="numeros()">
	<label>Ingrese el numero de cedula</label>
</div>
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="nombre"  maxlength="140" onkeypress="textos()">
	<label>Ingrese el nombre</label>
</div>
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="apellido"  maxlength="140" onkeypress="textos()">
	<label>Ingrese el apellido</label>
</div>
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="telefono" maxlength="10" onkeypress="numeros()">
	<label>Ingrese el telefono</label>
</div>
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="celular" maxlength="10" onkeypress="numeros()">
	<label>Ingrese el celular</label>
</div>
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="direccion" maxlength="140">
	<label>Ingrese el direccion</label>
</div>
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="email" maxlength="80">
	<label>Ingrese el e-mail</label>
</div>
<div class="mui-select col-xs-12 col-md-6">
	<select id="sexo">
		<option value="">Ingrese el sexo</option>
		<option value="Hombre">Hombre</option>
		<option value="Mujer">Mujer</option>
		<option value="Otros">Otros</option>
	</select>
	<label>Ingrese el sexo</label>
</div>
<div class="text-center">
	<button class="mui-btn mui-btn--primary mui-btn--raised" id="guardar">Guardar</button>
	<button class="mui-btn mui-btn--danger mui-btn--raised" id="cancelar">Cancelar</button>
</div>