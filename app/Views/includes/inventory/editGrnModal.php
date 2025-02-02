<!-- Adding new category -->
<div id="editGrnModal" class="modal">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">GRN Adjustment</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 col-md-2">
              <label for="editGrnNo" class="form-label text-danger">GRN No.</label>
              <strong><input class="form-control form-control-sm text-danger" id='editGrnNo' readonly></strong>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="editGrnDate" class="form-label">Date</label>
              <input type="date" class="form-control form-control-sm" id='editGrnDate'>
            </div>
            <div class="col-sm-12 col-md-7">
              <label for="editGrnSupplier" class="form-label">Supplier</label>
              <select class="form-control form-control-sm" id='editGrnSupplier' style="width: 100%;">

              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="editGrnItmCode" class="form-label">Item Code</label>
              <input class="form-control form-control-sm" id='editGrnItmCode' readonly>
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="editGrnItem" class="form-label">Item Description</label>
              <select class="form-control form-control-sm form-select grnItemField" id='editGrnItem' style="width: 100%;">
              </select>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="editGrnQty" class="form-label">Weight (Kg)</label>
              <input type="number" class="form-control form-control-sm" id='editGrnQty'>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="editGrnBags" class="form-label">No. of Bags</label>
              <input type="number" class="form-control form-control-sm" id='editGrnBags'>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="editGrnPurpose" class="form-label">Purpose</label>
              <select type="number" class="form-control form-control-sm" id='editGrnPurpose'>
                <option value="">--select--</option>
                <option value="1">Processing</option>
                <option value="2">Roastery</option>
                <option value="3">Storage</option>
                <option value="4">Weighing</option>
              </select>
            </div>
          </div>
          <hr>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="editGrnOrigin" class="form-label">Items Origin</label>
              <input class="form-control form-control-sm" id='editGrnOrigin'>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="editGrnVNo" class="form-label">Vehicle Reg. No</label>
              <input class="form-control form-control-sm" id='editGrnVNo'>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="editGrnVSize" class="form-label">Vehicle Size</label>
              <select class="form-control form-control-sm form-select" id='editGrnVSize' style="width: 100%;">
                <option value="">--Select--</option>
                <option value="SMALL">SMALL</option>
                <option value="MEDIUM">MEDIUM</option>
                <option value="LARGE">LARGE</option>
              </select>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="editGrnWeighFees" class="form-label">Weighing Fees</label>
              <input type="number" class="form-control form-control-sm text-right" id='editGrnWeighFees' value="0">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <label for="editGrnDeliveredBy" class="form-label">Delivered by:</label>
              <input class="form-control form-control-sm" id='editGrnDeliveredBy'>
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="editGrnTicket" class="form-label">WB Ticket No</label>
              <input class="form-control form-control-sm" id='editGrnTicket'>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <label for="editGrnRemarks" class="form-label">Remarks</label>
              <input class="form-control form-control-sm" id='editGrnRemarks'>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id='saveNewGrnBtn' type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->