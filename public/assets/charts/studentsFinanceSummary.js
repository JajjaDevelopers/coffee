$(document).ready(function () {
  // Current term details
  const currentTermId = $("#currentTermLabel").text();
  const currentYear = currentTermId.substring(0, 4);
  const currentTerm = currentTermId.substring(4, 5);
  $(".termDeclaration").text(`Term ${currentTerm} ${currentYear}`);
  // Fees billing vs collections
  const billsAndCollectionschart = document.getElementById(
    "billsAndCollectionsBar"
  );
  // const levelBarchart = document.getElementById("levelBarchart");
  $.ajax({
    type: "post",
    url: "/finance/billsAndCollections",
    data: {
      term: null,
    },
    dataType: "json",
    success: function (response) {
      const billsAndCoolections = response.collections;
      var labels = [];
      var bills = [];
      var collections = [];
      for (var x = 0; x < billsAndCoolections.length; x++) {
        labels.push(
          `S.${billsAndCoolections[x].class} - ${billsAndCoolections[x].number} Students`
        );
        bills.push(billsAndCoolections[x].bills);
        collections.push(billsAndCoolections[x].collections);
      }
      console.log(bills);
      new Chart(billsAndCollectionschart, {
        data: {
          labels: labels,
          datasets: [
            {
              type: "bar",
              label: "Bills",
              data: bills,
              backgroundColor: "rgba(245, 158, 66, 0.5)",
              borderColor: "rgb(245, 158, 66)",
              borderRadius: 5,
              borderWidth: 1,
            },
            {
              type: "bar",
              label: "Collections",
              data: collections,
              backgroundColor: "rgba(17, 140, 6, 0.5)",
              borderColor: "rgb(17, 140, 6)",
              borderRadius: 5,
              borderWidth: 1,
            },
          ],
        },
      });
      // Level Numbers
      // new Chart(levelBarchart, {
      //   data: {
      //     labels: [response.oLevelLabel, response.aLevelLabel],
      //     datasets: [
      //       {
      //         type: "bar",
      //         // label: [response.oLevelLabel, response.aLevelLabel],
      //         data: [response.oLevelCount, response.aLevelCount],
      //         backgroundColor: ["rgb(242, 118, 2)", "rgb(165, 49, 214)"],
      //         borderRadius: 5,
      //         axis: "y",
      //       },
      //     ],
      //   },
      //   options: {
      //     indexAxis: "y",
      //   },
      // });
    },
  });

  //
});
