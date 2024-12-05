<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="az-content-body">
  <br>
  <div class="card bd-0">
    <!-- <div class="card-header bg-gray-400 bd-b-0-f pd-b-0" style="background-color: green;">
      <nav class="nav nav-tabs">
        <a class="nav-link" data-toggle="tab" href="#buyersTab" style="background-color:firebrick; color: white">Sales Reports</a>
      </nav>
    </div>card-header -->
    <div class="card-body bd bd-t-0 tab-content">
      <div id="summary" class="tab-pane active show">
        <div class="row">
          <h4>Customer Sales</h4>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <label><strong>Select Customer:</strong></label>
            <div class="row mg-t-10">
              <div class="col-lg-3">
                <label class="rdiobox">
                  <input name="customerFilter" type="radio" value="all" checked="">
                  <span>All</span>
                </label>
              </div><!-- col-3 -->
              <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                <label class="rdiobox">
                  <input name="customerFilter" type="radio" value="specific">
                  <span>Specific</span>
                </label>
              </div><!-- col-3 -->
            </div>
            <div class="row">
              <div class="form-group mb-2">
                <label class="az-content-label tx-11 tx-medium tx-gray-600">Name:</label>
                <input id="reportCustomer" class="form-control form-control-sm" disabled style="width: 400px">
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <label><strong>Date:</strong></label>
            <div class="row mg-t-10">
              <div class="col-sm-4">
                <div class="form-group mb-2">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Date From</label>
                  <input type="date" id="reportCustomer" class="form-control form-control-sm">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group mb-2">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Date To</label>
                  <input type="date" id="reportCustomer" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- card-body -->
    </div><!-- card -->
  </div><!-- az-content-body -->
  <?= $this->endSection() ?>
  <!---scripts-->
  <?= $this->section('scripts') ?>
  <!-- <script src="<?= "" //base_url('assets/scripts/sales.js') 
                    ?>"></script> -->
  <?= $this->endSection() ?>