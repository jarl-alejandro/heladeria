<?php
include "../../../conexion.php";
$title = "Carta menu";
$form = "Carta menu";

include "../../head.php";
include "../../menu.php";
?>
<section class="layout">
	<article class="row">
		<div class="col-sm-6 col-xs-12 col-md-6 fondo-card mui-panel" id="table-container"></div>
		<div class="col-xs-12 col-md-6 fondo-card mui-panel"><?php include "template/form.php" ?></div>
	</article>
</section>
<?php 
  include "../../scripts.php";
  include "template/productos.php"; 
?>
<script src="js/detalle.js"></script>
<script src="js/index.js"></script>
</body>
</html>