<!-- Adding new category -->
<div id="editBuyerModal" class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Edit Buyer Information</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
          <h6>Buyer Details</h6>
          <div class="row">
            <div class="col-sm-12">
              <label for="editBuyerName" class="form-label">Name</label>
              <input id='editBuyerName' class="form-control form-control-sm" editId="">
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="editBuyerCategory" class="form-label">Category</label>
              <select class="form-control form-control-sm" id='editBuyerCategory'>
                <option value="" selected>--select--</option>
                <?php
                for ($x = 0; $x < count($buyerCategories); $x++) {
                ?>
                  <option value="<?= $buyerCategories[$x]["category_id"] ?>"><?= $buyerCategories[$x]["category_name"] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="editBuyerContactPerson" class="form-label">Contact Person</label>
              <input class="form-control form-control-sm" id='editBuyerContactPerson' placeholder="Contact Person">
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="editBuyerRole" class="form-label">Role</label>
              <input class="form-control form-control-sm" id='editBuyerRole' placeholder="eg Manager">
            </div>
          </div>
          <hr>
          <br>
          <h6>Contact and Location</h6>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="editBuyerTel1" class="form-label">Tel 1</label>
              <input class="form-control form-control-sm" id='editBuyerTel1'>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="editBuyerTel2" class="form-label">Tel 2</label>
              <input class="form-control form-control-sm" id='editBuyerTel2'>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="editBuyerEmail" class="form-label">Email</label>
              <input class="form-control form-control-sm" id='editBuyerEmail'>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="editBuyerCountry" class="form-label">Country</label>
              <select class="form-select form-control form-control-sm" id='editBuyerCountry' style="width: 100%;">
              </select>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="editBuyerCity" class="form-label">City</label>
              <input class="form-control form-control-sm" id='editBuyerCity'>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="editBuyerStreet" class="form-label">Street</label>
              <input class="form-control form-control-sm" id='editBuyerStreet'>
            </div>
          </div>
          <hr>
          <br>
          <h6>Others</h6>
          <div class="row">
            <div class="col-sm-6 col-md-2">
              <label for="editBuyerCurrency" class="form-label">Currency</label>
              <input class="form-control form-control-sm" id='editBuyerCurrency' readonly>
            </div>
          </div>
        </form>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button id="editBuyerSaveBtn" type="button" class="btn btn-sm btn-success">Save</button>
        <button id='saveBuyerBtn' type="button" data-dismiss="modal" class="btn btn-sm btn-danger">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div>