<div class="col-md-12">

  <div class="divider divider-primary">
    <div class="divider-text"><h5>School Information</h5></div>
  </div>

  <div class="row mb-3">
    
    <div class="col-md-7">
      <label for="lastName" class="form-label">Program</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['program'] ?>" placeholder = "Last Name" readonly/>
    </div>

    <div class="col-md-5">
      <label for="firstName" class="form-label">Year Level</label>
      <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $student['year_level'] ?>" placeholder = "First Name" readonly/>
    </div>

  </div>

  <div class="row mb-3">
    <div class="col-md-7">
      <label for="lastName" class="form-label">Major</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['major'] ?>" placeholder = "Last Name" readonly/>
    </div>

    <div class="col-md-5">
      <label for="firstName" class="form-label">Length of Program</label>
      <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $student['length_of_program'] ?> Years" placeholder = "First Name" readonly/>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
      <label for="lastName" class="form-label">Department</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['department'] ?>" placeholder = "Last Name" readonly/>
    </div>

    <div class="col-md-6">
      <label for="firstName" class="form-label">School Address</label>
      <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $schoolDetails['address'] ?>" placeholder = "First Name" readonly/>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-7">
      <label for="lastName" class="form-label">OJT Coordinator</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['ojt_coordinator'] ?>" placeholder = "Last Name" readonly/>
    </div>

    <div class="col-md-5">
      <label for="firstName" class="form-label">Tel No.</label>
      <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $student['ojt_coordinator_mobile'] ?>" placeholder = "First Name" readonly/>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-md-7">
      <label for="lastName" class="form-label">OJT Head</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['ojt_head'] ?>" placeholder = "Last Name" readonly/>
    </div>

    <div class="col-md-5">
      <label for="firstName" class="form-label">Tel No.</label>
      <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $student['ojt_head_mobile'] ?>" placeholder = "First Name" readonly/>
    </div>
  </div>
</div>