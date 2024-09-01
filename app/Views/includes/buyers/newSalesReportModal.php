<!-- Adding new category -->
<div id="newSalesReportModal" class="modal">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header" style="background-color: darkgreen; color: white;">
        <h6 class="modal-title" style="color: white;">SALES REPORT</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 col-md-7">
              <div class="row" style="display: none;">
                <div class="col-sm-4 col-md-4">
                  <label for="addSupplierName" class="form-label">SN:</label>
                </div>
                <div class="col-sm-8 col-md-5">
                  <label for="addSupplierName" class="form-label text-danger"><strong>00001</strong></label>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-2">
                  <label for="newSalesDate" class="form-label">Date:</label>
                </div>
                <div class="col-sm-6 col-md-3">
                  <input type="date" class="form-control form-control-sm date" id='newSalesDate'>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-6 col-md-2">
                  <label for="addSalesBuyer" class="form-label">Buyer:</label>
                </div>
                <div class="col-sm-6 col-md-8">
                  <select class="form-select form-control form-control-sm" id='addSalesBuyer' style="width: 100%;">
                  </select>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-6 col-md-2">
                  <label for="newSalesRef" class="form-label">REF:</label>
                </div>
                <div class="col-sm-6 col-md-4">
                  <input class="form-control form-control-sm" id='newSalesRef' placeholder="REF">
                </div>
                <div class="col-sm-6 col-md-2">
                  <label for="newSalesMC" class="form-label">Moisture:</label>
                </div>
                <div class="col-sm-6 col-md-2">
                  <input class="form-control form-control-sm" id='newSalesMC' placeholder="%">
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-5">
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-6"></div>
                <div class="col-sm-6 col-md-3">
                  <label for="addSalesCurrency" class="form-label">Currency:</label>
                </div>
                <div class="col-sm-6 col-md-3">
                  <input class="form-control form-control-sm" id='addSalesCurrency' readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-6"></div>
                <div class="col-sm-6 col-md-3">
                  <label for="addSalesFx" class="form-label">Exch. Rate:</label>
                </div>
                <div class="col-sm-6 col-md-3">
                  <input class="form-control form-control-sm" id='addSalesFx'>
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
                <button class="btn btn-sm addDeliveryBtn" style='background-color:green;color:white' id='salesRowAddBtn'>
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
            <tbody id="salesTBody">
              <tr rowNo="1" id="salesRow1">
                <td><input rowNo="1" id="salesCode1" class="form-control form-control-xs" readonly></td>
                <td>
                  <select rowNo="1" id="salesGrade1" class="form-select form-control form-control-sm salesGradeName" style="width: 300px;">
                  </select>
                </td>
                <td><input type="number" rowNo="1" id="salesQty1" class="form-control form-control-xs text-end salesuationQtyPx" value="1" min="0"></td>
                <td><input rowNo="1" id="salesUnit1" class="form-control form-control-xs text-center" readonly></td>
                <td><input type="number" rowNo="1" id="salesPx1" class="form-control form-control-xs text-end salesuationQtyPx" value="0" min="0"></td>
                <td><input rowNo="1" id="salesAmt1" class="form-control form-control-xs text-end" salesue="0" readonly></td>
              </tr>
            </tbody>
          </table>
          <div id="valuationSummary">
            <div class="row">
              <div class="col-md-9"></div>
              <div class="col-sm-12 col-md-3">
                <table class="table table-sm table-bordered">
                  <tbody id="salesTBody">
                    <tr rowNo="1" id="valrow1">
                      <td>Total:</td>
                      <td><input id="valTotal" class="form-control form-control-xs text-end" value="0" readonly></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </form>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button id='saveValuationBtn' type="button" class="btn btn-indigo addBtn">Save</button>
        <button type="button" data-dismiss="modal" class="btn btn-outline-light">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->
<!-- <div class="container-fluid">
  <div class="modal fade" id="newDeliveryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Valuation Schedule</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="row">
                  <div class="col-sm-4 col-md-4">
                    <label for="addSupplierName" class="form-label">VAL No:</label>
                  </div>
                  <div class="col-sm-8 col-md-5">
                    <label for="addSupplierName" class="form-label text-danger"><strong>00001</strong></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 col-md-4">
                    <label for="addSupplierName" class="form-label">Date:</label>
                  </div>
                  <div class="col-sm-8 col-md-5">
                    <input type="date" value="<?= $dateToday ?>" class="form-control form-control-sm" id='addSupplierName'>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" style="margin-top: 10px;">
              <div class="col-sm-12 col-md-2">
                <label for="addSupplierCategory" class="form-label">Supplier:</label>
              </div>
              <div class="col-sm-12 col-md-6">
                <select class="form-select form-control form-control-sm supplierSelect" id='addSupplierCategory' placeholder="Supplier">
                  <option>Kasaali</option>
                  <option>Rubanga</option>
                </select>
              </div>
              <div class="col-sm-4 col-md-1">
                <label for="addSupplierCategory" class="form-label">GRN:</label>
              </div>
              <div class="col-sm-8 col-md-3">
                <input class="form-control form-control-sm" id='addSupplierCategory' placeholder="GRN">
              </div>
            </div>
            <hr>
            <div class="row" style="margin-bottom: 5px;">
              <div class="col-sm-7">
                <h6>Details</h6>
              </div>
              <div class="col-sm-5">
                <div style='display:flex;justify-content:flex-end'>
                  <button class="btn btn-sm addDeliveryBtn" style='background-color:brown;color:white' id='valRowAddBtn'>
                    <strong>+ Add Row </strong>
                  </button>
                </div>
              </div>
            </div>
            <table class="table table-sm table-bordered">
              <thead>
                <tr>
                  <th style="width: 100px;">Code</th>
                  <th>Grade</th>
                  <th style="width: 100px;">Unit</th>
                  <th style="width: 150px;">Qty</th>
                  <th style="width: 150px;">Price</th>
                  <th style="width: 200px;">Amount</th>
                  <th style="width: 20px;">Action</th>
                </tr>
              </thead>
              <tbody id="valTBody">
                <tr rowNo="1" id="valrow1">
                  <td><input rowNo="1" id="valCode1" class="form-control form-control-xs" readonly></td>
                  <td><input rowNo="1" id="valGrade1" class="form-control form-control-xs"></td>
                  <td><input rowNo="1" id="valUnit1" class="form-control form-control-xs text-center" readonly></td>
                  <td><input rowNo="1" id="valQty1" class="form-control form-control-xs text-end"></td>
                  <td><input rowNo="1" id="valPx1" class="form-control form-control-xs text-end"></td>
                  <td><input rowNo="1" id="valAmt1" class="form-control form-control-xs text-end" readonly></td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id='closeCatModal'>Close</button>
          <button id='saveSupplierBtn' type="button" class="btn btn-success addBtn">Save</button>
        </div>
      </div>

    </div>
  </div>
</div> -->