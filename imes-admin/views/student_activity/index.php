<div class="row">
  <div class="col-md-12">
    <div class="card bg-info text-white mb-3">
      <div class="card-body">
        <h5 class="card-title text-white">Info:</h5>
          To generate export file, select first from filters <b>PROGRAM</b> or <b>SECTION</b> then click filter. Generate button will appear then click Generate to export list.
      </div>
    </div>
  </div>
</div>

<div class="card mb-3">
  <div class="card-header">
    Filters
  </div>  
  <div class="card-body">
    <form>
      <div class="row mb-3">
        <div class="col-md-4">
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

        <div class="col-md-4">
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

        <div class="col-md-4">
          <label class="form-label" for="filterName">Name</label>
          <input type="text" class="form-control" id="filterName" name="filterName" value="<?= !empty($_GET['filterName']) ? $_GET['filterName'] : '' ?>" placeholder="Name" />
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
              <button type="submit" class="btn btn-primary btn-md">
                <i class="bx bxs-check-square d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Filter</span>
              </button>
              <a href="student_activity.php" class="btn btn-secondary btn-md">
                <i class="bx bxs-check-square d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Cancel</span>
              </a>
              <?php if (isset($_GET['filterProgram']) || isset($_GET['filterSection'])): ?>
                <a href="route/generate-student-list.php?program=<?= isset($_GET['filterProgram']) ? $_GET['filterProgram'] : "" ?>&section=<?= isset($_GET['filterSection']) ? $_GET['filterSection'] : "" ?>" class="btn btn-secondary btn-md">
                  <i class="bx bxs-check-square d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Generate</span>
                </a>              
              <?php endif ?>
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
            <th class="text-center">Program</th>
            <th class="text-center">Major</th>
            <th class="text-center">Section</th>
            <th class="text-center">Name</th>
            <th class="text-center">Required Hours</th>
            <th class="text-center">Completed Hours</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php foreach ($students as $key => $student): ?>
            <tr>
              <td><?= $key+1 ?></td>
              <td class="text-center"><?= $student['program'] ?></td>
              <td class="text-center"><?= $student['major'] ?></td>
              <td class="text-center"><?= $student['section'] ?></td>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $student['fullname'] ?></strong></td>
              
              <td class="text-center">
                <span class="badge bg-label-primary me-1"><?= $student['reqHours'] ?></span>
              </td>
              <td class="text-center">
                <?php if ($student['compHours'] >= $student['reqHours']): ?>
                  <span class="badge bg-label-success me-1"><?= $student['compHours'] ?></span>
                <?php else: ?>
                  <span class="badge bg-label-danger me-1"><?= $student['compHours'] ?></span>
                <?php endif ?>
              </td>
              <td class="text-center">
                <div>
                  <a href="student_view.php?id=<?= $student['id'] ?>&j" type="button" class="btn btn-outline-primary btn-sm" title="Edit">
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