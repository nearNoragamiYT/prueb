const formProduct = $('#form_product')
const tableProduct = $('#table_products')
const modal_product = $('#modal_addProduct')
const iName = $('#nameP')

const formUser = $('#form_user')
const tableUser = $('#table_user')
const modal_user = $('#modal_addUser')
const UName = $('#nameU')

let datatableproductos = {} , datatableusuarios = {}

$(document).ready(function(){
  renderTableProductos(tableProduct, url_get_product)
  renderTableUsuarios(tableUser, url_get_user)
})

function renderTableProductos(table, url){
  datatableproductos = table.DataTable({
    ajax: {
      url
    },
    columns: [
      {data: 'id_product'},
      {data: 'name'},
      {data: 'active'},
      {
        data: {},
        render: data => `<div><a class="btn btn_update" data_id="${data.id_product}"><i class="material-icons">create</i></a><a class="btn btn_delete" data_id="${data.id_product}"><i class="material-icons">delete</i></a></div>`
      },
    ]
  })
}

function addProduct(url, data){
  $.ajax({
    url,
    data,
    type: 'Post',
    success: function(response){
      if(response.status == false){
        console.log(response.message)
        return
      }
      alert(response.message)
      datatableproductos.ajax.reload()
    },
    error: function(request){
      console.error(request.message)
    }
  })
}

$('#addProduct').on('click', function() {
  /* modal_product[0].append('Nuevo producto')vanilla js*/
  $('#modal_title').text('Nuevo producto')
  iName.val('')
  /* modal_product[0].setAttribute('open',1) vanilla js*/
  modal_product.prop('open',1)
  /* modal_product[0].setAttribute('style','position: absolute; width: 600px; height: 400px; z-index:1')  vanilla js*/
  modal_product.prop('style','position: absolute; width: 600px; height: 400px; z-index:1')
})
$(document).on('click', '.btn_update', function() {
  $('#modal_title').text('Actualizar producto')
  modal_product[0].setAttribute('open',1)
  modal_product[0].setAttribute('style','position: absolute; width: 600px; height: 400px; z-index:1')
  iName.val($(this).attr('data_name'))
  $('#id').val($(this).attr('data_id'))
})

$('.btn_close').on('click', function() {
  modal_product[0].removeAttribute('open')
})



$('#btnSave').on('click', function(e){
  e.preventDefault()
  let data = formProduct.serialize()
  console.log(data)
  if(!$('#id').val()){
    addProduct(url_insert_product, data)
    modal_product[0].removeAttribute('open')
  }else{
    data = {
      id: $('#id').val(),
      name: iName.val()
    }
    updateProduct(url_update_product, data)
    modal_product[0].removeAttribute('open')
  }
})

function updateProduct(url, data)
{
  $.ajax({
    url,
    data,
    type: 'Post',
    success: function(response){
      if(response.status == false){
        console.log(response.message)
        return
      }
      alert(response.message)
      datatableproductos.ajax.reload()
    },
    error: function(request){
      console.error(request.message)
    }
  })
}


function deleteProduct(url, data){
  $.ajax({
    url,
    data,
    type: 'Post',
    success: function(response){
      if(response.status == false){
        console.log(response.message)
        return
      }
      alert(response.message)
      datatableproductos.ajax.reload()
    },
    error: function(request){
      console.error(request.message)
    }
  })
}
$(document).on('click', '.btn_delete', function() {
  var id = {id:$(this).attr('data_id')}
  deleteProduct(url_delete_product, id)

})

//////////////////////////////////////////////////////////


function renderTableUsuarios(table, url){

  datatableusuarios = table.DataTable({
    ajax: {
      url
    },
    columns: [
      {data: 'id_users'},
      {data: 'id_product'},
      {data: 'email'},
      {data: 'name'},
      {data: 'active'},
      {
        data: {},
        render: data => `<div><a class="btn btn_updateUs" data_idU="${data.id_users}"><i class="material-icons">create</i></a><a class="btn btn_deleteUs" data_idU="${data.id_users}"><i class="material-icons">delete</i></a></div>`
      },
    ]
  })
}



function addUser(url, data){
  $.ajax({
    url,
    data,
    type: 'Post',
    success: function(response){
      if(response.status == false){
        console.log(response.message)
        return
      }
      alert(response.message)
      datatableusuarios.ajax.reload()
    },
    error: function(request){
      console.error(request.message)
    }
  })
}


$('#addUser').on('click', function() {
  /* modal_user[0].append('Nuevo usuario')vanilla js*/
  $('#modal_titleUs').text('Nuevo usuario')
  UName.val('')
  /* modal_user[0].setAttribute('open',1) vanilla js*/
  modal_user.prop('open',1)
  /* modal_user[0].setAttribute('style','position: absolute; width: 600px; height: 400px; z-index:1')  vanilla js*/
  modal_user.prop('style','position: absolute; width: 600px; height: 400px; z-index:1')
})
$(document).on('click', '.btn_updateUs', function() {
  $('#modal_titleUs').text('Actualizar usuario')
  modal_user[0].setAttribute('open',1)
  modal_user[0].setAttribute('style','position: absolute; width: 600px; height: 400px; z-index:1')
  UName.val($(this).attr('data_name'))
  $('#idUs').val($(this).attr('data_idU'))
})

$('.btn_close').on('click', function() {
  modal_user[0].removeAttribute('open')
})



$('#btnSaveUs').on('click', function(e){
  e.preventDefault()
  let data = formUser.serialize()
  console.log(data)
  if(!$('#idUs').val()){
    addUser(url_insert_user, data)
    modal_user[0].removeAttribute('open')
  }else{
    data = {
      idUs: $('#idUs').val(),
      name: UName.val()
    }
    updateUser(url_update_user, data)
    modal_user[0].removeAttribute('open')
  }
})

function updateUser(url, data)
{
  $.ajax({
    url,
    data,
    type: 'Post',
    success: function(response){
      if(response.status == false){
        console.log(response.message)
        return
      }
      alert(response.message)
      datatableusuarios.ajax.reload()
    },
    error: function(request){
      console.error(request.message)
    }
  })
}


function deleteUser(url, data){
  $.ajax({
    url,
    data,
    type: 'Post',
    success: function(response){
      if(response.status == false){
        console.log(response.message)
        return
      }
      alert(response.message)
      datatableusuarios.ajax.reload()
    },
    error: function(request){
      console.error(request.message)
    }
  })
}

$(document).on('click', '.btn_deleteUs', function() {
  var idUs = {idUs:$(this).attr('data_idU')}
  deleteUser(url_delete_user, idUs)

})