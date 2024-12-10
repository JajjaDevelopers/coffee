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
  // setSalesBuyerInput("editSalesBuyer", "editSalesReportModal"); //Buyer on editing of sales report

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
          buyer: "",
        },
        dataSrc: "salesReports",
      },
      columns: [
        { data: "trans_date" },
        { data: "sales_report_no" },
        { data: "name" },
        { data: "contract" },
        {
          render: function (data, type, row, meta) {
            var value = Number(row.qty);
            return `<label class="tableAmount" style="text-align: end;">
            ${value.toLocaleString()}
            </label>`;
          },
        },
        {
          render: function (data, type, row, meta) {
            var value = Number(row.value);
            var currency = row.currency;
            return `<label sId="${
              row.sales_id
            }" class="salesReportValue tableAmount" style="text-align: end; color: blue"> ${
              currency + " " + value.toLocaleString()
            }
            </label>`;
          },
        },
        // Action
        // {
        //   render: function (data, type, row, meta) {
        //     var value = Number(row.value);
        //     var currency = row.currency;
        //     return `
        //     <a href="#" sId="${row.sales_id}" class="icon-btn-primary salesReportValue" title="Check Details">
        //       <i class="la la-eye" style="font-size: 24px"></i>
        //     </a>
        //     <a href="#" sId="${row.sales_id}" class="icon-btn-primary editSalesReport" title="Edit">
        //       <i class="la la-pencil" style="font-size: 24px"></i>
        //     </a>`;
        //   },
        // },
      ],
    });
  }
  salesReportsList();

  // Check Currency for exchange rate setting
  function activateFxRate(clientCurrency, fxInputId) {
    if (clientCurrency == "1") {
      //No exchange rate is required if the buyer currency is the same as base currency
      $(`#${fxInputId}`).attr("readonly", "readonly");
    } else {
      $(`#${fxInputId}`).removeAttr("readonly");
    }
  }

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
        var buyerInfo = response.buyersList[0];
        var buyerCurrency = buyerInfo.currency_id;
        activateFxRate(buyerCurrency, "addSalesFx");
        $(`#addSalesFx`).val(1);
        $("#addSalesCurrency").val(buyerInfo.curency_code);
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

  // Add new buyer
  $(document).on("click", ".addBuyerBtn", function (e) {
    e.preventDefault();
    $("#addBuyerModal").modal("show");
  });

  // Add new Sales Report
  $(document).on("click", ".addSalesReportBtn", function (e) {
    e.preventDefault();
    salesReportItemIds = []; //Empty item Ids array
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
  var salesReportItemIds = []; //Store item row numbers for sales report
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
        salesReportNo: $("#addSalesNo").val(),
        date: $("#newSalesDate").val(),
        buyer: $("#addSalesBuyer").val(),
        ref: $("#newSalesRef").val(),
        moisture: $("#newSalesMC").val(),
        currency: $("#addSalesCurrency").val(),
        fxRate: $("#addSalesFx").val(),
        market: $("#addSalesMarket").val(),
        contract: $("#addSalesContract").val(),
        items: gradeIds,
        quantities: gradeQtys,
        prices: gradePxs,
      },
      dataType: "json",
      success: function (response) {
        var sms = response.status;
        if (sms == "Success") {
          $("#newSalesReportModal").modal("hide");
          toastr.success("Report Added!");
          $("#salesReportsTable").DataTable().ajax.reload();
        } else {
          toastr.error("Something went wrong!");
        }
      },
      error: function (xhr) {
        toastr.error(xhr.responseJSON.error);
      },
    });
  });

  // Previewing the
  var salesReportPreviewData = [];
  $(document).on("click", ".salesReportValue", function (e) {
    e.preventDefault();
    salesItemsNo = 0; //Reset number of items to zero
    salesReportItemIds = []; //Clear the row ids
    // clear current items
    $("#previewSalesTBody").html("");
    $("#salesTBody").html("");
    const salesId = $(this).attr("sId");
    $("#salesReportEditId").val(salesId);

    //attach salesreport id to the print button
    $('#salesReportPrintBtn').attr('href',`/sales/report/${salesId}`)
    // Get sales report infomation
    $.ajax({
      type: "post",
      url: "/saleReport/editData",
      data: {
        sId: salesId,
      },
      dataType: "json",
      success: function (response) {
        // Set sales report preview data
        salesReportPreviewData = response;
        // Buyer Details
        $("#previewSalesReportNo").text(response.reportNo);
        $("#previewSalesDate").val(response.salesDate);
        $("#previewSalesBuyer").val(response.buyerName);
        $("#previewSalesRef").val(response.ref);
        $("#previewSalesMC").val(response.mc);
        $("#previewSalesCurrency").val(response.currencyCode);
        $("#previewSalesFx").val(response.fxRate);
        $("#previewSalesMarket").val(response.market);
        $("#previewSalesContract").val(response.contract);
        var transactionTotal = Number(response.salesTotal);
        $("#previewSalesReportTotal").text(transactionTotal.toLocaleString());
        salesReportTotal = transactionTotal;
        // Items
        var rowStr = "";
        const items = response.items;
        for (var x = 0; x < items.length; x++) {
          var rowNo = items[x].rowNo;
          salesReportItemIds.push(rowNo);
          salesItemsNo += 1;
          var qty = Number(items[x].qty);
          var px = Number(items[x].price);
          var amt = Number(items[x].amount);
          // Row strings
          rowStr += `<tr rowNo="${rowNo}" id="editSalesReportRow${rowNo}">
                    <td>${items[x].code}</td>
                    <td>${items[x].gradeName}</td>
                    <td class="tableAmount">${qty.toLocaleString()}</td>
                    <td>${items[x].unit}</td>
                    <td class="tableAmount">${px.toLocaleString()}</td>
                    <td class="tableAmount">${amt.toLocaleString()}</td>
                  </tr>`;
        }
        $("#previewSalesTBody").append(rowStr);
        // setGradeNameInput("salesGradeName", "editSalesReportModal");
        // Sales Id in for adjusting
        $("#salesReportEditBtn").attr("salesId", salesId);
        $("#previewSalesReportModal").modal("show");
      },
    });
  });

  // // Adjusting the sales report

  // Open Sales Report Editing
  $(document).on("click", "#salesReportEditBtn", function (e) {
    e.preventDefault();
    var confirmEdit = confirm(
      "Are you sure you want to edit this sales report? Click 'OK' to proceed..."
    );
    if (confirmEdit) {
      salesReportItemIds = []; //Empty item Ids array
      // Get sales report details
      const salesId = $("#salesReportEditBtn").attr("salesId");
      salesItemsNo = 0;
      var sr = salesReportPreviewData;
      console.log(sr);
      // summary info
      $("#editSalesNo").val(sr.reportNo);
      $("#editSalesDate").val(sr.salesDate);
      $("#editSalesBuyer").val(sr.buyerName);
      $("#editSalesRef").val(sr.ref);
      $("#editSalesMC").val(sr.mc);
      $("#editSalesCurrency").val(sr.currencyCode);
      $("#editSalesFx").val(sr.fxRate);
      $("#editSalesMarket").val(sr.market);
      // determine need for fx rate
      var clientCurrency = sr.currencyId;
      activateFxRate(clientCurrency, "editSalesFx");
      // Items info
      var rowStr = "";
      const items = sr.items;
      var editTotal = 0;
      for (var x = 0; x < items.length; x++) {
        var rowNo = items[x].rowNo;
        salesReportItemIds.push(rowNo);
        var qty = Number(items[x].qty);
        var px = Number(items[x].price);
        var amt = Number(items[x].amount);
        editTotal += amt;
        var grdId = items[x].gradeId;
        var grdName = items[x].gradeName;
        var grdCode = items[x].code;
        var unit = items[x].unit;
        // Row strings
        salesItemsNo += 1; //Increment by 1
        if (rowNo == 1) {
          var rowRemoveBtn = "";
        } else {
          var rowRemoveBtn = `<input rowNo="${salesItemsNo}" type="button" value="-" class="form-control form-control-sm btn-danger salesRowRemoveBtn" title="Remove Item">`;
        }
        rowStr += `<tr rowNo="${salesItemsNo}" id="salesReportRow${salesItemsNo}">
                    <td><input rowNo="${salesItemsNo}" id="salesCode${salesItemsNo}" value="${grdCode}" class="form-control form-control-xs" readonly></td>
                    <td>
                      <select rowNo="${salesItemsNo}" id="salesGrade${salesItemsNo}" class="form-select form-control form-control-sm salesGradeName" style="width: 300px;">
                      <option value="${grdId}">${grdName}</option>
                      </select>
                    </td>
                    <td><input type="number" rowNo="${salesItemsNo}" id="salesQty${salesItemsNo}" value="${qty}" class="form-control form-control-xs text-end salesReportQtyPx" min="0"></td>
                    <td><input rowNo="${salesItemsNo}" id="salesUnit${salesItemsNo}" value="${unit}" class="form-control form-control-xs text-center" readonly></td>
                    <td><input type="number" rowNo="${salesItemsNo}" id="salesPx${salesItemsNo}" value="${px}" class="form-control form-control-xs text-end salesReportQtyPx" value="0" min="0"></td>
                    <td><input rowNo="${salesItemsNo}" id="salesAmt${salesItemsNo}" value="${amt}" class="form-control form-control-xs text-end" value="0" readonly></td>
                    <td>${rowRemoveBtn}</td>
                  </tr>`;
      }
      //
      $("#editSalesTBody").html(rowStr);
      setGradeNameInput("salesGradeName", "editSalesReportModal");
      $("#previewSalesReportModal").modal("hide");
      $("#editSalesReportModal").modal("show");
      $("#editSalesReportTotal").val(editTotal);
    }
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
    //
    $.ajax({
      type: "post",
      url: "/salesReport/saveAdjusted",
      data: {
        salesId: $("#salesReportEditId").val(),
        salesNo: $("#editSalesNo").val(),
        buyer: $("#editSalesBuyer").val(),
        market: $("#editSalesMarket").val(),
        contractNature: $("#editSalesContract").val(),
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
        if (response.sms == "Success") {
          $("#editSalesReportModal").modal("hide");
          toastr.success("Sales Report Updated!");
          $("#salesReportsTable").DataTable().ajax.reload();
        } else {
          toastr.error("Something went wrong");
        }
      },
      error: function (xhr) {
        toastr.error(xhr.responseJSON.error);
      },
    });
  });

  // Adjusting buyer details
  $(document).on("click", ".buyerName", function (e) {
    e.preventDefault();
    $("#editBuyerModal").modal("show");
  });
  //
});
