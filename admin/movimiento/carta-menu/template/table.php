<?php
include "../../../../conexion.php";
$select = $pdo->query("SELECT * FROM hel_menu");
?>
<div class="mui-textfield mui-textfield--float-label col-xs-12">
	<input type="text" id="searchTerm" maxlength="140">
	<label>Buscador</label>
</div>
<section class="mui-table mui-table--bordered cards_menu" id="table-data">
  <article></article>
  <?php
  if($select->rowCount() == 0){
    echo "<article><h2 colspan='4' class='text-center'>No hay menus registrados</h2></article>
       <script>
           if( isMobile.any() ) {
             $('#table-container').slideUp()
             $('.fondo-card:nth-child(2)').slideDown()
            }
        </script>";
  }
  while($row = $select->fetch()){ 
  ?>
  <article class="col-xs-12 col-md-5 mui-panel">
    <h3 class="nombre-card"><?= $row["nom_menu"] ?>
      <ul style="margin-bottom: 0;">
        <li class="drop"><i class="material-icons">more_vert</i>
          <ul class="dropt-list">
            <li><a data-id="<?= $row["cod_menu"] ?>" class="editar"><i class="material-icons">edit</i>Editar</a></li>
            <li><a data-id="<?= $row["cod_menu"] ?>" class="eliminar"><i class="material-icons">delete</i>Eliminar</a></li>
            <li><a data-id="<?= $row["cod_menu"] ?>" class="reporte"><i class="material-icons">book</i> Reporte</a></li>
          </ul>
        </li>
      </ul>
    </h3>
    <img src="../../../media/menu/<?= $row["ima_menu"] ?>" alt="<?= $row["nom_menu"] ?>" class="imagen_card">
  </article>
  <?php } ?>
</section>
<div class="row">
  <div class="col-xs-12 flex-center">
    <ul id="NavPosicion" class="pagination"></ul>
  </div>
</div>

<button class="mui-btn mui-btn--fab mui-btn--accent addbutton">
  <i class="material-icons">add</i>
</button>

<script src="js/detalle.js"></script>
<script src="js/app.js"></script>
<script type="text/javascript" src="js/buscador.js"></script>

<script type="text/javascript" src="js/paging.js"></script>
<script>
  var pager = new Pager('table-data', 2);
  pager.init();
  pager.showPageNav('pager', 'NavPosicion');
  pager.showPage(1);

  (function() {
    theTable = $("#table-data");
    $("#searchTerm").keyup(function() {
      $.articleBuscador(theTable, this.value, 2)
    })
  })()
	
</script>