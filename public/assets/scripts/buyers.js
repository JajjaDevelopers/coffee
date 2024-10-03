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
  //Select Sales Report Buyer
  function setSalesBuyerInput(buyerInput, parentContainer) {
    $(`#${buyerInput}`).select2({
      dropdownParent: $(`#${parentContainer}`),
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
  }
  setSalesBuyerInput("addSalesBuyer", "newSalesReportModal"); //Buyer on new sales report
  setSalesBuyerInput("editSalesBuyer", "editSalesReportModal"); //Buyer on editing of sales report

  // Get previous sales reports
  function salesReportsList() {
    $("#salesReportsTable").DataTable({
      destroy: true,
      ajax: {
        method: "post",
        url: "/sales/salesReports",
        data: {
          fromDate: $("#fromDate").val(),
          toDate: $("#toDate").val(),
          buyer: "all",
        },
        dataSrc: "salesReports",
      },
      columns: [
        { data: "trans_date" },
        { data: "sales_report_no" },
        { data: "name" },
        { data: "qty" },
        { data: "currency" },
        {
          render: function (data, type, row, meta) {
            var value = Number(row.value);
            return `
            <a href="#" sId="${
              row.sales_id
            }" class="salesReportValue" style="color: blue; text-align: right; border:none" value="">
              <span style="text-align: end">${value.toLocaleString()}</span>
            </a>`;
          },
        },
      ],
    });
  }
  salesReportsList();

  // Get buyer info on changing the buyer
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
  setGradeNameInput("salesGradeName", "newSalesReportModal");

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
        data: {
          searchKey: "",
          buyer: "all",
        },
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
    salesItemsNo = 0; //Reset number of rows to zero
    salesReportTotal = 0;
    salesReportItemIds = [];
    $("#salesReportTotal").val(0); //reset total to 0
    $("#salesTBody").html(""); //Remove avalable rows before adding new ones
    $("#editSalesTBody").html(""); //Remove avalable rows from the editing table
    addSalesRows("salesTBody", "newSalesReportModal");
    $("#newSalesReportModal").modal("show");
  });

  // Grade Name select input
  function setGradeNameInput(gradeNameInputClass, parentContainer) {
    $(`.${gradeNameInputClass}`).select2({
      dropdownParent: $(`#${parentContainer}`),
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
  }

  // Sales Report Details
  // Add new sales report rows
  var salesItemsNo = 0;
  var salesReportTotal = 0;
  var salesReportItemIds = []; //Store item row numbers for new sales report
  // New rows
  function addSalesRows(tableTBody, parentContainer) {
    salesItemsNo += 1; //Increment by 1
    if (salesItemsNo == 1) {
      var rowRemoveBtn = "";
    } else {
      var rowRemoveBtn = `<button rowNo="${salesItemsNo}" type="button" class="btn btn-sm btn-danger salesRowRemoveBtn" title="Remove Item">-</button>`;
    }
    var rowStr = `<tr rowNo="${salesItemsNo}" id="salesReportRow${salesItemsNo}">
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
                      ${rowRemoveBtn}
                    </td>
                  </tr>`;
    // Add another row
    $(`#${tableTBody}`).append(rowStr);
    // Add Id to valuation Ids list
    salesReportItemIds.push(salesItemsNo);
    // Grade name select2 initiation on the new row item
    setGradeNameInput("salesGradeName", `${parentContainer}`);
  }

  // Initiate row addition
  $(document).on("click", ".salesRowAddBtn", function (e) {
    e.preventDefault();
    if ($(this).attr("mode") == "edit") {
      var parentContainer = "editSalesReportModal";
      var tBody = "editSalesTBody";
    } else {
      var parentContainer = "newSalesReportModal";
      var tBody = "salesTBody";
    }
    addSalesRows(tBody, parentContainer);
  });

  // Remove Sales Report rows
  $(document).on("click", ".salesRowRemoveBtn", function (e) {
    e.preventDefault();
    var rowNo = Number($(this).attr("rowNo"));
    var total = Number($(`#salesAmt${rowNo}`).val()); //Removed item amount
    salesReportTotal -= total;
    $(".salesReportTotal").val(salesReportTotal);
    // Remove from the item id list
    var temporaryItemIds = [];
    for (var x = 0; x < salesReportItemIds.length; x++) {
      if (salesReportItemIds[x] != rowNo) {
        temporaryItemIds.push(salesReportItemIds[x]); //Add item in the new array
      }
    }
    salesReportItemIds = temporaryItemIds;
    $(`#salesReportRow${rowNo}`).remove();
  });

  // Change sales report price or quantity
  $(document).on("change", ".salesReportQtyPx", function (e) {
    e.preventDefault();
    var rowNo = $(this).attr("rowNo"); //Item row number changed
    // Reduce sales report total by the removed amount
    const changedAmount = Number($(`#salesAmt${rowNo}`).val());
    var price = Number($(`#salesPx${rowNo}`).val()); //Changed item price
    var qty = Number($(`#salesQty${rowNo}`).val()); //Changed item qty
    var total = Number(price * qty);
    salesReportTotal += total - changedAmount;
    $(`#salesAmt${rowNo}`).val(total);
    $(`.salesReportTotal`).val(salesReportTotal);
  });

  // Save Sales Report
  $(document).on("click", "#saveSalesReportBtn", function (e) {
    e.preventDefault();
    var gradeIds = [];
    var gradeQtys = [];
    var gradePxs = [];
    for (var x = 0; x < salesReportItemIds.length; x++) {
      // Compile data for saving the valuation
      gradeIds.push($(`#salesGrade${salesReportItemIds[x]}`).val());
      gradeQtys.push($(`#salesQty${salesReportItemIds[x]}`).val());
      gradePxs.push($(`#salesPx${salesReportItemIds[x]}`).val());
    }
    $.ajax({
      type: "post",
      url: "/sales/saveSalesReport",
      data: {
        date: $("#newSalesDate").val(),
        buyer: $("#addSalesBuyer").val(),
        ref: $("#newSalesRef").val(),
        moisture: $("#newSalesMC").val(),
        currency: $("#addSalesCurrency").val(),
        fxRate: $("#addSalesFx").val(),
        items: gradeIds,
        quantities: gradeQtys,
        prices: gradePxs,
      },
      dataType: "json",
      success: function (response) {
        $("#newSalesReportModal").modal("hide");
        $("#salesReportsTable").DataTable().ajax.reload();
      },
    });
  });

  // Previewing the
  $(document).on("click", ".salesReportValue", function (e) {
    e.preventDefault();
    salesItemsNo = 0; //Reset number of items to zero
    salesReportItemIds = []; //Clear the row ids
    // clear current items
    $("#editSalesTBody").html("");
    $("#salesTBody").html("");
    const salesId = $(this).attr("sId");
    $("#salesReportEditId").val(salesId);
    // Get sales report infomation
    $.ajax({
      type: "post",
      url: "/saleReport/editData",
      data: {
        sId: salesId,
      },
      dataType: "json",
      success: function (response) {
        // Buyer Details
        var buyerName = `<option value="${response.buyerId}">${response.buyerName}</option>`;
        $("#editSalesReportNo").text(response.reportNo);
        $("#editSalesDate").val(response.salesDate);
        $("#editSalesBuyer").html(buyerName);
        $("#editSalesRef").val(response.ref);
        $("#editSalesMC").val(response.mc);
        $("#editSalesCurrency").val(response.currencyCode);
        $("#editSalesFx").val(response.fxRate);
        var transactionTotal = Number(response.salesTotal);
        $("#editSalesReportTotal").val(transactionTotal);
        salesReportTotal = transactionTotal;
        // Items
        var rowStr = "";
        const items = response.items;
        for (var x = 0; x < items.length; x++) {
          var rowNo = items[x].rowNo;
          if (rowNo == 1) {
            var removeBtn = "";
          } else {
            var removeBtn = `<button rowNo="${rowNo}" type="button" class="btn btn-sm btn-danger salesRowRemoveBtn" title="Remove Item">-</button>`;
          }
          salesReportItemIds.push(rowNo);
          salesItemsNo += 1;
          // Row strings
          rowStr += `<tr rowNo="${rowNo}" id="salesReportRow${rowNo}">
                    <td><input rowNo="${rowNo}" id="salesCode${rowNo}" class="form-control form-control-xs" readonly value="${items[x].code}"></td>
                    <td>
                      <select rowNo="${rowNo}" id="salesGrade${rowNo}" class="form-select form-control form-control-sm salesGradeName" style="width: 300px;">
                        <option value="${items[x].gradeId}">${items[x].gradeName}</option>
                      </select>
                    </td>
                    <td><input type="number" rowNo="${rowNo}" id="salesQty${rowNo}" class="form-control form-control-xs text-end salesReportQtyPx" value="${items[x].qty}" min="0"></td>
                    <td><input rowNo="${rowNo}" id="salesUnit${rowNo}" class="form-control form-control-xs text-center" readonly value="${items[x].unit}"></td>
                    <td><input type="number" rowNo="${rowNo}" id="salesPx${rowNo}" class="form-control form-control-xs text-end salesReportQtyPx" value="${items[x].price}" min="0"></td>
                    <td><input rowNo="${rowNo}" id="salesAmt${rowNo}" class="form-control form-control-xs text-end" value="${items[x].amount}" readonly></td>
                    <td>
                      ${removeBtn}
                    </td>
                  </tr>`;
        }
        $("#editSalesTBody").append(rowStr);
        setGradeNameInput("salesGradeName", "editSalesReportModal");
      },
    });
    $("#editSalesReportModal").modal("show");
  });

  // Saving adjusted saless report
  $(document).on("click", "#saveSalesReportEditBtn", function (e) {
    e.preventDefault();
    var gradeIds = [];
    var gradeQtys = [];
    var gradePxs = [];
    for (var x = 0; x < salesReportItemIds.length; x++) {
      // Compile data for saving the valuation
      gradeIds.push($(`#salesGrade${salesReportItemIds[x]}`).val());
      gradeQtys.push($(`#salesQty${salesReportItemIds[x]}`).val());
      gradePxs.push($(`#salesPx${salesReportItemIds[x]}`).val());
    }

    $.ajax({
      type: "post",
      url: "/salesReport/saveAdjusted",
      data: {
        salesId: $("#salesReportEditId").val(),
        buyer: $("#editSalesBuyer").val(),
        ref: $("#editSalesRef").val(),
        moisture: $("#editSalesMC").val(),
        currency: $("#editSalesCurrency").val(),
        fxRate: $("#editSalesFx").val(),
        items: gradeIds,
        quantities: gradeQtys,
        prices: gradePxs,
      },
      dataType: "json",
      success: function (response) {
        $("#editSalesReportModal").modal("hide");
        $("#salesReportsTable").DataTable().ajax.reload();
      },
    });
  });

  //
});
