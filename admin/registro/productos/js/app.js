;(function () {
	'use strict'

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
			$("#id").val(snap.cod_prod)
			$("#nombre").val(snap.nom_prod)
			$("#cantidad").val(snap.cant_prod)
			$("#maxima").val(snap.max_prod)
			$("#minima").val(snap.min_prod)
			$("#valor").val(snap.val_prod)
			$("#unidad").val(snap.uni_prod)
			$("#tipo").val(snap.tip_prod)
			$("#categoria").val(snap.cat_prod)

			$("#nombre").addClass("mui--is-not-empty mui--is-touched")
			$("#cantidad").addClass("mui--is-not-empty mui--is-touched")
			$("#maxima").addClass("mui--is-not-empty mui--is-touched")
			$("#minima").addClass("mui--is-not-empty mui--is-touched")
			$("#valor").addClass("mui--is-not-empty mui--is-touched")
			$("#unidad").addClass("mui--is-not-empty mui--is-touched")
			$("#categoria").addClass("mui--is-not-empty mui--is-touched")
			$("#tipo").addClass("mui--is-not-empty mui--is-touched")
		})
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