<!-- Adding new category -->
<div id="editValuationModal" class="modal">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Adjusting Valuation Schedule</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 col-md-7">
              <div class="row" style="display: none;">
                <input id="valuationEditId" vId="" readonly style="display: none;">
                <div class="col-sm-4 col-md-4">
                  <label for="editValuationNo" class="form-label">VAL No:</label>
                </div>
                <div class="col-sm-8 col-md-5">
                  <label for="editValuationNo" class="form-label text-danger"><strong>00001</strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-2">
                  <label for="editValuationDate" class="form-label">Date:</label>
                </div>
                <div class="col-sm-6 col-md-3">
                  <input type="date" class="form-control form-control-sm date" id='editValuationDate' readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-6 col-md-2">
                  <label for="editDeliverySupplier" class="form-label">Supplier:</label>
                </div>
                <div class="col-sm-6 col-md-8">
                  <input class="form-select form-control form-control-sm" id='editDeliverySupplier' style="width: 100%;" readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-6 col-md-2">
                  <label for="editValuationGrn" class="form-label">GRN:</label>
                </div>
                <div class="col-sm-6 col-md-4">
                  <input class="form-control form-control-sm" id='editValuationGrn' placeholder="GRN">
                </div>
                <div class="col-sm-6 col-md-2">
                  <label for="editValuationMc" class="form-label">Moisture:</label>
                </div>
                <div class="col-sm-6 col-md-2">
                  <input class="form-control form-control-sm" id='editValuationMc' placeholder="%">
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-2"></div>
            <div class="col-sm-12 col-md-3">
              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-6 col-md-6">
                  <label for="editValFx" class="form-label text-danger" style="text-align: right;">Exchange Rate:</label>
                </div>
                <div class="col-sm-6 col-md-6">
                  <input id='editValFx' type="number" class="form-control form-control-sm text-danger" step="0.0001" value="1" min="0.0001">
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-sm-7">
              <h6>Details</h6>
            </div>
            <div class="col-sm-5">
              <div style='display:flex;justify-content:flex-end'>
                <button class="btn btn-sm valRowAddBtn" style='background-color:green;color:white' mode='edit'>
                  <strong>+ Add Row </strong>
                </button>
              </div>
            </div>
          </div>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th style="width: 150px;">Code</th>
                <th>Grade</th>
                <th style="width: 150px;">Quantity</th>
                <th style="width: 100px;">Unit</th>
                <th style="width: 150px;">Price (UGX)</th>
                <th style="width: 200px;">Amount (UGX)</th>
                <th style="width: 20px;">Action</th>
              </tr>
            </thead>
            <tbody id="editValTBody">
            </tbody>
          </table>
          <div id="valuationSummary">
            <div class="row">
              <div class="col-md-7"></div>
              <div class="col-sm-12 col-md-5">
                <table class="table table-sm table-bordered">
                  <tbody id="valTBody">
                    <tr rowNo="1" id="valrow1">
                      <td>Total:</td>
                      <td><input type="number" id="editValTotal" class="form-control form-control-xs text-end tableAmount valuationTotal" value="0" readonly></td>
                    </tr>
                    <tr rowNo="1">
                      <td class="text-danger">Total Invoice</td>
                      <td><input type="number" id="editValDeductions" class="form-control form-control-xs text-end tableAmount text-danger" value="0"></td>
                    </tr>
                    <tr rowNo="1">
                      <th>Net Value</th>
                      <th><input type="number" id="editNetValuationValue" class="form-control form-control-xs text-end tableAmount" value="0" readonly></th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </form>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button id='saveEditValuationBtn' type="button" class="btn btn-primary">Save</button>
        <button type="button" data-dismiss="modal" class="btn btn-sm btn-danger">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div>