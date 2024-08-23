$(document).ready(function () {
  //select category
  $(".addCoffeeGradeCategory").select2({
    dropdownParent: $("#addGradeModal"),
  });

  // Grade groups options
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

  // category options
  function gradeCategoryOptions(selectId) {
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
  }

  //Grade categories
  function getGradeCategories() {
    $("#gradeCategoriesTable").DataTable({
      destroy: true,
      ajax: {
        method: "post",
        url: "/grades/categories",
        data: {},
        dataSrc: "categories",
      },
      columns: [
        { data: "category_name" },
        { data: "type_name" },
        { data: "qty" },
        {
          render: function (data, type, row, meta) {
            return `<button type="button" title='Receipt Preview' id="viewBtn" class="btn btn-md btn-info">
                            <i class="la la-eye"></i>
                        </button>`;
          },
        },
      ],
    });
  }
  getGradeCategories(); //Get Categories on load

  // Adding Grade categories
  $(document).on("click", "#addGradeCategoryBtn", function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "/coffee/types",
      data: "data",
      dataType: "json",
      success: function (response) {
        const coffeeTypes = response.coffeeTypes;
        var types = "<option>--Types--</option>";
        for (var x = 0; x < coffeeTypes.length; x++) {
          types += `<option value="${coffeeTypes[x].type_id}">${coffeeTypes[x].type_name}</option>`;
        }
        $("#addCatCoffeeType").html(types);
      },
    });
    $("#addCategoryModal").modal("show");
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

  //Grades
  // Adding Grade
  $(document).on("click", "#addGradeBtn", function (e) {
    e.preventDefault();
    gradeCategoryOptions("addGradeCategory");
    gradeGroupsOptions("addGradeGroup");
    $("#addGradeModal").modal("show");
  });
  function getGrade() {
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
            return `<button type="button" title='Receipt Preview' id="viewBtn" class="btn btn-sm btn-info">
                        <i class="la la-eye"></i>
                    </button>`;
          },
        },
      ],
    });
  }
  getGrade();

  // Save Grade
  $(document).on("click", "#saveGradeBtn", function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "/grades/addGrade",
      data: {
        grdCode: $("#addGradeCode").val(),
        grdName: $("#addGradeName").val(),
        grdCatId: $("#addGradeCategory").val(),
        grdUnit: $("#addGradeUnit").val(),
        grdGroup: $("#addGradeGroup").val(),
      },
      dataType: "json",
      success: function (response) {
        var sms = response.sms;
        $("#gradesListTable").DataTable().ajax.reload();
        $("#addGradeModal").modal("hide");
      },
    });
  });

  //
});
