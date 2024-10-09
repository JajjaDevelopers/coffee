<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('/includes/suppliers/newDeliveryModal.php'); ?>
<div class="az-content-body">
  <br>
  <div class="card bd-0">
    <div class="card-header bg-gray-400 bd-b-0-f pd-b-0">
      <nav class="nav nav-tabs">
        <!-- <a class="nav-link active" data-toggle="tab" href="#summary">Summary</a> -->
        <a class="nav-link active" data-toggle="tab" href="#valuations">Valuations</a>
      </nav>
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 tab-content">
      <!-- <div id="summary" class="tab-pane active show">
        <div class="row">
          <div style='display:flex;justify-content:flex-end'>
            <button class="btn btn-sm addDeliveryBtn" style='background-color:green;color:white' id='addSupplierBtn'>
              <strong>+ New Delivery Valuation </strong>
            </button>
          </div>
        </div>
        <h5><strong>Summary of Deliveries</strong></h5>
      </div>tab-pane -->
      <div id="valuations" class="tab-pane active show">
        <div class="row d-flex justify-content-between align-items-center">
          <!-- Date Range Filter -->
          <?= $this->include('includes/filters/daterange_filter.php') ?>

          <!-- Button aligned to the right -->
          <div>
            <button class="btn btn-sm addDeliveryBtn" style='background-color:green;color:white'>
              <strong>+ New Delivery Valuation</strong>
            </button>
          </div>
          <!-- <div class="col-sm-5 col-md-2">
            <label for="fromDate" class="form-label">From Date</label>
            <input type="date" class="form-control form-control-sm" id="fromDate">
          </div>
          <div class="col-sm-5 col-md-2">
            <label for="toDate" class="form-label">To Date</label>
            <input type="date" class="form-control form-control-sm" id="toDate">
          </div>
          <div class="col-sm-2 col-md-1">
            <br>
            <button class="btn btn-sm btn-success" id='deliveriesGetBtn'>Get</button>
          </div> -->
        </div>


        <br>
        <table class='table table-sm table-bordered' id="valuationsTable" style="width:100%;">
          <thead style='color:white'>
            <tr class='text-white'>
              <th style="width: 80px;">Date</th>
              <th style="width: 50px;">GRN</th>
              <th>Supplier</th>
              <th>Grade</th>
              <th style="width: 50px;">Moisture</th>
              <th style="width: 100px;">Quantity</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div id="cashrefund" class="tab-pane">
        <div class="row">
          <div style='display:flex;justify-content:flex-end'>
            <button class="btn btn-sm" style='background-color:green;color:white' id='addGradeCategoryBtn'>
              <strong>+ New Category</strong>
            </button>
          </div>
        </div>
        <br>
        <div class="row">
          <table class='table dataTable table-striped' id="gradeCategoriesTable" style="width:100%;">
            <thead style='color:white'>
              <tr class='text-white'>
                <th>Category Name</th>
                <th>Coffee Type</th>
                <th>Available</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div><!-- tab-pane -->
    </div><!-- card-body -->
  </div><!-- card -->
</div><!-- az-content-body -->
<?= $this->endSection() ?>
<!---scripts-->
<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/scripts/suppliers.js') ?>"></script>
<?= $this->endSection() ?>