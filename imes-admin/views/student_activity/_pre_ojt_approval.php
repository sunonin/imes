<div class="modal fade" id="preOJTModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form method="POST" action="route/post-preojt-notes.php">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <input type="hidden" id="preOjtRequirementsStudentId" name="preOjtRequirementsStudentId" value="<?= $_GET['id'] ?>">
          <input type="hidden" id="preOjtRequirementsId" name="preOjtRequirementsId" value="">

          <div class="row">
            <div class="col mb-3">
              <span class="bx bxs-message-square-dots" style="font-size: 4.15rem;"></span>
            </div>
          </div>

          <div class="row">
            <div class="col mb-3">
              <p style="font-size: 1.3rem;"><b>Indicate Remarks</b></p>
              <p><textarea class="form-control" id="preOjtRequirementsNotes" name="preOjtRequirementsNotes" rows="4" placeholder="-- Indicate Remarks --" required></textarea></p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class='bx bxs-check-circle'></i> No</button>
          <button type="submit" class="btn btn-primary"><i class='bx bxs-check-circle'></i> Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>