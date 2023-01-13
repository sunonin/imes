<div class="card mb-4">
  <!-- Account -->
  <div class="card-body">
    <div class="col-md-12">

      <div class="row">
        <div class="mb-3 col-md-4">
          <label for="birthDate" class="form-label">Start Date</label>
          <input class="form-control" type="datetime-local" value="<?= !empty($profile) ? $profile['birth_date'] : '' ?>" id="birthDate" name="startDate" />
        </div>
      </div>

      <div class="row">
        <div class="mb-3 col-md-4">
          <label class="form-label" for="trainee">Trainee</label>
            <select id="trainee" name="trainee" class="select2 form-select">
              <option value="" selected disabled>-- Please Select Trainee --</option>
              <?php foreach ($trainees as $key => $trainee): ?>
                <option value="<?= $trainee['traineeId'] ?>"><?= $trainee['trainee'] ?></option>
              <?php endforeach ?>
            </select>
        </div>
      </div>

      <div class="row">
        <div class="mb-3 col-md-12">
            <label for="activity" class="form-label">Activity / Task</label>
            <textarea class="form-control" id="activity" name="activity" rows="5" placeholder="-- Indicate Task / Activity --"><?= !empty($profile) ? $profile['exact_address'] : '' ?></textarea>
          </div>
      </div>

    </div>
  </div>
  <div class="card-footer">
    <!-- <div class="row"> -->
      <button type="submit" class="btn btn-primary float-end">Save</button>
    <!-- </div> -->
  </div>
</div>