$(document).ready(function () {
  // Data for the dashboard
  // Coffee type sales
  $.ajax({
    type: "post",
    url: "/sales/salesByType",
    data: "data",
    dataType: "josn",
    success: function (response) {},
  });

  //
});
