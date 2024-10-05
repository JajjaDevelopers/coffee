<?= $this->extend('partials/main') ?>
<?= $this->section('title') ?>
<?= $page_title ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->include('/includes/buyers/newSalesReportModal.php'); ?>
<?= $this->include('/includes/buyers/previewSalesReportModal.php'); ?>
<div class="az-content-body">
  <br>
  <div class="card bd-0">
    <div class="card-header bg-gray-400 bd-b-0-f pd-b-0" style="background-color: green;">
      <nav class="nav nav-tabs">
        <a class="nav-link" data-toggle="tab" href="#buyersTab" style="background-color:firebrick; color: white">Sales Reports</a>
      </nav>
    </div><!-- card-header -->
    <div class="card-body bd bd-t-0 tab-content">
      <div id="summary" class="tab-pane active show">
        <div class="row">
          <div style='display:flex;justify-content:flex-end'>
            <button class="btn btn-sm addSalesReportBtn" style='background-color:green;color:white'>
              <strong>+ New Sales Report</strong>
            </button>
          </div>
        </div>
        <br>
        <table class='table table-sm table-bordered' id="salesReportsTable" style="width:100%;">
          <thead style='color:white'>
            <tr>
              <th>Date</th>
              <th>Report No.</th>
              <th>Buyer</th>
              <th>Total Qty (Kg)</th>
              <th>Currency </th>
              <th style="width: 100px;">Total Value</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div><!-- card-body -->
  </div><!-- card -->
</div><!-- az-content-body -->
<?= $this->endSection() ?>
<!---scripts-->
<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/scripts/buyers.js') ?>"></script>
<?= $this->endSection() ?>