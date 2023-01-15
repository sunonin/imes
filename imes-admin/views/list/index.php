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
              <option value="2023" <?= isset($_GET['filterSchoolYear']) ? ($_GET['filterSchoolYear'] == 2023 ? 'selected' : '') : '' ; ?>>2023</option>
              <option value="2022" <?= isset($_GET['filterSchoolYear']) ? ($_GET['filterSchoolYear'] == 2022 ? 'selected' : '') : '' ; ?>>2022</option>
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

      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
              <button type="submit" class="btn btn-primary btn-md">
                <i class="bx bxs-check-square d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Filter</span>
              </button>
              <a href="list-of-students.php" class="btn btn-secondary btn-md">
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
      <table id="tb-student" class="table table-hover">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">S.Y</th>
            <th class="text-center">Program</th>
            <th class="text-center">Section</th>
            <th class="text-center">Name</th>
            <th class="text-center">Company</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php foreach ($students as $key => $student): ?>
            <tr>
              <td><?= $key+1 ?></td>
              <td class="text-center"><?= $student['school_year'] ?></td>
              <td class="text-center"><?= $student['program'] .' - '. $student['major'] ?></td>
              <td class="text-center"><?= $student['section'] ?></td>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $student['fullname'] ?></strong></td>
              <td><?= $student['comp_name'] ?></td>
              <td class="text-center">
                <div>
                  <a href="user_edit.php?id=<?= $student['id'] ?>" type="button" class="btn btn-outline-primary btn-sm" title="Edit">
                    <span class="tf-icons bx bxs-folder-open"></span> View
                  </a>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>