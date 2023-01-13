<div class="modal fade" id="companyDetailsModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form method="POST" action="route/put-journal-completed.php">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <input type="hidden" name="task" value="<?= $_GET['task'] ?>">

          <div class="row">
            <div class="col mb-3">
              <span class="bx bx-list-check" style="font-size: 4.15rem;"></span>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col mb-3">
              <p style="font-size: 1.3rem;"><b>Confirmation!</b></p><br>
              <p class="lead mb-0">
                I hereby approved and validate that the task was solely done and completed by <b></b>. 
              </p>
            </div>
          </div>

          <div class="col-md">
            <span class="text-bold d-block">Rate the Task!</span>
            <div class="form-check form-check-inline mt-3">
              <input class="form-check-input" type="radio" name="rateTask" id="inlineRadio1" value="1">
              <label class="form-check-label" for="inlineRadio1">1</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rateTask" id="inlineRadio2" value="2">
              <label class="form-check-label" for="inlineRadio2">2</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rateTask" id="inlineRadio2" value="3">
              <label class="form-check-label" for="inlineRadio2">3</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rateTask" id="inlineRadio2" value="4">
              <label class="form-check-label" for="inlineRadio2">4</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rateTask" id="inlineRadio2" value="5">
              <label class="form-check-label" for="inlineRadio2">5</label>
            </div>
            
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No
          </button>
          <button type="submit" class="btn btn-success"><i class='bx bxs-check-circle'></i> Approved</button>
        </div>
      </form>
    </div>
  </div>
</div>