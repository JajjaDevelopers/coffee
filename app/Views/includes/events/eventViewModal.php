<!-- Modal -->
<div class="modal fade" id="viewEventModal" tabindex="-1" aria-labelledby="viewEventModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="viewEventModalLabel">Event</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <h6>Title:<span class='eventTitle' ></span></h6>
              <p>Description:<span class='eventDescription'></span></p>
            </div>
            <div class="card-footer">
              <div class="d-flex justify-content-space">
                <span>Starting On:<span class='eventStartDate'></span></span>
                <span>Ending On:<span class='eventEndDate'></span></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button id='viewDeleteBtn' type="button" class="btn btn-danger">Delete Event</button>
      </div>
    </div>
  </div>
</div>