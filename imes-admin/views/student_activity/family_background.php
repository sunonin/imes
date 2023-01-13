<div class="col-md-12 mb-5">

  <div class="divider divider-primary">
    <div class="divider-text"><h5>Family Background</h5></div>
  </div>

  <div class="row mb-3">
    <small class="mb-2">(if parents are deceased, give data for the nearest relative and indicate relationship to applicant)</small>

    <div class="col-md-7">
      <label for="lastName" class="form-label">Father's Name</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['father'] ?>" placeholder = "Last Name" readonly/>
    </div>

    <div class="col-md-5">
      <label for="firstName" class="form-label">Occupation</label>
      <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $student['father_occupation'] ?>" placeholder = "First Name" readonly/>
    </div>

  </div>

  <div class="row mb-3">
    <div class="col-md-7">
      <label for="lastName" class="form-label">Mother's Name</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['mother'] ?>" placeholder = "Last Name" readonly/>
    </div>

    <div class="col-md-5">
      <label for="firstName" class="form-label">Occupation</label>
      <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $student['mother_occupation'] ?>" placeholder = "First Name" readonly/>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-7">
      <label for="lastName" class="form-label">Address of Parents</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['parents_address'] ?>" placeholder = "Last Name" readonly/>
    </div>

    <div class="col-md-5">
      <label for="firstName" class="form-label">Tel No.</label>
      <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $student['parents_mobile'] ?>" placeholder = "First Name" readonly/>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-7">
      <label for="lastName" class="form-label">Guardians Name</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['guardian'] ?>" placeholder = "Last Name" readonly/>
    </div>

    <div class="col-md-5">
      <label for="firstName" class="form-label">Tel No.</label>
      <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $student['guardians_mobile'] ?>" placeholder = "First Name" readonly/>
    </div>
  </div>


  <div class="row mb-3">
    <div class="col-md-7">
      <label for="lastName" class="form-label">In case of Emergency, notify</label>
      <select id="gender" name="gender" class="select2 form-select" disabled>
        <option value="" selected disabled>-- Please Select Contact --</option>
        <option value="1" <?= $student['notify'] == 1 ? 'selected' : '' ?>>Father</option>
        <option value="2" <?= $student['notify'] == 2 ? 'selected' : '' ?>>Mother</option>
        <option value="3" <?= $student['notify'] == 3 ? 'selected' : '' ?>>Guardian</option>
      </select>
    </div>

  </div>

</div>