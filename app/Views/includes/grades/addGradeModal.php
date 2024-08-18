<!-- Adding new category -->
<div id="addGradeModal" class="modal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Add Coffee Grades</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 col-md-9">
              <label for="addGradeName" class="form-label">Grade Name</label>
              <input class="form-control form-control-sm" id='addGradeName'>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="addGradeCode" class="form-label">Code</label>
              <input class="form-control form-control-sm" id='addGradeCode' placeholder="Grade Code">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-9">
              <label for="addGradeCategory" class="form-label">Category</label>
              <select class="form-control form-control-sm form-select addCoffeeGradeCategory" id='addGradeCategory'>
                <option value=''>Select</option>
              </select>
            </div>
            <div class="col-sm-12 col-md-3">
              <label for="addGradeUnit" class="form-label">Unit</label>
              <input class="form-control form-control-sm" id='addGradeUnit' value="Kg">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-12 col-md-9">
              <label for="addGradeGroup" class="form-label">Group</label>
              <select class="form-control form-control-sm form-select" id='addGradeGroup'>
              </select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-indigo">Save changes</button>
        <button id='saveGradeBtn' type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->