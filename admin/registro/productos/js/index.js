;(function () {
	'use strict'

	var $nombre = $("#nombre")
	var $cantidad = $("#cantidad")
	var $maxima = $("#maxima")
	var $minima = $("#minima")
	var $valor = $("#valor")
	var $unidad = $("#unidad")
	var $tipo = $("#tipo")
	var $categoria = $("#categoria")

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
					toast("El producto ya esta registrado")
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
		$cantidad.val("")
		$maxima.val("")
		$minima.val("")
		$valor.val("")
		$unidad.val("")
    $tipo.val("")
    $categoria.val("")

    if( isMobile.any() ) {
       $('#table-container').slideDown()
      $('.fondo-card:nth-child(2)').slideUp()
    }

		$nombre.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$cantidad.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$maxima.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$minima.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$valor.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$unidad.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$tipo.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$categoria.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
	}

	function getData () {
		return {
			id: $("#id").val(),
			nombre: $nombre.val(),
			cantidad: $cantidad.val(),
			maxima: $maxima.val(),
			minima: $minima.val(),
			valor: $valor.val(),
			unidad: $unidad.val(),
			tipo: $tipo.val(),
			categoria: $categoria.val(),
		}
	}

	function validarForm () {
		if($nombre.val() === "") {
			toast("Ingresa el nombre")
			$nombre.focus()
			return false
		}
		if($cantidad.val() === "") {
			toast("Ingresa el cantidad")
			$cantidad.focus()
			return false
		}
		if($maxima.val() === "") {
			toast("Ingresa la cantidad maxima")
			$maxima.focus()
			return false
		}
		if(parseInt($maxima.val()) < parseInt($cantidad.val())){
			toast("La cantidad no puede ser mayor que la cantidad maxima")
			$maxima.focus()
			return false
		}
		if($minima.val() === "") {
			toast("Ingresa la cantida minima")
			$minima.focus()
			return false
		}
		if(parseInt($cantidad.val()) < parseInt($minima.val())){
			toast("La cantidad minima no puede ser mayor que la cantidad")
			$minima.focus()
			return false
		}
		if($valor.val() === "") {
			toast("Ingresa el valor")
			$valor.focus()
			return false
		}
		if($unidad.val() === "") {
			toast("Ingresa la unidad")
			$unidad.focus()
			return false
		}
    if($tipo.val() === "") {
			toast("Ingresa el tipo de producto")
			$tipo.focus()
			return false
		}
    if($categoria.val() === "") {
			toast("Ingresa a categoria del producto")
			$categoria.focus()
			return false
		}
		else return true
	}

})()