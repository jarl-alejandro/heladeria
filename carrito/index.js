;(function () {
  'use strict'

  var pedido = {}
  var carrito = new Carrito()

  db.mesa = localStorage.getItem('heladeria::mesa')

  if (localStorage.getItem('heladeria::pedido') != null && localStorage.getItem('heladeria::pedido') != "")  {
    db.productos = JSON.parse(localStorage.getItem('heladeria::pedido'))
  }

  if (localStorage.getItem('heladeria::cotiza') != null && localStorage.getItem('heladeria::cotiza') != "") {
    db.cotizado = JSON.parse(localStorage.getItem('heladeria::cotiza'))
  }

  if(db.productos.length > 0) carrito.build()
  if(db.cotizado.length > 0) carrito.buildCotizado()

  if(db.mesa != null) $(`.mesa-cliente[data-id='${db.mesa}']`).addClass('mesa-cliente__active')

  setInterval(function () {
    if(db.cotizado.length != 0) {
      $.ajax({
        type: "POST",
        url: "carrito/entregado.php",
        dataType: "JSON",
        data: { mesa: db.mesa }
      })
      .done(function (snap) {
        console.log(snap)
        if (snap.menu != false) {
          $("#pagar-carrito").slideDown()
          $("#enviar-carrito").slideUp()
        }
      })
    }
  }, 5000)

  $('.message-mesa').on("click", notifyMesa)

  function notifyMesa (e) {
    toast("Esta mesa ya esta ocupada")
  }

  var $cant = $('#cant-pedido')
  var $categoria = $('#categoria')

  var $email = $('#email')
  var $password = $('#password')

  var isCliente = $('#is-cliente').val()

  $('.mesa-cliente').on('click', handleMesa)
  $('#cerrar-carrito').on('click', handleCloseCar)
  $('#enviar-carrito').on('click', handleSendOrder)
  $('#carrito-boton').on('click', handleShowCar)
  $('.carta-menu').on('click', handleMenuCard)
  $('#cerrar-cant').on('click', handleCloseCant)
  $('#aceptar-cant').on('click', handleAceptCant)
  $categoria.on('change', handleFilter)
  $('#login-cliente-btn').on('click', handleShowLogin)
  $('#cerrar-login').on('click', handleCloseLogin)
  $('#aceptar-login').on('click', handleAceptLogin)
  $('#pagar-carrito').on('click', handlePagar)

  function handleMesa (e) {
    var id = e.currentTarget.dataset.id
    db.mesa = id
    $(this).addClass('mesa-cliente__active')
    $('.mesa-cliente').off('click')
    $.ajax({
      type: "POST",
      url: "carrito/ocupa-mesa.php",
      data:  { id }
    })
    .done(function (snap) {
      localStorage.clear()
      localStorage.setItem('heladeria::mesa', db.mesa)
    })
  }

  function handleCloseCar () {
    $('#carrito').slideUp()
  }

  function handleSendOrder () {
    if (isCliente != '') {
      if (db.productos.length === 0) {
        toast("Ingrese lo que desee comprar")
      }
      else {
        $.ajax({
          type: "POST",
          url: "service/guarda-carrito.php",
          data: { productos: db.productos, mesa: db.mesa, subtotal: $('#sub-carrito').html(),
                iva: $('#iva-porcent').html(), id: $("#id").val() },
          dataType: "JSON"
        })
        .done(function (snap) {
          console.log(snap)
          if(snap.status == 2) {
            $("#id").val(snap.codigo)
            toast("Se ha realizado su pedido con exito")
            for (var i in db.productos) {
              var item = db.productos[i]
              db.cotizado.push(item)
            }
            db.productos = []
            localStorage.setItem('heladeria::pedido', "")
            localStorage.setItem('heladeria::cotiza', JSON.stringify(db.cotizado))
            carrito.buildCotizado()
            handleCloseCar()
          }
          else toast("Tuvimos inconvenientes")
        })
      }
    }
    else {
      toast("Inicie session primero para realizar su pedido")
      $('.card-login').slideDown()
      $('.ocultar').slideDown()
    }
  }

  function handleShowCar () {
    $('#carrito').slideDown()
  }

  function handleMenuCard (e) {
    var id = e.currentTarget.dataset.id
    var name = e.currentTarget.dataset.name
    var precio = e.currentTarget.dataset.precio
    var tipo = e.currentTarget.dataset.tipo

    if (db.mesa != null) {
      pedido = { id, name, precio, tipo }
      /*$('#menu-card__name').html(name)
      $('#name-order').html(name)
      $('.card-cant--pedido').slideDown()*/
      pedido.cant = parseInt(0)
      pedido.total = '0.00'
      carrito.add(pedido)
      toast('Ya se cargo a su carrito')
    }
    else {
      toast("Selecione primero su mesa")
    }

  }

  function handleCloseCant () {
    $('.card-cant--pedido').slideUp()
    $cant.val('')
    $cant.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
    pedido = {}
  }

  function handleAceptCant () {
    pedido.cant = parseInt($cant.val())
    carrito.add(pedido)
    handleCloseCant()
  }

  function handleFilter () {
    var code = $categoria.val()
    if (code !== "") {
      var invenatrios = Array.prototype.slice.call(document.querySelectorAll('.inventario-card'))

      for (var i in invenatrios) {
        var item = invenatrios[i]
        if (item.dataset.filter === code) $(`[data-id="${item.dataset.id}"]`).slideDown()
        else $(`[data-id="${item.dataset.id}"]`).slideUp()
      }
    }
    else $('.inventario-card').slideDown()
  }

  function handleShowLogin () {
    $('.card-login').slideDown()
    $('.ocultar').slideDown()
  }

  function handleCloseLogin () {
    $('.card-login').slideUp()
    $('.ocultar').slideUp()
    $email.val('')
    $password.val('')

    $email.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
    $password.removeClass("mui--is-dirty mui--is-touched mui--is-not-empty")
  }

  function handleAceptLogin () {
    if (db.productos.length > 0)
      localStorage.setItem('heladeria::pedido', JSON.stringify(db.productos))
    if (db.mesa != null)
      localStorage.setItem('heladeria::mesa', db.mesa)

    if ($email.val() === "") {
      toast("Ingrese su e-mail")
      $email.focus()
      return false
    }
    if ($password.val() === "") {
      toast("Ingrese su contrseña")
      $password.focus()
      return false
    }

    $.ajax({
      type: "POST",
      url: 'service/login-cliente.php',
      data: { email: $email.val(), password: $password.val() }
    })
    .done(function (snap) {
      if (snap == 2) {
        toast("Ha iniciado session correctamente")
        location.reload()
      }
      else toast('Cliente no esta registrado')
    })
  }

  function handlePagar () {
    $.ajax({
      type: "POST",
      url: "carrito/pagar.php",
      data: { mesa: db.mesa }
    })
    .done(function (snap) {
      console.log(snap)
      if (snap == 2) {
        toast("Se ha cancelado con exito")
        payCloseCar()
      }
      else toast("Intente nuevamente tuvimos problemas")
    })
  }

  function payCloseCar () {
    localStorage.clear()
    setTimeout(function () {
      location.reload()
    }, 500)
  }

  setInterval(function () {
    $.ajax({
      type: "POST",
      url: "carrito/mesas-ocupadas.php",
      dataType: "JSON",
    })
    .done(function (snap) {
      for(var i in snap) {
        var item = snap[i]
        var mesa = $(`.mesa-cliente[data-id='${item.mesa}']`)
        mesa.off('click', handleMesa)
        mesa.removeClass("mesa-cliente")
        mesa.addClass("mesa-cliente__active message-mesa")
        // $('.message-mesa').on("click", notifyMesa)
      }
    })
  }, 5000)

  setInterval(function () {
    $.ajax({
      type: "POST",
      url: "carrito/status-mesa.php",
      dataType: "JSON",
      data: { id: db.mesa }
    })
    .done(function (snap) {
      $(`.mesa-cliente__active[data-id='${db.mesa}']`).addClass(`mesa-cliente__${snap.est_ped}`)
    })
  }, 5000)

})()
