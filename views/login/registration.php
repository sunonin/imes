<form id="formAuthentication" class="mb-3" action="route/post-user.php" method="POST">
  <!-- <div class="card"> -->
    <div class="card-body">
      <hr>

      <h4>Profile</h4> 
      <div class="row mb-3"> 
        <div class="col-md-4">
          <label for="lastName" class="form-label">Last Name</label>
          <input class="form-control" type="text" id="lastName" name="lastName" value="" placeholder = "Last Name"/>
        </div>

        <div class="col-md-4">
          <label for="firstName" class="form-label">First Name</label>
          <input class="form-control" type="text" id="firstName" name="firstName" value="" placeholder = "First Name"/>
        </div>

        <div class="col-md-2">
          <label for="middleName" class="form-label">Middle Name</label>
          <input class="form-control" type="text" id="middleName" name="middleName" value="" placeholder = "Middle Name"/>
        </div>

        <div class="col-md-2">
          <label for="extnName" class="form-label">Extn. Name</label>
          <input class="form-control" type="text" id="extnName" name="extnName" value="" placeholder = "Jr, Sr, III, etc"/>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="birthDate" class="form-label">Birth Date</label>
          <input class="form-control" type="date" value="" id="birthDate" name="birthDate" />
        </div>
        <div class="col-md-4">
          <label class="form-label" for="gender">Gender</label>
          <select id="gender" name="gender" class="select2 form-select">
            <option value="" selected disabled>-- Please Select Gender --</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-8">
          <label for="disability" class="form-label">Disability <small>(if any)</small></label>
          <input class="form-control" type="text" id="disability" name="disability" value="" placeholder = "Disability"/>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-12">
          <label for="birthPlace" class="form-label">Birth Place</label>
          <textarea class="form-control" id="birthPlace" name="birthPlace" rows="3" placeholder="-- Indicate Exact Address --"></textarea>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="citizenship" class="form-label">Citizenship</label>
          <input class="form-control" type="text" id="citizenship" name="citizenship" value="" placeholder = "Citizenship"/>
        </div>

        <div class="col-md-6">
          <label class="form-label" for="civilStatus">Civil Status</label>
          <select id="civilStatus" name="civilStatus" class="select2 form-select">
            <option value="" selected disabled>-- Please Select Civil Status --</option>
            <option value="s">Single</option>
            <option value="m">Married</option>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label class="form-label" for="country">Region</label>
            <select id="region" class="select2 form-select" disabled>
              <option value="04" selected>Region IV-A</option>
            </select>
        </div>

        <div class="col-md-4">
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

        <div class="col-md-4">
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
        <div class="col-md-4">
          <label for="provincialPhone" class="form-label">Provincial Tel No.</label>
          <input class="form-control" type="text" id="provincialPhone" name="provincialPhone" value="" placeholder = "Tel No."/>
        </div>
      </div>
    </div>

  <!-- </div> -->
    <div class="card-body">
      <hr>

      <h4>School Information</h4> 

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label" for="schoolSection">Section</label>
          <input type="text" class="form-control" id="schoolSection" name="schoolSection" value="" placeholder="Section" />
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label" for="gender">Program</label>
            <select id="schoolProgram" name="schoolProgram" class="select2 form-select">
              <option value="" selected disabled>-- Please Select Program --</option>
              <?php foreach ($program_opts as $key => $opt): ?>
                <?php if (!empty($profile) && ($key == $profile['program_id'])): ?>
                  <option value="<?= $key ?>" selected><?= $opt['title'] ?></option>
                <?php else: ?>
                  <option value="<?= $key ?>"><?= $opt['title'] ?></option>
                <?php endif ?>  
              <?php endforeach ?>
            </select>
        </div>

        <div class="col-md-6">
          <label class="form-label" for="schoolYear">Year</label>
          <input type="text" class="form-control" id="schoolYear" name="schoolYear" readonly value="<?= !empty($profile) ? $profile['year_level'] : '' ?>" placeholder="Year" />
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label" for="schoolMajor">Major</label>
          <input type="text" class="form-control" id="schoolMajor" name="schoolMajor" readonly value="<?= !empty($profile) ? $profile['major'] : '' ?>" placeholder="Major" />
        </div>

        <div class="col-md-6">
          <label class="form-label" for="schoolProgramLength">Length of Program</label>
          <input type="text" class="form-control" id="schoolProgramLength" name="schoolProgramLength" readonly value="<?= !empty($profile) ? $profile['length_of_program'] : '' ?>" placeholder="Length of Program" />
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label" for="schoolDepartment">Department</label>
          <input type="text" class="form-control" id="schoolDepartment" name="schoolDepartment" readonly value="<?= !empty($profile) ? $profile['department'] : '' ?>" placeholder="Department" />
        </div>

        <div class="col-md-6">
          <label class="form-label" for="schoolAddress">School Address</label>
          <input type="text" class="form-control" id="schoolAddress" name="schoolAddress" readonly value="<?= !empty($schoolDetails) ? $schoolDetails['address'] : '' ?>" placeholder="School Address" />
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label" for="schoolCoordinator">OJT Coordinator</label>
          <select id="schoolCoordinator" name="schoolCoordinator" class="select2 form-select ojt-opt">
            <option value="" selected disabled>-- Please Select Program --</option>
            <?php foreach ($supervisor_opts as $key => $opt): ?>
                <option value="<?= $key ?>" data-mobile="<?= $opt['mobile'] ?>"><?= $opt['fullname'] ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label" for="schoolCoordinatorNo">Tel. No.</label>
          <input type="text" class="form-control" id="schoolCoordinatorNo" name="schoolCoordinatorNo" readonly value="<?= !empty($profile) ? $profile['schoolCoordinatorNo'] : '' ?>" placeholder="Tel. No." />
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label" for="schoolHead">OJT Head</label>
          <select id="schoolHead" name="schoolHead" class="select2 form-select ojt-opt">
            <option value="" selected disabled>-- Please Select Program --</option>
            <?php foreach ($supervisor_opts as $key => $opt): ?>
                <option value="<?= $key ?>" data-mobile="<?= $opt['mobile'] ?>"><?= $opt['fullname'] ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label" for="schoolHeadNo">Tel. No.</label>
          <input type="text" class="form-control" id="schoolHeadNo" name="schoolHeadNo" readonly value="<?= !empty($profile) ? $profile['schoolHeadNo'] : '' ?>" placeholder="Tel. No." />
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label" for="schoolDean">Dean</label>
          <input type="text" class="form-control" id="schoolDean" name="schoolDean" readonly value="<?= !empty($profile) ? $profile['dean'] : '' ?>" placeholder="Dean" />
        </div>

        <div class="col-md-6">
          <label class="form-label" for="schoolDeanNo">Tel. No.</label>
          <input type="text" class="form-control" id="schoolDeanNo" name="schoolDeanNo" readonly value="<?= !empty($profile) ? $profile['schoolDeanNo'] : '' ?>" placeholder="Tel. No." />
        </div>
      </div>
    </div>

    <div class="card-body">
      <hr>
      <h4>Credentials</h4> 

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="userName" class="form-label">Username</label>
          <input class="form-control" type="text" id="userName" name="userName" value="<?= !empty($profile) ? $profile['username'] : '' ?>" placeholder = "Username"/>
        </div>

        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input class="form-control" type="email" id="email" name="email" value="<?= !empty($profile) ? $profile['email'] : '' ?>" placeholder = "Email"/>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="password" class="form-label">Password</label>
          <input class="form-control" type="password" id="password" name="password" value="" placeholder = "Password" />
        </div>

        <div class="col-md-6">
          <label for="confirmPassword" class="form-label">Confirm Password</label>
          <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" value="" placeholder = "Confirm Password"/>
        </div>
      </div>
      <br>

      <div class="row">
        <hr>
        <div class="col-md-12">
          <div class="text-center">
            <button type="submit" class="btn btn-primary btn-md">
              <i class="bx bxs-check-square d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Submit</span>
            </button>
            <a href="index.php" class="btn btn-secondary btn-md">
              <i class="bx bxs-check-square d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Cancel</span>
            </a>
          </div>
        </div>
      </div>

    </div>
</form>