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
			$("#id").val(snap.cod_uni)
			$("#nombre").val(snap.nom_uni)
			$("#detalle").val(snap.equi_uni)

			$("#nombre").addClass("mui--is-not-empty mui--is-touched")
			$("#detalle").addClass("mui--is-not-empty mui--is-touched")
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