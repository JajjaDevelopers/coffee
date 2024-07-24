<!-- addRole Modal -->
<style>
  label {
    margin-left: 10px;
  }

  input {
    height: 5px;
  }

  .paraDiv {
    margin-top: 30px;
  }

  .paraDiv>p {
    background-color: RGBA(32, 42, 68, 0.8);
    color: white;
  }

  .permsCheck {
    margin-left: 10px;
  }
</style>
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addRoleModalLabel">Create Role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form action="saveRole" class="roleForm" method='POST' id='addRoleForm'>
            <div class="row role">
              <div class="form-floating mb-3 col-md-6">
                <input type="text" class="form-control form-control-sm" id="role_name" name="role_name"
                  placeholder="">
                <label for="floatingInput" style='margin-left:10px'>Role Name e.g teacher, bursar, etc </label>
              </div>
              <!-- <div class="form-floating col-md-4">
                <input type="text" class="form-control form-control-sm" id="role_display" name="role_display"
                  placeholder="display name">
                <label for="display_name">Display Name</label>
              </div> -->
              <!-- <div class="form-floating col-md-6">
                <input type="text" class="form-control form-control-sm" id="role_description" name="role_description"
                  placeholder="description">
                <label for="description">Description</label>
              </div> -->
            </div>
            <h5>Add Permissions</h5>
            <p class='text-muted'>These permissions will restrict how different users interact with the system!</p>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id='checkAll' name="all" id="flexCheckChecked">
              <label class="form-check-label" for="checkAll">
                Check all
              </label>
            </div>
            <div class='addSection'>
              <!--Universal Access-->
              <div class="paraDiv">
                <p>UNIVERSAL ACCESS</p>
                <div class="row perms">
                  <div class="form-check col-md-5 permsCheck ">
                    <input class="form-check-input permissions checkPermissions" type="checkbox"
                      value='School Management' name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="schoolManagement">
                      School Management
                    </label>
                  </div>
                  <div class="form-check  col-md-5 permsCheck">
                    <input class="form-check-input checkPermissions" type="checkbox" value='Access Management'
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Access Management
                    </label>
                  </div>
                </div>
              </div>
              <!--dashboard-->
              <div class="paraDiv">
                <p>DASHBOARD ACCESS</p>
                <div class="row perms">
                  <div class="form-check col-md-5 permsCheck">
                    <input class="form-check-input permissions" value='View Dashboard' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="schoolManagement">
                      View Dashboard
                    </label>
                  </div>
                  <div class="form-check  col-md-5 permsCheck">
                    <input class="form-check-input permissions" value='View Charts' type="checkbox" name="permissions[]"
                      id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      View Charts
                    </label>
                  </div>
                  <!-- <div class="form-check  col-md-5 permsCheck">
                  <input class="form-check-input permissions" value='' type="checkbox" name="permissions[]" id="flexCheckChecked">
                  <label class="form-check-label" for="checkAll">
                    View members
                  </label>
                </div> -->
                </div>
              </div>
              <!--Roles-->
              <div class="paraDiv">
                <p>ROLES ACCESS</p>
                <div class="row perms">
                  <div class="form-check col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Add Roles' type="checkbox" name="permissions[]"
                      id="flexCheckChecked">
                    <label class="form-check-label" for="schoolManagement">
                      Add Roles
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Delete Roles' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Delete Roles
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='View Role Details' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      View Role Details
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Edit Roles' type="checkbox" name="permissions[]"
                      id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Edit Roles
                    </label>
                  </div>
                </div>
              </div>
              <!--Reports-->
              <div class="paraDiv">
                <p>REPORTS ACCESS</p>
                <div class="row perms">
                  <div class="form-check col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Add Reports' type="checkbox" name="permissions[]"
                      id="flexCheckChecked">
                    <label class="form-check-label" for="schoolManagement">
                      Add Reports
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Delete Reports' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Delete Reports
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='View Reports' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      View Reports
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Edit Reports' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Edit Reports
                    </label>
                  </div>
                </div>
              </div>
              <!--Students-->
              <div class="paraDiv">
                <p>STUDENT ACCESS</p>
                <div class="row perms">
                  <div class="form-check col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Add Students' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="schoolManagement">
                      Add Students
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Delete Students ' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Delete Students
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='View Students' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      View Students
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Edit Students' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Edit Students
                    </label>
                  </div>
                </div>
              </div>
              <!--Staff-->
              <div class="paraDiv">
                <p>STAFF ACCESS</p>
                <div class="row perms">
                  <div class="form-check col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Add Staff' type="checkbox" name="permissions[]"
                      id="flexCheckChecked">
                    <label class="form-check-label" for="schoolManagement">
                      Add Staff
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Delete Staff' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Delete Staff
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='View Staff' type="checkbox" name="permissions[]"
                      id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      View Staff
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Edit Staff' type="checkbox" name="permissions[]"
                      id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Edit Staff
                    </label>
                  </div>
                </div>
              </div>
              <!--Subjects-->
              <div class="paraDiv">
                <p>SUBJECTS ACCESS</p>
                <div class="row perms">
                  <div class="form-check col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Add Subject' type="checkbox" name="permissions[]"
                      id="flexCheckChecked">
                    <label class="form-check-label" for="schoolManagement">
                      Add Subject
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Delete Subject' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Delete Subject
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='View Subject' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      View Subject
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Edit Subject' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Edit Subject
                    </label>
                  </div>
                </div>
              </div>
              <!--Marks-->
              <div class="paraDiv">
                <p>MARKS ACCESS</p>
                <div class="row perms">
                  <div class="form-check col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Add Marks' type="checkbox" name="permissions[]"
                      id="flexCheckChecked">
                    <label class="form-check-label" for="schoolManagement">
                      Add Marks
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Delete Marks' type="checkbox"
                      name="permissions[]" id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Delete Marks
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='View Marks' type="checkbox" name="permissions[]"
                      id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      View Marks
                    </label>
                  </div>
                  <div class="form-check  col-md-3 permsCheck">
                    <input class="form-check-input permissions" value='Edit Marks' type="checkbox" name="permissions[]"
                      id="flexCheckChecked">
                    <label class="form-check-label" for="checkAll">
                      Edit Marks
                    </label>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id='saveRole' class="btn btn-primary">Save Role</button>
      </div>
      </form>
    </div>
  </div>
</div>