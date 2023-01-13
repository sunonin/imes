<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item">
        <a class="nav-link" href="user_edit.php?id=<?= $_GET['id'] ?>"><i class="bx bx-user me-1"></i> Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_role.php?id=<?= $_GET['id'] ?>"><i class="bx bx-link-alt me-1"></i> Role</a
        >
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="student_information.php?id=<?= $_GET['id'] ?>"><i class='bx bxs-school me-1'></i></i> School Information</a>
      </li>
    </ul>

    <form id="formAccountSettings" method="POST" action="route/post-student-info.php">
      <input type="hidden" name="userId" value="<?= $profile['id'] ?>">
      <div class="row">

      <!-- COMPANY DETAILS -->
      <div class="col-md-12">
        <div class="card mb-4">
          <h5 class="card-header"><i class='bx bx-list-plus'></i> School Information</h5>

          <div class="card-body">
            <div class="row">
              <div class="col-md-5">
                  <div class="mb-3">
                    <label class="form-label" for="schoolSection">Section</label>
                    <input type="text" class="form-control" id="schoolSection" name="schoolSection" value="<?= !empty($profile) ? $profile['section'] : '' ?>" placeholder="Section" />
                  </div>
              </div>
            </div>

            <div class="row">
              
              <div class="col-md-6">
                <div class="col-md-10">
                  <div class="mb-3">
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
                </div>

                <div class="col-md-10">
                  <div class="mb-3">
                    <label class="form-label" for="schoolMajor">Major</label>
                    <input type="text" class="form-control" id="schoolMajor" name="schoolMajor" readonly value="<?= !empty($profile) ? $profile['major'] : '' ?>" placeholder="Major" />
                  </div>
                </div>

                <div class="col-md-10">
                  <div class="mb-3">
                    <label class="form-label" for="schoolDepartment">Department</label>
                    <input type="text" class="form-control" id="schoolDepartment" name="schoolDepartment" readonly value="<?= !empty($profile) ? $profile['department'] : '' ?>" placeholder="Department" />
                  </div>
                </div>

                <div class="col-md-10">
                  <div class="mb-3">
                    <label class="form-label" for="schoolCoordinator">OJT Coordinator</label>
                    <select id="schoolCoordinator" name="schoolCoordinator" class="select2 form-select ojt-opt">
                      <option value="" selected disabled>-- Please Select Program --</option>
                      <?php foreach ($supervisor_opts as $key => $opt): ?>
                        <?php if (!empty($profile) && ($key == $profile['ojt_coordinator'])): ?>
                          <option value="<?= $key ?>" data-mobile="<?= $opt['mobile'] ?>" selected><?= $opt['fullname'] ?></option>
                        <?php else: ?>
                          <option value="<?= $key ?>" data-mobile="<?= $opt['mobile'] ?>"><?= $opt['fullname'] ?></option>
                        <?php endif ?>  
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-10">
                  <div class="mb-3">
                    <label class="form-label" for="schoolHead">OJT Head</label>
                    <select id="schoolHead" name="schoolHead" class="select2 form-select ojt-opt">
                      <option value="" selected disabled>-- Please Select Program --</option>
                      <?php foreach ($supervisor_opts as $key => $opt): ?>
                        <?php if (!empty($profile) && ($key == $profile['ojt_head'])): ?>
                          <option value="<?= $key ?>" data-mobile="<?= $opt['mobile'] ?>" selected><?= $opt['fullname'] ?></option>
                        <?php else: ?>
                          <option value="<?= $key ?>" data-mobile="<?= $opt['mobile'] ?>"><?= $opt['fullname'] ?></option>
                        <?php endif ?>  
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-10">
                  <div class="mb-3">
                    <label class="form-label" for="schoolDean">Dean</label>
                    <input type="text" class="form-control" id="schoolDean" name="schoolDean" readonly value="<?= !empty($profile) ? $profile['dean'] : '' ?>" placeholder="Dean" />
                  </div>
                </div>

              </div>

              <div class="col-md-6">
                <div class="col-md-10">
                  <div class="mb-3">
                    <label class="form-label" for="schoolYear">Year</label>
                    <input type="text" class="form-control" id="schoolYear" name="schoolYear" readonly value="<?= !empty($profile) ? $profile['year_level'] : '' ?>" placeholder="Year" />
                  </div>
                </div>

                <div class="col-md-10">
                  <div class="mb-3">
                    <label class="form-label" for="schoolProgramLength">Length of Program</label>
                    <input type="text" class="form-control" id="schoolProgramLength" name="schoolProgramLength" readonly value="<?= !empty($profile) ? $profile['length_of_program'] : '' ?>" placeholder="Length of Program" />
                  </div>
                </div>

                <div class="col-md-10">
                  <div class="mb-3">
                    <label class="form-label" for="schoolAddress">School Address</label>
                    <input type="text" class="form-control" id="schoolAddress" name="schoolAddress" readonly value="<?= !empty($schoolDetails) ? $schoolDetails['address'] : '' ?>" placeholder="School Address" />
                  </div>
                </div>

                <div class="col-md-10">
                  <div class="mb-3">
                    <label class="form-label" for="schoolCoordinatorNo">Tel. No.</label>
                    <input type="text" class="form-control" id="schoolCoordinatorNo" name="schoolCoordinatorNo" readonly value="<?= !empty($profile) ? $profile['schoolCoordinatorNo'] : '' ?>" placeholder="Tel. No." />
                  </div>
                </div>

                <div class="col-md-10">
                  <div class="mb-3">
                    <label class="form-label" for="schoolHeadNo">Tel. No.</label>
                    <input type="text" class="form-control" id="schoolHeadNo" name="schoolHeadNo" readonly value="<?= !empty($profile) ? $profile['schoolHeadNo'] : '' ?>" placeholder="Tel. No." />
                  </div>
                </div>

                <div class="col-md-10">
                  <div class="mb-3">
                    <label class="form-label" for="schoolDeanNo">Tel. No.</label>
                    <input type="text" class="form-control" id="schoolDeanNo" name="schoolDeanNo" readonly value="<?= !empty($profile) ? $profile['schoolDeanNo'] : '' ?>" placeholder="Tel. No." />
                  </div>
                </div>

              </div>

            </div>
            
          </div>
        </div>
      </div>
    </div>    

      <div class="fab-container">
        <button type="submit" class="btn btn-primary btn-md iconbutton">
          <i class="bx bxs-check-square d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Submit</span>
        </button>
      </div>

  </form>
</div>
</div>