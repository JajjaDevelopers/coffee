<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="az-content-header d-block d-md-flex">
  <div>
    <h2 class="az-content-title tx-24 mg-b-5 mg-b-lg-8">Hi, <?= $commonData['user']['name'] ?>, Welcome Back!</h2>
    <p class="mg-b-0">Your Monitoring Dashboard.</p>
  </div>
  <div class="az-dashboard-header-right">
    <div>
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
    </div>
  </div><!-- az-dashboard-header-right -->
</div><!-- az-content-header -->
<div class="az-content-body">
  <div class="card card-dashboard-seven">
    <div class="card-header">
      <div class="row row-sm">
        <div class="col-6 col-md-4 col-xl">
          <div class="media">
            <div><i class="icon ion-ios-calendar"></i></div>
            <div class="media-body">
              <label>Start Date</label>
              <div class="date">
                <span>Sept 01, 2018</span> <a href=""><i class="icon ion-md-arrow-dropdown"></i></a>
              </div>
            </div>
          </div><!-- media -->
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
          </div><!-- media -->
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
          </div><!-- media -->
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
          </div><!-- media -->
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
          </div><!-- media -->
        </div>
      </div><!-- row -->
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
    <div class="col-lg-6 col-xl-5 mg-t-20 mg-lg-t-0">
      <div class="card card-dashboard-map-one">
        <label class="az-content-label">Sales Revenue by Customers in USA</label>
        <span class="d-block mg-b-20">Sales Performance of all states in the United States</span>
        <div id="vmap2" class="vmap-wrapper"></div>
      </div><!-- card -->
    </div><!-- col -->
  </div><!-- row -->

  <div class="row row-sm mg-b-20 mg-lg-b-0">
    <div class="col-md-6 col-xl-7">
      <div class="card card-table-two">
        <h6 class="card-title">Your Most Recent Earnings</h6>
        <span class="d-block mg-b-20">This is your most recent earnings for today's date.</span>
        <div class="table-responsive">
          <table class="table table-striped table-dashboard-two">
            <thead>
              <tr>
                <th class="wd-lg-25p">Date</th>
                <th class="wd-lg-25p tx-right">Sales Count</th>
                <th class="wd-lg-25p tx-right">Earnings</th>
                <th class="wd-lg-25p tx-right">Tax Witheld</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>05 Oct 2018</td>
                <td class="tx-right tx-medium tx-inverse">25</td>
                <td class="tx-right tx-medium tx-inverse">$380.50</td>
                <td class="tx-right tx-medium tx-danger">-$23.50</td>
              </tr>
              <tr>
                <td>04 Oct 2018</td>
                <td class="tx-right tx-medium tx-inverse">34</td>
                <td class="tx-right tx-medium tx-inverse">$503.20</td>
                <td class="tx-right tx-medium tx-danger">-$13.45</td>
              </tr>
              <tr>
                <td>03 Oct 2018</td>
                <td class="tx-right tx-medium tx-inverse">30</td>
                <td class="tx-right tx-medium tx-inverse">$489.65</td>
                <td class="tx-right tx-medium tx-danger">-$20.98</td>
              </tr>
              <tr>
                <td>02 Oct 2018</td>
                <td class="tx-right tx-medium tx-inverse">27</td>
                <td class="tx-right tx-medium tx-inverse">$421.80</td>
                <td class="tx-right tx-medium tx-danger">-$22.22</td>
              </tr>
              <tr>
                <td>01 Oct 2018</td>
                <td class="tx-right tx-medium tx-inverse">31</td>
                <td class="tx-right tx-medium tx-inverse">$518.60</td>
                <td class="tx-right tx-medium tx-danger">-$23.01</td>
              </tr>
            </tbody>
          </table>
        </div><!-- table-responsive -->
      </div><!-- card-dashboard-five -->
    </div>
    <div class="col-md-6 col-xl-5 mg-t-20 mg-md-t-0">
      <div class="card card-dashboard-eight">
        <h6 class="card-title">Your Top Countries</h6>
        <span class="d-block mg-b-20">Sales performance revenue based by country</span>

        <div class="list-group">
          <div class="list-group-item">
            <i class="flag-icon flag-icon-us flag-icon-squared"></i>
            <p>United States</p>
            <span>$1,671.10</span>
          </div><!-- list-group-item -->
          <div class="list-group-item">
            <i class="flag-icon flag-icon-nl flag-icon-squared"></i>
            <p>Netherlands</p>
            <span>$1,064.75</span>
          </div><!-- list-group-item -->
          <div class="list-group-item">
            <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
            <p>United Kingdom</p>
            <span>$1,055.98</span>
          </div><!-- list-group-item -->
          <div class="list-group-item">
            <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
            <p>Canada</p>
            <span>$1,045.49</span>
          </div><!-- list-group-item -->
          <div class="list-group-item">
            <i class="flag-icon flag-icon-au flag-icon-squared"></i>
            <p>Australia</p>
            <span>$1,042.00</span>
          </div><!-- list-group-item -->
        </div><!-- list-group -->
      </div><!-- card -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- az-content-body -->
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
  /* ----------------------------------- */
  /* Dashboard content */
  $(document).ready(function() {
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

    $('#vmap2').vectorMap({
      map: 'usa_en',
      showTooltip: true,
      backgroundColor: '#fff',
      color: '#60adff',
      colors: {
        mo: '#9fceff',
        fl: '#60adff',
        or: '#409cff',
        ca: '#005cbf',
        tx: '#005cbf',
        wy: '#005cbf',
        ny: '#007bff'
      },
      hoverColor: '#222',
      enableZoom: false,
      borderWidth: 1,
      borderColor: '#fff',
      hoverOpacity: .85
    });
  });
</script>
<?= $this->endSection() ?>