<div class="card">
  <form method="POST" action="<?= $imes->route.'put-school-info.php'; ?>" enctype="multipart/form-data">    

  <h5 class="card-header">School Information</h5>
  <div class="card-body">
      <input type="hidden" name="userId" value="<?= $_SESSION['user']['id'] ?>">

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="section" class="form-label">Section</label>
          <input class="form-control" type="text" id="section" name="section" value="<?= $student['section'] ?>" placeholder = "Section"/>
        </div>
        <div class="col-md-6">
          <label for="section" class="form-label">School Year</label>
          <input class="form-control" type="text" id="school_year" name="school_year" value="<?= $student['school_year'] ?>" placeholder = "Section"/>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-7">
          <label class="form-label" for="gender">Program</label>
          <select id="schoolProgram" name="schoolProgram" class="select2 form-select schoolProgram">
            <option value="" selected disabled>-- Please Select Program --</option>
            <?php foreach ($program_opts as $key => $opt): ?>
              <?php if (!empty($student) && ($key == $student['program_id'])): ?>
                <option value="<?= $key ?>" selected><?= $opt['title'] ?></option>
              <?php else: ?>
                <option value="<?= $key ?>"><?= $opt['title'] ?></option>
              <?php endif ?>  
            <?php endforeach ?>
          </select>
        </div>

        <div class="col-md-5">
          <label for="schoolYear" class="form-label">Year Level</label>
          <input class="form-control" type="text" id="schoolYear" name="schoolYear" value="<?= $student['year_level'] ?>" placeholder = "First Name" readonly/>
        </div>

      </div>

      <div class="row mb-3">
        <div class="col-md-7">
          <label for="schoolMajor" class="form-label">Major</label>
          <input class="form-control" type="text" id="schoolMajor" name="schoolMajor" value="<?= $student['major'] ?>" placeholder = "Last Name" readonly/>
        </div>

        <div class="col-md-5">
          <label for="schoolProgramLength" class="form-label">Length of Program</label>
          <input class="form-control" type="text" id="schoolProgramLength" name="schoolProgramLength" value="<?= $student['length_of_program'] ?> Years" placeholder = "First Name" readonly/>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="schoolDepartment" class="form-label">Department</label>
          <input class="form-control" type="text" id="schoolDepartment" name="schoolDepartment" value="<?= $student['department'] ?>" placeholder = "Last Name" readonly/>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-12">
          <label for="firstName" class="form-label">School Address</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="exactAddress" rows="2" placeholder="-- Indicate Exact Address --" readonly><?= $school['address'] ?></textarea>
        </div>
      </div>


      <div class="row mb-3">
        <div class="col-md-7">
          <label class="form-label" for="schoolCoordinator">OJT Coordinator</label>
          <select id="schoolCoordinator" name="schoolCoordinator" class="select2 form-select ojt-opt">
            <option value="" selected disabled>-- Please Select Program --</option>
            <?php foreach ($supervisor_opts as $key => $opt): ?>
              <?php if (!empty($student) && ($key == $student['ojt_coordinator_id'])): ?>
                <option value="<?= $key ?>" data-mobile="<?= $opt['mobile'] ?>" selected><?= $opt['fullname'] ?></option>
              <?php else: ?>
                <option value="<?= $key ?>" data-mobile="<?= $opt['mobile'] ?>"><?= $opt['fullname'] ?></option>
              <?php endif ?>  
            <?php endforeach ?>
          </select>
        </div>

        <div class="col-md-5">
          <label for="schoolCoordinatorNo" class="form-label">Tel No.</label>
          <input class="form-control" type="text" id="schoolCoordinatorNo" name="schoolCoordinatorNo" value="<?= $student['ojt_coordinator_mobile'] ?>" placeholder = "First Name" readonly/>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-7">
          <label class="form-label" for="schoolHead">OJT Head</label>
          <select id="schoolHead" name="schoolHead" class="select2 form-select ojt-opt">
            <option value="" selected disabled>-- Please Select Program --</option>
            <?php foreach ($supervisor_opts as $key => $opt): ?>
              <?php if (!empty($student) && ($key == $student['ojt_head_id'])): ?>
                <option value="<?= $key ?>" data-mobile="<?= $opt['mobile'] ?>" selected><?= $opt['fullname'] ?></option>
              <?php else: ?>
                <option value="<?= $key ?>" data-mobile="<?= $opt['mobile'] ?>"><?= $opt['fullname'] ?></option>
              <?php endif ?>  
            <?php endforeach ?>
          </select>
        </div>

        <div class="col-md-5">
          <label for="schoolHeadNo" class="form-label">Tel No.</label>
          <input class="form-control" type="text" id="schoolHeadNo" name="schoolHeadNo" value="<?= $student['ojt_head_mobile'] ?>" placeholder = "First Name" readonly/>
        </div>
      </div>
  </div>
  <div class="card-footer">
      <button type="submit" class="btn btn-primary"><i class='bx bxs-check-circle'></i> Save</button>        
  </div>
  </form>
</div>