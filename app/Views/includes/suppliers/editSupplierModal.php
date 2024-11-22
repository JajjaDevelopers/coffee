<!-- Adding new category -->
<div id="editSupplierModal" class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Supplier Details Adjustment</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='editSupplierForm' enctype="multipart/form-data">
          <h6>Supplier Details</h6>
          <div class="row">
            <div class="col-sm-12">
              <label for="editSupplierName" class="form-label">Name</label>
              <input class="form-control form-control-sm" id='editSupplierName'>
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="editSupplierCategory" class="form-label">Category</label>
              <select class="form-control form-control-sm " id='editSupplierCategory'>
                <option value="" selected>--select--</option>
                <?php
                for ($x = 0; $x < count($clientCategories); $x++) {
                ?>
                  <option value="<?= $clientCategories[$x]["category_id"] ?>"><?= $clientCategories[$x]["category_name"] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="editSupplierContactPerson" class="form-label">Contact Person</label>
              <input class="form-control form-control-sm" id='editSupplierContactPerson' placeholder="Contact Person">
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="editSupplierRole" class="form-label">Role</label>
              <input class="form-control form-control-sm" id='editSupplierRole' placeholder="eg Manager">
            </div>
          </div>
          <hr>
          <br>
          <h6>Contact and Location</h6>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="editSupplierTel1" class="form-label">Tel 1</label>
              <input class="form-control form-control-sm" id='editSupplierTel1'>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="editSupplierTel2" class="form-label">Tel 2</label>
              <input class="form-control form-control-sm" id='editSupplierTel2'>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="editSupplierEmail" class="form-label">Email</label>
              <input class="form-control form-control-sm" id='editSupplierEmail'>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="editSupplierDistrict" class="form-label">District</label>
              <input class="form-control form-control-sm" id='editSupplierDistrict'>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="editSupplierSubcounty" class="form-label">Subcounty</label>
              <input class="form-control form-control-sm" id='editSupplierSubcounty'>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="editSupplierStreet" class="form-label">Street</label>
              <input class="form-control form-control-sm" id='editSupplierStreet'>
            </div>
          </div>
          <hr>
          <br>
          <h6>Others</h6>
          <div class="row">
            <div class="col-sm-6 col-md-2">
              <label for="editSupplierCurrency" class="form-label">Currency</label>
              <input class="form-control form-control-sm" id='editSupplierCurrency' readonly>
            </div>
          </div>
        </form>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button id="saveEditSupplier" sId="" type="button" class="btn btn-primary">Save Changes</button>
        <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->