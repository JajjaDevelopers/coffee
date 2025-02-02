$(document).ready(function () {
  // SUpplier Search
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
  // Change truck size
  $(document).on("change", "#addGrnVSize", function (e) {
    e.preventDefault();
    var size = $(this).val();
    if (size == 1) {
      fees = 10000;
    } else if (size == 2) {
      fees = 20000;
    } else if (size == 3) {
      fees = 30000;
    } else {
      fees = 0;
    }
    $("#addGrnWeighFees").val(fees);
  });

  // Grade groups options
  function getGrns() {
    $("#gradesListTable").DataTable({
      destroy: true,
      ajax: {
        method: "post",
        url: "/grades/gradesList",
        data: {},
        dataSrc: "gradesList",
      },
      columns: [
        { data: "grade_code" },
        { data: "grade_name" },
        { data: "group_name" },
        { data: "balance" },
        { data: "unit" },
        {
          render: function (data, type, row, meta) {
            return `<button type="button" title='Grade Preview' class="btn-sm btn-success gradePreviewBtn" btn-action"
                      gradePrevId="${row.grade_id}">
                        <i class="fas fa-eye"></i>
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
  getGrns();

  // Add new GRN
  $(document).on("click", "#addGrnBtn", function (e) {
    e.preventDefault();
    $("#addGrnModal").modal("show");
    setGradeNameInput("grnItemField", "addGrnModal");
    searchSupplier("addGrnSupplier", "addGrnModal");
  });

  // Save new GRN
  $(document).on("click", "#saveNewGrnBtn", function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "/grn/new",
      data: {
        grnNo: $("#addGrnNo").val(),
        date: $("#addGrnDate").val(),
        supplier: $("#addGrnSupplier").val(),
        item: $("#addGrnItem").val(),
        qty: $("#addGrnQty").val(),
        bags: $("#addGrnBags").val(),
        purpose: $("#addGrnPurpose").val(),
        origin: $("#addGrnOrigin").val(),
        vehicleNo: $("#addGrnVNo").val(),
        vehicleSize: $("#addGrnVSize").val(),
        weighingFees: $("#addGrnWeighFees").val(),
        deliveredBy: $("#addGrnDeliveredBy").val(),
        ticketNo: $("#addGrnTicket").val(),
        remarks: $("#addGrnRemarks").val(),
      },
      dataType: "json",
      success: function (response) {
        $("#addGrnModal").modal("hide");
        $("#grnsListTable").DataTable().ajax.reload();
      },
    });
  });

  // Get grn list
  function grnsList() {
    $("#grnsListTable").DataTable({
      destroy: true,
      order: [[0, "des"]],
      ajax: {
        method: "post",
        url: "/grns/list",
        data: {
          startDate: "",
          endDate: "",
          supplier: "",
        },
        dataSrc: "grns",
      },
      columns: [
        {
          render: function (data, type, row, meta) {
            var status = row.status;
            if (status == 1) {
              color = "red";
            } else {
              color = "";
            }
            return `<label style="color: ${color}">
          ${row.trans_date}
          </label>`;
          },
        },
        {
          render: function (data, type, row, meta) {
            var status = row.status;
            if (status == 1) {
              color = "red";
            } else {
              color = "";
            }
            return `<label style="color: ${color}">
          ${row.name}
          </label>`;
          },
        },
        {
          render: function (data, type, row, meta) {
            var status = row.status;
            if (status == 1) {
              color = "red";
            } else {
              color = "";
            }
            return `<label style="color: ${color}">
          ${row.grn_no}
          </label>`;
          },
        },
        {
          render: function (data, type, row, meta) {
            var status = row.status;
            if (status == 1) {
              color = "red";
            } else {
              color = "";
            }
            return `<label style="color: ${color}">
          ${row.reg_no}
          </label>`;
          },
        },
        {
          render: function (data, type, row, meta) {
            var status = row.status;
            if (status == 1) {
              color = "red";
            } else {
              color = "";
            }
            return `<label style="color: ${color}">
          ${row.item}
          </label>`;
          },
        },
        {
          render: function (data, type, row, meta) {
            var status = row.status;
            var value = Number(row.qty);
            return `<label grnNo="${
              row.grn_id
            }" class="tableAmount grnListQty" style="text-align: end; color: blue">
            ${value.toLocaleString()}
            </label>`;
          },
        },
      ],
    });
  }
  grnsList();

  // Preview GRN
  $(document).on("click", ".grnListQty", function (e) {
    e.preventDefault();
    var grnId = $(this).attr("grnNo");
    $.ajax({
      type: "post",
      url: "/grn/details",
      data: {
        grn: grnId,
      },
      dataType: "json",
      success: function (response) {
        var grn = response.grnDetails;
        $("#prevGrnNo").val(grn.grn_no);
        $("#prevGrnDate").val(grn.trans_date);
        $("#prevGrnSupplier").val(grn.name);
        $("#prevGrnItmCode").val(grn.grade_code);
        $("#prevGrnItem").val(grn.item);
        $("#prevGrnQty").val(grn.qty);
        $("#prevGrnBags").val(grn.bags);
        $("#prevGrnPurpose").val(grn.purpose);
        $("#prevGrnOrigin").val(grn.items_origin);
        $("#prevGrnVNo").val(grn.reg_no);
        $("#prevGrnVSize").val(grn.vehicle_size);
        $("#prevGrnWeighFees").val(grn.weighing_fees);
        $("#prevGrnDeliveredBy").val(grn.delivered_by);
        $("#prevGrnTicket").val(grn.wb_ticket_no);
        $("#prevGrnRemarks").val(grn.remarks);
        $("#previewGrnModal").modal("show");
      },
    });
  });

  //
});
