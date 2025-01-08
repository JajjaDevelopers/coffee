<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="az-content-body">
  <br>
  <div class="card bd-0">
    <div class="card-header bg-gray-400 bd-b-0-f pd-b-0">
      <div class="row">
        <h4>Monthly Sales</h4>
      </div>
    </div>
    <div class="card-body bd bd-t-0 tab-content">
      <div id="summary" class="tab-pane active show">
        <!-- <div class="row">
          <h4>Monthly Sales</h4>
        </div> -->
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <label><strong>Range:</strong></label>
            <div class="row mg-t-10">
              <div class="col-sm-4">
                <div class="form-group mb-2">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">From</label>
                  <input type="month" id="monthlySalesRepFrm" class="form-control form-control-sm">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group mb-2">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">To</label>
                  <input type="month" id="monthlySalesRepTo" class="form-control form-control-sm">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group mb-2">
                  <br>
                  <button id="monthlySalesRunBtn" type="button" class="btn btn-primary btn-sm">Run</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <!-- Report table -->
        <br>
        <div id="monthlySalesRepTable" class="row" style="display: none;">
          <div class="col-sm-9 col-md-6">
            <h5 class="text-center">Monthly Sales Summary</h5>
            <h6 id="monthlySalesRange" class="text-center"></h6>
            <hr>
            <table class="table table-sm">
              <thead>
                <tr>
                  <th class="text-center">SN</th>
                  <th>Month</th>
                  <th class="text-right">Quatntiy (Kg)</th>
                  <th class="text-center">Avg Price</th>
                  <th class="text-right">Total Value</th>
                  <th class="text-center">Ratio</th>
                  <th class="text-center">Direction</th>
                </tr>
              </thead>
              <tbody id="monthlySalesTBody">

              </tbody>
            </table>
          </div>
        </div>
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- az-content-body -->
  <?= $this->endSection() ?>
  <!---scripts-->
  <?= $this->section('scripts') ?>
  <script src="<?= base_url('assets/scripts/sales.js')
                ?>"></script>
  <script src="<?= base_url('assets/scripts/generalScripts.js')
                ?>"></script>
  <?= $this->endSection() ?>