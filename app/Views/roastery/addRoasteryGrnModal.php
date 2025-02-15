<!-- Adding new category -->
<div id="addRoasteryGrnModal" class="modal">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header" style="background-color: green; ">
        <h6 class="modal-title" style="color: white">Receiving Book - New</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="addRoasteryGrnDate" class="form-label">Date</label>
              <input type="date" class="form-control form-control-sm" id='addRoasteryGrnDate'>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-8">
              <label for="addRoasteryGrnSupplier" class="form-label">Supplier</label>
              <select class="form-control form-control-sm" id="addRoasteryGrnSupplier" style="width: 100%;">

              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="addRoasteryBookNo" class="form-label">Rec. Book No.</label>
              <input class="form-control form-control-sm text-danger" id='addRoasteryBookNo'>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="addRoasteryGrnNo" class="form-label">GRN No.</label>
              <select class="form-control form-control-sm select text-danger" id='addRoasteryGrnNo'>
              </select>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="addRoasteryMoisture" class="form-label">Moisture</label>
              <input class="form-control form-control-sm" id='addRoasteryMoisture' placeholder="%">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="addRoasteryGrnItmCode" class="form-label">Item Code</label>
              <input class="form-control form-control-sm" id='addRoasteryGrnItmCode' readonly>
            </div>
            <div class="col-sm-12 col-md-6">
              <label for="addRoasteryGrnItem" class="form-label">Item Description</label>
              <input class="form-control form-control-sm" id='addRoasteryGrnItem' style="width: 100%;" readonly>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="addRoasteryGrnQty" class="form-label">Qty in (Kg)</label>
              <input type="number" class="form-control form-control-sm" id='addRoasteryGrnQty' readonly>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <label for="addRoasteryGrnRemarks" class="form-label">Remarks</label>
              <textarea class="form-control form-control-sm" id='addRoasteryGrnRemarks'>
              </textarea>
            </div>
          </div>
        </form>
      </div>
      <br>
      <div class="modal-footer">
        <button id='saveNewRoasteryGrnBtn' type="button" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->