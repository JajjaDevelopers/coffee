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
                <label class="az-content-label tx-11 tx-medium tx-gray-600">From</label>
                <input type="date" id="reportCustomer" class="form-control form-control-sm">
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group mb-2">
                <label class="az-content-label tx-11 tx-medium tx-gray-600">To</label>
                <input type="date" id="reportCustomer" class="form-control form-control-sm">
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-2 col-md-1">
          <br>
          <button id="monthlySalesRunBtn" type="button" class="btn btn-primary btn-sm">Run</button>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-12 col-md-9">
          <table class="table table-sm">
            <thead>
              <tr>
                <th>Code</th>
                <th>Item Name</th>
                <th>Unit</th>
                <th>Freq</th>
                <th>Quantity</th>
                <th>Avg Price Ugx</th>
                <th>Amount Ugx</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div><!-- card -->
  </div><!-- az-content-body -->
  <?= $this->endSection() ?>
  <!---scripts-->
  <?= $this->section('scripts') ?>
  <!-- <script src="<?= "" //base_url('assets/scripts/sales.js') 
                    ?>"></script> -->
  <?= $this->endSection() ?>

  <!-- SELECT grade_code AS code, grade_name AS item, unit, count(grade_code) AS transactions, sum(qty_out) AS qty, sum(price*exch_rate*qty_out) AS value
FROM inventory
JOIN grades USING (grade_id)
WHERE transaction_type_id=2 AND client_id=15
GROUP BY grade_id
ORDER BY grade_id -->