$(document).ready(function () {
  //select country
  $("#addBuyerCountry").select2({
    dropdownParent: $("#addBuyerModal"),
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
        var status = response.sms;
        if (status == "success") {
          $("#addBuyerModal").modal("hide");
          $("#buyersTable").DataTable().ajax.reload();
        }
      },
    });
  });

  // Previewing buyer details
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
        $("#previewBuyerName").val(b.name);
        $("#previewBuyerCategory").val(b.category_name);
        $("#previewBuyerContactPerson").val(b.contact_person);
        $("#previewBuyerRole").val(b.role);
        $("#previewBuyerTel1").val(b.telephone_1);
        $("#previewBuyerTel2").val(b.telephone_2);
        $("#previewBuyerEmail").val(b.email_1);
        $("#previewBuyerCountry").val(b.country_name);
        $("#previewBuyerStreet").val(b.street);
        $("#previewBuyerCurrency").val(b.curency_code);
        $("#previewBuyerModal").modal("show");
      },
    });
  });
  //
});
