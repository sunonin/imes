<div class="modal fade" id="companyRevokeModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form method="POST" action="route/post-company-revoke.php">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <input type="hidden" name="sid" value="<?= $_GET['id'] ?>">
          <input type="hidden" name="type" value="1">

          <div class="row">
            <div class="col mb-3">
              <span class="bx bxs-alarm-exclamation" style="font-size: 4.15rem; color: red;"></span>
            </div>
          </div>

          <div class="row">
            <div class="col mb-3">
              <p style="font-size: 1.3rem;"><b>Confirmation!</b></p><br>
              <p class="lead mb-0">
                This action will remove the current Company assigned to the student. Are you sure you want to proceed?
              </p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close
          </button>
          <button type="submit" class="btn btn-danger"><i class='bx bxs-check-circle'></i> Revoke</button>
        </div>
      </form>
    </div>
  </div>
</div>