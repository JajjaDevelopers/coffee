<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="az-content-body">
  <br>
  <div class="card bd-0">
    <h4>Customer Sales</h4>
    <div class="card-body bd bd-t-0 tab-content">
      <div class="row">
        <div class="col-sm-5 col-md-4">
          <!-- <div class="row"> -->
          <div class="form-group mb-2">
            <label for="reportCustomer" class="az-content-label tx-11 tx-medium tx-gray-600">Customer:</label>
            <input id="reportCustomer" class="form-control form-control-sm" style="width: 400px">
          </div>
          <!-- </div> -->
        </div>
        <div class="col-sm-5 col-md-3">
          <div class="row">
            <div class="col-sm-5">
              <div class="form-group mb-2">
                <label for="custSalesRepDateFrom" class="az-content-label tx-11 tx-medium tx-gray-600">From</label>
                <input type="date" id="custSalesRepDateFrom" class="form-control form-control-sm">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group mb-2">
                <label for="custSalesRepDateTo" class="az-content-label tx-11 tx-medium tx-gray-600">To</label>
                <input type="date" id="custSalesRepDateTo" class="form-control form-control-sm">
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-2 col-md-1">
          <br>
          <button id="customerSalesRunBtn" type="button" class="btn btn-primary btn-sm">Run</button>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-12 col-md-9">
          <table class="table table-sm">
            <thead>
              <tr>
                <th colspan="7">Customer Sales Report</th>
              </tr>
            </thead>
            <tbody id="customersalesReportTbody">

            </tbody>
          </table>
        </div>
      </div>
    </div><!-- card -->
  </div><!-- az-content-body -->
  <?= $this->endSection() ?>
  <!---scripts-->
  <?= $this->section('scripts') ?>
  <script src="<?= base_url('assets/scripts/sales.js')
                ?>"></script>
  <?= $this->endSection() ?>