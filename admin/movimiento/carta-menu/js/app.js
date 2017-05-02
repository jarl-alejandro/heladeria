;(function () {
	'use strict'

	var detail = new Detail()

	$(".editar").on("click", handleEdit)
	$(".eliminar").on("click", handleDelete)
	$(".reporte").on("click", handleReport)
	$("#print").on("click", handlePrint)

	function handleEdit (e) {
		var id = e.currentTarget.dataset.id
		
		$.ajax({
			type: "POST",
			url: "service/get.php",
			data: { id },
			dataType: "JSON"
		})
		.done(function (snap) {
      if( isMobile.any() ) $("#table-container").slideUp()
			console.log(snap)
			$("#id").val(snap.menu.cod_menu)
			$("#nombre").val(snap.menu.nom_menu)
			$("#detalle").val(snap.menu.det_menu)
			$("#total").html(snap.menu.tot_menu)
			$("#imagen_name").val(snap.menu.ima_menu)

			templateDetail(snap.productos)

			$("#nombre").addClass("mui--is-not-empty mui--is-touched")
			$("#detalle").addClass("mui--is-not-empty mui--is-touched")
		})
	}

	function templateDetail (productos) {
		for(var i in productos){
			var item = productos[i]
			var total = parseInt(item.cant_menu) * parseFloat(item.val_prod)
			var object = {
				code: item.cod_prod,
				name: item.nom_prod,
				valor: item.val_prod,
				cant: parseInt(item.cant_menu),
				total: total.toFixed(2),
			}
			detail.insertData(object)
		}
		detail.build()
	}

	function handleDelete (e) {
		var id = e.currentTarget.dataset.id
		$.ajax({
			type: "POST",
			url: "service/eliminar.php",
			data: { id }
		})
		.done(function (snap) {
			if(snap == 2){
				toast("Se ha eliminado con exito")
				$("#table-container").load("template/table.php")
			}
		})
	}

	function handleReport (e) {
		var id = e.currentTarget.dataset.id
		window.open (`./reporte/individual.php?id=${id}`, "_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=50, left=60, width=1200, height=600")
	}

	function handlePrint () {
		window.open (`./reporte/lista.php`, "_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=50, left=60, width=1200, height=600")		
	}

  	$(".addbutton").on("click", function () {
  		$('.fondo-card:nth-child(2)').slideDown()
      $("#table-container").slideUp()
	})

})()