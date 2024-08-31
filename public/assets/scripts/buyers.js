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

  //
  //select Buyer
  $("#addSalesBuyer").select2({
    dropdownParent: $("#newSalesReportModal"),
    ajax: {
      delay: 250,
      url: "/buyers/search",
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

  // Grade name select2
  $(".salesGradeName").select2({
    dropdownParent: $("#newSalesReportModal"),
    ajax: {
      delay: 250,
      url: "/grades/search",
      data: function (params) {
        var query = {
          search: params.term,
        };
        return query;
      },
      dataType: "json",
      placeholder: "Select Grade",
      minimumInputLength: 3,
    },
  });

  //Get deliveries
  function buyersList() {
    $("#buyersTable").DataTable({
      destroy: true,
      ajax: {
        method: "post",
        url: "/buyers/buyersList",
        data: {},
        dataSrc: "buyersList",
      },
      columns: [
        { data: "name" },
        { data: "contact_person" },
        { data: "telephone_1" },
        { data: "email_1" },
        { data: "category_name" },
        { data: "country_name" },
      ],
    });
  }
  buyersList();

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

  // Add new Sales Report
  $(document).on("click", ".addSalesReportBtn", function (e) {
    e.preventDefault();
    $("#newSalesReportModal").modal("show");
  });

  // Sales Report Details
  var salesItemsNo = 1;

  //
});
