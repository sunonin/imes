<div class="col-md-12 mb-5">

  <div class="divider divider-primary">
    <div class="divider-text"><h5>Student Information</h5></div>
  </div>

  <div class="row mb-3">
    
    <div class="col-md-4">
      <label for="lastName" class="form-label">Last Name</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['lname'] ?>" placeholder = "Last Name" readonly/>
    </div>

    <div class="col-md-4">
      <label for="firstName" class="form-label">First Name</label>
      <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $student['fname'] ?>" placeholder = "First Name" readonly/>
    </div>

    <div class="col-md-2">
      <label for="middleName" class="form-label">Middle Name</label>
      <input class="form-control" type="text" id="middleName" name="middleName" value="<?= $student['mname'] ?>" placeholder = "Middle Name" readonly/>
    </div>

    <div class="col-md-2">
      <label for="extnName" class="form-label">Extn. Name</label>
      <input class="form-control" type="text" id="extnName" name="extnName" value="<?= $student['extn_name'] ?>" placeholder = "Jr, Sr, III, etc" readonly/>
    </div>

  </div>

  <div class="row mb-3">
    
    <div class="col-md-4">
      <label for="lastName" class="form-label">Age</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['age'] ?>" placeholder = "Age" readonly/>
    </div>

    <div class="col-md-4">
      <label class="form-label" for="gender">Gender</label>
      <select id="gender" name="gender" class="select2 form-select" disabled>
        <option value="" selected disabled>-- Please Select Gender --</option>
        <option value="male" <?= $student['gender'] == 'm' ? "selected" : "" ?>>Male</option>
        <option value="female" <?= $student['gender'] == 'f' ? "selected" : "" ?>>Female</option>
      </select>
    </div>

  </div>

  <div class="row mb-3">
    
    <div class="col-md-8">
      <label for="lastName" class="form-label">Disability <small>(if any)</small></label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= !empty($profile) ? $profile['lname'] : '' ?>" placeholder = "Disability" readonly/>
    </div>

  </div>

  <div class="row mb-3">
    
    <div class="col-md-6">
      <label for="birthDate" class="form-label">Birth Date</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['birth_date'] ?>" placeholder = "Birth Date" readonly/>
    </div>

    <div class="col-md-6">
      <label for="birthDate" class="form-label">Birth Place</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="exactAddress" rows="3" placeholder="-- Indicate Exact Address --" readonly><?= $student['birth_place'] ?></textarea>
    </div>

  </div>

  <div class="row mb-3">
    
    <div class="col-md-6">
      <label for="birthDate" class="form-label">Citizenship</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['citizenship'] ?>" placeholder = "Age" readonly/>
    </div>

    <div class="col-md-6">
      <label for="birthDate" class="form-label">Civil Status</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['civil_status'] ?>" placeholder = "Age" readonly/>
    </div>

  </div>

  <div class="row mb-3">
    
    <div class="col-md-8">
      <label for="birthDate" class="form-label">Present Address</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['present_address'] ?>" placeholder = "Age" readonly/>
    </div>

    <div class="col-md-4">
      <label for="birthDate" class="form-label">Tel No.</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['mobile'] ?>" placeholder = "Age" readonly/>
    </div>

  </div>

  <div class="row mb-3">
    
    <div class="col-md-8">
      <label for="birthDate" class="form-label">Provincial Address</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['provincial_address'] ?>" placeholder = "Provincial Address" readonly/>
    </div>

    <div class="col-md-4">
      <label for="birthDate" class="form-label">Tel No.</label>
      <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['provincial_phone'] ?>" placeholder = "Tel No." readonly/>
    </div>

  </div>
</div>