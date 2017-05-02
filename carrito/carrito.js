'use strict'

var db = {}
db.productos = []
db.cotizado = []
db.mesa = null

function Carrito () {
  this.$body = $('#carrito-productos')
}

Carrito.prototype = {
  add: function add (pedido) {
    if (this.exists(pedido)) {
      db.productos.push(pedido)
      this.build()
    }
  },

  exists: function exists (pedido) {
    var flag = false
    if(db.productos.length === 0) {
      return true
    }

    for (var i in db.productos) {
      var item = db.productos[i]
      if (item.id == pedido.id) {
        item.cant = parseInt(item.cant) + parseInt(pedido.cant)
        item.precio = parseFloat(item.precio) * parseInt(pedido.cant)
        this.build()
        return false
      }
      else flag = true
    }
    return flag 
  },

  build: function build () {
    this.$body.html("")
    var total = 0

    for (var i in db.productos) {
      var item = db.productos[i]
      var vTotal = parseInt(item.cant) * parseFloat(item.precio)
      total = total + parseFloat(vTotal)
      vTotal = vTotal.toFixed(2)

      var template = `<tr>
        <td class='no-padding'>${ item.cant }</td>
        <td class='no-padding'>${ item.name }</td>
        <td class='no-padding'>${ item.precio }</td>
        <td class='no-padding'>${ vTotal }</td>
        <td class='no-padding'><button class="mui-btn mui-btn--danger eliminar flex-center" data-index="${i}">
          <i class="material-icons">delete_forever</i>
        </button></td>
      </tr>`
      this.$body.append(template)
    }

    $('#sub-carrito').html(total.toFixed(2))
    var iva = parseInt($('#iva').html()) / 100
    $('#iva-porcent').html(iva)
    var pagar = total - iva
    $('#total-carrito').html(pagar.toFixed(2))

     if (db.cotizado.length > 0) {
      this.buildCotizaProd()
    }

    $('.eliminar').on('click', function (e){
      var index = e.currentTarget.dataset.index
      db.productos.splice(index, 1)
      this.build()
    }.bind(this))
  },

  buildCotizado: function buildCotizado () {
    this.$body.html("")
    var total = 0

    for (var i in db.cotizado) {
      var item = db.cotizado[i]
      var vTotal = parseInt(item.cant) * parseFloat(item.precio)
      total = total + parseFloat(vTotal)
      vTotal = vTotal.toFixed(2)

      var template = `<tr>
        <td class='no-padding'>${ item.cant }</td>
        <td class='no-padding'>${ item.name }</td>
        <td class='no-padding'>${ item.precio }</td>
        <td class='no-padding'>${ vTotal }</td>
        <td></td>
      </tr>`
      this.$body.append(template)
    }

    $('#sub-carrito').html(total.toFixed(2))
    var iva = parseInt($('#iva').html()) / 100
    $('#iva-porcent').html(iva)
    var pagar = total - iva
    $('#total-carrito').html(pagar.toFixed(2))
  },

  buildCotizaProd: function buildCotizaProd () {
    // this.$body.html("")
    var total = 0

    for (var i in db.productos) {
      var item = db.productos[i]
      var vTotal = parseInt(item.cant) * parseFloat(item.precio)
      total = total + parseFloat(vTotal)
    }

    for (var i in db.cotizado) {
      var item = db.cotizado[i]
      var vTotal = parseInt(item.cant) * parseFloat(item.precio)
      total = total + parseFloat(vTotal)
      vTotal = vTotal.toFixed(2)

      var template = `<tr>
        <td class='no-padding'>${ item.cant }</td>
        <td class='no-padding'>${ item.name }</td>
        <td class='no-padding'>${ item.precio }</td>
        <td class='no-padding'>${ vTotal }</td>
        <td></td>
      </tr>`
      this.$body.append(template)
    }

    $('#sub-carrito').html(total.toFixed(2))
    var iva = parseInt($('#iva').html()) / 100
    $('#iva-porcent').html(iva)
    var pagar = total - iva
    $('#total-carrito').html(pagar.toFixed(2))

  }

}