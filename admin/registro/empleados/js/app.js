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
			$("#id").val(snap.ced_empl)
			$("#cedula").val(snap.ced_empl)
			$("#nombre").val(snap.nom_empl)
			$("#apellido").val(snap.ape_empl)
			$("#telefono").val(snap.tel_empl)
			$("#celular").val(snap.cel_emp)
			$("#direccion").val(snap.dir_empl)
			$("#email").val(snap.ema_empl)
			$("#sexo").val(snap.sex_empl)

			$("#cedula").addClass("mui--is-not-empty mui--is-touched")
			$("#nombre").addClass("mui--is-not-empty mui--is-touched")
			$("#apellido").addClass("mui--is-not-empty mui--is-touched")
			$("#telefono").addClass("mui--is-not-empty mui--is-touched")
			$("#celular").addClass("mui--is-not-empty mui--is-touched")
			$("#direccion").addClass("mui--is-not-empty mui--is-touched")
			$("#email").addClass("mui--is-not-empty mui--is-touched")
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