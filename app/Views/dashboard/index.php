<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
  .morris-hover.morris-default-style {
    border-radius: 10px;
  }

  /* canvas {
    border: 1px solid black;
} */

  .x-axis-labels {
    transform: rotate(-45deg);
    text-anchor: end !important;
  }

  #legend {
    text-align: center;
    margin-top: 10px;
  }

  .legend-item {
    display: inline-block;
    margin-right: 20px;
  }

  .legend-color-box {
    display: inline-block;
    width: 12px;
    height: 12px;
    margin-right: 5px;
    vertical-align: middle;
  }

  .card-dashboard-six {
    /* Ensure the card takes full width and height of the column */
    width: 100% !important;
    height: 100% !important;
  }

  #myChart,
  #myChart2,
  #myChart3,
  #myChart4 {
    /* Make the canvas take full width and height of the card */
    width: 100% !important;
    height: 100% !important;
  }

  .chart-container {
    max-width: 400px;
    height: auto;
    margin: 0 auto;
  }
</style>
<div class="az-content-header d-block d-md-flex">
  <div>
    <h2 class="az-content-title tx-24 mg-b-5 mg-b-lg-8">Hi, <?= $commonData['user']['name'] ?>, Welcome Back!</h2>
    <p class="mg-b-0">Main Dashboard.</p>
  </div>
  <div class="az-dashboard-header-right">
    <!-- <div>
      <label class="tx-13">Customer Ratings</label>
      <div class="az-star">
        <i class="typcn typcn-star active"></i>
        <i class="typcn typcn-star active"></i>
        <i class="typcn typcn-star active"></i>
        <i class="typcn typcn-star active"></i>
        <i class="typcn typcn-star"></i>
        <span>(12,775)</span>
      </div>
    </div>
    <div>
      <label class="tx-13">All Sales (Online)</label>
      <h5>431,007</h5>
    </div>
    <div>
      <label class="tx-13">All Sales (Offline)</label>
      <h5>932,210</h5>
    </div> -->
  </div><!-- az-dashboard-header-right -->
</div><!-- az-content-header -->
<div class="az-content-body">
  <div class="card card-dashboard-seven">
    <div class="card-header" style="height: 30px;">
      <!-- <div class="row">
        <div class="col-sm-6">
          <div class="row" style="height: 40px;">
            <div id="month-1-sales-col" style="width: 20%; background-color:green">
              <h6 style="color: white; margin: 5px 10px"><strong>Nov-2024</strong></h6>
            </div>
            <div id="month-0-sales-col" style="width: 80%; background-color:rgb(105, 144, 66)">
              <h6 style="color: white; margin: 5px 10px"><strong>Oct-2024</strong></h6>
            </div>
          </div>
        </div>
        <div id="card-header-purchases" class="col-sm-6">
          <div class="row">
            <div id="month-1-purchases-col">
              Current month
            </div>
          </div>
        </div>
      </div> -->
    </div><!-- card-header -->
    <div class="card-body">
      <div class="row row-sm">
        <div class="col-md-6">
          <h4 style="color:green">
            <strong>Sales</strong>
          </h4>
          <div class="row">
            <div class="col-6 col-lg-6">
              <label class="az-content-label green-bg" style="color: white;">Total Quantity</label>
              <h2 id='salesTotalQty' style="color: green;">0<span>Kgs</span></h2>
              <div id="salesQtyTrend">

              </div>
              <!-- <div class="desc up">
                <i class="icon ion-md-stats"></i>
                <span><strong>2.00%</strong> (30 days)</span>
              </div> -->
              <!-- <span id="compositeline2">
                5,9,5,6,4,12,18,14,10,15,12,5
              </span> -->
            </div><!-- col -->
            <div class="col-6 col-lg-6">
              <label class="az-content-label green-bg" style="color: white;">Total Revenue</label>
              <h2 id='salesValue' style="color: green;"><span>UGX</span>0</h2>
              <div id="salesValueTrend">

              </div>
              <!-- <div class="desc up">
                <i class="icon ion-md-stats"></i>
                <span><strong>12.09%</strong> (30 days)</span>
              </div> -->
              <!-- <span id="compositeline">
                3,2,4,6,12,14,8,7,14,16,12,7,8,4
              </span> -->
            </div><!-- col -->
          </div>
          <div class="row sales-bar" style="padding: 0px 0px;">
            <div id="month1Bar" class="month-1-bar" style="background-color: green; height:40px"></div>
            <div id="month0Bar" style="text-align: center; height:40px"></div>
          </div>
        </div>
        <div class="col-md-6">
          <h4 style="color:brown"><strong>Bulking</strong></h4>
          <div class="row">
            <div class="col-6 col-lg-6 mg-t-20 mg-lg-t-0">
              <label class="az-content-label brown-bg" style="color: white;">Total Quantity</label>
              <h2 id='totalBulkedQty' style="color:brown">0</h2>
              <div id="valQtyTrend">

              </div>
              <!-- <div class="desc down">
                <i class="icon ion-md-stats"></i>
                <span><strong>0.51%</strong> (30 days)</span>
              </div> -->
              <!-- <span id="compositeline4">
                5,9,5,6,4,12,18,14,10,15,12,5,8,5
              </span> -->
            </div><!-- col -->
            <div class="col-6 col-lg-6 mg-t-20 mg-lg-t-0">
              <label class="az-content-label brown-bg" style="color: white;">Valuations</label>
              <h2 id='bulkedValue' style="color:brown"><span>UGX</span>0</h2>
              <div id="valuationValueTrend">
                <!-- <span class="material-symbols-outlined">
                  trending_up
                </span>
                <span><strong>5.32%</strong> (30 days)</span>-->
              </div>
              <!-- <span id="compositeline3">
                5,10,5,20,22,12,15,18,20,15,8,12,22,5
              </span> -->
            </div><!-- col -->
          </div>
          <div class="row valuations-bar" style="padding: 0px 0px;">
            <div id="month1ValBar" class="month-1-val-bar" style="background-color: brown; height:40px"></div>
            <div id="month0ValBar" style="text-align: center; height:40px"></div>
          </div>
        </div>
      </div><!-- row -->
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="row row-sm mg-b-15 mg-sm-b-20">
    <div class="col-lg-6 col-xl-6">
      <div class="card card-dashboard-six">
        <canvas id="myChart2"></canvas>
      </div><!-- card -->
    </div><!-- col -->
    <div class="col-lg-6 col-xl-6">
      <div class="card card-dashboard-six">
        <canvas id="myChart3"></canvas>
      </div><!-- card -->
    </div><!-- col -->
  </div><!-- row -->

  <div class="card card-dashboard-seven">
    <div class="card-header">
    </div><!-- card-header -->
    <div class="card-body">
      <div class="row row-sm">
        <div class="col-md-6">
          <div class="chart-container" style="position: relative; height: 300px; width: 100%;">
            <canvas id="export_local_qty"></canvas>
          </div>
        </div>
        <div class="col-md-6">
          <div class="chart-container" style="position: relative; height: 300px; width: 100%;">
            <canvas id="export_local_value"></canvas>
          </div>
        </div>
      </div><!-- row -->
    </div><!-- card-body -->


  </div><!-- card -->

  <div class="card card-dashboard-seven">
    <div class="card-header">
      <!-- <div class="row row-sm">
        <div class="col-6 col-md-4 col-xl">
          <div class="media">
            <div><i class="icon ion-ios-calendar"></i></div>
            <div class="media-body">
              <label>Start Date</label>
              <div class="date">
                <span>Sept 01, 2018</span> <a href=""><i class="icon ion-md-arrow-dropdown"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4 col-xl">
          <div class="media">
            <div><i class="icon ion-ios-calendar"></i></div>
            <div class="media-body">
              <label>End Date</label>
              <div class="date">
                <span>Sept 30, 2018</span> <a href=""><i class="icon ion-md-arrow-dropdown"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4 col-xl mg-t-15 mg-md-t-0">
          <div class="media">
            <div><i class="icon ion-logo-usd"></i></div>
            <div class="media-body">
              <label>Sales Measure</label>
              <div class="date">
                <span>Revenue</span> <a href=""><i class="icon ion-md-arrow-dropdown"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-4 col-xl mg-t-15 mg-xl-t-0">
          <div class="media">
            <div><i class="icon ion-md-person"></i></div>
            <div class="media-body">
              <label>Customer Type</label>
              <div class="date">
                <span>All Customers</span> <a href=""><i class="icon ion-md-arrow-dropdown"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-xl mg-t-15 mg-xl-t-0">
          <div class="media">
            <div><i class="icon ion-md-stats"></i></div>
            <div class="media-body">
              <label>Transaction Type</label>
              <div class="date">
                <span>All Transactions</span> <a href=""><i class="icon ion-md-arrow-dropdown"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div><!-- card-header -->
    <div class="card-body">
      <div class="row row-sm">
        <div class="col-md-6">
          <h4 style="color: green;">Robusta</h4>
          <div class="row">
            <div class="col-6 col-lg-6">
              <label class="az-content-label green-bg" style="color: white;">Total Quantity</label>
              <h2 id="salesRobTotalQty" style="color: green;">0<span>Kgs</span></h2>
              <div class="desc up">
                <i class="icon ion-md-stats"></i>
                <span><strong>2.00%</strong> (30 days)</span>
              </div>
            </div><!-- col -->
            <div class="col-6 col-lg-6">
              <label class="az-content-label green-bg" style="color: white;">Revenue</label>
              <h2 id="salesRobValue" style="color: green;"><span>UGX</span>0</h2>
              <div class="desc up">
                <i class="icon ion-md-stats"></i>
                <span><strong>12.09%</strong> (30 days)</span>
              </div>
            </div><!-- col -->
          </div>
        </div>
        <div class="col-md-6">
          <h4 style="color: brown;">Arabica</h4>
          <div class="row">
            <div class="col-6 col-lg-6 mg-t-20 mg-lg-t-0">
              <label class="az-content-label brown-bg" style="color: white;">Total Quantity</label>
              <h2 id="totalAraQty" style="color: brown;">0<span>Kgs</span></h2>
              <div class="desc down">
                <i class="icon ion-md-stats"></i>
                <!-- <span><strong>0.51%</strong> (30 days)</span> -->
              </div>
            </div><!-- col -->
            <div class="col-6 col-lg-6 mg-t-20 mg-lg-t-0">
              <label class="az-content-label brown-bg" style="color: white;">Revenue</label>
              <h2 id="araValue" style="color: brown;"><span>UGX</span>0</h2>
              <div class="desc up">
                <i class="icon ion-md-stats"></i>
                <span><strong>5.32%</strong> (30 days)</span>
              </div>
            </div><!-- col -->
          </div>
        </div>
      </div><!-- row -->
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="row">
    <div class="col-lg-6 col-xl-6">
      <div class="card card-dashboard-six">
        <canvas id="myChart4"></canvas>
      </div><!-- card -->
    </div><!-- col -->
    <div class="col-lg-6 col-xl-6">
      <div class="card card-dashboard-six">
        <canvas id="myChart"></canvas>
      </div><!-- card -->
    </div><!-- col -->
  </div>


</div><!-- az-content-body -->
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<!-- Metrics Data -->
<script src="<?= base_url('assets/scripts/dashboard.js') ?>"></script>
<script>
  /* ----------------------------------- */
  /* Dashboard content */

  $(document).ready(function() {
    // Number formater
    function numberFormat(number) {
      var n = number.toFixed(1);
      return n;
    }

    // Trend analysis
    function trendAnalysis(divId, value, month0Str) {
      var change = numberFormat(value);
      if (value < 0) {
        trendTitle = `title="Dropping Trend"`;
        var trend = `<strong><span class="material-symbols-outlined" style="color: red; font-size:30px" ${trendTitle}>
                  trending_down
                </span>
                <span style="color: red" ${trendTitle}>${change}%</strong> (comparing ${month0Str})</span>`;
      } else {
        trendTitle = `title="Rising Trend"`;
        var trend = `<strong><span class="material-symbols-outlined" style="color: green; font-size:30px" ${trendTitle}>
                  trending_up
                </span>
                <span style="color: green" ${trendTitle}>${change}%</strong> (comparing ${month0Str})</span>`;
      }
      $(`${divId}`).html(trend);
    }

    //ajax request to pick sales data
    let salesData = null;
    $.ajax({
      type: "post",
      url: "/sales/salesByType",
      data: "data",
      dataType: "json",
      success: function(response) {
        data = response;
        salesData = data.allMonthSales
        quarterlySalesData = data.quarters
        exportLocalQty(data.exportQty, data.localQty)
        exportLocalValue(data.exportValue, data.localValue)
        actualSalesVsProjected(salesData);
        actualSalesVsBulked(salesData);
        cumulativeSales(salesData);
        quarterlySales(quarterlySalesData);
        totalSalesAndBulked(data.totalBulkedQty, data.totalBulkedValue, data.totalSalesQty, data.totalSalesValue);
        coffeeTypes(data.robustaQty, data.robustaValue, data.arabicaQty, data.arabicaValue)

        // Month sales comparison
        var salesBarWidth = $(".sales-bar").width();
        var month1Qty = data.month1Qty;
        var month0Qty = data.month0Qty;
        var total2Qty = month1Qty + month0Qty;
        var month1Width = (month1Qty / total2Qty) * 100;
        var month0Width = (month0Qty / total2Qty) * 100;
        $("#month1Bar").html(`<small>${data.month1Str}</small> <h6><strong>${numberFormat(month1Qty/1000)} MT</strong></h6>`).width(`fit-content`);
        $("#month0Bar").html(`<small>${data.month0Str}</small> <h6><strong>${numberFormat(month0Qty/1000)} MT</strong></h6>`).width(`fit-content`);

        var initialMonth1Width = $("#month1Bar").width() * 100 / salesBarWidth;
        var initialMonth0Width = $("#month0Bar").width() * 100 / salesBarWidth;
        if (initialMonth1Width < month1Width) {
          $("#month1Bar").width(month1Width);
          if (initialMonth0Width < month0Width) {
            $("#month0Bar").width(`${month0Width}%`);
            $("#month1Bar").width(`${100 - month0Width}%`);
          } else {
            $("#month0Bar").width(`${initialMonth0Width}%`);
            $("#month1Bar").width(`${100 - initialMonth0Width}%`);
          }
        } else {
          $("#month1Bar").width(`${initialMonth1Width}%`);
          $("#month0Bar").width(`${100 - initialMonth0Width}%`);
        }

        // Month valuations comparisons
        var valBarWidth = $(".valuations-bar").width();
        var month1ValQty = data.month1ValQty;
        var month0ValQty = data.month0ValQty;
        var total2ValQty = month1ValQty + month0ValQty;
        var month1ValWidth = (month1ValQty / total2ValQty) * 100;
        var month0ValWidth = (month0ValQty / total2ValQty) * 100;

        $("#month1ValBar").html(`<small>${data.month1Str}</small> <h6><strong>${numberFormat(month1ValQty)/1000} MT</strong></h6>`).width(`fit-content`);
        $("#month0ValBar").html(`<small>${data.month0Str}</small> <h6><strong>${numberFormat(month0ValQty)/1000} MT</strong></h6>`).width(`fit-content`);

        var month1FitWidth = $("#month1ValBar").width() * 100 / valBarWidth;
        var month0FitWidth = $("#month0ValBar").width() * 100 / valBarWidth;
        if (month1FitWidth < month1ValWidth) {
          $("#month1ValBar").width(month1ValWidth);
          if (month0FitWidth < month0ValWidth) {
            $("#month0ValBar").width(`${month0ValWidth}%`);
            $("#month1ValBar").width(`${100 - month0ValWidth}%`);
          } else {
            $("#month0ValBar").width(`${month0FitWidth}%`);
            $("#month1ValBar").width(`${100 - month0FitWidth}%`);
          }
        } else {
          $("#month1ValBar").width(`${month1FitWidth}%`);
          $("#month0ValBar").width(`${100 - month1FitWidth}%`);
        }

        // Trends
        trendAnalysis("#valuationValueTrend", data.valuationValueChange, data.month0Str);
        trendAnalysis("#valQtyTrend", data.valuationsQtyChange, data.month0Str);
        trendAnalysis("#salesValueTrend", data.salesValueChange, data.month0Str);
        trendAnalysis("#salesQtyTrend", data.salesQtyChange, data.month0Str);
      },
    });

    $('#compositeline').sparkline('html', {
      lineColor: '#cecece',
      lineWidth: 2,
      spotColor: false,
      minSpotColor: false,
      maxSpotColor: false,
      highlightSpotColor: null,
      highlightLineColor: null,
      fillColor: '#f9f9f9',
      chartRangeMin: 0,
      chartRangeMax: 10,
      width: '100%',
      height: 20,
      disableTooltips: true
    });

    $('#compositeline2').sparkline('html', {
      lineColor: '#cecece',
      lineWidth: 2,
      spotColor: false,
      minSpotColor: false,
      maxSpotColor: false,
      highlightSpotColor: null,
      highlightLineColor: null,
      fillColor: '#f9f9f9',
      chartRangeMin: 0,
      chartRangeMax: 10,
      width: '100%',
      height: 20,
      disableTooltips: true
    });

    $('#compositeline3').sparkline('html', {
      lineColor: '#cecece',
      lineWidth: 2,
      spotColor: false,
      minSpotColor: false,
      maxSpotColor: false,
      highlightSpotColor: null,
      highlightLineColor: null,
      fillColor: '#f9f9f9',
      chartRangeMin: 0,
      chartRangeMax: 10,
      width: '100%',
      height: 20,
      disableTooltips: true
    });

    $('#compositeline4').sparkline('html', {
      lineColor: '#cecece',
      lineWidth: 2,
      spotColor: false,
      minSpotColor: false,
      maxSpotColor: false,
      highlightSpotColor: null,
      highlightLineColor: null,
      fillColor: '#f9f9f9',
      chartRangeMin: 0,
      chartRangeMax: 10,
      width: '100%',
      height: 20,
      disableTooltips: true
    });
    $('#compositeline5').sparkline('html', {
      lineColor: '#cecece',
      lineWidth: 2,
      spotColor: false,
      minSpotColor: false,
      maxSpotColor: false,
      highlightSpotColor: null,
      highlightLineColor: null,
      fillColor: '#f9f9f9',
      chartRangeMin: 0,
      chartRangeMax: 10,
      width: '100%',
      height: 20,
      disableTooltips: true
    });
    $('#compositeline6').sparkline('html', {
      lineColor: '#cecece',
      lineWidth: 2,
      spotColor: false,
      minSpotColor: false,
      maxSpotColor: false,
      highlightSpotColor: null,
      highlightLineColor: null,
      fillColor: '#f9f9f9',
      chartRangeMin: 0,
      chartRangeMax: 10,
      width: '100%',
      height: 20,
      disableTooltips: true
    });
    $('#compositeline7').sparkline('html', {
      lineColor: '#cecece',
      lineWidth: 2,
      spotColor: false,
      minSpotColor: false,
      maxSpotColor: false,
      highlightSpotColor: null,
      highlightLineColor: null,
      fillColor: '#f9f9f9',
      chartRangeMin: 0,
      chartRangeMax: 10,
      width: '100%',
      height: 20,
      disableTooltips: true
    });

    $('#compositeline8').sparkline('html', {
      lineColor: '#cecece',
      lineWidth: 2,
      spotColor: false,
      minSpotColor: false,
      maxSpotColor: false,
      highlightSpotColor: null,
      highlightLineColor: null,
      fillColor: '#f9f9f9',
      chartRangeMin: 0,
      chartRangeMax: 10,
      width: '100%',
      height: 20,
      disableTooltips: true
    });

    //functiom to plot actual coffee sales vs projected value
    const actualSalesVsProjected = (data) => {
      // Extracting data for Chart.js
      const labels = data.map(item => item.month); // Months for the x-axis
      const salesQty = data.map(item => item.actualSalesValue); // Sales Quantity
      const purchaseQty = data.map(item => item.actualPurchaseValue); // Purchase Quantity
      const purchaseProjection = data.map(item => item.projMonthPurchases) //purchase projection
      const salesProjection = data.map(item => item.projMonthSales) //purchase projection

      // Configuration for Chart.js
      const config = {
        type: 'line',
        data: {
          labels: labels, // x-axis labels
          datasets: [
            // {
            //   label: 'Actual Sales Value (Kgs)',
            //   type: 'bar', // Bar chart
            //   data: salesQty, // y-axis data
            //   borderColor: 'green', // Green line color
            //   backgroundColor: 'green', // Light green fill color
            //   fill: true,
            //   tension: 0.3,
            //   borderWidth: 2,
            //   pointRadius: 4, // Radius of points
            //   pointBackgroundColor: '#0b62a4',
            //   pointBorderColor: '#0b62a4'
            // },
            // {
            //   label: 'Actual Purchase Quantity (Kgs)',
            //   type: 'bar', // Bar chart
            //   data: purchaseQty, // y-axis data
            //   borderColor: 'red',
            //   backgroundColor: 'red',
            //   fill: true,
            //   tension: 0.3,
            //   borderWidth: 2,
            //   pointRadius: 4,
            //   pointBackgroundColor: '#7a92a3',
            //   pointBorderColor: '#7a92a3'
            // },
            {
              label: ' Purchase(Kgs)',
              data: purchaseProjection, // y-axis data
              borderColor: 'teal',
              // backgroundColor: 'rgba(139, 0, 0, 0.2)',
              fill: true,
              tension: 0.3,
              borderWidth: 2,
              pointRadius: 4,
              pointBackgroundColor: '#7a92a3',
              pointBorderColor: '#7a92a3'
            },
            {
              label: ' Sales(Kgs)',
              data: salesProjection, // y-axis data
              borderColor: 'rgb(139, 0, 0)',
              // backgroundColor: 'rgba(139, 0, 0, 0.2)',
              fill: true,
              tension: 0.3,
              borderWidth: 2,
              pointRadius: 4,
              pointBackgroundColor: '#7a92a3',
              pointBorderColor: '#7a92a3'
            },
          ]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: true,
              position: 'top' // Position of the legend
            },
            tooltip: {
              enabled: true, // Display tooltips on hover
              mode: 'index',
              intersect: false,
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.dataset.label + ': ' + tooltipItem.formattedValue + 'M';
                }
              }
            },
            title: {
              display: true,
              text: 'Projected Sales Vs Purchases', // Title text
              font: {
                size: 18 // Font size for the title
              }
            }
          },
          scales: {
            x: {
              title: {
                display: true,
                text: 'Month'
              },
              ticks: {
                maxRotation: 45, // Rotate x-axis labels
                minRotation: 45
              },
              grid: {
                display: true // Show gridlines
              }
            },
            y: {
              title: {
                display: true,
                text: 'Quantity (in thousands)'
              },
              beginAtZero: true,
              ticks: {
                // Format the y-axis labels
                callback: function(value) {
                  return value >= 1000 ? value / 1000 + 'K' : value;
                }
              },
              grid: {
                display: true // Show gridlines
              }
            }
          }
        }
      };

      // Render the chart
      const ctx = $('#myChart');
      new Chart(ctx, config);
    }

    //functiom to plot actual coffee sales vs projected value
    const actualSalesVsBulked = (data) => {
      // Extracting data for Chart.js
      const labels = data.map(item => item.month); // Months for the x-axis
      const salesValues = data.map(item => (item.actualSalesValue) / 1000000); // Sales value
      const purchaseValue = data.map(item => (item.actualPurchaseValue) / 1000000); // Purchase value
      const salesKg = data.map(item => (item.actualSalesQty) / 1000) //sales in kg
      const bulkedKg = data.map(item => (item.actualPurchaseQty) / 1000) //bulked in kg

      // Configuration for Chart.js
      const config = {
        type: 'line',
        data: {
          labels: labels, // x-axis labels
          datasets: [{
              label: 'Sales Value',
              data: salesValues, // y-axis data
              type: 'bar', // Bar chart
              borderColor: 'green', // Green line color
              backgroundColor: 'green', // Light green fill color
              fill: true,
              tension: 0.3,
              borderWidth: 2,
              pointRadius: 4, // Radius of points
              pointBackgroundColor: '#0b62a4',
              pointBorderColor: '#0b62a4'
            },
            {
              label: 'Purchase Value',
              type: 'bar',
              data: purchaseValue, // y-axis data
              borderColor: 'rgb(255, 204, 0)', // Dark yellow line color
              backgroundColor: 'rgb(255, 204, 0)', // Light fill color (optional)
              fill: true,
              tension: 0.3,
              borderWidth: 2,
              pointRadius: 4,
              pointBackgroundColor: '#7a92a3',
              pointBorderColor: '#7a92a3'
            },
            // {
            //   label: 'Actual Sales Quantity(Kgs)',
            //   data: salesKg, // y-axis data
            //   borderColor: 'green', // Dark yellow line color
            //   // backgroundColor: 'rgba(255, 204, 0, 0.2)', // Light fill color (optional)
            //   fill: true,
            //   tension: 0.3,
            //   borderWidth: 2,
            //   pointRadius: 4,
            //   pointBackgroundColor: '#7a92a3',
            //   pointBorderColor: '#7a92a3'
            // },
            // {
            //   label: 'Actual Bulked Quantity(Kgs)',
            //   data: bulkedKg, // y-axis data
            //   borderColor: 'blue', // Dark yellow line color
            //   // backgroundColor: 'rgba(255, 204, 0, 0.2)', // Light fill color (optional)
            //   fill: true,
            //   tension: 0.3,
            //   borderWidth: 2,
            //   pointRadius: 4,
            //   pointBackgroundColor: '#7a92a3',
            //   pointBorderColor: '#7a92a3'
            // },

          ]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: true,
              position: 'top' // Position of the legend
            },
            tooltip: {
              enabled: true, // Display tooltips on hover
              mode: 'index',
              intersect: false,
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.dataset.label + ': ' + tooltipItem.formattedValue + 'M';
                }
              }
            },
            title: {
              display: true,
              text: 'Actual Sales Vs Bulked (UGX)', // Title text
              font: {
                size: 18 // Font size for the title
              }
            }
          },
          scales: {
            x: {
              title: {
                display: true,
                text: 'Month'
              },
              ticks: {
                maxRotation: 45, // Rotate x-axis labels
                minRotation: 45
              },
              grid: {
                display: true // Show gridlines
              }
            },
            y: {
              title: {
                display: true,
                text: 'Value (in millions)'
              },
              beginAtZero: true,
              ticks: {
                // Format the y-axis labels
                callback: function(value) {
                  return value >= 1000 ? value / 1000 + 'K' : value;
                }
              },
              grid: {
                display: true // Show gridlines
              }
            }
          }
        }
      };

      // Render the chart
      const ctx = $('#myChart2');
      new Chart(ctx, config);
    }

    //functiom to plot actual coffee sales vs projected value
    const cumulativeSales = (data) => {
      // Extracting data for Chart.js
      const labels = data.map(item => item.month); // Months for the x-axis
      const cumulativeSales = data.map(item => (item.cummulativeSalesValue / 1000000)); // cumulative sales
      // Configuration for Chart.js
      const config = {
        type: 'line',
        data: {
          labels: labels, // x-axis labels
          datasets: [{
            label: 'Cumulative Sales',
            data: cumulativeSales, // y-axis data
            borderColor: '#0b62a4',
            backgroundColor: 'rgb(173,216,230)',
            fill: true,
            tension: 0.3,
            borderWidth: 2,
            pointRadius: 4, // Radius of points
            pointBackgroundColor: '#0b62a4',
            pointBorderColor: '#0b62a4'
          }, ]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: true,
              position: 'top' // Position of the legend
            },
            tooltip: {
              enabled: true, // Display tooltips on hover
              mode: 'index',
              intersect: false,
              callbacks: {
                label: function(tooltipItem) {
                  return tooltipItem.dataset.label + ': ' + tooltipItem.formattedValue + 'M';
                }
              }
            },
            title: {
              display: true,
              text: 'Cumulative Sales (UGX)', // Title text
              font: {
                size: 18 // Font size for the title
              }
            }
          },
          scales: {
            x: {
              title: {
                display: true,
                text: 'Month'
              },
              ticks: {
                maxRotation: 45, // Rotate x-axis labels
                minRotation: 45
              },
              grid: {
                display: true // Show gridlines
              }
            },
            y: {
              title: {
                display: true,
                text: 'Sales (in millions)'
              },
              beginAtZero: true,
              ticks: {
                // Format the y-axis labels
                callback: function(value) {
                  return value >= 1000 ? value / 1000 + 'K' : value;
                }
              },
              grid: {
                display: true // Show gridlines
              }
            }
          }
        }
      };

      // Render the chart
      const ctx = $('#myChart3');
      new Chart(ctx, config);
    }

    //function to plot quarterly sales
    const quarterlySales = (data) => {
      const labels = data.map(item => item.quarter)
      const robustaSales = data.map(item => item.robustaSales / 1000000)
      const arabicaSales = data.map(item => item.arabicaSales / 1000000)
      // console.log(arabicaSales)
      // console.log(robustaSales)
      // console.log(labels)
      //stacked
      const ctx = $('#myChart4');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
              label: 'Robusta',
              data: robustaSales,
              backgroundColor: 'blue',
            },
            {
              label: 'Arabica',
              data: arabicaSales,
              backgroundColor: 'red',
            },
          ]
        },
        options: {
          indexAxis: 'y', // This makes the bar chart horizontal
          scales: {
            x: {
              stacked: true // Stack the bars on the x-axis
            },
            y: {
              stacked: true // Stack the bars on the y-axis
            }
          },
          responsive: true,
          plugins: {
            legend: {
              position: 'top', // Position of the legend
            },
            tooltip: {
              callbacks: {
                label: function(context) {
                  // Custom tooltip formatting
                  let label = context.dataset.label || '';
                  if (label) {
                    label += ': ';
                  }
                  if (context.parsed.x !== null) {
                    label += context.parsed.x + "M";
                  }
                  return label;
                }
              }
            },
            title: {
              display: true, // Show the title
              text: 'Quarterly Sales', // Chart title
              font: {
                size: 18 // Title font size
              },
              padding: {
                top: 10, // Space above the title
                bottom: 30 // Space below the title
              }
            }
          }
        }
      });
    }

    //function to create total sales and total bulked
    const totalSalesAndBulked = (totalBulkedQty, totalBulkedValue, totalSalesQty, totalSalesValue) => {
      // const totalSales = totalSalesQty.toLocaleString()
      $('#salesTotalQty').html(`${numberFormat(totalSalesQty/1000).toLocaleString()}<span><sub>MT</sub></span>`)
      $('#salesValue').html(`<span><sub>UGX</sub></span>${numberFormat(totalSalesValue/1000000).toLocaleString()}${"M"}`)
      $('#totalBulkedQty').html(`${(numberFormat(totalBulkedQty/1000)).toLocaleString()}<span><sub>MT</sub></span>`)
      $('#bulkedValue').html(`<span><sub>UGX</sub></span>${numberFormat(totalBulkedValue/1000000).toLocaleString()}${"M"}`)
    }
    //function to create total coffee type quantity and values
    const coffeeTypes = (totalRobQty, totalRobVal, totalAraQty, totalAraVal) => {
      $('#salesRobTotalQty').html(`${numberFormat(totalRobQty/1000).toLocaleString()}<span><sub>MT</sub></span>`)
      $('#salesRobValue').html(`<span><sub>UGX</sub></span>${numberFormat(totalRobVal/1000000).toLocaleString()}${"M"}`)
      $('#totalAraQty').html(`${numberFormat(totalAraQty/1000).toLocaleString()}<span><sub>MT</sub></span>`)
      $('#araValue').html(`<span><sub>UGX</sub></span>${numberFormat(totalAraVal/1000000).toLocaleString()}${"M"}`)
    }

    //pie charts 
    const exportLocalQty = (exportQty, localQty) => {
      // Get the 2D context of the canvas
      const ctx = $('#export_local_qty')[0].getContext('2d');

      // Calculate the total quantity for percentage calculation
      const totalQty = exportQty + localQty;

      const myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Export(kgs)', 'Local(kgs)'],
          datasets: [{
            data: [exportQty, localQty],
            backgroundColor: ['#FF6384', '#36A2EB'],
            hoverBackgroundColor: ['#FF6384', '#36A2EB']
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false, // Allow the chart to resize based on container size
          plugins: {
            title: {
              display: true,
              text: 'Export vs Local Quantity (kgs)', // Your desired title
              font: {
                size: 18
              }
            },
            legend: {
              position: 'top',
              labels: {
                generateLabels: function(chart) {
                  const data = chart.data;
                  return data.labels.map((label, i) => {
                    const value = data.datasets[0].data[i];
                    const percentage = ((value / totalQty) * 100).toFixed(2);
                    return {
                      text: `${label}: ${percentage}%`, // Show percentage in legend
                      fillStyle: data.datasets[0].backgroundColor[i],
                      hidden: isNaN(data.datasets[0].data[i]),
                      index: i
                    };
                  });
                }
              }
            },
            tooltip: {
              callbacks: {
                label: function(tooltipItem) {
                  // Get the value of the current data point
                  const value = tooltipItem.raw;

                  // Calculate percentage
                  const percentage = ((value / totalQty) * 100).toFixed(2);

                  // Return the label with the value and percentage
                  return `${tooltipItem.label}: ${value} (${percentage}%)`;
                }
              }
            }
          }
        }
      });
    }



    const exportLocalValue = (exportValue, localValue) => {
      // Get the 2D context of the canvas
      const ctx = $('#export_local_value')[0].getContext('2d');

      // Calculate the total quantity for percentage calculation
      const totalQty = exportValue + localValue;

      const myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Export(Ugx)', 'Local(Ugx)'],
          datasets: [{
            data: [exportValue, localValue],
            backgroundColor: ['#FFCE56', '#4BC0C0'],
            hoverBackgroundColor: ['#FFCE56', '#4BC0C0']
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false, // Allow the chart to resize based on container size
          plugins: {
            title: {
              display: true,
              text: 'Export vs Local Value', // Your desired title
              font: {
                size: 18
              }
            },
            legend: {
              position: 'top',
              labels: {
                generateLabels: function(chart) {
                  const data = chart.data;
                  return data.labels.map((label, i) => {
                    const value = data.datasets[0].data[i];
                    const percentage = ((value / totalQty) * 100).toFixed(2);
                    return {
                      text: `${label}: ${percentage}%`, // Show percentage in legend
                      fillStyle: data.datasets[0].backgroundColor[i],
                      hidden: isNaN(data.datasets[0].data[i]),
                      index: i
                    };
                  });
                }
              }
            },
            tooltip: {
              callbacks: {
                label: function(tooltipItem) {
                  // Get the value of the current data point
                  const value = tooltipItem.raw;

                  // Calculate percentage
                  const percentage = ((value / totalQty) * 100).toFixed(2);

                  // Return the label with the value and percentage
                  return `${tooltipItem.label}: ${value} (${percentage}%)`;
                }
              }
            }
          }
        }
      });
    }


  });
</script>
<?= $this->endSection() ?>