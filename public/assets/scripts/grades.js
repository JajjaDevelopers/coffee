$(document).ready(function () {
  //class subjects
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
        { data: "type_name" },
        { data: "type_name" },
      ],
    });
  }
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
  getGradeCategories();

  //
});
