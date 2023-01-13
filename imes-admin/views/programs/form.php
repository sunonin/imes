<form method="POST" action="<?= $route ?>">
  <div class="row">

    <!-- COMPANY DETAILS -->
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header"><i class='bx bx-list-plus'></i> Program Details</h5>

        <input type="hidden" name="programId" value="<?= $_GET['id'] ?>">

        <div class="card-body">
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="programTitle">Title</label>
              <input type="text" class="form-control" id="programTitle" name="programTitle" value="<?= !empty($program) ? $program['title'] : '' ?>" placeholder="Program Title" />
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="programCode">Program Code</label>
              <input type="text" class="form-control" id="programCode" name="programCode" value="<?= !empty($program) ? $program['code'] : '' ?>" placeholder="Program Code" />
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="programMajor">Major</label>
              <input type="text" class="form-control" id="programMajor" name="programMajor" value="<?= !empty($program) ? $program['major'] : '' ?>" placeholder="Major" />
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="programLength">Length of Program</label>
              <input type="text" class="form-control" id="programLength" name="programLength" value="<?= !empty($program) ? $program['length'] : '' ?>" placeholder="Length" />
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="gender">Department</label>
              <select id="department" name="programDepartment" class="select2 form-select">
                <option value="" selected disabled>-- Please Select Department --</option>
                <?php foreach ($department_opts as $key => $opt): ?>
                  <?php if (!empty($program) && ($key == $program['dept_id'])): ?>
                    <option value="<?= $key ?>" selected><?= $opt['title'] ?></option>
                  <?php else: ?>
                    <option value="<?= $key ?>"><?= $opt['title'] ?></option>
                  <?php endif ?>  
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-2">
              <label class="form-label" for="programOjtHours">OJT Hours</label>
              <input type="text" class="form-control" id="programOjtHours" name="programOjtHours" value="<?= !empty($program) ? $program['ojt_hours'] : '' ?>" placeholder="OJT Hours" />
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Floating button -->
  <div class="fab-container">
    <button type="submit" class="btn btn-primary btn-md iconbutton">
      <i class="bx bxs-check-square d-block d-sm-none"></i>
      <span class="d-none d-sm-block">Submit</span>
    </button>
  </div>
</form>