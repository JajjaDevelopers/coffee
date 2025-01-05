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
          <h4>Monthly Sales</h4>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <label><strong>Range:</strong></label>
            <div class="row mg-t-10">
              <div class="col-sm-4">
                <div class="form-group mb-2">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">From</label>
                  <input type="month" id="reportCustomer" class="form-control form-control-sm">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group mb-2">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">To</label>
                  <input type="month" id="reportCustomer" class="form-control form-control-sm">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group mb-2">
                  <br>
                  <button type="button" valId="" class="btn btn-primary btn-sm">Run</button>
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