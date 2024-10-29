<!-- Adding new category -->
<div id="editSalesReportModal" class="modal">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header" style="background-color: darkgreen; color: white;">
        <h6 class="modal-title" style="color: white;">SALES REPORT ADJUSTMENT</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='editSalesReportForm' enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 col-md-7">
              <div class="row">
                <div class="col-sm-6 col-md-2">
                  <input id="salesReportEditId" value="" style="display: none;" readonly>
                  <label for="editSalesNo" class="form-label">Sales No.:</label>
                </div>
                <div class="col-sm-6 col-md-4">
                  <strong><input id="editSalesNo" class="form-control form-control-sm text-danger"></strong>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-6 col-md-2">
                  <label for="editSalesDate" class="form-label">Date:</label>
                </div>
                <div class="col-sm-6 col-md-3">
                  <input type="date" class="form-control form-control-sm date" id='editSalesDate' readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-6 col-md-2">
                  <label for="editSalesBuyer" class="form-label">Buyer:</label>
                </div>
                <div class="col-sm-6 col-md-8">
                  <input class="form-select form-control form-control-sm" id='editSalesBuyer' style="width: 100%;" readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-6 col-md-2">
                  <label for="editSalesRef" class="form-label">REF:</label>
                </div>
                <div class="col-sm-6 col-md-4">
                  <input class="form-control form-control-sm" id='editSalesRef' placeholder="REF">
                </div>
                <div class="col-sm-6 col-md-2">
                  <label for="editSalesMC" class="form-label">Moisture:</label>
                </div>
                <div class="col-sm-6 col-md-2">
                  <input class="form-control form-control-sm" id='editSalesMC' placeholder="%">
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-5">
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-6"></div>
                <div class="col-sm-6 col-md-3">
                  <label for="editSalesCurrency" class="form-label">Currency:</label>
                </div>
                <div class="col-sm-6 col-md-3">
                  <input class="form-control form-control-sm" id='editSalesCurrency' readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-6"></div>
                <div class="col-sm-6 col-md-3">
                  <label for="editSalesFx" class="form-label">Exch. Rate:</label>
                </div>
                <div class="col-sm-6 col-md-3">
                  <input type="number" class="form-control form-control-sm" id='editSalesFx'>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-5"></div>
                <div class="col-sm-6 col-md-3">
                  <label for="editSalesMarket" class="form-label" style="text-align: right;">Market:</label>
                </div>
                <div class="col-sm-6 col-md-4">
                  <select class="form-control form-control-sm" id='editSalesMarket'>
                    <option value="Local">Local</option>
                    <option value="Export">Export</option>
                  </select>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-5"></div>
                <div class="col-sm-6 col-md-3">
                  <label for="editSalesContract" class="form-label" style="text-align: right;">Contract:</label>
                </div>
                <div class="col-sm-6 col-md-4">
                  <select class="form-control form-control-sm" id='editSalesContract'>
                    <?php
                    for ($x = 0; $x < count($contractTypes); $x++) {
                      $typeId = $contractTypes[$x]["contract_type_id"];
                      $typeName = $contractTypes[$x]["contract_type_name"];
                    ?>
                      <option value="<?= $typeId ?>"><?= $typeName ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row" style="margin-bottom: 5px;">
            <div class="col-sm-7">
              <h6>Sales Report Items</h6>
            </div>
            <div class="col-sm-5">
              <div style='display:flex;justify-content:flex-end'>
                <button class="btn btn-sm salesRowAddBtn" style='background-color:green;color:white' id='editRowAddBtn' mode="edit">
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
                <th style="width: 150px;">Price</th>
                <th style="width: 200px;">Amount</th>
                <th style="width: 20px;">Action</th>
              </tr>
            </thead>
            <tbody id="editSalesTBody">
            </tbody>
          </table>
          <div id="valuationSummary">
            <div class="row">
              <div class="col-md-9"></div>
              <div class="col-sm-12 col-md-3">
                <table class="table table-sm table-bordered">
                  <tbody id="salesTBody">
                    <tr>
                      <td style="color: white; background-color: green; padding-top: 20px"><strong>Total:</strong></td>
                      <td><input id="editSalesReportTotal" class="form-control form-control-xs text-end salesReportTotal" value="0" readonly></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </form>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button id='saveSalesReportEditBtn' type="button" class="btn btn-indigo addBtn">Save</button>
        <button type="button" data-dismiss="modal" class="btn btn-outline-light">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->