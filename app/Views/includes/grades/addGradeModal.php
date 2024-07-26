<!-- Adding new category -->
<div class="container-fluid">
  <div class="modal fade" id="addGradeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Coffee Grade Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
            <div class="row">
              <div class="col-12">
                <label for="addCatCoffeeType" class="form-label">Coffee Type</label>
                <select class="form-control form-control-sm form-select" id='addCatCoffeeType'>
                </select>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-12">
                <label for="addCatName" class="form-label">Category Name</label>
                <input class="form-control form-control-sm" id='addCatName'>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id='closeCatModal'>Close</button>
          <button id='saveCategoryBtn' type="button" class="btn btn-success addBtn">Save</button>
        </div>
      </div>

    </div>
  </div>
</div>