<div class="card mb-3">
  <div class="card-header">
    Filters
  </div>  
  <div class="card-body">
    <form>
      <div class="row mb-3">
        <div class="col-md-3">
          <label class="form-label" for="filterSchoolYear">School Year</label>
            <select id="filterSchoolYear" name="filterSchoolYear" class="select2 form-select">
              <option value="" selected disabled>-- School Year --</option>
              <option value="2023" selected>2023</option>
            </select>
        </div>

        <div class="col-md-3">
          <label class="form-label" for="filterCompany">Company</label>
            <select id="filterCompany" name="filterCompany" class="select2 form-select">
              <option value="" selected disabled>-- Company --</option>
              <?php foreach ($companies as $key => $comp): ?>
                <?php if (!empty($_GET['filterCompany']) && ($_GET['filterCompany'] == $comp['id'])): ?>
                  <option value="<?= $comp['id'] ?>" selected><?= $comp['name'] ?></option>
                <?php else: ?>  
                  <option value="<?= $comp['id'] ?>"><?= $comp['name'] ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
        </div>

        <div class="col-md-3">
          <label class="form-label" for="filterProgram">Program</label>
            <select id="filterProgram" name="filterProgram" class="select2 form-select">
              <option value="" selected disabled>-- Program --</option>
              <?php foreach ($program_opts as $key => $program): ?>
                <?php if (!empty($_GET['filterProgram']) && ($_GET['filterProgram'] == $key)): ?>
                  <option value="<?= $key ?>" selected><?= $program['title'] ?></option>
                <?php else: ?>  
                  <option value="<?= $key ?>"><?= $program['title'] ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
        </div>

        <div class="col-md-3">
          <label class="form-label" for="filterSection">Section</label>
            <select id="filterSection" name="filterSection" class="select2 form-select">
              <option value="" selected disabled>-- Section --</option>
              <?php foreach ($section_opts as $key => $opts): ?>
                <?php if (!empty($_GET['filterSection']) && ($_GET['filterSection'] == $opts['section'])): ?>
                  <option value="<?= $opts['section'] ?>" selected><?= $opts['section'] ?></option>
                <?php else: ?>  
                  <option value="<?= $opts['section'] ?>"><?= $opts['section'] ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
        </div>

      </div>

      <div class="row mb-3">
        <div class="col-md-3">
          <label class="form-label" for="filterMonth">Month</label>
            <select id="filterMonth" name="filterMonth" class="select2 form-select">
              <option value="" selected disabled>-- Month --</option>
              <?php foreach ($mosOpts as $key => $month): ?>
                <?php if ($key == $defaultMos): ?>
                  <option value="<?= $key ?>" selected><?= $month ?></option>
                <?php else: ?>
                  <option value="<?= $key ?>"><?= $month ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
        </div>

        <div class="col-md-3">
          <label class="form-label" for="filterWeek">Week</label>
            <select id="filterWeek" name="filterWeek" class="select2 form-select">
              <option value="" selected disabled>-- Weeks --</option>
              <?php foreach ($weekss as $key => $week): ?>
                <?php if ($currentWeek == $key): ?>
                  <option value="<?= $key ?>" selected><?= $week ?></option>
                <?php else: ?>
                  <option value="<?= $key ?>"><?= $week ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
        </div>

      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
              <button type="submit" class="btn btn-primary btn-md">
                <i class="bx bxs-check-square d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Filter</span>
              </button>
              <a href="student-attendance.php" class="btn btn-secondary btn-md">
                <i class="bx bxs-check-square d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Cancel</span>
              </a>
            </div>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Students List</h5>
  </div>

  <div class="card-body">

    <div class="table-responsive text-nowrap">
      <table id="tb-student" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Trainee</th>
            <?php foreach (array_slice($daysOfWeek, 1) as $day): ?>
              <th class="text-center"><?= $day ?></th>
            <?php endforeach ?>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php $count = 0; ?>
          <?php foreach (array_slice($students, 1) as $key => $student): ?>
            <tr>
              <td><?= ++$count ?></td>
              <td class="text-center"><?= $student['fullname'] ?></td>
              <!-- <td></td> -->
              <?php foreach (array_slice($student['dtrs'], 1) as $i => $b): ?>
                <td class="text-center"><?= $b ?></td>
              <?php endforeach ?>
              <td class="text-center">
                <a href="student-dtr.php?id=<?= $student['id'] ?>&dtr" class="btn btn-primary btn-sm">View</a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>