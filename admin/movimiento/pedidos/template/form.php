<h2 class="text-center title-card"><?=$form?></h2>
<input type="hidden" id="id">
<input type="hidden" id="imagen_name">
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="cedula" maxlength="140" disabled>
	<label>Numero de Cedula</label>
</div>
<div class="mui-textfield mui-textfield--float-label col-xs-12 col-md-6">
	<input type="text" id="nombre"  maxlength="140" disabled>
	<label>Nombre del Cliente</label>
</div>

<div class="col-xs-12 table-responsive">
<table class="mui-table mui-table--bordered col-xs-12">
	<thead>
		<tr>
			<th>CANT</th>
			<th>PRODUCTO</th>
			<th>UNIT</th>
			<th>TOTAL</th>
		</tr>
	</thead>
	<tbody id="detalle-menu">
		<tr>
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
			<td style="font-weight:bold">SUB TOTAL $:</td>
			<td style="font-weight:bold" id="subtotal">0.00</td>
			<td></td>
		</tr>
    <tr>
			<td></td>
			<td></td>
			<td style="font-weight:bold">IVA <span id="porcent-iva">0</span>%</td>
			<td style="font-weight:bold" id="iva">0.00</td>
			<td></td>
		</tr>
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
	<button class="mui-btn mui-btn--primary mui-btn--raised" id="guardar">Procesar</button>
	<button class="mui-btn mui-btn--primary mui-btn--raised none" id="entragar">Entragar</button>
	<button class="mui-btn mui-btn--danger mui-btn--raised" id="cancelar">Cancelar</button>
</div>