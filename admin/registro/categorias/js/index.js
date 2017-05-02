;(function () {
	'use strict'

	var $nombre = $("#nombre")
	var $detalle = $("#detalle")

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
					toast("categoria ya esta registrado")
					$nombre.focus()
				}
			})
		}
	}

	function handelCancelar () {
		$("#id").val("")
		$nombre.val("")
		$detalle.val("")

    if( isMobile.any() ) {
       $('#table-container').slideDown()
      $('.fondo-card:nth-child(2)').slideUp()
    }

		$nombre.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$detalle.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
	}

	function getData () {
		return {
			id: $("#id").val(),
			nombre: $nombre.val(),
			detalle: $detalle.val(),
		}
	}

	function validarForm () {
		if($nombre.val() === "") {
			toast("Ingresa el nombre")
			$nombre.focus()
			return false
		}
		if($detalle.val() === "") {
			toast("Ingresa el detalle")
			$detalle.focus()
			return false
		}
		else return true
	}

})()