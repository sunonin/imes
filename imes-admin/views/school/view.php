<div class="row invoice-preview">
  <!-- Invoice -->
  <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
    <div class="card invoice-preview-card">
      <div class="card-header">
        <h4><i class='bx bxs-school'></i> School Details</h4>
      </div>

      <div class="card-body">
        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
          <div class="mb-xl-0 mb-4">
            <div class="d-flex svg-illustration mb-3 gap-2">
              <span class="app-brand-logo demo">
                <div style="width:75px;">
                  <img src="_uploads/official-logo.png" style="width:100%; height: 100%;">
                </div>
              </span>
            </div>
            <p class="mb-1"><b>Name: </b><?= $school['name']; ?></p>
            <p class="mb-1"><b>Address: </b><?= $school['address']; ?></p>
            <p class="mb-0"><b>Phone: </b><?= $school['phone']; ?></p>
            <p class="mb-0"><b>Email: </b><?= $school['email']; ?></p>
          </div>
        </div>
      </div>
      <hr class="my-0">
      <div class="card-body" style="background-color: #ededed">

        <div class="row g-4">
          <div class="col-sm-6 col-xl-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                  <div class="content-left">
                    <span>Programs</span>
                    <div class="d-flex align-items-end mt-2">
                      <h4 class="mb-0 me-2"><?= number_format(count($programs), 0) ?></h4>
                    </div>
                    <small>Total Registered</small>
                  </div>
                  <span class="badge bg-label-primary rounded p-2">
                    <i class="bx bx bx-list-plus bx-sm"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                  <div class="content-left">
                    <span>Departments</span>
                    <div class="d-flex align-items-end mt-2">
                      <h4 class="mb-0 me-2"><?= number_format(count($departments), 0) ?></h4>
                    </div>
                    <small>Total Registered</small>
                  </div>
                  <span class="badge bg-label-danger rounded p-2">
                    <i class="bx bxs-bank bx-sm"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                  <div class="content-left">
                    <span>Active Users</span>
                    <div class="d-flex align-items-end mt-2">
                      <h4 class="mb-0 me-2"><?= number_format(count($departments), 0) ?></h4>
                      <small class="text-danger"></small>
                    </div>
                    <small>Total Students</small>
                  </div>
                  <span class="badge bg-label-success rounded p-2">
                    <i class="bx bx-group bx-sm"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                  <div class="content-left">
                    <span>Company</span>
                    <div class="d-flex align-items-end mt-2">
                      <h4 class="mb-0 me-2"><?= number_format(count($company), 0) ?></h4>
                      <small class="text-success"></small>
                    </div>
                    <small>Total Registered</small>
                  </div>
                  <span class="badge bg-label-warning rounded p-2">
                    <i class="bx bxs-buildings bx-sm"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <hr class="my-0">
      <div class="table-responsive">
        <table class="table border-top m-0">
          <thead>
            <tr style="background-color:#54bdce; color:white;">
              <th class="text-center" style="color:white;">Department</th>
              <th class="text-center" style="color:white;">Program</th>
              <th class="text-center" style="color:white;">Major</th>
              <th class="text-center" style="color:white;">No. of Students</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($tableData)): ?>
              <?php foreach ($tableData as $key => $d): ?>
                <tr>
                  <td class="text-nowrap"><?= $d['department'] ?></td>
                  <td class="text-nowrap"><?= $d['program'] ?></td>
                  <td><?= $d['major'] ?></td>
                  <td><?= $d['count'] ?></td>
                </tr>
              <?php endforeach ?>
            <?php endif ?>
          </tbody>
        </table>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="alert alert-info" role="alert">
              <h6 class="alert-heading fw-bold mb-1"><span class="fw-semibold">Note:</span></h6>
              <span>Data displayed here are based on System only.</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Invoice -->

  <!-- Invoice Actions -->
  <div class="col-xl-3 col-md-4 col-12 invoice-actions">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-12"><h4><i class='bx bxs-joystick-button'></i> Actions</h4></div>
        </div>
        <a href="school_edit.php?id=<?= $school['id'] ?>" type="button" class="btn btn-primary d-grid w-100 mb-1" title="Edit"><span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-edit-alt bx-xs"></i>&nbsp;Update</span></a>
        <button class="btn btn-danger d-grid w-100 mb-1" data-bs-toggle="offcanvas" data-bs-target="#addPaymentOffcanvas">
          <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-trash bx-xs"></i>&nbsp;Delete</span>
        </button>
        <a href="school.php" type="button" class="btn btn-secondary d-grid w-100 mb-1" title="Edit"><span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-left-arrow-circle bx-xs"></i>&nbsp;Back</span></a>
      </div>
    </div>
  </div>
  <!-- /Invoice Actions -->
</div>