const formProduct = $('#form_product')
const tableProduct = $('#table_products')
const modal_product = $('#modal_addProduct')
let datatable = {}

$(document).ready(function(){
  renderTable(tableProduct, url_get_product)
})

function renderTable(table, url){
  datatable = table.DataTable({
    ajax: {
      url
    },
    columns: [
      {data: 'id_product'},
      {data: 'name'},
      {data: 'active'},
      {
        data: {},
        render: data => `<div><a class="btn btn_update" data_id="${data.id}">Update</a><a class="btn btn_delete" data_id="${data.id}">delete</a></div>`
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
      datatable.ajax.reload()
    },
    error: function(request){
      console.error(request.message)
    }
  })
}

$('#addProduct').on('click', function() {
  
  modal_product[0].setAttribute('open',1)
  modal_product[0].setAttribute('style','border: none; width: 600px; height: 400px; z-index:1')
})

$('.btn_close').on('click', function() {
  modal_product[0].removeAttribute('open')
})

$('#btnSave').on('click', function(e){
  e.preventDefault()
  let data = formProduct.serialize()
  console.log(data)
  addProduct(url_insert_product, data)
})