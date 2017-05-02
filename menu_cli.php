<div class="navbar navbar-inverse set-radius-zero">
  <div class="container">


    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo.png" />
      </a>
    </div>

    <div class="right-div">
      <div class="user-settings-wrapper">
        <ul class="nav">

          <li class="dropdown">
              
    </li>

        </ul>
      </div>
    </div>
  </div>
</div>

<!-- LOGO HEADER END-->


<section class="menu-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			
        <div class="navbar-collapse collapse ">
          <ul id="menu-top" class="nav navbar-nav navbar-right">

            <li><a href="../index.php" class="menu-top-active" href="index.html">Inicio</a></li>
            
            <li><a href="../index.php" class="menu-top" href="index.html">Empresa</a></li>
            
<li><a href="../index.php" class="menu-top" href="index.html">Portafolio</a></li>
            

           <li><a href="../index.php" class="menu-top" href="index.html">Contactos</a></li>
         <?php if(isset($_SESSION["b81ac816c94556b2f033f9c1a6fce82e76cb90cb"])){?>
            <li id="pcliente" style="cursor:pointer">
              <a class="menu-top" href="service/logout.php">
                <i class="material-icons" title="cerrar">exit_to_app</i>
              </a>
            </li>
         <?php } else { ?>
           <li id="pcliente"><a id="login-cliente-btn" class="menu-top" style="cursor:pointer">
             <i class="material-icons" title="Nuevo Cliente">account_box</i></a>
            </li>
         <?php }  ?>
          </ul>

				</div>

			</div>
		</div>
	</div>
</section>
