<?php 
session_start();
if(isset($_SESSION["b81ac816c94556b2f033f9c1a6fce82e76cb90cb"])){
  header("Location: index_sistema.php");
}

include "conexion.php";
$query_empleo = $pdo->query("SELECT * FROM hel_emple");
$query_params = $pdo->query("SELECT * FROM hel_param");

if($query_params->rowCount() == 0){
  $pdo->query("INSERT INTO hel_param (hel_id, cont_cant) VALUES ('1', '0') ");
}

if($query_empleo->rowCount() == 0){
  $cedula = "1234567890";
  $nombre = "admin";
  $apellido = "admin";
  $telefono = "admin";
  $celular = "admin";
  $direccion = "admin";
  $email = "admin@admin.com";
  $sexo = "Hombre";
  $password = sha1($cedula);

  $new = $pdo->prepare("INSERT INTO hel_emple (ced_empl, nom_empl, ape_empl, tel_empl, cel_emp, 
        dir_empl, ema_empl, sex_empl, pass_empl) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $new->bindParam(1, $cedula);
  $new->bindParam(2, $nombre);
  $new->bindParam(3, $apellido);
  $new->bindParam(4, $telefono);
  $new->bindParam(5, $celular);
  $new->bindParam(6, $direccion);
  $new->bindParam(7, $email);
  $new->bindParam(8, $sexo);
  $new->bindParam(9, $password);

  $new->execute();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="assets/css/estilos.login.css">
	<title>Cafeteria - DolceCoffe</title>
  <style>
    #toast{
      position: fixed;
      z-index: 11;
      top: 6em;
      right: 2em;
      background: #424242;
      color: white;
      padding: .5em 2em;
      border-radius: 3px;
      box-shadow: 0px 1px 1.5px rgba(0,0,0,0.5);
      display: none;
    }
  </style>
</head>
<body>
  <div id="toast"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="conta">
        <h1>Cafeteria - DolceCoffe <i class="fa fa-cutlery"></i></h1>
        <form>
          <hr>
          <div class="form-group">
            <i class="fa fa-user"></i> <label for="email"><b> E-mail del Usuario</b></label>	    
            <input type="text" id="email" class="form-control" placeholder="E-mail Usuario ">
          </div>
          <div class="form-group">
            <i class="fa fa-unlock-alt"></i> <label for="password"><b> Contraseña del  Usuario</b></label> 
            <input type="password" id="password" class="form-control" placeholder="Contraseña Usuario">
          </div>
          <br>
          <input type="submit" id="login" value="INGRESAR AL SISTEMA" class="form-control btn btn-danger">
        </form>
      </div>
    </div>
  </div>
  <script src="assets/js/jquery-3.2.0.min.js"></script>
  <script src="assets/js/validaciones.js"></script>
  <script>
    $("#login").on("click", handleLogin)
    var $email = $("#email")
    var $password = $("#password")

    function handleLogin (e) {
      e.preventDefault()
      if (validarLogin()) {
        $.ajax({
          type: "POST",
          url: "service/login.php",
          data: { email: $email.val(), password: $password.val() }
        })
        .done(function (snap) {
          if (snap == 2) {
            toast("Ha iniciado sesión")
            location.reload()
          }
          else toast("Usuario no existe")
        })
      }
    }

    function validarLogin () {
      if ($email.val() == "") {
        toast("Ingrese su email")
        $email.focus()
        return false
      }
      if ($password.val() == "") {
        toast("Ingrese su contraseña")
        $password.focus()
        return false
      }
      else return true
    }
  </script>
</body>
</html>