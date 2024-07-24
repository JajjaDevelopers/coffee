<!-- Adding new category -->
<div class="modal fade" id="addCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Coffee Grade Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form action="#" method="post" id='addTypeForm' enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="form-group">
                  <label class="form-label">Coffee Type</label>
                  <select class="form-select" id='addCatCoffeeType'>
                  </select>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="form-group">
                  <label class="form-label">Section</label>
                  <select id="section" class="form-select">
                    <option value="">Select</option>
                    <option value='Both'>Both</option>
                    <option value="Boarding">Boarding</option>
                    <option value="Day">Day</option>
                  </select>
                </div>
              </div>

            </div>


            <div class="row">

            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id='closeFeeModal'>Close</button>
        <button id='addFeeTypeModalBtn' type="button" class="btn btn-primary addBtn">Save</button>
      </div>
    </div>
  </div>
</div>