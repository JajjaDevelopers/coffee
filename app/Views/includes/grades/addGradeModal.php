<!-- Adding new category -->
<div class="container-fluid">
  <div class="modal fade" id="addGradeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Coffee Grade</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <select class="form-control form-control-sm form-select" id='addGradeCategory'>
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
          <button type="button" class="btn btn-danger" id='closeCatModal'>Close</button>
          <button id='saveGradeBtn' type="button" class="btn btn-success addBtn">Save</button>
        </div>
      </div>

    </div>
  </div>
</div>