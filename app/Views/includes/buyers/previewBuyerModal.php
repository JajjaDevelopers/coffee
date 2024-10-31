<!-- Editing new category -->
<div id="previewBuyerModal" class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Buyer Information</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-11"></div>
          <div class="col-1">
            <button id='buyerEditBtn' type="button" buyerId="" class="form-control form-control-sm btn-warning"
              style="color:white; background-color:brown; ">
              Edit
            </button>
          </div>
        </div>
        <form action="#" method="post" id='editTypeForm' enctype="multipart/form-data">
          <h6>Buyer Details</h6>
          <div class="row">
            <div class="col-sm-12">
              <label for="previewBuyerName" class="form-label">Name</label>
              <input class="form-control form-control-sm" id='previewBuyerName' readonly>
            </div>
          </div><br>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="previewBuyerCategory" class="form-label">Category</label>
              <input class="form-control form-control-sm" id='previewBuyerCategory' readonly>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="previewBuyerContactPerson" class="form-label">Contact Person</label>
              <input class="form-control form-control-sm" id='previewBuyerContactPerson' placeholder="Contact Person" readonly>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="previewBuyerRole" class="form-label">Role</label>
              <input class="form-control form-control-sm" id='previewBuyerRole' placeholder="eg Manager" readonly>
            </div>
          </div>
          <hr>
          <br>
          <h6>Contact and Location</h6>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="previewBuyerTel1" class="form-label">Tel 1</label>
              <input class="form-control form-control-sm" id='previewBuyerTel1' readonly>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="previewBuyerTel2" class="form-label">Tel 2</label>
              <input class="form-control form-control-sm" id='previewBuyerTel2' readonly>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="previewBuyerEmail" class="form-label">Email</label>
              <input class="form-control form-control-sm" id='previewBuyerEmail' readonly>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-4">
              <label for="previewBuyerCountry" class="form-label">Country</label>
              <input class="form-select form-control form-control-sm" id='previewBuyerCountry' style="width: 100%;" readonly>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="previewBuyerCity" class="form-label">City</label>
              <input class="form-control form-control-sm" id='previewBuyerCity' readonly>
            </div>
            <div class="col-sm-12 col-md-4">
              <label for="previewBuyerStreet" class="form-label">Street</label>
              <input class="form-control form-control-sm" id='previewBuyerStreet' readonly>
            </div>
          </div>
          <hr>
          <br>
          <h6>Others</h6>
          <div class="row">
            <div class="col-sm-6 col-md-2">
              <label for="previewBuyerCurrency" class="form-label">Currency</label>
              <input class="form-control form-control-sm" id='previewBuyerCurrency' readonly>
            </div>
          </div>
        </form>
      </div><!-- modal-body -->
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-indigo saveBuyerBtn">Save</button> -->
        <button id='saveBuyerBtn' type="button" data-dismiss="modal" class="btn btn-outline-light">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div>