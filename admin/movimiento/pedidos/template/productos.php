<?php
include "../../../conexion.php";
$select = $pdo->query("SELECT * FROM hel_prod");
?>
<div class="mui-panel panel-productos col-xs-12 col-md-5 col-md-offset-3">
	<h3 class="titulo-panel text-center">PRODUCTOS</h3>
	<div class="mui-textfield mui-textfield--float-label col-xs-12">
		<input type="text" id="searchProdu" maxlength="140">
		<label>Buscador</label>
	</div>
  <div class="table-responsive">
    <table class="mui-table mui-table--bordered" id="table-productos">
      <thead>
        <tr>
          <th width="30%">PRODUCTO</th>
          <th width="20%">VALOR</th>
          <th width="50%">CANT</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if($select->rowCount() == 0){
          echo "<tr><td colspan='4' class='text-center'>no hay productos registrados</td></tr>";
        }
        while($row = $select->fetch()){ 
        ?>
        <tr>
          <td class="producto--item"><?= $row["nom_prod"] ?></td>
          <td class="producto--item">$ <?= $row["val_prod"] ?></td>
          <td class="producto--item">
            <div class="mui-textfield mui-textfield--float-label col-xs-12">
              <input type="text" id="cant_<?= $row["cod_prod"] ?>" maxlength="4" 
                  onkeypress="numeros()" data-id="<?=$row["cod_prod"];?>" class="product_cant"
                  data-name="<?=$row["nom_prod"];?>" data-cant="<?=$row["cant_prod"];?>"
                  data-valor="<?=$row["val_prod"];?>">
              <label>Ingrese la cantidad</label>
            </div>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
	<div class="row">
		<div class="col-lg-12 flex-center">
			<ul id="NavPosicion" class="pagination"></ul>
		</div>
	</div>
	<div class="text-center">
		<button class="mui-btn mui-btn--primary mui-btn--raised" id="guardar-productos">Guradar</button>
		<button class="mui-btn mui-btn--danger mui-btn--raised" id="cancelar-productos">Cancelar</button>
	</div>
</div>

<script type="text/javascript" src="../../../assets/js/paging.js"></script>
<script type="text/javascript" src="../../../assets/js/search.js"></script>
<script>
	var pagerProd = new Pager('table-productos', 5);
	pagerProd.init();
	pagerProd.showPageNav('pagerProd', 'NavPosicion');
	pagerProd.showPage(1);

	(function() {
		theTableProd = $("#table-productos");
		$("#searchProdu").keyup(function() {
			$.uiTableFilter(theTableProd, this.value, 5)
		})
	})()
	
</script>