<!-- Adding new category -->
<div class="container-fluid">
  <div class="modal fade" id="addSupplierModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Supplier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
            <h6>Supplier Details</h6>
            <div class="row">
              <div class="col-sm-12">
                <label for="addSupplierName" class="form-label">Name</label>
                <input class="form-control form-control-sm" id='addSupplierName'>
              </div>
            </div><br>
            <div class="row">
              <div class="col-sm-12 col-md-4">
                <label for="addSupplierCategory" class="form-label">Category</label>
                <select class="form-control form-control-sm" id='addSupplierCategory'>
                  <option value="1">Cooperative</option>
                  <option value="2">Association</option>
                  <option value="3">Individual</option>
                  <option value="4">Company</option>
                </select>
              </div>
              <div class="col-sm-12 col-md-4">
                <label for="addSupplierContactPerson" class="form-label">Contact Person</label>
                <input class="form-control form-control-sm" id='addSupplierContactPerson' placeholder="Contact Person">
              </div>
              <div class="col-sm-12 col-md-4">
                <label for="addSupplierRole" class="form-label">Role</label>
                <input class="form-control form-control-sm" id='addSupplierRole' placeholder="eg Manager">
              </div>
            </div>
            <hr>
            <br>
            <h6>Contact and Location</h6>
            <div class="row">
              <div class="col-sm-12 col-md-4">
                <label for="addSupplierTel1" class="form-label">Tel 1</label>
                <input class="form-control form-control-sm" id='addSupplierTel1'>
              </div>
              <div class="col-sm-12 col-md-4">
                <label for="addSupplierTel2" class="form-label">Tel 2</label>
                <input class="form-control form-control-sm" id='addSupplierTel2'>
              </div>
              <div class="col-sm-12 col-md-4">
                <label for="addSupplierEmail" class="form-label">Email</label>
                <input class="form-control form-control-sm" id='addSupplierEmail'>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12 col-md-4">
                <label for="addSupplierDistrict" class="form-label">District</label>
                <input class="form-control form-control-sm" id='addSupplierDistrict'>
              </div>
              <div class="col-sm-12 col-md-4">
                <label for="addSupplierSubcounty" class="form-label">Subcounty</label>
                <input class="form-control form-control-sm" id='addSupplierSubcounty'>
              </div>
              <div class="col-sm-12 col-md-4">
                <label for="addSupplierStreet" class="form-label">Street</label>
                <input class="form-control form-control-sm" id='addSupplierStreet'>
              </div>
            </div>
            <hr>
            <br>
            <h6>Others</h6>
            <div class="row">
              <div class="col-sm-6 col-md-2">
                <label for="addSupplierCurrency" class="form-label">Currency</label>
                <select class="form-control form-control-sm" id='addSupplierCurrency'>
                  <option value="1">UGX</option>
                  <option value="2">USD</option>
                  <option value="3">EUR</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id='closeCatModal'>Close</button>
          <button id='saveSupplierBtn' type="button" class="btn btn-success addBtn">Save</button>
        </div>
      </div>

    </div>
  </div>
</div>