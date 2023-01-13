<div class="card">
  
    <h5 class="card-header"><i class='bx bxs-info-circle'></i> Activity Details</h5>
    <div class="card-body">
      <input type="hidden" name="activity_id" value="<?= $_GET['task'] ?>">

      <div class="col-md-12"> 
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="birthDate" class="form-label">Start Date</label>
            <input class="form-control" type="text" id="startDate" name="startDate" value="<?= $journal['start_date'] ?>" placeholder = "Last Name" readonly/>
          </div>

          <div class="col-md-4"></div>

          <div class="col-md-4">
            <?php if ($journal['created_by']): ?>
              <label for="author" class="form-label">Assigned By</label>
              <input class="form-control" type="text" id="author" name="author" value="<?= $journal['author'] ?>" placeholder = "Last Name" readonly/>
            <?php endif ?>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-4">
            <label for="trainee" class="form-label">Trainee</label>
            <input class="form-control" type="text" id="trainee" name="trainee" value="<?= $journal['trainee'] ?>" placeholder = "Trainee" readonly/>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-4">
            <label for="endDate" class="form-label">End Date</label>
            <input class="form-control" type="text" id="endDate" name="endDate" value="<?= $journal['end_date'] ?>" placeholder = "End Date" readonly/>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
              <label for="activity" class="form-label">Activity / Task</label>
              <textarea class="form-control" id="activity" name="activity" rows="5" placeholder="-- Indicate Task / Activity --"><?= $journal['title'] ?></textarea>
            </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
              <label for="remarks" class="form-label">Remarks</label>
              <textarea class="form-control" id="remarks" name="remarks" rows="5" placeholder="-- Indicate Task / Activity --"><?= $journal['remarks'] ?></textarea>
            </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-4">
            <label class="form-label" for="status">Status</label>
            <select id="status" name="status" class="select2 form-select" disabled>
              <option value="" selected disabled>-- Please Select Status --</option>
              <option value="0" <?= $journal['status_id'] == 0 ? 'selected' : '' ?>>Draft</option>
              <option value="1" <?= $journal['status_id'] == 1 ? 'selected' : '' ?>>On-Going</option>
              <option value="2" <?= $journal['status_id'] == 2 ? 'selected' : '' ?>>Hold</option>
              <option value="3" <?= $journal['status_id'] == 3 ? 'selected' : '' ?>>Completed</option>
              
            </select>
          </div>
        </div>

      </div>
    </div>
    <div class="card-footer">
      <?php if ($journal['approved_by'] == 0): ?>
        <?php if ($journal['status_id'] == 3): ?>
          <div class="button-wrapper float-end">
            <button type="button" class="btn btn-success companyDetailsModal" data-bs-toggle="modal" data-bs-target="#companyDetailsModal"><span class="tf-icons bx bx-list-check"></span> Done</button>
          </div>
        <?php endif ?>
        <div class="button-wrapper float-end">
          <button type="submit" class="btn btn-primary me-2"><i class='bx bxs-check-circle'></i> Save</button>
        </div>
      <?php endif ?>
    </div>  

</div>