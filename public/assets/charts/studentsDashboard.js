$(document).ready(function () {
  // Gender Piechart
  const genderPiechart = document.getElementById("genderPiechart");
  new Chart(genderPiechart, {
    type: "doughnut",
    data: {
      labels: ["Male", "Female"],
      datasets: [
        {
          data: [$("#malesCount").val(), $("#femalesCount").val()],
        },
      ],
    },
  });

  // Number of class students Bar Chart
  const classesBarchart = document.getElementById("classesStudentsBarchart");
  const levelBarchart = document.getElementById("levelBarchart");
  $.ajax({
    type: "post",
    url: "/students/classCount",
    data: {},
    dataType: "json",
    success: function (response) {
      new Chart(classesBarchart, {
        data: {
          labels: response.classes,
          datasets: [
            {
              type: "bar",
              label: response.currentTerm,
              data: response.current,
              backgroundColor: "rgb(15, 82, 7)",
              borderRadius: 5,
            },
            {
              type: "bar",
              label: response.previousTerm,
              data: response.previous,
              backgroundColor: "rgb(173, 112, 5)",
              borderRadius: 5,
            },
          ],
        },
      });
      // Level Numbers
      new Chart(levelBarchart, {
        data: {
          labels: [response.oLevelLabel, response.aLevelLabel],
          datasets: [
            {
              type: "bar",
              // label: [response.oLevelLabel, response.aLevelLabel],
              data: [response.oLevelCount, response.aLevelCount],
              backgroundColor: ["rgb(242, 118, 2)", "rgb(165, 49, 214)"],
              borderRadius: 5,
              axis: "y",
            },
          ],
        },
        options: {
          indexAxis: "y",
        },
      });
    },
  });

  //
});
