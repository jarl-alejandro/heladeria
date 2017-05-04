<?php
include "../../../conexion.php";
$title = "Pedidos";
$form = "Pedidos";

include "../../head.php";
include "../../menu.php";
?>
<style>
  .mesa-activa-pedido{
    background: #FBC02D !important;
  }
</style>
<section class="layout">
  <div class="alert alert-danger notify none col-xs-10 col-md-3" style="position:fixed;top:3em;z-index:111111">
    <a href="#" class="closeAlert" data-dismiss="alert">&times;</a>
    <strong id="notify-pedido">Error!</strong>
  </div>
	<article class="row">
		<div class="col-sm-6 col-xs-12 col-md-6 fondo-card mui-panel" id="table-container"></div>
		<div class="col-xs-12 col-md-6 fondo-card mui-panel"><?php include "template/form.php" ?></div>
	</article>
</section>
<?php
  include "../../scripts.php";
?>
<script src="js/detalle.js"></script>
<script src="js/index.js"></script>
</body>
</html>
