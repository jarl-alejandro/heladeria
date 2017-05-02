<?php session_start();
if(isset($_SESSION["b81ac816c94556b2f033f9c1a6fce82e76cb90cb"])){
  $id = $_SESSION["b81ac816c94556b2f033f9c1a6fce82e76cb90cb"];
  $nombre = $_SESSION["b5945009161e239ef9164232db640cdfb1829e49"];


  if ($_SESSION["db78ff0a8439032f661fe9f0a13e09c2c5a7c435"] == "empleado") {
      header("Location: index_sistema.php");
  }
}
else{
  $id = "";
}

include "conexion.php";
$select = $pdo->query("SELECT * FROM hel_param");
$row = $select->fetch();
$mesas= $row["hel_conmesa"];
$categorias = $pdo->query("SELECT * FROM hel_cate");

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <title>Cafeteria - DolceCoffe</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME ICONS  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet" />
        <link href="assets/css/mui.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">


        <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php 
        include "head.php";
        ?>
</head>
<body mostrarmensaje()>
        <div id="toast"></div>
        <input type="hidden" id="is-cliente" value="<?= $id ?>">
        <div class="ocultar"></div>
        <article class="mui-panel card-login col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3">
          <div class="alert alert-warning">
            <h4 class="text-center no-margin">Inicar Sesión</h4>
          </div>
          <div>
            <div class="mui-textfield mui-textfield--float-label">
              <input type="text" id="email">
              <label><i class="fa fa-user"></i> Ingrese su e-mail</label>
            </div>
            <div class="mui-textfield mui-textfield--float-label">
              <input type="password" id="password">
              <label><i class="fa fa-unlock-alt"></i> Ingrese su contraseña</label>
            </div>
            <div class="col-xs-12 text-center">
              <button class="mui-btn mui-btn--danger" id='cerrar-login'>Cerrar</button>
              <button class="mui-btn mui-btn--primary" id='aceptar-login'>Inicar Sesión</button>
            </div>
          </div>
        </article>
        <?php
        function mostrarmensaje(){
          include "conexion.php";
          $select1 = $pdo->query("SELECT * FROM hel_mensa");
          $row1 = $select1->fetch();
          $cuenta=$select1->rowCount();
          $numero= rand(1, $cuenta);


          $select1 = $pdo->query("SELECT * FROM hel_mensa where hel_id_m=" .$numero);
          $row1 = $select1->fetch();
          
          echo    $row1["hel_de_m"];
          return;
        }
        ?>

        <header>
         <div class="container">   
           
           <div class="row">
            
            <div class="col-md-12">
              
              <div class="col-md-10 col-xs-11 ">
                <strong>Email: </strong>dolcecofe@hotmail.com
                
                <strong>Contactos:</strong><strong>+593-9987654345</strong>
              </div>
              <div class="col-md-2 col-xs-1 pull-lefth ">
                
              <?php if(!isset($_SESSION["b81ac816c94556b2f033f9c1a6fce82e76cb90cb"])){ ?>
                <a href="login.php" id="close" class="btn waves-effect waves-light btn-danger pull-right">
                  <i class="tiny material-icons">vpn_key</i>
                </a>
              <?php } ?>
               
             </div>

           </div>
           
         </div><!--fin container-->

       </header>
       
       <?php include 'menu_cli.php' ?>


       <!-- MENU SECTION END-->
       
       <section>
         <div class="container">
          
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-success ">
               <marquee class="mensaje"> <?php strtoupper(mostrarmensaje())?></marquee>
             </div>
           </div>

         </div>

      <button class="mui-btn mui-btn--fab mui-btn--accent flex-center" id="carrito-boton">
        <i class="material-icons">add_shopping_cart</i>
      </button>

         <div class="row bg-info">

          <div class="col-md-7 col-sm-7 col-xs-12 fondo-card mui-panel ">
           <div class="alert alert-warning">
            <strong>Estimado Cliente!</strong> Seleccione su mesa.
          </div>


          <?php 
          $c = 0;
          while ($mesas > $c) {
            $c = $c+1;
            $mesa_tmp = $pdo->query("SELECT * FROM tmp_mesa WHERE mesa='$c'");
            if($mesa_tmp->rowCount() == 0){
            ?>
            <div class="col-sm-3 col-xs-12 col-md-3 fondo-card mui-panel">
              <div class="dashboard-div-wrapper1 bk-clr-one mesa-cliente" data-id="<?=$c?>">
                <i class="material-icons">playlist_add_check</i>
                <h5>Mesa N°:<?php echo $c ?> </h5>
              </div>
            </div>

          <?php
            } else { ?>
            <div class="col-sm-3 col-xs-12 col-md-3 fondo-card mui-panel">
              <div class="dashboard-div-wrapper1 bk-clr-one mesa-cliente__active message-mesa"
                  data-id="<?=$c?>">
                <i class="material-icons">playlist_add_check</i>
                <h5>Mesa N°:<?php echo $c ?> </h5>
              </div>
            </div>
            <?php }
          }
          ?>

        </div>

<div class="col-md-5 col-sm-5 col-xs-12">
  <ul class="mui-tabs__bar mui-tabs__bar--justified tabs-pointer">
    <li class="mui--is-active"><a data-mui-toggle="tab" data-mui-controls="pane-justified-1">Carta Menu</a></li>
    <li><a data-mui-toggle="tab" data-mui-controls="pane-justified-2">Inventario</a></li>
  </ul>
  <div class="mui-tabs__pane mui--is-active" id="pane-justified-1">
    <div class="col-xs-12 fondo-card mui-panel">
      <div class="alert alert-warning">
        <strong>Menu Diario!</strong> Seleccione su Plato preferido.
      </div>
     
      <section class="flex-around">
        <?php
        $select = $pdo->query("SELECT * FROM hel_menu");
        while($row = $select->fetch()){ ?>
          <article class="col-sm-5 col-xs-12 col-md-5 fondo-card mui-panel carta-menu" 
                  data-id='<?= $row["cod_menu"] ?>' data-name='<?= $row["nom_menu"] ?>'
                  data-precio='<?= $row["tot_menu"] ?>' data-tipo='menu'>
          <h3 class="nombre-card1 no-margin text-center"><?= $row["nom_menu"] ?>  </h3>
          <img src="media/menu/<?= $row["ima_menu"] ?>" alt="<?= $row["nom_menu"] ?>" class="imagen_card">
        </article>
        <?php } ?>
      </section>
    </div>
  </div>
  <div class="mui-tabs__pane" id="pane-justified-2">
    <div class="col-xs-12 fondo-card mui-panel">
      <div class="alert alert-warning">
        <strong>Productos!</strong> Seleccione su producto preferido.
      </div>
      <div class="mui-select col-xs-12">
        <select id="categoria">
          <option value="">todos</option>
          <?php while ($row = $categorias->fetch()){ ?>
          <option value="<?= $row['cod_cate'] ?>"><?= $row['nom_cate'] ?></option>
          <?php } ?>
        </select>
        <label>Ingrese la categoria para filtrar</label>
      </div>
      <section class="col-xs-12 flex-around">
        <?php
        $select = $pdo->query("SELECT * FROM hel_prod WHERE tip_prod='venta'");
        while($row = $select->fetch()){ ?>
          <article class="col-sm-5 col-xs-12 col-md-5 fondo-card mui-panel carta-menu inventario-card" 
                  data-id='<?= $row["cod_prod"] ?>' data-name='<?= $row["nom_prod"] ?>'
                  data-precio='<?= $row["val_prod"] ?>' data-tipo='producto' 
                  data-filter='<?= $row["cat_prod"] ?>'>
          <h3 class="nombre-card1 no-margin text-center"><?= $row["nom_prod"] ?>  </h3>
        </article>
        <?php } ?>
      </section>
    </div>
  </div>

</div>



    </div>

  </section>
    <?php include "./carrito/carrito.php" ?>
  <footer>
    <p>(c) Diseñado por ByronLopez by@Uniandes
    </footer>

    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.2.0.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/mui.js"></script>
    <script src="assets/js/validaciones.js"></script>

    <script src="carrito/carrito.js"></script>
    <script src="carrito/index.js"></script>
  </body>
  </html>
