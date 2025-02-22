<!-- Adding new category -->
<div id="previewSalesReportModal" class="modal">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header" style="background-color: darkgreen; color: white;">
        <h6 class="modal-title" style="color: white;">SALES REPORT PREVIEW</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
          <div class="row">
            <div class="col-11"></div>
            <div class="col-1">
              <button id='salesReportEditBtn' type="button" salesId="" class="form-control form-control-sm btn-warning"
                style="color:white; background-color:brown; margin-right:1opx">
                Edit
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-7">
              <div class="row">
                <h5 id="previewSalesReportNo" class="form-label" style="color: red;"><strong></strong></h5>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-6 col-md-2">
                  <label for="previewSalesDate" class="form-label">Date:</label>
                </div>
                <div class="col-sm-6 col-md-3">
                  <input type="date" class="form-control form-control-sm date" id='previewSalesDate' readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-6 col-md-2">
                  <label for="editSalesBuyer" class="form-label">Buyer:</label>
                </div>
                <div class="col-sm-6 col-md-8">
                  <input class="form-select form-control form-control-sm salesBuyer" id='previewSalesBuyer' style="width: 100%;" readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-6 col-md-2">
                  <label for="previwSalesRef" class="form-label">REF:</label>
                </div>
                <div class="col-sm-6 col-md-4">
                  <input class="form-control form-control-sm" id='previewSalesRef' placeholder="REF" readonly>
                </div>
                <div class="col-sm-6 col-md-2">
                  <label for="previewSalesMC" class="form-label">Moisture:</label>
                </div>
                <div class="col-sm-6 col-md-2">
                  <input class="form-control form-control-sm" id='previewSalesMC' placeholder="%" readonly>
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-5">
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-6"></div>
                <div class="col-sm-6 col-md-3">
                  <label for="previewSalesCurrency" class="form-label">Currency:</label>
                </div>
                <div class="col-sm-6 col-md-3">
                  <input class="form-control form-control-sm" id='previewSalesCurrency' readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-6"></div>
                <div class="col-sm-6 col-md-3">
                  <label for="previewSalesFx" class="form-label">Exch. Rate:</label>
                </div>
                <div class="col-sm-6 col-md-3">
                  <input class="form-control form-control-sm" id='previewSalesFx' readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-5"></div>
                <div class="col-sm-6 col-md-3">
                  <label for="previewSalesMarket" class="form-label" style="text-align: right;">Market:</label>
                </div>
                <div class="col-sm-6 col-md-4">
                  <input class="form-control form-control-sm" id='previewSalesMarket' readonly>
                </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-5"></div>
                <div class="col-sm-6 col-md-3">
                  <label for="previewSalesContract" class="form-label" style="text-align: right;">Contract:</label>
                </div>
                <div class="col-sm-6 col-md-4">
                  <input class="form-control form-control-sm" id='previewSalesContract' readonly>
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
            </div>
          </div>
          <table class="table table-sm table-bordered">
            <thead style="background-color:whitesmoke; color:white; opacity: 1">
              <tr>
                <th>Code</th>
                <th>Grade</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Price</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody id="previewSalesTBody">

            </tbody>
          </table>
          <div id="valuationSummary">
            <div class="row">
              <div class="col-md-9"></div>
              <div class="col-sm-12 col-md-3">
                <table class="table table-sm table-bordered">
                  <tbody id="salesTBody">
                    <tr>
                      <th style="color: white; background-color: green;"><strong>Total:</strong></th>
                      <th id="previewSalesReportTotal" class="salesReportTotal tableAmount">
                        <!-- <strong>
                          <input id="previewSalesReportTotal" class="form-control form-control-xs text-end salesReportTotal tableAmount"
                            value="0" readonly>
                        </strong> -->
                      </th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </form>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <a id='salesReportPrintBtn' href="" target="_blank" class="btn btn-primary">Print</a>
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
                    <input type="date" value="" class="form-control form-control-sm" id='addSupplierName'>
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