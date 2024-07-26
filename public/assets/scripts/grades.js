$(document).ready(function () {
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
        { data: "type_name" },
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
        { data: "category_name" },
        { data: "group_name" },
        { data: "group_name" },
        { data: "unit" },
      ],
    });
  }
  getGrade();

  //
});
