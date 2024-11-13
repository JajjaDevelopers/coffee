<!-- Adding new category -->
<div id="addBuyerModal" class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Add Buyer</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
          <h6>Buyer Details</h6>
          <div class="row">
            <div class="col-sm-12">
              <label for="addBuyerName" class="form-label">Name</label>
              <input class="form-control form-control-sm" id='addBuyerName'>
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="addBuyerCategory" class="form-label">Category</label>
              <select class="form-control form-control-sm" id='addBuyerCategory'>
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
              <label for="addBuyerContactPerson" class="form-label">Contact Person</label>
              <input class="form-control form-control-sm" id='addBuyerContactPerson' placeholder="Contact Person">
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="addBuyerRole" class="form-label">Role</label>
              <input class="form-control form-control-sm" id='addBuyerRole' placeholder="eg Manager">
            </div>
          </div>
          <hr>
          <br>
          <h6>Contact and Location</h6>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="addBuyerTel1" class="form-label">Tel 1</label>
              <input class="form-control form-control-sm" id='addBuyerTel1'>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="addBuyerTel2" class="form-label">Tel 2</label>
              <input class="form-control form-control-sm" id='addBuyerTel2'>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="addBuyerEmail" class="form-label">Email</label>
              <input class="form-control form-control-sm" id='addBuyerEmail'>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="addBuyerCountry" class="form-label">Country</label>
              <select class="form-select form-control form-control-sm" id='addBuyerCountry' style="width: 100%;">
              </select>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="addBuyerCity" class="form-label">City</label>
              <input class="form-control form-control-sm" id='addBuyerCity'>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="addBuyerStreet" class="form-label">Street</label>
              <input class="form-control form-control-sm" id='addBuyerStreet'>
            </div>
          </div>
          <hr>
          <br>
          <h6>Others</h6>
          <div class="row">
            <div class="col-sm-6 col-md-2">
              <label for="addBuyerCurrency" class="form-label">Currency</label>
              <select class="form-control form-control-sm" id='addBuyerCurrency'>
                <option value="1">UGX</option>
                <option value="2">USD</option>
                <option value="3">EUR</option>
              </select>
            </div>
          </div>
        </form>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button id='saveBuyerBtn' type="button" class="btn btn-sm btn-primary saveBuyerBtn">Save</button>
        <button type="button" data-dismiss="modal" class="btn btn-sm btn-danger">Cancel</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->