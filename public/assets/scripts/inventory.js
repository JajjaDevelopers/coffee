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

  //
});
