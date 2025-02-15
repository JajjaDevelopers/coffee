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

  // GRNs destined for roastery
  function getRoasteryGrns() {
    $("#roasteryGrnsTable").DataTable({
      destroy: true,
      ordering: false,
      ajax: {
        method: "post",
        url: "/roastery/grns",
        data: {},
        dataSrc: "grnsList",
      },
      columns: [
        { data: "date" },
        { data: "name" },
        { data: "book_no" },
        { data: "grn_no" },
        { data: "item" },
        {
          render: function (data, type, row, meta) {
            return `<label style="color: blue">
            ${row.qty_in}
          </label>`;
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
  getRoasteryGrns();

  // Add new GRN
  $(document).on("click", "#addRoasteryGrnBtn", function (e) {
    e.preventDefault();
    searchSupplier("addRoasteryGrnSupplier", "addRoasteryGrnModal");
    $("#addRoasteryGrnModal").modal("show");
    setGradeNameInput("grnItemField", "addGrnModal");
    searchSupplier("addGrnSupplier", "addGrnModal");
  });

  // // Save new GRN
  $(document).on("click", "#saveNewRoasteryGrnBtn", function (e) {
    e.preventDefault();
    var confirmSave = confirm("Click OK to confirm Saving the GRN!");
    if (!confirmSave) {
      return;
    }
    $.ajax({
      type: "post",
      url: "/roastery/saveGrn",
      data: {
        bookNo: $("#addRoasteryBookNo").val(),
        grn: $("#addRoasteryGrnNo").val(),
        date: $("#addRoasteryGrnDate").val(),
        moisture: $("#addRoasteryMoisture").val(),
        remarks: $("#addRoasteryGrnRemarks").val(),
      },
      dataType: "json",
      success: function (response) {
        $("#addRoasteryGrnModal").modal("hide");
        $("#roasteryGrnsTable").DataTable().ajax.reload();
      },
    });
  });

  // Get available GRNs
  $(document).on("change", "#addRoasteryGrnSupplier", function (e) {
    var customer = $(this).val();
    $.ajax({
      type: "post",
      url: "/roastery/availableRoasteryGrns",
      data: {
        customer: customer,
      },
      dataType: "json",
      success: function (response) {
        var grns = response.grns;
        var grnList = `<option value="">--select--</option>`;
        var grnCount = grns.length;
        if (grnCount == 0) {
          grnList = `<option value="">--No GRN--</option>`;
        } else {
          for (var x = 0; x < grnCount; x++) {
            grnList += `<option value="${grns[x].grn_id}">${grns[x].grn_no}</option>`;
          }
        }
        $("#addRoasteryGrnNo").html(grnList);
      },
    });
  });

  // GRN details
  $(document).on("change", "#addRoasteryGrnNo", function (e) {
    var selectedGrn = $(this).val();
    $.ajax({
      type: "post",
      url: "/grn/details",
      data: { grn: selectedGrn },
      dataType: "json",
      success: function (response) {
        var grn = response.grnDetails;
        $("#addRoasteryGrnItmCode").val(grn.grade_code);
        $("#addRoasteryGrnItem").val(grn.item);
        $("#addRoasteryGrnQty").val(grn.qty);
      },
    });
  });

  // // Get grn list
  // function grnsList() {
  //   $("#grnsListTable").DataTable({
  //     destroy: true,
  //     order: [[0, "des"]],
  //     ajax: {
  //       method: "post",
  //       url: "/grns/list",
  //       data: {
  //         startDate: "",
  //         endDate: "",
  //         supplier: "",
  //       },
  //       dataSrc: "grns",
  //     },
  //     columns: [
  //       {
  //         render: function (data, type, row, meta) {
  //           var status = row.status;
  //           if (status == 1) {
  //             color = "red";
  //           } else {
  //             color = "";
  //           }
  //           return `<label style="color: ${color}">
  //         ${row.trans_date}
  //         </label>`;
  //         },
  //       },
  //       {
  //         render: function (data, type, row, meta) {
  //           var status = row.status;
  //           if (status == 1) {
  //             color = "red";
  //           } else {
  //             color = "";
  //           }
  //           return `<label style="color: ${color}">
  //         ${row.name}
  //         </label>`;
  //         },
  //       },
  //       {
  //         render: function (data, type, row, meta) {
  //           var status = row.status;
  //           if (status == 1) {
  //             color = "red";
  //           } else {
  //             color = "";
  //           }
  //           return `<label style="color: ${color}">
  //         ${row.grn_no}
  //         </label>`;
  //         },
  //       },
  //       {
  //         render: function (data, type, row, meta) {
  //           var status = row.status;
  //           if (status == 1) {
  //             color = "red";
  //           } else {
  //             color = "";
  //           }
  //           return `<label style="color: ${color}">
  //         ${row.reg_no}
  //         </label>`;
  //         },
  //       },
  //       {
  //         render: function (data, type, row, meta) {
  //           var status = row.status;
  //           if (status == 1) {
  //             color = "red";
  //           } else {
  //             color = "";
  //           }
  //           return `<label style="color: ${color}">
  //         ${row.item}
  //         </label>`;
  //         },
  //       },
  //       {
  //         render: function (data, type, row, meta) {
  //           var status = row.status;
  //           var value = Number(row.qty);
  //           return `<label grnNo="${
  //             row.grn_id
  //           }" class="tableAmount grnListQty" style="text-align: end; color: blue">
  //           ${value.toLocaleString()}
  //           </label>`;
  //         },
  //       },
  //     ],
  //   });
  // }
  // grnsList();

  // // Preview GRN
  // var previewGrnDetails = [];
  // var deliveryPurposes = [];
  // $(document).on("click", ".grnListQty", function (e) {
  //   e.preventDefault();
  //   var grnId = $(this).attr("grnNo");
  //   $.ajax({
  //     type: "post",
  //     url: "/grn/details",
  //     data: {
  //       grn: grnId,
  //     },
  //     dataType: "json",
  //     success: function (response) {
  //       $("#editGrnForm").attr("grnId", grnId);
  //       var grn = response.grnDetails;
  //       var delPurposes = response.deliveryPurposes;
  //       previewGrnDetails = grn;
  //       deliveryPurposes = delPurposes;
  //       $("#grnEditBtn").attr("grnId", grnId);
  //       $("#prevGrnNo").val(grn.grn_no);
  //       $("#prevGrnDate").val(grn.trans_date);
  //       $("#prevGrnSupplier").val(grn.name);
  //       $("#prevGrnItmCode").val(grn.grade_code);
  //       $("#prevGrnItem").val(grn.item);
  //       $("#prevGrnQty").val(grn.qty);
  //       $("#prevGrnBags").val(grn.bags);
  //       $("#prevGrnPurpose").val(grn.purpose);
  //       $("#prevGrnOrigin").val(grn.items_origin);
  //       $("#prevGrnVNo").val(grn.reg_no);
  //       $("#prevGrnVSize").val(grn.vehicle_size);
  //       $("#prevGrnWeighFees").val(grn.weighing_fees);
  //       $("#prevGrnDeliveredBy").val(grn.delivered_by);
  //       $("#prevGrnTicket").val(grn.wb_ticket_no);
  //       $("#prevGrnRemarks").val(grn.remarks);
  //       $("#previewGrnModal").modal("show");
  //     },
  //   });
  // });

  // // Editing the grn
  // $(document).on("click", "#grnEditBtn", function (e) {
  //   e.preventDefault();
  //   // Confirm editing
  //   var confirmEdit = confirm(
  //     "You are about to edit this GRN. Click OK to proceed..."
  //   );
  //   if (!confirmEdit) {
  //     return;
  //   }
  //   setGradeNameInput("grnEditItemField", "editGrnModal");
  //   searchSupplier("editGrnSupplier", "editGrnModal");
  //   //Current grn details
  //   var grn = previewGrnDetails;
  //   $("#editGrnNo").val(grn.grn_no);
  //   $("#editGrnDate").val(grn.trans_date);
  //   $("#editGrnItmCode").val(grn.grade_code);
  //   $("#editGrnQty").val(grn.qty);
  //   $("#editGrnBags").val(grn.bags);
  //   $("#editGrnOrigin").val(grn.items_origin);
  //   $("#editGrnVNo").val(grn.reg_no);
  //   $("#editGrnVSize").val(grn.vehicle_size);
  //   $("#editGrnWeighFees").val(grn.weighing_fees);
  //   $("#editGrnDeliveredBy").val(grn.delivered_by);
  //   $("#editGrnTicket").val(grn.wb_ticket_no);
  //   $("#editGrnRemarks").val(grn.remarks);
  //   $("#editGrnSupplier").html(
  //     `<option value="${grn.supplierId}">${grn.name}</option>`
  //   );
  //   $("#editGrnItem").html(
  //     `<option value="${grn.grade_id}">${grn.item}</option>`
  //   );
  //   // select purpose
  //   var purposeOptions = "";
  //   var currentOption = grn.purpose_id;
  //   for (var x = 0; x < deliveryPurposes.length; x++) {
  //     var optionId = deliveryPurposes[x].purpose_id;
  //     var optionName = deliveryPurposes[x].purpose;
  //     if (optionId == currentOption) {
  //       purposeOptions += `<option value="${optionId}" selected>${optionName}</option>`;
  //     } else {
  //       purposeOptions += `<option value="${optionId}">${optionName}</option>`;
  //     }
  //   }
  //   $("#editGrnPurpose").html(purposeOptions);
  //   // Switch models
  //   $("#previewGrnModal").modal("hide");
  //   $("#editGrnModal").modal("show");
  // });

  // // Save the edited GRN
  // $(document).on("click", "#saveEditGrnBtn", function (e) {
  //   e.preventDefault();
  //   var confirmEdit = confirm("Click OK to confirm saving the GRN adjustment!");
  //   if (!confirmEdit) {
  //     return;
  //   }
  //   $.ajax({
  //     type: "post",
  //     url: "/grn/edit",
  //     data: {
  //       grnId: $("#editGrnForm").attr("grnId"),
  //       grnNo: $("#editGrnNo").val(),
  //       date: $("#editGrnDate").val(),
  //       supplier: $("#editGrnSupplier").val(),
  //       item: $("#editGrnItem").val(),
  //       qty: $("#editGrnQty").val(),
  //       bags: $("#editGrnBags").val(),
  //       purpose: $("#editGrnPurpose").val(),
  //       origin: $("#editGrnOrigin").val(),
  //       vehicleNo: $("#editGrnVNo").val(),
  //       vehicleSize: $("#editGrnVSize").val(),
  //       weighingFees: $("#editGrnWeighFees").val(),
  //       deliveredBy: $("#editGrnDeliveredBy").val(),
  //       ticketNo: $("#editGrnTicket").val(),
  //       remarks: $("#editGrnRemarks").val(),
  //     },
  //     dataType: "json",
  //     success: function (response) {
  //       $("#grnsListTable").DataTable().ajax.reload();
  //       $("#editGrnModal").modal("hide");
  //     },
  //   });
  // });

  //
});
