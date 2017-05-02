<?php
include "../../../../conexion.php";
$select = $pdo->query("SELECT * FROM hel_cate");
?>
<div class="mui-textfield mui-textfield--float-label col-xs-12">
	<input type="text" id="searchTerm" maxlength="140">
	<label>Buscador</label>
</div>
<div class="table-responsive">
  <table class="mui-table mui-table--bordered" id="table-data">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Categoria</th>
        <th class="flex-around">Acciones
          <button class="flex mui-btn mui-btn--flat mui-btn--raised" id="print">
            <i class="material-icons">print</i>
          </button>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
      if($select->rowCount() == 0){
        echo "<tr><td colspan='4' class='text-center'>No hay categorias registrados</td></tr>
        <script>
           if( isMobile.any() ) {
             $('#table-container').slideUp()
             $('.fondo-card:nth-child(2)').slideDown()
            }
        </script>";
      }
      while($row = $select->fetch()){ 
      ?>
      <tr>
        <td><?= $row["cod_cate"] ?></td>
        <td><?= $row["nom_cate"] ?></td>
        <td class="flex">
          <button class="flex mui-btn mui-btn--primary mui-btn--raised editar" 
            data-id="<?= $row["cod_cate"] ?>">
            <i class="material-icons">edit</i>
          </button>
          <button class="flex mui-btn mui-btn--danger mui-btn--raised eliminar" 
            data-id="<?= $row["cod_cate"] ?>">
            <i class="material-icons">delete</i>
          </button>
          <button class="flex mui-btn mui-btn--accent mui-btn--raised reporte" 
            data-id="<?= $row["cod_cate"] ?>">
            <i class="material-icons">book</i>
          </button>
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
<button class="mui-btn mui-btn--fab mui-btn--accent addbutton">
  <i class="material-icons">add</i>
</button>

<script src="js/app.js"></script>

<script type="text/javascript" src="../../../assets/js/paging.js"></script>
<script type="text/javascript" src="../../../assets/js/search.js"></script>
<script>
  var pager = new Pager('table-data', 5);
  pager.init();
  pager.showPageNav('pager', 'NavPosicion');
  pager.showPage(1);

  (function() {
    theTable = $("#table-data");
    $("#searchTerm").keyup(function() {
      $.uiTableFilter(theTable, this.value, 5)
    })
  })()
	
</script>