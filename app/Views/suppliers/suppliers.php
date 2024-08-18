<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('/includes/suppliers/addSupplierModal.php'); ?>
<div class="az-content-body">
  <br>
  <div class="card bd-0">
    <div class="card-header bg-gray-400 bd-b-0-f pd-b-0">
      <nav class="nav nav-tabs">
        <a class="nav-link active" data-toggle="tab" href="#suppliers">Suppliers</a>
        <a class="nav-link" data-toggle="tab" href="#deliveries">Deliveries</a>
        <a class="nav-link" data-toggle="tab" href="#groups">Groups</a>
      </nav>
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 tab-content">
      <div id="suppliers" class="tab-pane active show">
        <h5><strong>List of Suppliers</strong></h5>
        <div class="row">
          <div style='display:flex;justify-content:flex-end'>
            <button class="btn btn-sm" style='background-color:green;color:white' id='addSupplierBtn'>
              <strong>+ New Supplier </strong>
            </button>
          </div>
        </div>
        <br>
        <div class="dataTables_wrapper no-footer">
          <table id="suppliersListTable" class='table table-sm table-hover'>
            <thead>
              <tr>
                <th>Name</th>
                <th>District</th>
                <th>Category</th>
                <th>Contact Person</th>
                <th>Telephone</th>
                <th>Email</th>
              </tr>
            </thead>

          </table>
        </div>
      </div><!-- tab-pane -->
      <div id="deliveries" class="tab-pane">
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
<script src="<?= base_url('assets/scripts/suppliers.js') ?>"></script>
<?= $this->endSection() ?>