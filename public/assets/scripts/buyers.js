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

  // Get buyer infor on changing the buyer
  $(document).on("change", "#addSalesBuyer", function (e) {
    e.preventDefault();
    var buyer = $(this).val();
    $.ajax({
      type: "post",
      url: "/buyers/buyersList",
      data: {
        searchKey: "",
        buyer: buyer,
      },
      dataType: "json",
      success: function (response) {
        const buyerInfo = response.buyersList[0].curency_code;
        $("#addSalesCurrency").val(buyerInfo);
      },
    });
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

  // Getting grade info on change
  $(document).on("change", ".salesGradeName", function (e) {
    e.preventDefault();
    var selectedGrade = $(this).val();
    var rowNo = $(this).attr("rowNo");
    $.ajax({
      type: "post",
      url: "/grades/gradesList",
      data: {
        gradeId: selectedGrade,
      },
      dataType: "json",
      success: function (response) {
        var grade = response.gradesList[0];
        $(`#salesCode${rowNo}`).val(grade.grade_code);
        $(`#salesUnit${rowNo}`).val(grade.unit);
      },
    });
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
  // Add new valuation rows
  var salesItemsNo = 1;
  var salesReportTotal = 0;
  var salesReportItemIds = [1]; //Store item ids in key-value pairs
  $(document).on("click", "#salesRowAddBtn", function (e) {
    e.preventDefault();
    salesItemsNo += 1; //Increment by 1
    var rowStr = `<tr rowNo="${salesItemsNo}" id="salesRow${salesItemsNo}">
                    <td><input rowNo="${salesItemsNo}" id="salesCode${salesItemsNo}" class="form-control form-control-xs" readonly></td>
                    <td>
                      <select rowNo="${salesItemsNo}" id="salesGrade${salesItemsNo}" class="form-select form-control form-control-sm salesGradeName" style="width: 300px;">
                      </select>
                    </td>
                    <td><input type="number" rowNo="${salesItemsNo}" id="salesQty${salesItemsNo}" class="form-control form-control-xs text-end salesReportQtyPx" value="1" min="0"></td>
                    <td><input rowNo="${salesItemsNo}" id="salesUnit${salesItemsNo}" class="form-control form-control-xs text-center" readonly></td>
                    <td><input type="number" rowNo="${salesItemsNo}" id="salesPx${salesItemsNo}" class="form-control form-control-xs text-end salesReportQtyPx" value="0" min="0"></td>
                    <td><input rowNo="${salesItemsNo}" id="salesAmt${salesItemsNo}" class="form-control form-control-xs text-end" value="0" readonly></td>
                    <td>
                      <button rowNo="${salesItemsNo}" type="button" id="salesAmt${salesItemsNo}" class="btn btn-sm btn-danger rowRemoveBtn" title="Remove Row">-</button>
                    </td>
                  </tr>`;
    // Add another row
    $("#salesTBody").append(rowStr);

    // Add Id to valuation Ids list
    salesReportItemIds.push(salesItemsNo);

    // Grade name select2 initiation on the new row item
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
  });

  //
});
