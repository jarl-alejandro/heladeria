<?php
include "../../../../conexion.php";
$select = $pdo->query("SELECT * FROM hel_param");
$row = $select->fetch();
$mesas= $row["hel_conmesa"];
$c = 0;
?>

<div class="row bg-info">
  <div class="col-xs-12 mui-panel">
    <div class="alert alert-warning">
    <strong>Seleccione la mesa.</strong>
  </div>
  <?php 
  while ($mesas > $c) {
    $c = $c+1;
    ?>
  <div class="col-sm-3 col-xs-12 col-md-3 mui-panel">
    <div class="dashboard-div-wrapper1 bk-clr-one mesa-cliente" data-id="<?=$c?>">
      <i class="material-icons">playlist_add_check</i>
      <h5>Mesa N°:<?php echo $c ?> </h5>
    </div>
  </div>
  <?php } ?>
</div>

<script src="js/app.js"></script>