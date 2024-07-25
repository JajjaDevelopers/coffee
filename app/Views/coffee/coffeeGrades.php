<?= $this->extend('dashboard/main') ?>
<?= $this->section('content') ?>
<?= $this->include('/includes/grades/addCategoryModal.php'); ?>
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
                <button class="nav-link active" id="newReceiptTab" data-bs-toggle="tab" data-bs-target="#newReceiptTabPane" type="button" role="tab" aria-controls="newReceiptTabPane" aria-selected="true">
                  Grades
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="prevPaytTab" data-bs-toggle="tab" data-bs-target="#previousReceiptsTabPane" type="button" role="tab" aria-controls="previousReceiptsTabPane" aria-selected="false">
                  Categories
                </button>
              </li>
            </ul>
          </div>
          <div class="row tab-content">
            <!-- collection tab pane -->
            <div class="card container tab-pane fade border p-3 show active" id="newReceiptTabPane" role="tabpanel" aria-labelledby="newReceiptTab" style='border-top-style: outset;border-top-width: thick;border-top-color:blue;'>

              <h5><strong>Coffee Grades</strong></h5>
              <div class="row">
                <div style='display:flex;justify-content:flex-end'>
                  <button class="btn btn-sm" style='background-color:green;color:white' id='addAccountBtn'>
                    <strong>+ Add Grade </strong>
                  </button>
                </div>
              </div>
              <br>
              <table id="billingListTable" class='table table-sm table-hover'>
                <thead>
                  <tr>
                    <!-- <th id='student_Id'>ID</th> -->
                    <th>Roll Number</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Class</th>
                    <th>Stream</th>
                    <th>Balance</th>
                    <th>Action</th>
                  </tr>
                </thead>

              </table>
              <!-- </div> -->
              <!-- </div> -->
              <!-- </div> -->
            </div>
            <!-- recent receipts tab pane -->
            <div class="container tab-pane fade border p-3" id="previousReceiptsTabPane" role="tabpanel" aria-labelledby="prevPaytTab">
              <div class="row">
                <div style='display:flex;justify-content:flex-end'>
                  <button class="btn btn-sm" style='background-color:green;color:white' id='addGradeCategoryBtn'>
                    <strong>+ Add Category</strong>
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
            <!-- cash refund tab pane -->
            <div class="container tab-pane fade border p-3" id="cashRefundTabPane" role="tabpanel" aria-labelledby="refundTab">
              <table class='table  table-striped table-sm' id="refundTable" style="width:100%;">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Surname</th>
                    <th>Class</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="">
                </tbody>
              </table>
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
<script src="<?= base_url('assets/scripts/grades.js') ?>"></script>
<?= $this->endSection() ?>