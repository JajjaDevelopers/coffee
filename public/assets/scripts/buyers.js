$(document).ready(function () {
  //select country
  function searchCountry(inputId, parentId) {
    $(`#${inputId}`).select2({
      dropdownParent: $(`#${parentId}`),
      ajax: {
        delay: 250,
        url: "/admin/countriesList",
        data: function (params) {
          var query = {
            search: params.term,
          };
          return query;
        },
        dataType: "json",
        placeholder: "Search for supplier",
        minimumInputLength: 3,
      },
    });
  }

  //Get buyers list
  function buyersList() {
    $("#buyersTable").DataTable({
      destroy: true,
      ajax: {
        method: "post",
        url: "/buyers/buyersList",
        data: {
          searchKey: "",
          buyer: "",
        },
        dataSrc: "buyersList",
      },
      columns: [
        {
          render: function (data, type, row, meta) {
            return `<label class="buyerName" buyer="${row.client_id}" style="color: blue">
          ${row.name}
          </label>`;
          },
        },
        { data: "contact_person" },
        { data: "telephone_1" },
        { data: "email_1" },
        { data: "category_name" },
        { data: "country_name" },
      ],
    });
  }
  buyersList();

  // Buyer's info

  // buyersInfo("1");

  // Add new buyer
  $(document).on("click", ".addBuyerBtn", function (e) {
    e.preventDefault();
    searchCountry("addBuyerCountry", "addBuyerModal");
    $("#addBuyerModal").modal("show");
  });

  // Save Buyer
  $(document).on("click", ".saveBuyerBtn", function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "/buyers/addBuyer",
      data: {
        buyerInfo: {
          name: $("#addBuyerName").val(),
          contact_person: $("#addBuyerContactPerson").val(),
          telephone_1: $("#addBuyerTel1").val(),
          telephone_2: $("#addBuyerTel2").val(),
          email_1: $("#addBuyerEmail").val(),
          category_id: $("#addBuyerCategory").val(),
          currency_id: $("#addBuyerCurrency").val(),
          role: $("#addBuyerRole").val(),
          country_id: $("#addBuyerCurrency").val(),
          city: $("#addBuyerCity").val(),
          street: $("#addBuyerCurrency").val(),
        },
      },
      dataType: "json",
      success: function (response) {
        alert("Hi");
        var status = response.sms;
        if (status == "success") {
          $("#addBuyerModal").modal("hide");
          $("#buyersTable").DataTable().ajax.reload();
          toastr.success("Buyer Added");
        } else {
          toastr.error("Something went wrong!");
        }
      },
      error: function (xhr) {
        toastr.error(xhr.responseJSON.error);
      },
    });
  });

  // Previewing buyer details
  var prevBuyerInfo = [];
  $(document).on("click", ".buyerName", function (e) {
    e.preventDefault();
    var buyerId = $(this).attr("buyer");
    $.ajax({
      type: "post",
      url: "/buyers/buyersList",
      data: {
        searchKey: "",
        buyer: buyerId,
      },
      dataType: "json",
      success: function (response) {
        const b = response.buyersList[0];
        prevBuyerInfo = b;
        $("#previewBuyerName").val(b.name);
        $("#previewBuyerCategory").val(b.category_name);
        $("#previewBuyerContactPerson").val(b.contact_person);
        $("#previewBuyerRole").val(b.role);
        $("#previewBuyerTel1").val(b.telephone_1);
        $("#previewBuyerTel2").val(b.telephone_2);
        $("#previewBuyerEmail").val(b.email_1);
        $("#previewBuyerCountry").val(b.country_name);
        $("#previewBuyerCity").val(b.city);
        $("#previewBuyerStreet").val(b.street);
        $("#previewBuyerCurrency").val(b.curency_code);
        $("#previewBuyerModal").modal("show");
      },
    });
  });

  // Editing Buyer information
  $(document).on("click", "#buyerEditBtn", function (e) {
    e.preventDefault();
    var confirmEdit = confirm(
      "Click OK to confirm adjusting buyer information:"
    );
    if (confirmEdit) {
      const b = prevBuyerInfo;
      $("#editBuyerName").val(b.name);
      $("#editBuyerName").attr("editId", b.client_id);
      $("#editBuyerContactPerson").val(b.contact_person);
      $("#editBuyerRole").val(b.role);
      $("#editBuyerTel1").val(b.telephone_1);
      $("#editBuyerTel2").val(b.telephone_2);
      $("#editBuyerEmail").val(b.email_1);
      $("#editBuyerCity").val(b.city);
      $("#editBuyerStreet").val(b.street);
      $("#editBuyerCurrency").val(b.curency_code);
      $("#editBuyerCountry").html(
        `<option value="${b.country_id}">${b.country_name}</option>`
      );
      searchCountry("editBuyerCountry", "editBuyerModal");
      $("#previewBuyerModal").modal("hide");
      $("#editBuyerModal").modal("show");
    }
  });

  // Save edited buyer information
  $(document).on("click", "#editBuyerSaveBtn", function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "/buyer/edit",
      data: {
        buyer: $("#editBuyerName").attr("editId"),
        info: {
          name: $("#editBuyerName").val(),
          contact_person: $("#editBuyerContactPerson").val(),
          telephone_1: $("#editBuyerTel1").val(),
          telephone_2: $("#editBuyerTel2").val(),
          email_1: $("#editBuyerEmail").val(),
          category_id: $("#editBuyerCategory").val(),
          role: $("#editBuyerRole").val(),
          country_id: $("#editBuyerCountry").val(),
          city: $("#editBuyerCity").val(),
          street: $("#editBuyerStreet").val(),
        },
      },
      dataType: "json",
      success: function (response) {
        $("#editBuyerModal").modal("hide");
        $("#buyersTable").DataTable().ajax.reload();
      },
    });
  });

  //
});
