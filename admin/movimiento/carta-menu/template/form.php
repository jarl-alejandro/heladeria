<h2 class="text-center title-card">Nuevo <?=$form?></h2>
<input type="hidden" id="id">
<input type="hidden" id="imagen_name">
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="nombre" maxlength="140">
	<label>Ingrese el nombre del menu</label>
</div>
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="detalle"  maxlength="140">
	<label>Ingrese el detalle del menu</label>
</div>
<div class="col-xs-6">
	<input type="file" id="imagen" accept="image/png" style="display:none">
	<label class="mui-btn mui-btn--primary mui-btn--raised" for="imagen">Subir imagen</label>
</div>

<div class="flex-end col-xs-6">
	<button class="mui-btn mui-btn--fab mui-btn--primary flex-center" id="show-car">
		<i class="material-icons">add_shopping_cart</i>
	</button>
</div>
<div class="col-xs-12 table-responsive">
<table class="mui-table mui-table--bordered col-xs-12">
	<thead>
		<tr>
			<th>CANT</th>
			<th>PRODUCTO</th>
			<th>UNIT</th>
			<th>TOTAL</th>
			<th>ACIONES</th>
		</tr>
	</thead>
	<tbody id="detalle-menu">
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td></td>
			<td></td>
			<td style="font-weight:bold">TOTAL $:</td>
			<td style="font-weight:bold" id="total">0.00</td>
			<td></td>
		</tr>
	</tbody>
</table>
</div>
<div class="text-center col-xs-12">
	<button class="mui-btn mui-btn--primary mui-btn--raised" id="guardar">Guardar</button>
	<button class="mui-btn mui-btn--danger mui-btn--raised" id="cancelar">Cancelar</button>
</div>