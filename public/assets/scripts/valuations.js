$(document).ready(function () {
  //initial date range
  //date range settings
  var startDate = moment().subtract(1, "months").startOf("month");
  var endDate = moment();
  //date range settings
  var dateRangeSettings = {
    startDate: moment().subtract(1, "months").startOf("month"),
    endDate: moment(),
    ranges: {
      Today: [moment(), moment()],
      Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
      "Last 7 Days": [moment().subtract(6, "days"), moment()],
      "Last 30 Days": [moment().subtract(29, "days"), moment()],
      "This Month": [moment().startOf("month"), moment().endOf("month")],
      "This Year": [moment().startOf("year"), moment()],
      "Last Year": [
        moment().subtract(1, "year").startOf("year"),
        moment().subtract(1, "year").endOf("year"),
      ],
      "Custom Range": [null, null],
    },
    alwaysShowCalendars: true,
    locale: {
      format: "MM/DD/YYYY",
    },
  };
  // Grade groups options.
  function gradeGroupsOptions(selectId) {
    $.ajax({
      type: "post",
      url: "/grades/groupsList",
      data: "data",
      dataType: "json",
      success: function (response) {
        const catList = response.groupsList;
        var options = "<option value='0'>Groups</option>";
        for (var x = 0; x < catList.length; x++) {
          options += `<option value="${catList[x].group_id}">${catList[x].group_name}</option>`;
        }
        $(`#${selectId}`).html(options);
      },
    });
  }

  // New valuation
  $(document).on("click", "#addValuationBtn", function (e) {
    e.preventDefault();
    valuationTotal = 0; //Reset total
    $(".valuationTotal").val(valuationTotal);
    $("#editValTBody").html("");
    numberOfRows = 0; // Rest number of rows
    numberOfRows += 1; //Increment by 1
    valuationItemIds.push(numberOfRows);
    $("#valTBody").html(`
      <tr rowNo="1" id="valrow1">
        <td><input rowNo="1" id="valCode1" class="form-control form-control-xs" readonly></td>
        <td>
          <select rowNo="1" id="valGrade1" class="form-select form-control form-control-sm valGradeName" style="width: 300px;">
          </select>
        </td>
        <td><input type="number" rowNo="1" id="valQty1" class="form-control form-control-xs text-end valuationQtyPx" value="1" min="0"></td>
        <td><input rowNo="1" id="valUnit1" class="form-control form-control-xs text-center" readonly></td>
        <td><input type="number" rowNo="1" id="valPx1" class="form-control form-control-xs text-end valuationQtyPx" value="0" min="0"></td>
        <td><input rowNo="1" id="valAmt1" class="form-control form-control-xs text-end" value="0" readonly></td>
      </tr>
      `);
    searchSupplier("addDeliverySupplier", "newValuationModal");
    searchGrade("valGradeName", "newValuationModal");
    $("#newValuationModal").modal("show");
  });

  // Add new valuation rows
  var numberOfRows = 0;
  var valuationTotal = 0;
  var valuationItemIds = []; //Store item ids in key-value pairs
  function addValuationRow(tBody, parentModal) {
    numberOfRows += 1; //Increment by 1
    var rowStr = `<tr rowNo="${numberOfRows}" id="valRow${numberOfRows}">
                      <td><input rowNo="${numberOfRows}" id="valCode${numberOfRows}" class="form-control form-control-xs" readonly></td>
                      <td>
                        <select rowNo="${numberOfRows}" id="valGrade${numberOfRows}" class="form-select form-control form-control-sm valGradeName" style="width: 300px;">
                        </select>
                      </td>
                      <td><input type="number" rowNo="${numberOfRows}" id="valQty${numberOfRows}" class="form-control form-control-xs text-end valuationQtyPx" value="1" min="0"></td>
                      <td><input rowNo="${numberOfRows}" id="valUnit${numberOfRows}" class="form-control form-control-xs text-center" readonly></td>
                      <td><input type="number" rowNo="${numberOfRows}" id="valPx${numberOfRows}" class="form-control form-control-xs text-end valuationQtyPx" value="0" min="0"></td>
                      <td><input rowNo="${numberOfRows}" id="valAmt${numberOfRows}" class="form-control form-control-xs text-end" value="0" readonly></td>
                      <td>
                        <button rowNo="${numberOfRows}" type="button" class="btn btn-sm btn-danger rowRemoveBtn" title="Remove Row">-</button>
                      </td>
                    </tr>`;
    // Add another row
    $(`#${tBody}`).append(rowStr);
    // Add Id to valuation Ids list
    valuationItemIds.push(numberOfRows);
    searchGrade("valGradeName", `${parentModal}`);
  }
  //
  $(document).on("click", ".valRowAddBtn", function (e) {
    e.preventDefault();
    var mode = $(this).attr("mode");
    if (mode == "new") {
      var tBody = "valTBody";
      var parentModal = "newValuationModal";
    }
    if (mode == "edit") {
      var tBody = "editValTBody";
      var parentModal = "editValuationModal";
    }
    addValuationRow(tBody, parentModal);
  });

  // Remove valuation rows
  $(document).on("click", ".rowRemoveBtn", function (e) {
    var rowNo = Number($(this).attr("rowNo"));
    var total = Number($(`#valAmt${rowNo}`).val()); //Removed item total
    valuationTotal -= total;
    $(`#valRow${rowNo}`).remove();
    $(".valuationTotal").val(valuationTotal);
    // Remove from the item id list
    var temporaryItemIds = [];
    var removedItem = rowNo;
    for (var x = 0; x < valuationItemIds.length; x++) {
      if (valuationItemIds[x] != removedItem) {
        temporaryItemIds.push(valuationItemIds[x]); //Add item in the new array
      }
    }
    valuationItemIds = temporaryItemIds;
  });

  //date range filtering
  $("#date_range_filter").daterangepicker(
    dateRangeSettings,
    function (start, end) {
      $("#date_range_filter").val(
        start.format("MM/DD/YYYY") + " ~ " + end.format("MM/DD/YYYY")
      );
      // table.ajax.reload();
      valuationReportslist(
        start.format("YYYY-MM-DD"),
        end.format("YYYY-MM-DD")
      );
    }
  );
  $("#date_range_filter").on("cancel.daterangepicker", function (ev, picker) {
    $("#date_range_filter").val("");
    //table.ajax.reload();
  });
  // Set the initial date range filter value
  $("#date_range_filter").val(
    startDate.format("MM/DD/YYYY") + " ~ " + endDate.format("MM/DD/YYYY")
  );

  // Call the function with the initial date range
  valuationReportslist(
    startDate.format("YYYY-MM-DD"),
    endDate.format("YYYY-MM-DD")
  );

  //Get deliveries
  function valuationReportslist(start, end) {
    var exportTitle = "Valuations Summary";
    $("#valuationsTable").DataTable({
      destroy: true,
      ajax: {
        method: "post",
        url: "/suppliers/deliveryValuations",
        data: {
          fromDate: start,
          toDate: end,
          summary: true,
          supplier: "",
        },
        dataSrc: "deliveries",
      },
      columns: [
        { data: "trans_date" },
        { data: "name" },
        { data: "grn" },
        { data: "moisture" },
        {
          render: function (data, type, row, meta) {
            var qty = Number(row.qty);
            return `<label class="tableAmount" style="text-align: end;">
            ${qty.toLocaleString()}
            </label>`;
          },
        },
        {
          render: function (data, type, row, meta) {
            var value = Number(row.value);
            return `<label vId="${
              row.vId
            }" class="tableAmount valuationValue" style="text-align: end;" title="Click to view details">
            ${value.toLocaleString()}
            </label>`;
          },
        },
      ],
      dom: "Bfrtip", // Specify the placement of buttons
      buttons: [
        {
          extend: "csvHtml5",
          title: exportTitle,
          text: "Export CSV",
          titleAttr: "Export CSV",
        },
        {
          extend: "excelHtml5",
          title: exportTitle,
          text: "Export Excel",
          titleAttr: "Export Excel",
        },
        {
          extend: "pdfHtml5",
          title: exportTitle,
          text: "Export PDF",
          titleAttr: "Export PDF",
        },
      ],
    });
  }

  //   Save Category
  $(document).on("click", "#saveCategoryBtn", function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "/coffee/addCategory",
      data: {
        coffeeType: $("#addCatCoffeeType").val(),
        categoryName: $("#addCatName").val(),
      },
      dataType: "json",
      success: function (response) {
        var sms = response.sms;
        $("#gradeCategoriesTable").DataTable().ajax.reload();
        $("#addCategoryModal").modal("hide");
      },
    });
  });

  // Selecting supplier
  function searchSupplier(inputId, parentContainer) {
    $(`#${inputId}`).select2({
      dropdownParent: $(`#${parentContainer}`),
      ajax: {
        delay: 250,
        url: "/suppliers/list",
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

  //select supplier
  // $("#addDeliverySupplier").select2({
  //   dropdownParent: $("#newValuationModal"),
  //   ajax: {
  //     delay: 250,
  //     url: "/suppliers/list",
  //     data: function (params) {
  //       var query = {
  //         search: params.term,
  //       };
  //       return query;
  //     },
  //     dataType: "json",
  //     placeholder: "Search for supplier",
  //     minimumInputLength: 3,
  //   },
  // });

  // Grade name selection
  function searchGrade(inputClass, parentContainer) {
    $(`.${inputClass}`).select2({
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
  // $(".valGradeName").select2({
  //   dropdownParent: $("#newValuationModal"),
  //   ajax: {
  //     delay: 250,
  //     url: "/grades/search",
  //     data: function (params) {
  //       var query = {
  //         search: params.term,
  //       };
  //       return query;
  //     },
  //     dataType: "json",
  //     placeholder: "Select Grade",
  //     minimumInputLength: 3,
  //   },
  // });

  // Selected grade details
  $(document).on("change", ".valGradeName", function (e) {
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
        $(`#valCode${rowNo}`).val(grade.grade_code);
        $(`#valUnit${rowNo}`).val(grade.unit);
      },
    });
  });

  // Change valuation price or quantity
  $(document).on("change", ".valuationQtyPx", function (e) {
    e.preventDefault();
    var rowNo = $(this).attr("rowNo"); //Item row number changed
    var price = Number($(`#valPx${rowNo}`).val()); //Changed item price
    var qty = Number($(`#valQty${rowNo}`).val()); //Changed item qty
    var total = Number(price * qty);
    valuationTotal += total;
    $(`#valAmt${rowNo}`).val(total);
    $(".valuationTotal").val(valuationTotal);
  });

  // Save Valuation
  $(document).on("click", "#saveValuationBtn", function (e) {
    e.preventDefault();
    var gradeIds = [];
    var gradeQtys = [];
    var gradePxs = [];
    for (var x = 0; x < valuationItemIds.length; x++) {
      // Compile data for saving the valuation
      gradeIds.push($(`#valGrade${valuationItemIds[x]}`).val());
      gradeQtys.push($(`#valQty${valuationItemIds[x]}`).val());
      gradePxs.push($(`#valPx${valuationItemIds[x]}`).val());
    }
    $.ajax({
      type: "post",
      url: "/delivery/saveValuation",
      data: {
        date: $("#newValuationDate").val(),
        supplier: $("#addDeliverySupplier").val(),
        grn: $("#newValuationGrn").val(),
        moisture: $("#newValuationMc").val(),
        items: gradeIds,
        quantities: gradeQtys,
        prices: gradePxs,
      },
      dataType: "json",
      success: function (response) {
        $("#newValuationModal").modal("hide");
      },
    });
  });

  // Preview valuation
  var valuationPreviewDetails = [];
  $(document).on("click", ".valuationValue", function (e) {
    const vId = $(this).attr("vId"); //Valuation Id
    // Get valuation details
    $.ajax({
      type: "post",
      url: "/valuation/preview",
      data: {
        vId: vId,
      },
      dataType: "json",
      success: function (response) {
        valuationPreviewDetails = response;
        const items = response.items;
        const summary = response.summary;
        // Update Summary
        $("#valPrevDate").val(summary.date);
        $("#valPrevSupplier").val(summary.supplier);
        $("#valPrevGrn").val(summary.grn);
        $("#valPrevMc").val(summary.moisture);
        $("#valPrevGrn").val(items[0].grn);
        $("#valuationPreviewModal").modal("show");
        // Upadte Valuation items
        var gradeItemsHtml = "";
        var valTotal = 0;
        for (var x = 0; x < items.length; x++) {
          var price = Number(items[x].price);
          var qty = Number(items[x].qty);
          var amount = price * qty;
          valTotal += amount;
          gradeItemsHtml += `<tr>
            <td>${items[x].grade_code}</td>
            <td>${items[x].grade_name}</td>
            <td style="text-align: right">${qty.toLocaleString()}</td>
            <td style="text-align: center">${items[x].unit}</td>
            <td style="text-align: right">${price.toLocaleString()}</td>
            <td style="text-align: right">${amount.toLocaleString()}</td>
          </tr>`;
        }
        $("#valPrevTotal").html(
          `<strong>${valTotal.toLocaleString()}</strong>`
        );
        $("#valPrevTBody").html(gradeItemsHtml);
      },
    });
  });

  // Edit valuation schedule
  $(document).on("click", "#valuationEditBtn", function (e) {
    e.preventDefault();
    $("#editValTotal").val(0); //Reset total
    var confrmEdit = confirm("Click OK to confirm this valuation editing:");
    if (confrmEdit) {
      $("#valTBody").html("");
      numberOfRows = 0;
      const valDetails = valuationPreviewDetails; // Current valuation details
      const items = valDetails.items;
      const summary = valDetails.summary;
      // Current details
      $("#editValuationDate").val(summary.date);
      $("#editDeliverySupplier").val(summary.supplier);
      $("#editValuationGrn").val(summary.grn);
      $("#editValuationMc").val(summary.moisture);
      $("#valPrevGrn").val(items[0].grn);
      // Current Items
      // Upadte Valuation items
      var gradeItemsHtml = "";
      var valTotal = 0;
      for (var x = 0; x < items.length; x++) {
        numberOfRows += 1; //item rows incremented by 1
        var rowNo = x + 1;
        var price = Number(items[x].price);
        var qty = Number(items[x].qty);
        var amount = price * qty;
        valTotal += amount;
        if (rowNo == 1) {
          var removeBtn = "";
        } else {
          var removeBtn = `<td>
                        <button rowNo="${rowNo}" type="button" class="btn btn-sm btn-danger rowRemoveBtn" title="Remove Row">-</button>
                      </td>`;
        }
        gradeItemsHtml += `<tr rowNo="${rowNo}" id="valRow${rowNo}">
          <td><input rowNo="${rowNo}" id="valCode${rowNo}" value="${items[x].grade_code}" class="form-control form-control-xs" readonly></td>
          <td>
            <select rowNo="${rowNo}" id="valGrade${rowNo}" class="form-select form-control form-control-sm valGradeName" style="width: 300px;">
              <option value="${items[x].grade_id}">${items[x].grade_name}</option>
            </select>
          </td>
          <td><input type="number" rowNo="${rowNo}" id="valQty${rowNo}" class="form-control form-control-xs text-end valuationQtyPx" value="${qty}" min="0"></td>
          <td><input rowNo="${rowNo}" id="valUnit${rowNo}" value="${items[x].unit}" class="form-control form-control-xs text-center" readonly></td>
          <td><input type="number" rowNo="${rowNo}" id="valPx${rowNo}" class="form-control form-control-xs text-end valuationQtyPx" value="${price}" min="0"></td>
          <td><input rowNo="${rowNo}" id="valAmt${rowNo}" class="form-control form-control-xs text-end" value="${amount}" readonly></td>
          ${removeBtn}
        </tr>`;
        valuationItemIds.push(rowNo);
      }
      valuationTotal += valTotal;
      $("#editValTBody").html(gradeItemsHtml);
      $("#editValTotal").val(valuationTotal);
      searchGrade("valGradeName", "editValuationModal");
      $("#valuationPreviewModal").modal("hide");
      $("#editValuationModal").modal("show");
    }
  });

  //
});
