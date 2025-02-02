<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('/includes/inventory/addGrnModal.php'); ?>
<?= $this->include('/includes/inventory/previewGrnModal.php'); ?>
<div class="az-content-body">
  <br>
  <div class="card bd-0 ">
    <div class="card-header bg-gray-400 bd-b-0-f pd-b-0" style="background-color: green; color: white">
      <h4>Goods Received</h4>
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 tab-content">
      <div id="grades" class="tab-pane active show">
        <div class="row d-flex justify-content-between align-items-center">
          <div>
            <button id="addGrnBtn" class="btn btn-sm" style='background-color:green;color:white'>
              <strong>+ New GRN</strong>
            </button>
          </div>
        </div>
        <br>
        <div class="dataTables_wrapper no-footer">
          <table id="grnsListTable" class='table table-sm table-hover'>
            <thead style="background-color:burlywood;">
              <tr style="color: white;">
                <th>Date</th>
                <th>Supplier</th>
                <th>GRN</th>
                <th>Vehicle Reg No.</th>
                <th>Item Description</th>
                <th style="width: 120px;">Quantity (Kg)</th>
              </tr>
            </thead>

          </table>
          <label class="text-danger"><small>GRNs in Red are pending approval!</small></label>
        </div>
      </div><!-- tab-pane -->
      <div id="categories" class="tab-pane">
        <div class="row">
          <div style='display:flex;justify-content:flex-end'>
            <button class="btn btn-sm" style='background-color:green;color:white' id='addGradeCategoryBtn'>
              <strong>+ New Category</strong>
            </button>
          </div>
        </div>
        <br>
        <div>
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
      </div>
      <div id="groups" class="tab-pane">
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
<script src="<?= base_url('assets/scripts/inventory.js') ?>"></script>
<?= $this->endSection() ?>