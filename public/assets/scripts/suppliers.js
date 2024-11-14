$(document).ready(function () {
  // Adding supplier
  $(document).on("click", "#addSupplierBtn", function (e) {
    e.preventDefault();
    $("#addSupplierModal").modal("show");
  });
  function suppliersList() {
    $("#suppliersListTable").DataTable({
      destroy: true,
      ajax: {
        method: "post",
        url: "/suppliers/list",
        data: {},
        dataSrc: "suppliers",
      },
      columns: [
        {
          render: function (data, type, row, meta) {
            return `<label style="color: blue" class="supplierName" sId="${row.client_id}"> ${row.name}</label>`;
          },
        },
        { data: "district" },
        { data: "category_name" },
        { data: "contact_person" },
        { data: "telephone_1" },
        { data: "email_1" },
      ],
      dom: "Bfrtip", // Specify the placement of buttons
      buttons: [
        {
          extend: "csvHtml5",
          text: "Export CSV",
          titleAttr: "Export CSV",
        },
        {
          extend: "excelHtml5",
          text: "Export Excel",
          titleAttr: "Export Excel",
        },
        {
          extend: "pdfHtml5",
          text: "Export PDF",
          titleAttr: "Export PDF",
        },
      ],
    });
  }
  suppliersList();

  // Save Supplier
  $(document).on("click", "#saveSupplierBtn", function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "/suppliers/addSupplier",
      data: {
        supplierName: $("#addSupplierName").val(),
        contactPerson: $("#addSupplierContactPerson").val(),
        conatctRole: $("#addSupplierRole").val(),
        supplierTel1: $("#addSupplierTel1").val(),
        supplierTel2: $("#addSupplierTel2").val(),
        supplierEmail: $("#addSupplierEmail").val(),
        supplierDistrict: $("#addSupplierDistrict").val(),
        supplierSubcounty: $("#addSupplierSubcounty").val(),
        supplierCategory: $("#addSupplierCategory").val(),
        supplierStreet: $("#addSupplierStreet").val(),
        supplierCurrency: $("#addSupplierCurrency").val(),
      },
      dataType: "json",
      success: function (response) {
        var sms = response.sms;
        if (sms == "success") {
          $("#suppliersListTable").DataTable().ajax.reload();
          $("#addSupplierModal").modal("hide");
          toastr.success("Supplier Added");
        } else {
          toastr.error("Something went wrong!");
        }
      },
      error: function (xhr) {
        toastr.error(xhr.responseJSON.error);
      },
    });
  });

  // Preview Supplier
  var prevSupplier = "";
  $(document).on("click", ".supplierName", function (e) {
    e.preventDefault();
    var supplier = $(this).attr("sId");
    $("#supplierEditBtn").attr("sId", supplier);
    // Get supplier information
    $.ajax({
      type: "post",
      url: "/suppliers/list",
      data: {
        supplier: supplier,
      },
      dataType: "json",
      success: function (response) {
        var s = response.suppliers[0];
        prevSupplier = s;
        $("#prevSupplierName").val(s.name);
        $("#prevSupplierCategory").val(s.category_name);
        $("#prevSupplierContactPerson").val(s.contact_person);
        $("#prevSupplierRole").val(s.role);
        $("#prevSupplierTel1").val(s.telephone_1);
        $("#prevSupplierTel2").val(s.telephone_2);
        $("#prevSupplierEmail").val(s.email_1);
        $("#prevSupplierDistrict").val(s.district);
        $("#prevSupplierSubcounty").val(s.subcounty);
        $("#prevSupplierStreet").val(s.street);
        $("#prevSupplierCurrency").val(s.curency_code);
        $("#previewSupplierModal").modal("show");
      },
    });
  });

  // Adjust supplier Information
  $(document).on("click", "#supplierEditBtn", function (e) {
    e.preventDefault();
    var confirmEdit = confirm("Confirm adjusting supplier details!");
    if (confirmEdit) {
      var s = prevSupplier;
      $("#editSupplierName").val(s.name);
      $("#editSupplierCategory").val(s.category_id);
      $("#editSupplierContactPerson").val(s.contact_person);
      $("#editSupplierRole").val(s.role);
      $("#editSupplierTel1").val(s.telephone_1);
      $("#editSupplierTel2").val(s.telephone_2);
      $("#editSupplierEmail").val(s.email_1);
      $("#editSupplierDistrict").val(s.district);
      $("#editSupplierSubcounty").val(s.subcounty);
      $("#editSupplierStreet").val(s.street);
      $("#editSupplierCurrency").val(s.curency_code);
      $("#saveEditSupplier").attr("sId", s.client_id);
      $("#previewSupplierModal").modal("hide");
      $("#editSupplierModal").modal("show");
    }
  });

  // Save adjusted supplier information
  $(document).on("click", "#saveEditSupplier", function (e) {
    e.preventDefault();
    var supplier = $(this).attr("sId");
    $.ajax({
      type: "post",
      url: "/suppliers/editSupplier",
      data: {
        supplier: supplier,
        sName: $("#editSupplierName").val(),
        sContactPerson: $("#editSupplierContactPerson").val(),
        sCategory: $("#editSupplierCategory").val(),
        sContactRole: $("#editSupplierRole").val(),
        sTel1: $("#editSupplierTel1").val(),
        sTel2: $("#editSupplierTel2").val(),
        sEmail: $("#editSupplierEmail").val(),
        sDistrict: $("#editSupplierDistrict").val(),
        sSubCounty: $("#editSupplierSubcounty").val(),
        sStreet: $("#editSupplierStreet").val(),
      },
      dataType: "json",
      success: function (response) {
        if (response.sms == 'success') {
          $("#suppliersListTable").DataTable().ajax.reload();
          $("#editSupplierModal").modal("hide");
          toastr.success('Supplier Updated!')
        } else {
          toastr.error('Something went wrong!');
        }
      },
      error: function (xhr) {
        toastr.error(xhr.responseJSON.error);
      },
    });
  });

  //
});
