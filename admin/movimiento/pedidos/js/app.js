;(function () {
	'use strict'

	var detail = new Detail()

  $(".closeAlert").on("click", function () {
    $(".notify").slideUp()
  })

  setInterval(function () {
    $.ajax({
      type: "POST",
      url: "service/pedidos.php",
      dataType: "JSON"
    })
    .done(function (snap) {
      console.log(snap)
      if (snap.menu != false) {
        console.log(snap)
        for (var i in snap) {
          var item = snap[i]
          item.mes_ped
          $(`[data-id='${item.mes_ped}']`).addClass('mesa-activa-pedido')
        }

        $("#notify-pedido").html(`La mesa ${ snap.menu.mes_ped } tiene un pedido porfavor atienda`)
        $(".notify").slideDown()
      }
      else {
        $(`[data-id]`).removeClass('mesa-activa-pedido')
      }
    })
  }, 5000)

	$('.mesa-cliente').on('click', handleMesaActive)
	$(".reporte").on("click", handleReport)
	$("#print").on("click", handlePrint)

  function handleMesaActive (e) {
    var id = e.currentTarget.dataset.id
    $('.mesa-cliente__active').removeClass('mesa-cliente__active')

    $.ajax({
      type: "POST",
      url: "service/get.php",
      data: { id },
      dataType: "JSON"
    })
    .done(function (snap) {
      console.log(snap)
      handelCancelar()

      if(snap.menu == false) {
        toast("Esta mesa no tiene pedidos")
        return false
      }
      if( isMobile.any() ) {
        $('#table-container').slideUp()
        $('.fondo-card:nth-child(2)').slideDown()
      }

      $(this).addClass('mesa-cliente__active')

      $('#id').val(snap.menu.cod_ped)
      $('#cedula').val(snap.menu.clie_ped)
      $('#nombre').val(snap.menu.cliente)

      $("#cedula").addClass("mui--is-not-empty mui--is-touched")
      $("#nombre").addClass("mui--is-not-empty mui--is-touched")

      templateDetail(snap.productos)
      var total = parseFloat(snap.menu.sub_ped) - parseFloat(snap.menu.iva_ped)
      total = total.toFixed(2)
      $('#porcent-iva').html(parseInt(snap.menu.iva_ped * 100))
      $("#subtotal").html(snap.menu.sub_ped)
      $("#iva").html(snap.menu.iva_ped)
      $("#total").html(total)

      if (snap.menu.est_ped === "procesado") {
        $("#entragar").slideDown()
        $("#guardar").slideUp()
      }
      if (snap.menu.est_ped === "pedido") {
        $("#entragar").slideUp()
        $("#guardar").slideDown()
      }
    }.bind(this))
  }

  function handelCancelar () {
    $("#table-container").slideDown()
    db.productos = []
    $("#detalle-menu").html("<tr><td></td><td></td><td></td><td></td><td></td></tr>")
    $("#subtotal").html("0.00")
    $("#iva").html("0.00")
    $("#total").html("0.00")
		$("#id").val("")

    $("#nombre").val("")
		$("#cedula").val("")

		$("#nombre").removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
		$("#cedula").removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
	}

	function templateDetail (productos) {
		for(var i in productos){
			var item = productos[i]
			var total = parseInt(item.cant_ped) * parseFloat(item.prec_ped)
			var object = {
				code: item.codigo,
				name: item.nombre,
				valor: item.prec_ped,
				cant: parseInt(item.cant_ped),
				total: total.toFixed(2),
			}
			detail.insertData(object)
		}
		detail.build()
	}

	function handleReport (e) {
		var id = e.currentTarget.dataset.id
		window.open (`./reporte/individual.php?id=${id}`, "_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=50, left=60, width=1200, height=600")
	}

	function handlePrint () {
		window.open (`./reporte/lista.php`, "_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=50, left=60, width=1200, height=600")
	}

})()
