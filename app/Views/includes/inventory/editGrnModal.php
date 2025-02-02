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
              <label for="addGrnNo" class="form-label text-danger">GRN No.</label>
              <strong><input class="form-control form-control-sm text-danger" id='addGrnNo'></strong>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="addGrnDate" class="form-label">Date</label>
              <input type="date" class="form-control form-control-sm" id='addGrnDate'>
            </div>
            <div class="col-sm-12 col-md-7">
              <label for="addGrnSupplier" class="form-label">Supplier</label>
              <select class="form-control form-control-sm" id='addGrnSupplier' style="width: 100%;">

              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="addGrnItmCode" class="form-label">Item Code</label>
              <input class="form-control form-control-sm" id='addGrnItmCode' readonly>
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="addGrnItem" class="form-label">Item Description</label>
              <select class="form-control form-control-sm form-select grnItemField" id='addGrnItem' style="width: 100%;">
              </select>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="addGrnQty" class="form-label">Weight (Kg)</label>
              <input type="number" class="form-control form-control-sm" id='addGrnQty'>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="addGrnBags" class="form-label">No. of Bags</label>
              <input type="number" class="form-control form-control-sm" id='addGrnBags'>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="addGrnPurpose" class="form-label">Purpose</label>
              <select type="number" class="form-control form-control-sm" id='addGrnPurpose'>
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
              <label for="addGrnOrigin" class="form-label">Items Origin</label>
              <input class="form-control form-control-sm" id='addGrnOrigin'>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="addGrnVNo" class="form-label">Vehicle Reg. No</label>
              <input class="form-control form-control-sm" id='addGrnVNo'>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="addGrnVSize" class="form-label">Vehicle Size</label>
              <select class="form-control form-control-sm form-select" id='addGrnVSize' style="width: 100%;">
                <option value="">--Select--</option>
                <option value="SMALL">SMALL</option>
                <option value="MEDIUM">MEDIUM</option>
                <option value="LARGE">LARGE</option>
              </select>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="addGrnWeighFees" class="form-label">Weighing Fees</label>
              <input type="number" class="form-control form-control-sm text-right" id='addGrnWeighFees' value="0" readonly>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <label for="addGrnDeliveredBy" class="form-label">Delivered by:</label>
              <input class="form-control form-control-sm" id='addGrnDeliveredBy'>
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="addGrnTicket" class="form-label">WB Ticket No</label>
              <input class="form-control form-control-sm" id='addGrnTicket'>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <label for="addGrnRemarks" class="form-label">Remarks</label>
              <input class="form-control form-control-sm" id='addGrnRemarks'>
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