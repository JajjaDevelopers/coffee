<!-- Adding new category -->
<div id="previewGradeModal" class="modal">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Grade Preview</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='previewTypeForm' enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 col-md-3">
              <label for="previewGradeCode" class="form-label">Code</label>
              <input class="form-control form-control-sm" id='previewGradeCode' placeholder="Grade Code" readonly>
            </div>
            <div class="col-sm-12 col-md-9">
              <label for="previewGradeName" class="form-label">Grade Name</label>
              <input class="form-control form-control-sm" id='previewGradeName' readonly>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-5">
              <label for="previewGradeCategory" class="form-label">Category</label>
              <input class="form-control form-control-sm form-select" id='previewGradeCategory' style="width: 100%;" readonly>
            </div>
            <div class="col-sm-12 col-md-5">
              <label for="previewGradeGroup" class="form-label">Group</label>
              <input class="form-control form-control-sm form-select" id='previewGradeGroup' readonly>
            </div>
            <div class="col-sm-12 col-md-2">
              <label for="previewGradeUnit" class="form-label">Unit</label>
              <input class="form-control form-control-sm" id='previewGradeUnit' value="Kg" readonly>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->