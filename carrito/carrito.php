<?php
include "conexion.php";
$select_params = $pdo->query("SELECT * FROM hel_param");
$param = $select_params->fetch();
?>
<input type="hidden" id="id">
<div class="mui-panel col-xs-10 col-xs-offset-1 col-md-7 col-md-offset-3" id="carrito">
  <div class="alert alert-warning text-center">
    <strong>Mi carrito</strong>
  </div>
  <div class="table-responsive">
    <table class="mui-table mui-table--bordered" id="table-data">
      <thead>
        <tr>
          <th width="15%">Cant</th>
          <th width="40%">Pedido</th>
          <th width="15%">Unitario</th>
          <th width="15%">Total</th>
          <th width="15%" class="flex-around">Acciones</th>
        </tr>
      </thead>
      <tbody id='carrito-productos'>
        <tr>
          <td class="text-center" colspan='5'>Ingrese los productos que dese adquirir</td>
        </tr>
      </tbody>
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td>Sub Total $</td>
          <td id="sub-carrito"></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>IVA <span id="iva"><?=$param['iva']?></span>%</td>
          <td id="iva-porcent"></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Total $</td>
          <td id="total-carrito"></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-xs-12 text-center">
      <button class="mui-btn mui-btn--danger" id='cerrar-carrito'>Cerrar</button>
      <button class="mui-btn mui-btn--primary" id='enviar-carrito'>Enviar Pedido</button>
      <button class="mui-btn mui-btn--primary" style="display:none" id='pagar-carrito'>Pagar</button>
  </div>
</div>

<div class="mui-panel col-xs-10 col-md-5 col-xs-offset-1 col-md-offset-3 card-cant--pedido">
  <div class="alert alert-warning text-center">
    <strong id='menu-card__name'></strong>
  </div>
  <div class="mui-textfield mui-textfield--float-label">
    <input type="text" id='cant-pedido' onkeypress='numeros()' maxlength='4'>
    <label>Ingrese la cantidad de <span id="name-order"></span> que deseas</label>
  </div>
  <div class="col-xs-12 text-center">
    <button class="mui-btn mui-btn--danger" id='cerrar-cant'>Cerrar</button>
    <button class="mui-btn mui-btn--primary" id='aceptar-cant'>Aceptar</button>
  </div>
</div>