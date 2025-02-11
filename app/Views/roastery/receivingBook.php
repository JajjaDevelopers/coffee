<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('/roastery/addRoasteryGrnModal.php'); ?>
<div class="az-content-body">
  <br>
  <div class="card bd-0 ">
    <div class="card-header bg-gray-400 bd-b-0-f pd-b-0" style="background-color: green; color: white">
      <h4>Roastery Receiving Book</h4>
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 tab-content">
      <div id="grades" class="tab-pane active show">
        <div class="row d-flex justify-content-between align-items-center">
          <div>
            <button id="addRoasteryGrnBtn" class="btn btn-sm" style='background-color:green;color:white'>
              <strong>+ New GRN</strong>
            </button>
          </div>
        </div>
        <br>
        <div class="dataTables_wrapper no-footer">
          <table id="roasteryGrnsTable" class='table table-sm table-hover'>
            <thead style="background-color:burlywood;">
              <tr style="color: white;">
                <th>Date</th>
                <th>Customer</th>
                <th>Book No</th>
                <th>GRN</th>
                <th>Grade</th>
                <th style="width: 120px;">Qty In (Kg)</th>
              </tr>
            </thead>

          </table>
          <label class="text-danger"><small>GRNs in Red are pending approval!</small></label>
        </div>
      </div><!-- tab-pane -->
    </div><!-- card-body -->

  </div><!-- card -->
</div><!-- az-content-body -->
<?= $this->endSection() ?>
<!---scripts-->
<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/scripts/roastery.js') ?>"></script>
<?= $this->endSection() ?>