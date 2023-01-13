<div class="card">
  <form method="POST" action="<?= $imes->route.'put-profile.php'; ?>" enctype="multipart/form-data">    
    <div class="card-body">
      <div class="d-flex align-items-start align-items-sm-center gap-4">
        <div class="button-wrapper">
          <label for="upload" class="btn btn-warning me-2 mb-4" tabindex="0">
            <span class="d-none d-sm-block">Upload new photo</span>
            <i class="bx bx-upload d-block d-sm-none"></i>
            <input type="file" id="upload" name="avatar" class="account-file-input" hidden accept="image/png, image/jpeg"
            />
          </label>
          <p class="text-muted mb-0"><mark>Allowed JPG, JPEG or PNG. Max size of 1MB</mark></p>
        </div>
      </div>
    </div>  

    <hr class="my-0" />
    <div class="card-body">
      <input type="hidden" name="userId" value="<?= $_SESSION['user']['id'] ?>">
      <div class="row mb-3"> 
        <div class="col-md-4">
          <label for="lastName" class="form-label">Last Name</label>
          <input class="form-control" type="text" id="lastName" name="lastName" value="<?= $student['lname'] ?>" placeholder = "Last Name"/>
        </div>

        <div class="col-md-4">
          <label for="firstName" class="form-label">First Name</label>
          <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $student['fname'] ?>" placeholder = "First Name"/>
        </div>

        <div class="col-md-2">
          <label for="middleName" class="form-label">Middle Name</label>
          <input class="form-control" type="text" id="middleName" name="middleName" value="<?= $student['mname'] ?>" placeholder = "Middle Name"/>
        </div>

        <div class="col-md-2">
          <label for="extnName" class="form-label">Extn. Name</label>
          <input class="form-control" type="text" id="extnName" name="extnName" value="<?= $student['extn_name'] ?>" placeholder = "Jr, Sr, III, etc"/>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="age" class="form-label">Age</label>
          <input class="form-control" type="text" id="age" name="age" value="<?= $student['age'] ?>" readonly placeholder = "Age"/>
        </div>

        <div class="col-md-4">
          <label class="form-label" for="gender">Gender</label>
          <select id="gender" name="gender" class="select2 form-select">
            <option value="" selected disabled>-- Please Select Gender --</option>
            <option value="male" <?= $student['gender'] == 'm' ? "selected" : "" ?>>Male</option>
            <option value="female" <?= $student['gender'] == 'f' ? "selected" : "" ?>>Female</option>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-8">
          <label for="disability" class="form-label">Disability <small>(if any)</small></label>
          <input class="form-control" type="text" id="disability" name="disability" value="<?= $student['disability'] ?>" placeholder = "Disability"/>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="birthDate" class="form-label">Birth Date</label>
          <!-- <input class="form-control" type="text" id="birthDate" name="birthDate" value="<?= $student['birth_date'] ?>" placeholder = "Birth Date"/> -->
          <input class="form-control" type="date" value="<?= $student['birth_date'] ?>" id="birthDate" name="birthDate" />
        </div>

        <div class="col-md-6">
          <label for="birthPlace" class="form-label">Birth Place</label>
          <textarea class="form-control" id="birthPlace" name="birthPlace" rows="3" placeholder="-- Indicate Exact Address --"><?= $student['birth_place'] ?></textarea>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="citizenship" class="form-label">Citizenship</label>
          <input class="form-control" type="text" id="citizenship" name="citizenship" value="<?= $student['citizenship'] ?>" placeholder = "Age"/>
        </div>

        <div class="col-md-6">
          <label class="form-label" for="civilStatus">Civil Status</label>
          <select id="civilStatus" name="civilStatus" class="select2 form-select">
            <option value="" selected disabled>-- Please Select Civil Status --</option>
            <option value="s" <?= $student['civil_status'] == 's' ? "selected" : "" ?>>Single</option>
            <option value="m" <?= $student['civil_status'] == 'm' ? "selected" : "" ?>>Married</option>
          </select>
        </div>

      </div>

      <div class="row mb-3">
        <div class="col-md-8">
          <label for="presentAddress" class="form-label">Present Address</label>
          <input class="form-control" type="text" id="presentAddress" name="presentAddress" value="<?= $student['present_address'] ?>" placeholder = "presentAddress" readonly/>
        </div>

        <div class="col-md-4">
          <label for="mobile" class="form-label">Tel No.</label>
          <input class="form-control" type="text" id="mobile" name="mobile" value="<?= $student['mobile'] ?>" placeholder = "Age"/>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <label for="provincialAddress" class="form-label">Provincial Address</label>
          <input class="form-control" type="text" id="provincialAddress" name="provincialAddress" value="<?= $student['provincial_address'] ?>" placeholder = "Provincial Address"/>
        </div>

        <div class="col-md-4">
          <label for="provincialPhone" class="form-label">Tel No.</label>
          <input class="form-control" type="text" id="provincialPhone" name="provincialPhone" value="<?= $student['provincial_phone'] ?>" placeholder = "Tel No."/>
        </div>
      </div>

    </div>

    <div class="card-footer float-end">
      <button type="submit" class="btn btn-primary"><i class='bx bxs-check-circle'></i> Save</button>        
    </div>

  </form>
</div>