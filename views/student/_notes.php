<div class="modal fade" id="preOJTModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form method="POST" action="route/delete_user.php">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <input type="hidden" name="user_id" value="">

          <div class="row">
            <div class="col mb-3">
              <span class="bx bxs-message-square-dots" style="font-size: 4.15rem;"></span>
            </div>
          </div>

          <div class="row">
            <div class="col mb-3">
              <p style="font-size: 1.3rem;"><b>Notes</b><br><small style="font-size:15px">Notes from OJT-Coordinator</small></p>
              <p><textarea class="form-control" id="exampleFormControlTextarea1" name="addNotes" rows="4" placeholder="-- Indicate Notes --" readonly></textarea></p>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>