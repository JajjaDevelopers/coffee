<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('/includes/suppliers/newValuationModal.php'); ?>
<?= $this->include('/includes/suppliers/valuationPreviewModal.php'); ?>
<?= $this->include('/includes/suppliers/editValuationModal.php'); ?>
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
      <div id="valuations" class="tab-pane active show">
        <div class="row d-flex justify-content-between align-items-center">
          <!-- Date Range Filter -->
          <?= $this->include('includes/filters/daterange_filter.php') ?>

          <!-- Button aligned to the right -->
          <div>
            <button id="addDeliveryBtn" class="btn btn-sm" style='background-color:green;color:white'>
              <strong>+ New Valuation</strong>
            </button>
          </div>
        </div>


        <br>
        <table class='table table-sm table-bordered' id="valuationsTable" style="width:100%;">
          <thead style='color:white'>
            <tr class='text-white'>
              <th>Valuation Date</th>
              <th>Supplier</th>
              <th>GRN</th>
              <th style="width: 80px;">Moisture (%)</th>
              <th>Qty (Kgs)</th>
              <th>Value (UGX)</th>
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
<script src="<?= base_url('assets/scripts/valuations.js') ?>"></script>

<?= $this->endSection() ?>