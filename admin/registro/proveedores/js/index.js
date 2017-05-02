;(function () {
	'use strict'

	var $nombre = $("#nombre")
	var $telefono = $("#telefono")
	var $celular = $("#celular")
	var $direccion = $("#direccion")
	var $email = $("#email")

	var $nombreContacto = $("#nombre-contacto")
	var $telefonoContacto = $("#telefono-contacto")
	var $celularContacto = $("#celular-contacto")
	var $emailContacto = $("#email-contacto")

	$("#table-container").load("template/table.php")

	$("#guardar").on("click", handelSave)
	$("#cancelar").on("click", handelCancelar)

	function handelSave () {
		if(validarForm()){
			$.ajax({
				type: "POST",
				url: "service/guardar.php",
				data: getData()
			})
			.done(function (snap) {
				console.log(snap)
				if (snap == 2) {
					$("#table-container").load("template/table.php")
					toast("Se ha realizado con exito")
					handelCancelar()
				}
				if(snap == 1) {
					toast("Proveedor ya esta registrado")
					$nombre.focus()
				}
				if(snap == 3) {
					toast("E-mail ya esta registrado")
					$email.focus()
				}
			})
		}
	}

	function handelCancelar () {
		$("#table-container").slideDown()
		$("#id").val("")
		$nombre.val("")
		$telefono.val("")
		$celular.val("")
		$direccion.val("")
		$email.val("")

		$nombreContacto.val("")
		$telefonoContacto.val("")
		$celularContacto.val("")
		$emailContacto.val("")

    if( isMobile.any() ) {
       $('#table-container').slideDown()
      $('.fondo-card:nth-child(2)').slideUp()
    }


		$nombre.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$telefono.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$celular.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$direccion.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$email.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")

		$nombreContacto.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$telefonoContacto.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$celularContacto.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$emailContacto.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
	}

	function getData () {
		return {
			id: $("#id").val(),
			nombre: $nombre.val(),
			telefono: $telefono.val(),
			celular: $celular.val(),
			direccion: $direccion.val(),
			email: $email.val(),
			nombreContacto: $nombreContacto.val(),
			telefonoContacto: $telefonoContacto.val(),
			celularContacto: $celularContacto.val(),
			emailContacto: $emailContacto.val(),
		}
	}

	function validarForm () {
		if($nombre.val() === "") {
			toast("Ingresa el nombre")
			$nombre.focus()
			return false
		}
		if($telefono.val() === "") {
			toast("Ingresa el numero de telefono")
			$telefono.focus()
			return false
		}
		if($telefono.val().length < 9) {
			toast("Porfavor ingrese un numero de telefono correcto")
			$telefono.focus()
			return false
		}
		if($celular.val() === "") {
			toast("Ingresa el numero celular")
			$celular.focus()
			return false
		}
		if($celular.val().length < 10) {
			toast("Porfavor ingrese un numero celular correcto")
			$celular.focus()
			return false
		}
		if($direccion.val() === "") {
			toast("Ingresa la direccion")
			$direccion.focus()
			return false
		}
		if($email.val() === "") {
			toast("Ingresa el e-mail")
			$email.focus()
			return false
		}
		if(emailValid($email.val()) === false){
			$email.focus()
			toast("Porfavor ingrese un e-mail valido")
			return false
		}
		if($nombreContacto.val() === "") {
			toast("Ingresa el nombre del contacto")
			$nombreContacto.focus()
			return false
		}
		if($telefonoContacto.val() === "") {
			toast("Ingresa el numero de telefono del contacto")
			$telefonoContacto.focus()
			return false
		}
		if($telefonoContacto.val().length < 9) {
			toast("Porfavor ingrese un numero de telefono correcto del contacto")
			$telefonoContacto.focus()
			return false
		}
		if($celularContacto.val() === "") {
			toast("Ingresa el numero celular del contacto")
			$celularContacto.focus()
			return false
		}
		if($celularContacto.val().length < 10) {
			toast("Porfavor ingrese un numero celular correcto del contacto")
			$celularContacto.focus()
			return false
		}
		if($emailContacto.val() === "") {
			toast("Ingresa el e-mail del contacto")
			$emailContacto.focus()
			return false
		}
		if(emailValid($emailContacto.val()) === false){
			$emailContacto.focus()
			toast("Porfavor ingrese un e-mail valido del contacto")
			return false
		}
		else return true
	}

})()