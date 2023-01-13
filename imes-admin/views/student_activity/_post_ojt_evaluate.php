<div class="modal fade" id="postOJTEvaluateModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form method="POST" action="route/post-postojt-overview.php">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <input type="hidden" name="sid" value="<?= $_GET['id'] ?>">
          <input type="hidden" name="type" value="1">

          <div class="row">
            <div class="col mb-3">
              <span class="bx bx-list-check" style="font-size: 4.15rem;"></span>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col mb-3">
              <p style="font-size: 1.3rem;"><b>Confirmation!</b></p><br>
              <p class="lead mb-0">
                I hereby approved that all submitted documents are correct and true. Therefore the student can now <b>proceed</b> and be <b>accepted</b> to On-the-Job (OJT) Training Program. 
              </p>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
              <label for="remarks" class="form-label">Remarks</label>
              <textarea class="form-control" id="remarks" name="remarks" rows="5" placeholder="-- Indicate Remarks --"></textarea>
            </div>
          </div>


          <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <label for="finalRate" class="form-label">Rating</label>
            <input class="form-control" type="text" id="finalRate" name="finalRate" value="" placeholder = "Rating"/>
            </div>
            <div class="col-md-4"></div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No
          </button>
          <button type="submit" class="btn btn-primary"><i class='bx bxs-check-circle'></i> Approved</button>
        </div>
      </form>
    </div>
  </div>
</div>