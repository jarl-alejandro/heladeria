'use strict'

var db = {}
db.productos = []


var Detail = function Detail(){
  this.$body = $("#detalle-menu")
}

Detail.prototype = {

  add: function add (object) {
    if(this.existProducto(object)) {
      this.insertData(object)
      this.build()
      $(".panel-productos").slideUp()
    }
  },

  existProducto: function existProducto (object) {
    var flag = false

    if(db.productos.length === 0){
      return true
    }

    for(var i in db.productos){
      var item = db.productos[i]
      if(item.code == object.code){
        // toast(`Ya existe la capsula ${item.name}`)
        item.cant = parseInt(item.cant) + parseInt(object.cant)
        item.total = parseInt(item.cant) * parseFloat(object.valor)
        this.build()
        $(".panel-productos").slideUp()
        return false
      }
      else flag = true
    }
    return flag
  },

  insertData: function insertData (object) {
    db.productos.push(object)
  },

  build: function build () {
    this.$body.html("")
    for(var i in db.productos){
      var item = db.productos[i]
      var trTag = `<tr>
        <td>${ item.cant }</td>
        <td>${ item.name }</td>
        <td>${ item.valor }</td>
        <td>${ item.total }</td>
      </tr>`
      this.$body.append(trTag)
    }
    $(".eliminarProducto").on("click", function (e) {
      e.preventDefault()
      var index = e.currentTarget.dataset.index
      db.productos.splice(index, 1)
      this.build()
    }.bind(this))
  },


}
