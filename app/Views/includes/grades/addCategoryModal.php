
  <!-- Adding new category -->
<div id="addCategoryModal" class="modal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Add Coffee Grade Category</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
        <div class="modal-footer">
          <button id='saveCategoryBtn' type="button" class="btn btn-indigo addBtn">Save changes</button>
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
</div>