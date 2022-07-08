const formProduct = $('#form_users')
const tableUser = $('#table_users')
const modal_User = $('#modal_addUser')
const iName = $('#name')
const imail = $('#email')

let datatable = {} 

$(document).ready(function(){
  renderTable(tableUser, url_get_user)
})

function renderTable(table, url){
  datatable = table.DataTable({
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
        render: data => `<div><a class="btn btn_update" data_id="${data.id_product}" data_name="${data.name}">Update</a><a class="btn btn_delete" data_id="${data.id_product}">delete</a></div>`
        /* render: data => '<div><a class="btn btn_update" data_id="' + data.id_product + '">Update</a><a class="btn btn_delete" data_id="' + data.id_product + '">delete</a></div>' */
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
      datatable.ajax.reload()
    },
    error: function(request){
      console.error(request.message)
    }
  })
}

$('#addProduct').on('click', function() {
  /* modal_User[0].append('Nuevo producto')vanilla js*/
  $('#modal_title').text('Nuevo producto')
  iName.val('')
  /* modal_User[0].setAttribute('open',1) vanilla js*/
  modal_User.prop('open',1)
  /* modal_User[0].setAttribute('style','position: absolute; width: 600px; height: 400px; z-index:1')  vanilla js*/
  modal_User.prop('style','position: absolute; width: 600px; height: 400px; z-index:1')
})

$(document).on('click', '.btn_update', function() {
  $('#modal_title').text('Actualizar producto')
  modal_User[0].setAttribute('open',1)
  modal_User[0].setAttribute('style','position: absolute; width: 600px; height: 400px; z-index:1')
  iName.val($(this).attr('data_name'))
  $('#id').val($(this).attr('data_id'))
})


$('.btn_close').on('click', function() {
  modal_User[0].removeAttribute('open')
})

$('#btnSave').on('click', function(e){
  e.preventDefault()
  let data = formProduct.serialize()
  console.log(data)
  if(!$('#id').val()){
    addProduct(url_insert_product, data)
    modal_User[0].removeAttribute('open')
  }else{
    data = {
      id: $('#id').val(),
      name: iName.val()
    }
    updateProduct(url_update_product, data)
    modal_User[0].removeAttribute('open')
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
      datatable.ajax.reload()
    },
    error: function(request){
      console.error(request.message)
    }
  })
}

$(document).on('click', '.btn_delete', function() {
  let id =  $('#id').val($(this).attr('data_id'))
  deleteProduct(url_delete_product, id)
})
function deleteProduct(url, data)
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
      datatable.ajax.reload()
    },
    error: function(request){
      console.error(request.message)
    }
  })
}