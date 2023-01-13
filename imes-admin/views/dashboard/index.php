<div class="row">
  <div class="col-md-12 col-lg-4">
    <div class="row">
      <div class="col-lg-6 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-primary rounded p-2">
                    <i class="bx bx bx-list-plus bx-sm"></i>
                  </span>
              </div>
              
            </div>
            <span class="d-block">Total Accounts</span>
            <h4 class="card-title mb-1"><?= number_format($totalAccounts, 0) ?> <small style="font-size:15px;">w/ role</small></h4>
            <?php if ($totalRegisteredNoRole > 0): ?>
              <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -<?= number_format($totalRegisteredNoRole, 0) ?> w/o role</small>
            <?php endif ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-success rounded p-2">
                    <i class="bx bx-group bx-sm"></i>
                  </span>
              </div>
              
            </div>
            <span class="d-block">Registered Students</span>
            <h4 class="card-title mb-1"><?= number_format($totalRegisteredStudents, 0) ?> <small style="font-size:15px;">w/ role</small></h4>
            <small class="text-info fw-semibold"> OJT Trainee</small>
            
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-3 col-6 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <span class="badge bg-label-info rounded p-2">
                    <i class="bx bx-group bx-sm"></i>
                  </span>
              </div>
              
            </div>
            <span class="d-block">Unregistered Accounts</span>
            <h4 class="card-title mb-1"><?= number_format($totalRegisteredNoRole, 0) ?> <small style="font-size:15px;">w/o role</small></h4>
            <small class="text-info fw-semibold"> No Access</small>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-3 col-6 mb-4">
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


    </div>
  </div>

  <div class="col-md-6 col-lg-8 mb-4 mb-md-0">
    <div class="card">
      <div class="table-responsive text-nowrap">
        <table class="table text-nowrap">
          <thead>
            <tr>
              <th width="15%">Company</th>
              <th>Type</th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php foreach (array_slice($companies, 0, 5) as $key => $company): ?>
              <tr>
                <td><?= $company['name'] ?></td>
                <td>
                  <span class="badge bg-label-primary"><?= $company['type'] ?></span> 
                </td>
                <td style="word-wrap: break-word;min-width: 320px;max-width: 320px; white-space: normal !important; ">
                  <?= $company['address'] ?>
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

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table text-nowrap">
            <thead>
              <tr>
                <th class="text-center" width="15%">Total Students</th>
                <th class="text-center">Students w/ Pre-OJT Requirements</th>
                <th class="text-center">Students w/ Post-OJT Requirements</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr>
                  <td class="text-center" style="font-size: 20px;"><?= number_format($totalRegisteredStudents, 0) ?></td>
                  <td class="text-center" style="font-size: 20px;">
                    <?= number_format($totalPreRequirements, 0) ?>  
                  </td>
                  <td class="text-center" style="font-size: 20px;">
                    <?= number_format($totalPostRequirements, 0) ?>
                  </td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</div>