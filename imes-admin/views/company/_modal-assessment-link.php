<div class="modal fade" id="assessmentLinkModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form method="POST" action="route/post-assessment-link.php">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <input type="hidden" name="comp_id" value="">

          <div class="row">
            <div class="col mb-3">
              <span class="tf-icons bx bxs-trash" style="font-size: 4.15rem; color: red;"></span>
            </div>
          </div>

          <div class="row">
            <div class="col mb-3">
              <p style="font-size: 1.3rem;"><b>Are you sure?</b></p>
              <p>By clicking Ok button will generate an assessment link with list of students ready for evaluation.</p>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No
          </button>
          <button type="submit" class="btn btn-success"><i class='bx bxs-check-circle'></i> Ok</button>
        </div>
      </form>
    </div>
  </div>
</div>