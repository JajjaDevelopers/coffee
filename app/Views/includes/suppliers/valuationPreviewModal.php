<!-- Adding new category -->
<div id="valuationPreviewModal" class="modal">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Valuation Schedule Preview</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
          <div class="row">
            <div class="col-11"></div>
            <div class="col-1">
              <button id='valuationEditBtn' type="button" vId="" class="form-control form-control-sm btn-warning"
                style="color:white; background-color:brown; margin-right:10px">
                Edit
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-7">
              <div class="row" style="display: none;">
                <div class="col-sm-4 col-md-4">
                  <label for="valPrevSupplierName" class="form-label">VAL No:</label>
                </div>
                <div class="col-sm-8 col-md-5">
                  <label for="valPrevSupplierName" class="form-label text-danger"><strong>00001</strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-2">
                  <label for="valPrevDate" class="form-label">Date:</label>
                </div>
                <div class="col-sm-6 col-md-3">
                  <input type="date" class="form-control form-control-sm date" id='valPrevDate' readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-6 col-md-2">
                  <label for="valPrevSupplier" class="form-label">Supplier:</label>
                </div>
                <div class="col-sm-6 col-md-8">
                  <input class="form-control form-control-sm" id='valPrevSupplier' style="width: 100%;" readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-6 col-md-2">
                  <label for="valPrevGrn" class="form-label">GRN:</label>
                </div>
                <div class="col-sm-6 col-md-4">
                  <input class="form-control form-control-sm" id='valPrevGrn' placeholder="GRN" readonly>
                </div>
                <div class="col-sm-6 col-md-2">
                  <label for="valPrevMc" class="form-label">Moisture:</label>
                </div>
                <div class="col-sm-6 col-md-2">
                  <input class="form-control form-control-sm" id='valPrevMc' placeholder="%" readonly>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-4">

            </div>
          </div>
          <hr>
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-sm-7">
              <h6>Details</h6>
            </div>
          </div>
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>Code</th>
                <th>Grade</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody id="valPrevTBody">

            </tbody>
          </table>
          <div id="valuationSummary">
            <div class="row">
              <div class="col-md-9"></div>
              <div class="col-sm-12 col-md-3">
                <table class="table table-sm table-bordered">
                  <tbody id="valTBody">
                    <tr rowNo="1" id="valrow1">
                      <td><strong>Total:</strong></td>
                      <td id="valPrevTotal" style="text-align: right"><strong>0</strong></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </form>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <a id='valuationPrintBtn' href="#" target="_blank">
          <button type="button" valId="" class="btn btn-primary">Print</button>
        </a>
        <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->