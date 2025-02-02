<!-- Adding new category -->
<div id="previewGrnModal" class="modal">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">GRN Preview</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
          <div class="row">
            <div class="col-11"></div>
            <div class="col-1">
              <button id='grnEditBtn' type="button" grnId="" class="form-control form-control-sm btn-warning"
                style="color:white; background-color:brown; margin-right:1opx">
                Edit
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-2">
              <label for="prevGrnNo" class="form-label text-danger">GRN No.</label>
              <input class="form-control form-control-sm text-danger" id='prevGrnNo' readonly>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="prevGrnDate" class="form-label">Date</label>
              <input type="date" class="form-control form-control-sm" id='prevGrnDate' readonly>
            </div>
            <div class="col-sm-12 col-md-7">
              <label for="prevGrnSupplier" class="form-label">Supplier</label>
              <input class="form-control form-control-sm" id='prevGrnSupplier' style="width: 100%;" readonly>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="prevGrnItmCode" class="form-label">Item Code</label>
              <input class="form-control form-control-sm" id='prevGrnItmCode' readonly>
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="prevGrnItem" class="form-label">Item Description</label>
              <input class="form-control form-control-sm form-select grnItemField" id='prevGrnItem' style="width: 100%;" readonly>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="prevGrnQty" class="form-label">Weight (Kg)</label>
              <input type="number" class="form-control form-control-sm" id='prevGrnQty' readonly>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="prevGrnBags" class="form-label">No. of Bags</label>
              <input type="number" class="form-control form-control-sm" id='prevGrnBags' readonly>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="prevGrnPurpose" class="form-label">Purpose</label>
              <input class="form-control form-control-sm" id='prevGrnPurpose'>
            </div>
          </div>
          <hr>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="prevGrnOrigin" class="form-label">Items Origin</label>
              <input class="form-control form-control-sm" id='prevGrnOrigin' readonly>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="prevGrnVNo" class="form-label">Vehicle Reg. No</label>
              <input class="form-control form-control-sm" id='prevGrnVNo' readonly>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="prevGrnVSize" class="form-label">Vehicle Size</label>
              <input class="form-control form-control-sm form-select" id='prevGrnVSize' style="width: 100%;" readonly>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="prevGrnWeighFees" class="form-label">Weighing Fees</label>
              <input type="number" class="form-control form-control-sm text-right" id='prevGrnWeighFees' value="0" readonly>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <label for="prevGrnDeliveredBy" class="form-label">Delivered by:</label>
              <input class="form-control form-control-sm" id='prevGrnDeliveredBy' readonly>
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="prevGrnTicket" class="form-label">WB Ticket No</label>
              <input class="form-control form-control-sm" id='prevGrnTicket' readonly>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <label for="prevGrnRemarks" class="form-label">Remarks</label>
              <input class="form-control form-control-sm" id='prevGrnRemarks' readonly>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id='approveGrnBtn' type="button" class="btn btn-success">Approve</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->