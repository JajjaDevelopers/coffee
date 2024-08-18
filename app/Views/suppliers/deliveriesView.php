<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('/includes/suppliers/newDeliveryModal.php'); ?>
<?= $this->include('/includes/generalcss.php'); ?>
<div class="az-content-body">
  <br>
  <div class="row row-sm mg-b-15 mg-sm-b-20">
    <div class="container-fluid" style="height: fit-content;">
      <div class=" container card">
        <div class="card-body">
          <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="gradesTab" data-bs-toggle="tab" data-bs-target="#gradesTabPane" type="button" role="tab" aria-controls="newReceiptTabPane" aria-selected="true">
                  Summary
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="categoriesTab" data-bs-toggle="tab" data-bs-target="#categoriesTabPane" type="button" role="tab" aria-controls="categoriesTabPane" aria-selected="false">
                  Recent Deliveries
                </button>
              </li>
            </ul>
          </div>
          <div class="row tab-content">
            <!-- collection tab pane -->
            <div class="tab-pane fade border p-3 show active" id="gradesTabPane" role="tabpane" aria-labelledby="gradesTab" style='border-top-style: outset;border-top-width: thick;border-top-color:blue;'>
              <div class="row">
                <div style='display:flex;justify-content:flex-end'>
                  <button class="btn btn-sm addDeliveryBtn" style='background-color:green;color:white' id='addSupplierBtn'>
                    <strong>+ New Valuation </strong>
                  </button>
                </div>
              </div>
              <h5><strong>Summary of Deliveries</strong></h5>
              <br>
            </div>
            <!-- recent deliveries tab pane -->
            <div class="tab-pane fade border p-3" id="categoriesTabPane" role="tabpane" aria-labelledby="categoriesTab">
              <div class="row">
                <div style='display:flex;justify-content:flex-end'>
                  <button class="btn btn-sm addDeliveryBtn" style='background-color:green;color:white'>
                    <strong>+ New Valuation</strong>
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-5 col-md-2">
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
                </div>
              </div>
              <br>
              <div class="row">
                <table class='table dataTable table-striped' id="deliveriesTable" style="width:100%;">
                  <thead style='color:white'>
                    <tr class='text-white'>
                      <th>Date</th>
                      <th>GRN</th>
                      <th>Supplier</th>
                      <th>Store</th>
                      <th>Grade</th>
                      <th>Moisture</th>
                      <th>Quantity</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- cash refund tab pane -->
            <div class="container tab-pane fade border p-3" id="groupsTabPane" role="tabpane" aria-labelledby="groupsTab">
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

          </div>
        </div>
      </div>
    </div>
  </div><!-- row -->
</div><!-- az-content-body -->
<?= $this->endSection() ?>
<!---scripts-->
<?= $this->section('scripts') ?>
<?= $this->include('/includes/generalscripts') ?>
<script src="<?= base_url('assets/scripts/suppliers.js') ?>"></script>
<?= $this->endSection() ?>