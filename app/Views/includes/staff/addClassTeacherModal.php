<div class="modal fade" id="addClassTeacherModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Class Teacher</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form action="#" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="form-label">Class Teacher Name</label>
                  <input type="text" id='classTeacherName'class="form-control" disabled>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="form-label">Class</label>
                  <select class="form-select" id='class_name'>
                    <option value=''>Select Class</option>
                    <option value="1">Form 1</option>
                    <option value="2">Form 2</option>
                    <option value="3">Form 3</option>
                    <option value="4">Form 4</option>
                    <option value="5">Form 5</option>
                    <option value="6">Form 6</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                  <label class="form-label">Stream</label>
                  <select class="form-select" id='streamName'>
                    <option value=''>Select Stream</option>
                    <option value="0">None</option>
                    <?php if(isset($streams)):?>
                    <?php foreach($streams as $stream):?>
                    <option value="<?=$stream['stream_id']?>"><?=$stream['stream_name']?></option>
                    <?php endforeach;?>
                    <?php endif;?>
                  </select>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button id='addClassTeacherModalBtn' type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>