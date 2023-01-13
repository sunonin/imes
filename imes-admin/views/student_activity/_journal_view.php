<div class="modal fade" id="journalViewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form method="POST" action="route/post-preojt-notes.php">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row text-center">
            <div class="col mb-3">
              <p style="font-size: 1.3rem;"><b>Activity Details</b></p>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="startDate">Start Date</label>
            <div class="col-sm-5">
              <input type="text" id="startDate" class="form-control" placeholder="Start Date" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="endDate">End Date</label>
            <div class="col-sm-5">
              <input type="text" id="endDate" class="form-control" placeholder="End Date" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="activity">Activity / Task</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="activity" name="activity" rows="4" placeholder="-- Indicate Remarks --" readonly></textarea>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="remarks">Remarks</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="remarks" name="remarks" rows="2" placeholder="-- Indicate Remarks --" readonly></textarea>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="status">Status</label>
            <div class="col-sm-5">
              <input type="text" id="status" name="status" class="form-control" placeholder="Status" readonly>
            </div>
          </div>

          <!-- <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="approvedBy">Approved By</label>
            <div class="col-sm-5">
              <input type="text" id="approvedBy" name="approvedBy" class="form-control" placeholder="Approved By" value="" readonly>
            </div>
          </div> -->

        </div>
        <div class="modal-footer">
        </div>
      </form>
    </div>
  </div>
</div>