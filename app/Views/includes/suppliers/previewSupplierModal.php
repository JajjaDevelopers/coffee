<!-- Adding new category -->
<div id="previewSupplierModal" class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Supplier Preview</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-11"></div>
          <div class="col-1">
            <button id='supplierEditBtn' type="button" vId="" class="form-control form-control-sm btn-warning"
              style="color:white; background-color:brown; margin-right:10px">
              Edit
            </button>
          </div>
        </div>
        <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
          <h6>Supplier Details</h6>
          <div class="row">
            <div class="col-sm-12">
              <label for="prevSupplierName" class="form-label">Name</label>
              <input class="form-control form-control-sm" id='prevSupplierName' readonly>
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="prevSupplierCategory" class="form-label">Category</label>
              <input class="form-control form-control-sm" id='prevSupplierCategory' readonly>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="prevSupplierContactPerson" class="form-label">Contact Person</label>
              <input class="form-control form-control-sm" id='prevSupplierContactPerson' placeholder="Contact Person" readonly>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="prevSupplierRole" class="form-label">Role</label>
              <input class="form-control form-control-sm" id='prevSupplierRole' placeholder="eg Manager" readonly>
            </div>
          </div>
          <hr>
          <br>
          <h6>Contact and Location</h6>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="prevSupplierTel1" class="form-label">Tel 1</label>
              <input class="form-control form-control-sm" id='prevSupplierTel1' readonly>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="prevSupplierTel2" class="form-label">Tel 2</label>
              <input class="form-control form-control-sm" id='prevSupplierTel2' readonly>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="prevSupplierEmail" class="form-label">Email</label>
              <input class="form-control form-control-sm" id='prevSupplierEmail' readonly>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="prevSupplierDistrict" class="form-label">District</label>
              <input class="form-control form-control-sm" id='prevSupplierDistrict' readonly>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="prevSupplierSubcounty" class="form-label">Subcounty</label>
              <input class="form-control form-control-sm" id='prevSupplierSubcounty' readonly>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="prevSupplierStreet" class="form-label">Street</label>
              <input class="form-control form-control-sm" id='prevSupplierStreet' readonly>
            </div>
          </div>
          <hr>
          <br>
          <h6>Others</h6>
          <div class="row">
            <div class="col-sm-6 col-md-2">
              <label for="prevSupplierCurrency" class="form-label">Currency</label>
              <input class="form-control form-control-sm" id='prevSupplierCurrency' readonly>
            </div>
          </div>
        </form>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button id="prevSupplierPrint" type="button" class="btn btn-primary">Print</button>
        <button type="button" data-dismiss="modal" class="btn btn-sm btn-danger">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div>