;(function () {
	'use strict'

	var $cedula = $("#cedula")
	var $nombre = $("#nombre")
	var $apellido = $("#apellido")
	var $telefono = $("#telefono")
	var $celular = $("#celular")
	var $direccion = $("#direccion")
	var $email = $("#email")
	var $sexo = $("#sexo")

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
				if (snap == 2) {
					$("#table-container").load("template/table.php")
					toast("Se ha realizado con exito")
					handelCancelar()
				}
				if(snap == 1) {
					toast("Cliente ya esta registrado")
					$cedula.focus()
				}
				if(snap == 3) {
					toast("E-mail ya esta registrado")
					$email.focus()
				}
			})
		}
	}

	function handelCancelar () {
		$("#id").val("")
		$cedula.val("")
		$nombre.val("")
		$apellido.val("")
		$telefono.val("")
		$celular.val("")
		$direccion.val("")
		$email.val("")
		$sexo.val("")

		$cedula.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$nombre.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$apellido.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$telefono.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$celular.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$direccion.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$email.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$sexo.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
	}

	function getData () {
		return {
			id: $("#id").val(),
			cedula: $cedula.val(),
			nombre: $nombre.val(),
			apellido: $apellido.val(),
			telefono: $telefono.val(),
			celular: $celular.val(),
			direccion: $direccion.val(),
			email: $email.val(),
			sexo: $sexo.val(),
		}
	}

	function validarForm () {
		if($cedula.val() == "") {
			toast("Ingrese el numero de cedula")
			$cedula.focus()
			return false
		}
		if(!valida_ce($cedula.val()) ){
			$cedula.focus()      
			return false
		}
			if($nombre.val() === "") {
			toast("Ingresa el nombre")
			$nombre.focus()
			return false
		}
		if($apellido.val() === "") {
			toast("Ingresa el apellido")
			$apellido.focus()
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
		if($sexo.val() === "") {
			toast("Ingresa el sexo")
			$sexo.focus()
			return false
		}
		else return true
	}

})()