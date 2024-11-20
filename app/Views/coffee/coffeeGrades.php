<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('/includes/grades/addCategoryModal.php'); ?>
<?= $this->include('/includes/grades/addGradeModal.php'); ?>
<div class="az-content-body">
  <br>
  <div class="card bd-0 ">
    <div class="card-header bg-gray-400 bd-b-0-f pd-b-0" style="background-color: green;">
      <nav class="nav nav-tabs">
        <a class="nav-link active" data-toggle="tab" href="#grades">Grades</a>
        <a class="nav-link" data-toggle="tab" href="#categories">Categories</a>
        <a class="nav-link" data-toggle="tab" href="#groups">Groups</a>
      </nav>
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 tab-content">
      <div id="grades" class="tab-pane active show">
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
<script src="<?= base_url('assets/scripts/grades.js') ?>"></script>
<?= $this->endSection() ?>