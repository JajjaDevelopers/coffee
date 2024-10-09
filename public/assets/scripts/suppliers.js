$(document).ready(function () {
  //date range settings
  var dateRangeSettings = {
    startDate: moment().subtract(6, "days"),
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

  // New delivery
  $(document).on("click", ".addDeliveryBtn", function (e) {
    $("#newDeliveryModal").modal("show");
  });

  // Add new valuation rows
  var numberOfRows = 1;
  var valuationTotal = 0;
  var valuationItemIds = [1]; //Store item ids in key-value pairs
  $(document).on("click", "#valRowAddBtn", function (e) {
    e.preventDefault();
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
                      <button rowNo="${numberOfRows}" type="button" id="valAmt${numberOfRows}" class="btn btn-sm btn-danger rowRemoveBtn" title="Remove Row">-</button>
                    </td>
                  </tr>`;
    // Add another row
    $("#valTBody").append(rowStr);

    // Add Id to valuation Ids list
    valuationItemIds.push(numberOfRows);

    // Grade name select2 initiation on the new row item
    $(".valGradeName").select2({
      dropdownParent: $("#newDeliveryModal"),
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

  // Remove valuation rows
  $(document).on("click", ".rowRemoveBtn", function (e) {
    var rowNo = Number($(this).attr("rowNo"));
    var total = Number($(`#valAmt${rowNo}`).val()); //Removed item total
    valuationTotal -= total;
    $(`#valRow${rowNo}`).remove();
    $("#valTotal").val(valuationTotal);
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
    }
  );
  $("#date_range_filter").on("cancel.daterangepicker", function (ev, picker) {
    $("#date_range_filter").val("");
    //table.ajax.reload();
  });

  //Get deliveries
  function valuationReportslist() {
    $("#valuationsTable").DataTable({
      destroy: true,
      ajax: {
        method: "post",
        url: "/suppliers/deliveryValuations",
        data: {
          fromDate: $("#fromDate").val(),
          toDate: $("#toDate").val(),
          supplier: "all",
        },
        dataSrc: "deliveries",
      },
      columns: [
        { data: "trans_date" },
        { data: "grn" },
        { data: "name" },
        { data: "grade_name" },
        { data: "moisture" },
        { data: "qty" },
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

  // Getting recent deliveries
  $(document).on("click", "#deliveriesGetBtn", function (e) {
    e.preventDefault();
    // alert($("#fromDate").val());
    // return;
    valuationReportslist(); //Get Categories on load
    // $("#deliveriesTable").DataTable().ajax.reload();
  });

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

  // Adding supplier
  $(document).on("click", "#addSupplierBtn", function (e) {
    e.preventDefault();
    // gradeCategoryOptions("addGradeCategory");
    gradeGroupsOptions("addGradeGroup");
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
        { data: "name" },
        { data: "district" },
        { data: "category_name" },
        { data: "contact_person" },
        { data: "telephone_1" },
        {
          render: function (data, type, row, meta) {
            return `<button type="button" title='Receipt Preview' id="viewBtn" class="btn btn-sm btn-info">
                        <i class="la la-eye"></i>
                    </button>`;
          },
        },
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
        $("#suppliersListTable").DataTable().ajax.reload();
        $("#addSupplierModal").modal("hide");
      },
    });
  });

  //select supplier
  $("#addDeliverySupplier").select2({
    dropdownParent: $("#newDeliveryModal"),
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

  // Grade name select2
  $(".valGradeName").select2({
    dropdownParent: $("#newDeliveryModal"),
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
    $("#valTotal").val(valuationTotal);
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
        $("#newDeliveryModal").modal("hide");
      },
    });
  });

  //
});
