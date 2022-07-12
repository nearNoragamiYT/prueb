const formUser = $("#form_users");
const tableUser = $("#table_users");
const modal_User = $("#modal_addUser");
const idP = $("#idP");
const iName = $("#name");
const imail = $("#email");
const active = $("#activeU");

let datatable = {};

$(document).ready(function () {
  renderTable(tableUser, url_get_user);
});

function renderTable(table, url) {
  datatable = table.DataTable({
    ajax: {
      url,
    },
    columns: [
      { data: "id_users" },
      { data: "id_product" },
      { data: "email" },
      { data: "name" },
      { data: "active" },
      {
        data: {},
        render: (data) =>
          `<div><a class="btn btn_update  blue accent-3" data_idP="${data.id_product}" data_id="${data.id_users}" data_name="${data.name}" data_IM="${data.email}">Update</a><a class="btn btn_delete red" data_id="${data.id_users}">delete</a></div>`,
        /* render: data => '<div><a class="btn btn_update" data_id="' + data.id_product + '">Update</a><a class="btn btn_delete" data_id="' + data.id_product + '">delete</a></div>' */
      },
    ],
  });
}

function addUser(url, data) {
  $.ajax({
    url,
    data,
    type: "Post",
    success: function (response) {
      if (response.status == false) {
        console.log(response.message);
        return;
      }
      alert(response.message);
      datatable.ajax.reload();
    },
    error: function (request) {
      console.error(request.message);
    },
  });
}

$("#addUser").on("click", function () {
  /* modal_User[0].append('Nuevo producto')vanilla js*/
  $("#modal_title").text("Nuevo usuario");
  iName.val("");
  /* modal_User[0].setAttribute('open',1) vanilla js*/
  modal_User.prop("open", 1);
  /* modal_User[0].setAttribute('style','position: absolute; width: 600px; height: 400px; z-index:1')  vanilla js*/
  modal_User.prop(
    "style",
    "position: absolute; width: 600px; height: 400px; z-index:1"
  );
});

$(document).on("click", ".btn_update", function () {
  $("#modal_title").text("Actualizar usuario");
  modal_User[0].setAttribute("open", 1);
  modal_User[0].setAttribute(
    "style",
    "position: absolute; width: 600px; height: 400px; z-index:1"
  );
  iName.val($(this).attr("data_name"));
  imail.val($(this).attr("data_IM"));
  idP.val($(this).attr("data_idP"));
  $("#id").val($(this).attr("data_id"));
});

$(".btn_close").on("click", function () {
  modal_User[0].removeAttribute("open");
});

$("#btnSave").on("click", function (e) {
  e.preventDefault();
  let data = formUser.serialize();
  data["active"] = $("#activeU").prop("checked") ? false : true;
  if (!$("#id").val()) {
    addUser(url_insert_user, data);
    modal_User[0].removeAttribute("open");
  } else {
    data = {
      id: $("#id").val(),
      name: iName.val(),
      idP: idP.val(),
      email: imail.val(),
      active: active.prop("checked") ? true : false,
    };
    updateUser(url_update_user, data);
    modal_User[0].removeAttribute("open");
  }
});

function updateUser(url, data) {
  $.ajax({
    url,
    data,
    type: "Post",
    success: function (response) {
      if (response.status == false) {
        console.log(response.message);
        return;
      }
      alert(response.message);
      datatable.ajax.reload();
    },
    error: function (request) {
      console.error(request.message);
    },
  });
}

$(document).on("click", ".btn_delete", function () {
  let id = $("#id").val($(this).attr("data_id"));
  deleteProduct(url_delete_user, id);
});
function deleteProduct(url, data) {
  $.ajax({
    url,
    data,
    type: "Post",
    success: function (response) {
      if (response.status == false) {
        console.log(response.message);
        return;
      }
      alert(response.message);
      datatable.ajax.reload();
    },
    error: function (request) {
      console.error(request.message);
    },
  });
}
