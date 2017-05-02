;(function () {
	'use strict'

	var $rol = $("#rol")
	var $empleado = $("#empleado")

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
					toast("rol ya esta registrado")
					$rol.focus()
				}
			})
		}
	}

	function handelCancelar () {
		$("#table-container").slideDown()
		$("#id").val("")
		$rol.val("")
		$empleado.val("")

    if( isMobile.any() ) {
       $('#table-container').slideDown()
      $('.fondo-card:nth-child(2)').slideUp()
    }


		$rol.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$empleado.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
	}

	function getData () {
		return {
			id: $("#id").val(),
			rol: $rol.val(),
			empleado: $empleado.val(),
		}
	}

	function validarForm () {
		if($rol.val() === "") {
			toast("Ingresa el rol")
			$rol.focus()
			return false
		}
		if($empleado.val() === "") {
			toast("Ingresa el empleado")
			$empleado.focus()
			return false
		}
		else return true
	}

})()