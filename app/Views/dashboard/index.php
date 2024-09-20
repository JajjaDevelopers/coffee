<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
        .morris-hover.morris-default-style {
            border-radius: 10px;
        }
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
          <h4>Sales</h4>
          <div class="row">
            <div class="col-6 col-lg-6">
              <label class="az-content-label">Total Quantity</label>
              <h2>110,000<span>Kgs</span></h2>
              <div class="desc up">
                <i class="icon ion-md-stats"></i>
                <span><strong>2.00%</strong> (30 days)</span>
              </div>
              <span id="compositeline2">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div><!-- col -->
            <div class="col-6 col-lg-6">
              <label class="az-content-label">Total Revenue</label>
              <h2><span>UGX</span>523,200</h2>
              <div class="desc up">
                <i class="icon ion-md-stats"></i>
                <span><strong>12.09%</strong> (30 days)</span>
              </div>
              <span id="compositeline">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div><!-- col -->
          </div>
        </div>
        <div class="col-md-6">
          <h4>Purchases</h4>
          <div class="row">
            <div class="col-6 col-lg-6 mg-t-20 mg-lg-t-0">
              <label class="az-content-label">Total Quantity</label>
              <h2>753,098<span>Kgs</span></h2>
              <div class="desc down">
                <i class="icon ion-md-stats"></i>
                <span><strong>0.51%</strong> (30 days)</span>
              </div>
              <span id="compositeline4">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div><!-- col -->
            <div class="col-6 col-lg-6 mg-t-20 mg-lg-t-0">
              <label class="az-content-label">Purchases Valuation</label>
              <h2><span>UGX</span>331,886</h2>
              <div class="desc up">
                <i class="icon ion-md-stats"></i>
                <span><strong>5.32%</strong> (30 days)</span>
              </div>
              <span id="compositeline3">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div><!-- col -->
          </div>
        </div>
      </div><!-- row -->
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="row row-sm mg-b-15 mg-sm-b-20">
    <div class="col-lg-6 col-xl-7">
      <div class="card card-dashboard-six">
        <div class="card-header">
          <div>
            <label class="az-content-label">This Year's Total Revenue</label>
            <span class="d-block">Sales Performance for Online and Offline Revenue</span>
          </div>
          <div class="chart-legend">
            <div><span>Online Revenue</span> <span class="bg-indigo"></span></div>
            <div><span>Offline Revenue</span> <span class="bg-teal"></span></div>
          </div>
        </div><!-- card-header -->
        <div id="morrisBar1" class="ht-200 ht-lg-250 wd-100p"></div>
      </div><!-- card -->
    </div><!-- col -->
    <div class="col-lg-6 col-xl-7">
      <div class="card card-dashboard-six">
        <div class="card-header">
          <div>
            <h2 class="az-content-label">Acctual Vs Projected </h2>
          </div>
          <div id="legend">
          </div>
        </div><!-- card-header -->
        <div id="morris-line-chart" class="ht-200 ht-lg-250 wd-100p"></div>
      </div><!-- card -->
    </div>
    <!-- <div class="col-lg-6 col-xl-5 mg-t-20 mg-lg-t-0">
      <div class="card card-dashboard-map-one">
        <label class="az-content-label">Actual Vs Projected Quantity</label>
        <div id="legend"></div>
        <div id="morris-line-chart" style="height: 250px;">
        </div>
      </div>
    </div> -->
  </div><!-- row -->


</div><!-- az-content-body -->
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<!-- Metrics Data -->
<script src="<?= base_url('assets/scripts/dashboard.js') ?>"></script>
<script>
  /* ----------------------------------- */
  /* Dashboard content */

  $(document).ready(function() {

    //ajax request to pick sales data
    let salesData=null;
    $.ajax({
    type: "post",
    url: "/sales/salesByType",
    data: "data",
    dataType: "json",
    success: function (response) {
      console.log(response);
      salesData=response;
      actualSalesVsProjected(salesData);
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


//functiom to plot actual coffee sales vs projected value
   const actualSalesVsProjected=(salesData)=>{
    let allMonthsSales = salesData.allMonthSales;
    console.log(allMonthsSales);
   }

   actualSalesVsProjected();

    var morrisData = [{
        y: 'Oct 01',
        a: 95000,
        b: 70000
      },
      {
        y: 'Oct 05',
        a: 75000,
        b: 55000
      },
      {
        y: 'Oct 10',
        a: 50000,
        b: 40000
      },
      {
        y: 'Oct 15',
        a: 75000,
        b: 65000
      },
      {
        y: 'Oct 20',
        a: 50000,
        b: 40000
      },
      {
        y: 'Oct 25',
        a: 80000,
        b: 90000
      },
      {
        y: 'Oct 30',
        a: 75000,
        b: 65000
      }
    ];

    new Morris.Bar({
      element: 'morrisBar1',
      data: morrisData,
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Online', 'Offline'],
      barColors: ['#560bd0', '#00cccc'],
      preUnits: '$',
      barSizeRatio: 0.55,
      gridTextSize: 11,
      gridTextColor: '#494c57',
      gridTextWeight: 'bold',
      gridLineColor: '#999',
      gridStrokeWidth: 0.25,
      hideHover: 'auto',
      resize: true,
      padding: 5
    });

    var data = [
            { month: '2023-10', registrations: 30, activeUsers: 20 },
            { month: '2023-11', registrations: 40, activeUsers: 30 },
            { month: '2023-12', registrations: 25, activeUsers: 35 },
            { month: '2024-01', registrations: 50, activeUsers: 40 },
            { month: '2024-02', registrations: 35, activeUsers: 45 },
            { month: '2024-03', registrations: 60, activeUsers: 55 }
        ];

        // Initialize the Morris Line Chart
        var chart = Morris.Line({
            element: 'morris-line-chart',
            data: data,
            xkey: 'month',
            ykeys: ['registrations', 'activeUsers'],
            labels: ['Registrations', 'Active Users'],
            lineColors: ['#0b62a4', '#7a92a3'],
            xLabelAngle: 45, // Tilts the x-axis labels by 45 degrees
            parseTime: true,
            resize: true,
            gridTextSize: 12, // Font size for axis labels
            gridTextFamily: 'Arial', // Font family for axis labels
            pointFillColors: ['#ffffff'],
            pointStrokeColors: ['#0b62a4'],
            hideHover: 'auto',
            hoverCallback: function (index, options, content, row) {
                return content; // Custom tooltip content
            }
        });

        // Create a custom legend
        function createLegend(labels, colors) {
            var legend = $('#legend');
            labels.forEach(function(label, index) {
                var legendItem = $('<span class="legend-item"></span>');
                var colorBox = $('<span class="legend-color-box"></span>').css('background-color', colors[index]);
                legendItem.append(colorBox).append(label);
                legend.append(legendItem);
            });
        }

        // Call createLegend with labels and colors
        createLegend(['Registrations', 'Active Users'], ['#0b62a4', '#7a92a3']);
  });
</script>
<?= $this->endSection() ?>