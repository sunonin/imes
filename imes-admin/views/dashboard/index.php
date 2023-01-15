<div class="row">
  <div class="col-md-12 col-lg-4">
    <div class="row">
      
      <div class="col-lg-12 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-danger rounded p-2">
                    <i class="bx bx-group bx-sm"></i>
                  </span>
              </div>
              
            </div>
            <span class="d-block">Coordinator</span>
            <h4 class="card-title mb-1"><?= number_format($totalRegisteredCoordinator, 0) ?> <small style="font-size:15px;">w/ role</small></h4>
            <small class="text-info fw-semibold"> OJT Coordinator</small>
          </div>
        </div>
      </div>

      <div class="col-lg-12 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-8">
              <div class="card-body">
                <small class="d-block mb-3 text-nowrap">
                  <div class="">
                    <select id="school_year" name="school_year" class="select2 form-select" onchange="handleChangeProvince($(this))">
                      <option value="" selected="" disabled="">-- Please Select School Year --</option>        
                          <option value="2023" selected>S.Y 2023</option>
                          <option value="2022">S.Y 2022</option>
                    </select>
                    </div>
                </small>
                <h5 class="card-title text-primary mb-1 ttl-students"><?= $totalRegisteredStudents ?></h5>
                <small class="d-block mb-4 pb-1 text-muted">Total number of Students</small>

                <a href="list-of-students.php" target="_blank" class="btn btn-sm btn-primary">View List</a>
              </div>
            </div>
            <div class="col-4 pt-3 ps-0">
              <img src="assets/img/illustrations/prize-light.png" width="90" height="140" class="rounded-start" alt="View Students">
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <div class="col-md-6 col-lg-8 mb-4 mb-md-0">
    <div class="card mb-3">
      <div class="card-header">
        <h5>Company w/ No. of Trainees</h5>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-striped text-nowrap">
          <thead>
            <tr>
              <th width="15%">Company</th>
              <th>Address</th>
              <th>No. of Trainees</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php foreach (array_slice($companies, 0, 5) as $key => $company): ?>
              <tr>
                <td>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="d-flex flex-column">
                      <?= $company['name'] ?>
                      <small class="text-truncate text-muted"><?= $company['type'] ?></small>
                    </div>
                  </div>
                </td>
                <td style="word-wrap: break-word;min-width: 320px;max-width: 320px; white-space: normal !important; ">
                  <?= $company['address'] ?>
                </td>
                <td>
                  <?= $company['stud_count'] ?>
                </td>
              </tr>
            <?php endforeach ?>
            <tr>
              <td class="text-center" colspan="4">
                <a href="list-of-students.php" target="_blank" style="color:#7c8b9c;"><i class="bx bx-folder-open"></i> View All</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h5>Company List</h5>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-striped text-nowrap">
          <thead>
            <tr>
              <th width="15%">Company</th>
              <th>Address</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php foreach (array_slice($companiesList, 0, 5) as $key => $company): ?>
              <tr>
                <td>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="d-flex flex-column">
                      <?= $company['name'] ?>
                      <small class="text-truncate text-muted"><?= $company['type'] ?></small>
                    </div>
                  </div>
                </td>
                <td style="word-wrap: break-word;min-width: 320px;max-width: 320px; white-space: normal !important; ">
                  <?= $company['address'] ?>
                </td>
                <td>
                  <?= $company['email'] ?>
                </td>
              </tr>
            <?php endforeach ?>
            <tr>
              <td class="text-center" colspan="4">
                <a href="company.php" style="color:#7c8b9c;"><i class="bx bx-folder-open"></i> View All</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
  
</div>