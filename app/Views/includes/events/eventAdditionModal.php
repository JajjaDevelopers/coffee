<!-- Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="eventModalLabel">Add Event</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method='POST'>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input id='eventTitle' type="text" class="form-control" placeholder="Event Title">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <textarea id='eventDescription' type="text" class="form-control" placeholder="Brief Description"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="startDateTime" class="form-label">Starting Date Time</label>
                <input id='startDateTime' type="datetime-local" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="endDateTime" class="form-label">Ending Date Time</label>
                <input id='endDateTime' type="datetime-local" class="form-control">
              </div>
            </div>

          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id='saveEventBtn' class="btn btn-primary">Save Event</button>
      </div>
      </form>
    </div>
  </div>
</div>