<div class="modal fade" id="workScheduleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form method="POST" action="route/post-student-workschedule.php">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="userId" id="userId" value="<?= $_GET['id']; ?>">

          <h5 class="pb-2 border-bottom mb-4"><span class="tf-icons bx bxs-time"></span> Work Schedule Details</h5>
          <div class="info-container">

            <div class="col-md-12 mb-2">
              <span class="badge bg-label-warning">Lagay kayo ng instructions dito</span>
            </div>

            <div class="col-md-12 mb-2">
              <label for="startTime" class="form-label">Start:</label>
              <input class="form-control" type="time" value="<?= $student['birth_date'] ?>" id="startTime" name="startTime" />
            </div>

            <div class="col-md-12">
              <label for="endTime" class="form-label">End:</label>
              <input class="form-control" type="time" value="<?= $student['birth_date'] ?>" id="endTime" name="endTime" />
            </div>
          </div> 

        </div>

        <div class="modal-footer">
          <div class="d-flex justify-content-center pt-3">
              <button type="submit" class="btn btn-success btn-block me-3">Save</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>