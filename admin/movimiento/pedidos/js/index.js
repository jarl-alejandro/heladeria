;(function () {
	'use strict'

	var $nombre = $("#nombre")
	var $cedula = $("#cedula")

	$("#table-container").load("template/table.php")
	var detail = new Detail()

	$("#guardar").on("click", handelSave)
	$("#cancelar").on("click", handelCancelar)
  $("#entragar").on("click", handleEntrgar)

  function handleEntrgar () {
    var id = $("#id").val()

	  if (id === "") {
      toast("Selecione el pedido de alguna mesa")
    }
    else {
      $.ajax({
        type: "POST",
        url: "service/entregar.php",
        data: { id }
      })
      .done(function (snap) {
        console.log(snap)
        if(snap == 2) {
          toast("Se ha entragado con exito el pedido")
          $('.mesa-cliente__active').removeClass('mesa-cliente__active')
          handelCancelar()
        }
      })
    }
  }

	function handelSave () {
    var id = $("#id").val()

	  if (id === "") {
      toast("Selecione el pedido de alguna mesa")
    }
    else {
      $.ajax({
        type: "POST",
        url: "service/guardar.php",
        data: { id }
      })
      .done(function (snap) {
        console.log(snap)
        if(snap == 2) {
          toast("Se esta procesando el pedido")
          handelCancelar()
        }
      })
    }
	}

	function handelCancelar () {
    $("#table-container").slideDown()
    db.productos = []
    $("#detalle-menu").html("<tr><td></td><td></td><td></td><td></td><td></td></tr>")
    $("#subtotal").html("0.00")
    $("#iva").html("0.00")
    $("#total").html("0.00")
		$("#id").val("")

    if( isMobile.any() ) {
      $('#table-container').slideDown()
      $('.fondo-card:nth-child(2)').slideUp()
    }
		
    $nombre.val("")
		$cedula.val("")

		$nombre.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$cedula.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
	}


})()