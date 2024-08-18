<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('/includes/grades/addCategoryModal.php'); ?>
<?= $this->include('/includes/grades/addGradeModal.php'); ?>
<div class="az-content-body">
  <br>
  <div class="row row-sm mg-b-15 mg-sm-b-20">
    <div class="container-fluid" style="height: fit-content;">
      <div class="card bd-0 wd-280 wd-sm-500 wd-md-700 wd-xl-850">
        <div class="card-header card-header-tab">
          <div class="az-nav-tabs">
            <div id="navComplex">
              <div class="tab-item"><a href="#azTab1" class="tab-link active">Grades</a></div>
              <div class="tab-item"><a href="#azTab2" class="tab-link">Categories</a></div>
              <div class="tab-item"><a href="#azTab3" class="tab-link">Groups</a></div>
            </div>
          </div><!-- az-nav-complex -->
        </div><!-- card-header -->
        <div class="card-body bd bd-t-0 pd-xl-25">
          <div class="az-tab-content">
            <div id="azTab1" class="az-tab-pane active">
              <h5><strong>Coffee Grades</strong></h5>
              <div class="row">
                <div style='display:flex;justify-content:flex-end'>
                  <button class="btn btn-sm" style='background-color:green;color:white' id='addGradeBtn'>
                    <strong>+ New Grade </strong>
                  </button>
                </div>
              </div>
              <br>
              <div class="dataTables_wrapper no-footer">
                <table id="gradesListTable" class='table table-sm table-hover'>
                  <thead>
                    <tr>
                      <th>Code</th>
                      <th>Grade Name</th>
                      <th>Group</th>
                      <th>Available</th>
                      <th>Unit</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                </table>
              </div>
            </div>
            <div id="azTab2" class="az-tab-pane">
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
            <div id="azTab3" class="az-tab-pane">
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
          </div><!-- az-tab-content -->
        </div><!-- card-body -->
      </div><!-- card -->
    </div>
  </div><!-- row -->
</div><!-- az-content-body -->
<?= $this->endSection() ?>
<!---scripts-->
<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/scripts/grades.js') ?>"></script>
<?= $this->endSection() ?>