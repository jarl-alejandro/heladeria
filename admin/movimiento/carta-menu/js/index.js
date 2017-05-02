;(function () {
	'use strict'

	var $nombre = $("#nombre")
	var $detalle = $("#detalle")

	$("#table-container").load("template/table.php")
	var detail = new Detail()

	$("#show-car").on("click", handleCar)
	$("#cancelar-productos").on("click", handelCloseProd)
	$("#guardar-productos").on("click", handelGuardarProd)
	$("#guardar").on("click", handelSave)
	$("#cancelar").on("click", handelCancelar)
	$("#imagen").on("change", imageChange)

	function handleCar () {
		$(".panel-productos").slideDown()
	}

	function handelCloseProd () {
		$(".panel-productos").slideUp()		
	}

	function handelGuardarProd () {
		var product_cant = document.querySelectorAll(".product_cant")
		var array = Array.prototype.slice.call(product_cant)

		for(var i in array) {
			var producto = product_cant[i]
			console.log()
			if(producto.value != "") {
				var total = parseInt(producto.value) * parseFloat(producto.dataset.valor)
				var object = {
					code: producto.dataset.id,
					name: producto.dataset.name,
					valor: producto.dataset.valor,
					cant: parseInt(producto.value),
					total: total.toFixed(2),
				}
				detail.add(object)
				producto.value = ""
				producto.classList.remove("mui--is-dirty")
				producto.classList.remove("mui--is-touched")
				producto.classList.remove("mui--is-not-empty")
			}
		}

		// handelCloseProd()
	}

	function handelSave () {
		if(validarForm()){
			$.ajax({
				type: "POST",
				url: "service/guardar.php",
				data: getData(),
				cache: false,
				contentType: false,
				processData: false
			})
			.done(function (snap) {
				console.log(snap)
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
    $("#table-container").slideDown()
    db.productos = []
    $("#detalle-menu").html("<tr><td></td><td></td><td></td><td></td><td></td></tr>")
    $("#total").html("0.00")
		$("#id").val("")
    $("imagen_name").val("")
		$nombre.val("")
		$detalle.val("")

    if( isMobile.any() ) {
       $('#table-container').slideDown()
      $('.fondo-card:nth-child(2)').slideUp()
    }


		$nombre.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$detalle.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
	}

	function imageChange (e) {
		var upload = document.querySelector('#imagen')
		// var imagenEquipo = document.querySelector(".imagen__equipo")

		var file = e.target.files[0]
		console.log(1024 * 1024 * 2)
		console.log(file.size)
		if (file.size > (1024 * 1024 * 2)) {
			toast("No puede subir imagenes mas de 2mb")
			return false
		}

		var reader = new FileReader()
		reader.onload = (function (theFile) {
			return function (e) {
				// imagenEquipo.src = e.target.result
				$("#imagen_name").val(e.target.result)
			}
		})(file)
		reader.readAsDataURL(file)
	}

	function getData () {
		var formData = new FormData()
		var file_image = document.getElementById("imagen")

		formData.append("id", $("#id").val())
		formData.append("nombre", $nombre.val())
		formData.append("detalle", $detalle.val())
		formData.append("total", $("#total").html())

		formData.append("is_imagen", file_image.files.length)
		formData.append("imagen", file_image.files[0])
		formData.append("detalles", JSON.stringify(db.productos))

		return formData
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
		if(db.productos.length === 0) {
			toast("Ingresa los productos del menu")
			$(".panel-productos").slideDown()
			return false
		}
		if($("#imagen_name").val() === "") {
			toast("Porfavor ingrese una foto del menu")
			return false
		}
		else return true
	}

})()