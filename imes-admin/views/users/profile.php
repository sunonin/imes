<div class="card mb-4">
  <h5 class="card-header">Profile Details</h5>

  <input type="hidden" name="userId" value="<?= $_GET['id'] ?>">
  <!-- Account -->
  <div class="card-body">
    <div class="d-flex align-items-start align-items-sm-center gap-4">
      <input type="hidden" name="currentAvatar" value="<?= !empty($profile) ? $profile['avatar_id'] : '' ?>">

      <img src="_images/<?= !empty($profile) ? $profile['avatar_id'] : 'default-avatar.png' ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"/>
      <div class="button-wrapper">
        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
          <span class="d-none d-sm-block">Upload new photo</span>
          <i class="bx bx-upload d-block d-sm-none"></i>
          <input type="file" id="upload" name="avatar" class="account-file-input" hidden accept="image/png, image/jpeg"
          />
        </label>
        <p class="text-muted mb-0">Allowed JPG, JPEG or PNG. Max size of 800K</p>
      </div>
    </div>
  </div>
  <hr class="my-0" />
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="mb-3 col-md-10">
            <label class="form-label" for="country">Region</label>
            <select id="region" class="select2 form-select" disabled>
              <option value="04" selected>Region IV-A</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-md-10">
            <label class="form-label" for="country">Province</label>
            <select id="province" name="province" class="select2 form-select" onChange="handleChangeProvince($(this))">
              <option value="" selected disabled>-- Please Select Province --</option>
              <?php foreach ($province_opts as $key => $province): ?>
                <?php if (!empty($profile) && ($profile['province'] == $key)): ?>
                  <option value="<?= $key ?>" selected><?= $province ?></option>
                <?php else: ?>  
                  <option value="<?= $key ?>"><?= $province ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-md-10">
            <label class="form-label" for="country">City/Municipality</label>
            <select id="citymun" name="citymun" class="select2 form-select">
              <option value="" selected disabled>-- Please Select City/Municipality --</option>
              <?php foreach ($citymuns_opts as $key => $citymun): ?>
                <?php if (!empty($profile) && ($profile['citymun'] == $key)): ?>
                  <option value="<?= $key ?>" selected><?= $citymun ?></option>
                <?php else: ?>  
                  <option value="<?= $key ?>"><?= $citymun ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-md-10">
            <label for="exampleFormControlTextarea1" class="form-label">Exact Address</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="exactAddress" rows="3" placeholder="-- Indicate Exact Address --"><?= !empty($profile) ? $profile['exact_address'] : '' ?></textarea>
          </div>
        </div>

      </div>

      <div class="col-md-6">
        <div class="row">
          <div class="mb-3 col-md-10">
            <label for="firstName" class="form-label">First Name</label>
            <input class="form-control" type="text" id="firstName" name="firstName" value="<?= !empty($profile) ? $profile['fname'] : '' ?>" placeholder = "First Name"/>
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-md-10">
            <label for="middleName" class="form-label">Middle Name</label>
            <input class="form-control" type="text" id="middleName" name="middleName" value="<?= !empty($profile) ? $profile['mname'] : '' ?>" placeholder = "Middle Name"/>
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-md-10">
            <label for="lastName" class="form-label">Last Name</label>
            <input class="form-control" type="text" id="lastName" name="lastName" value="<?= !empty($profile) ? $profile['lname'] : '' ?>" placeholder = "Last Name"/>
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-md-10">
            <label for="extnName" class="form-label">Extension Name</label>
            <input class="form-control" type="text" id="extnName" name="extnName" value="<?= !empty($profile) ? $profile['extn_name'] : '' ?>" placeholder = "Jr, Sr, III, etc"/>
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-md-10">
            <label for="birthDate" class="form-label">Birth Date</label>
            <input class="form-control" type="date" value="<?= !empty($profile) ? $profile['birth_date'] : '' ?>" id="birthDate" name="birthDate" />
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-md-10">
            <label class="form-label" for="gender">Gender</label>
            <select id="gender" name="gender" class="select2 form-select">
              <option value="" selected disabled>-- Please Select Gender --</option>
              <option value="m" <?= !empty($profile) ? ($profile['gender'] == 'm' ? 'selected' : '' ) : '' ?>>Male</option>
              <option value="f" <?= !empty($profile) ? ($profile['gender'] == 'f' ? 'selected' : '' ) : '' ?>>Female</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-md-10">
            <label for="mobile" class="col-md-2 col-form-label">Mobile No.</label>
            <input class="form-control" type="tel" value="<?= !empty($profile) ? $profile['mobile'] : '' ?>" id="mobile" name="mobile" placeholder="Mobile No." />
          </div>
        </div>


      </div>
    </div>
  </div>
</div>