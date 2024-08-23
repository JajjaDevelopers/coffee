$(document).ready(function () {
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
    return;
    $.ajax({
      type: "post",
      url: "/grades/categories",
      data: "data",
      dataType: "json",
      success: function (response) {
        const catList = response.categories;
        var options = "<option value='0'>Categories</option>";
        for (var x = 0; x < catList.length; x++) {
          options += `<option value="${catList[x].category_id}">${catList[x].category_name}</option>`;
        }
        $(`#${selectId}`).html(options);
      },
    });
  });

  // Add new valuation rows
  var numberOfRows = 1;
  $(document).on("click", "#valRowAddBtn", function (e) {
    e.preventDefault();
    numberOfRows += 1; //Increment by 1
    var rowStr = `<tr rowNo="${numberOfRows}" id="valRow${numberOfRows}">
                    <td><input rowNo="${numberOfRows}" id="valCode${numberOfRows}" class="form-control form-control-xs" readonly></td>
                    <td><input rowNo="${numberOfRows}" id="valGrade${numberOfRows}" class="form-control form-control-xs"></td>
                    <td><input rowNo="${numberOfRows}" id="valUnit${numberOfRows}" class="form-control form-control-xs text-center" readonly></td>
                    <td><input rowNo="${numberOfRows}" id="valQty${numberOfRows}" class="form-control form-control-xs text-end"></td>
                    <td><input rowNo="${numberOfRows}" id="valPx${numberOfRows}" class="form-control form-control-xs text-end"></td>
                    <td><input rowNo="${numberOfRows}" id="valAmt${numberOfRows}" class="form-control form-control-xs text-end" readonly></td>
                    <td>
                      <button rowNo="${numberOfRows}" type="button" id="valAmt${numberOfRows}" class="btn btn-sm btn-danger rowRemoveBtn" title="Remove Row">-</button>
                    </td>
                  </tr>`;
    $("#valTBody").append(rowStr);
  });

  // Remove valuation rows
  $(document).on("click", ".rowRemoveBtn", function (e) {
    var selectedRowNo = Number($(this).attr("rowNo"));
    $(`#valRow${selectedRowNo}`).remove();
  });

  //Get deliveries
  function deliveries() {
    $("#deliveriesTable").DataTable({
      destroy: true,
      ajax: {
        method: "post",
        url: "/suppliers/deliveries",
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
        { data: "store_name" },
        { data: "grade_name" },
        { data: "moisture" },
        { data: "qty" },
      ],
    });
  }

  // Getting recent deliveries
  $(document).on("click", "#deliveriesGetBtn", function (e) {
    e.preventDefault();
    // alert($("#fromDate").val());
    // return;
    deliveries(); //Get Categories on load
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

  //
});
