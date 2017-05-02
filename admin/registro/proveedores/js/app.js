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
			$("#id").val(snap.cod_prove)
			$("#nombre").val(snap.nom_prove)
			$("#telefono").val(snap.tel_prove)
			$("#celular").val(snap.cel_prove)
			$("#direccion").val(snap.dir_prove)
			$("#email").val(snap.ema_prove)

			$("#nombre-contacto").val(snap.nom_contac)
			$("#telefono-contacto").val(snap.tel_contac)
			$("#celular-contacto").val(snap.cel_contac)
			$("#email-contacto").val(snap.ema_contac)

			$("#nombre").addClass("mui--is-not-empty mui--is-touched")
			$("#telefono").addClass("mui--is-not-empty mui--is-touched")
			$("#celular").addClass("mui--is-not-empty mui--is-touched")
			$("#direccion").addClass("mui--is-not-empty mui--is-touched")
			$("#email").addClass("mui--is-not-empty mui--is-touched")

			$("#nombre-contacto").addClass("mui--is-not-empty mui--is-touched")
			$("#telefono-contacto").addClass("mui--is-not-empty mui--is-touched")
			$("#celular-contacto").addClass("mui--is-not-empty mui--is-touched")
			$("#email-contacto").addClass("mui--is-not-empty mui--is-touched")
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