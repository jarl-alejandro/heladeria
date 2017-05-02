<div class="navbar navbar-inverse set-radius-zero">
  <div class="container">


    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo_head.png" />
      </a>
    </div>

    <div class="left-div">
      <div class="user-settings-wrapper">
        <ul class="nav">

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
              <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
            </a>
            <div class="dropdown-menu dropdown-settings">
              <div class="media">
                <a class="media-left" href="#">
                  <img src="assets/img/64-64.jpg" alt="" class="img-rounded" />
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Admin </h4>
                  <h5>Administrador</h5>
                </div>
              </div>
              <hr />
              <h5><strong>Rol : </strong></h5>
              Administrador General
              <hr />
              <a href="#" class="btn btn-info btn-sm">Editar Datos</a>&nbsp; <a href="login.html" class="btn btn-danger btn-sm">Cerrar Caja</a>

            </div>
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

            <li><a href="index_sistema.php" class="menu-top-active" href="index.html">Inicio</a></li>
            
            <li class="dropdown">
              <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                Registro<span class="caret"></span>
              </a>

             <ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a tabindex="0" href="admin/registro/usuarios">Usuarios</a>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="0" href="admin/registro/empleados">Empleados</a>
								</li>

								<li class="divider"></li>

								<li class="dropdown-submenu">
									<a tabindex="0" href="admin/registro/categorias">Categorias</a>
									</li>

								<li class="dropdown-submenu">
									<a tabindex="0" href="admin/registro/unidad-medida">Unidades de Medida</a></li>
								<li class="dropdown-submenu">
									<a tabindex="0" href="admin/registro/roles">Roles</a></li>
								<li class="divider"></li>

								<li class="dropdown-submenu"> <a href="admin/registro/clientes" tabindex="0">Clientes</a></li>
								<li class="dropdown-submenu"> <a tabindex="0" href="admin/registro/proveedores">Proveedores</a></li>
								<li class="divider"></li>

								<li class="dropdown-submenu"> <a tabindex="0" href="admin/registro/productos">Productos</a></li>
							</ul>
            </li>
            
            <li class="dropdown">
              <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                Movimientos<span class="caret"></span>
              </a>

              <ul class="dropdown-menu">
                <li class="dropdown-submenu"> <a tabindex="0" href="admin/movimiento/pedidos">Pedidos</a></li>
                <li class="dropdown-submenu"> <a tabindex="0">Facturacion</a></li>
                <li class="dropdown-submenu">
                  <a tabindex="0" href="admin/movimiento/carta-menu">Carta Menu</a>
                </li>

                <li class="divider"></li>

                <li class="dropdown-submenu"> <a tabindex="0">Inventario</a></li>
                <li class="dropdown-submenu"> <a tabindex="0">Promociones</a></li>

              </ul>
            </li>

            <li class="dropdown">
              <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
               Contablidad<span class="caret"></span>
             </a>

             <ul class="dropdown-menu">
              <li class="dropdown-submenu"> <a tabindex="0">Egresos</a></li>
              <li class="dropdown-submenu"> <a tabindex="0">Cierre Diario</a></li>
              <li class="dropdown-submenu"> <a tabindex="0">Balance</a></li>

              <li class="divider"></li>

              <li class="dropdown-submenu"> <a tabindex="0">Kardex</a></li>

            </ul>

          </li>

          <li class="dropdown">
            <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
             Reportes<span class="caret"></span>
           </a>

           <ul class="dropdown-menu">
            <li class="dropdown-submenu"> <a tabindex="0">Listas de Clientes</a></li>
            <li class="dropdown-submenu"> <a tabindex="0">Lista de Empleados</a></li>
            <li class="dropdown-submenu"> <a tabindex="0">Menu Diario</a></li>
            <li class="dropdown-submenu"> <a tabindex="0">Faltantes</a></li>
            <li class="divider"></li>
            <li class="dropdown-submenu"> <a tabindex="0">Pedidos</a></li>
            <li class="dropdown-submenu"> <a tabindex="0">Egresos</a></li>
            <li class="dropdown-submenu"> <a tabindex="0">Ingresos & Egresos</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
           Estadistica<span class="caret"></span>
         </a>

         <ul class="dropdown-menu">
          <li class="dropdown-submenu"> <a tabindex="0">Mejores Clientes</a></li>
          <li class="dropdown-submenu"> <a tabindex="0">Empleado del mes</a></li>
          <li class="dropdown-submenu"> <a tabindex="0">Rotacion de Inventario</a></li>
          <li class="dropdown-submenu"> <a tabindex="0">Faltantes</a></li>
          <li class="divider"></li>
          <li class="dropdown-submenu"> <a tabindex="0">Pedidos</a></li>
          <li class="dropdown-submenu"> <a tabindex="0">Egresos</a></li>
          <li  class="dropdown-submenu"> <a tabindex="0">Ingresos & Egresos</a></li>
        </ul>
      </li>

      			<span id="close" class="btn-circle btn-danger">
              <a href="service/logout.php"><i class="material-icons">exit_to_app</i></a>
            </span>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
