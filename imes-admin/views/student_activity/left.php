<div class="row mb-3">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4 justify-content-center mb-3">
          <img src="_images/<?= isset($student['avatar_id']) ? $student['avatar_id'] : 'default-avatar.png' ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar"/>
        </div>
        <div class="d-flex align-items-start align-items-sm-center gap-4 justify-content-center">
          <span class="text-muted mb-0"><?= $student['fullname'] ?></span>
        </div>
        <div class="d-flex align-items-start align-items-sm-center gap-4 text-center">
          <small class="text-muted mb-0"><?= $student['program'] ?></small>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex mb-3">
          <div class="flex-grow-1 row">
            <div class="col-9 mb-sm-0 mb-2">
              <h6 class="mb-0">Profile</h6>
            </div>
            <div class="col-3 text-end">
              <span class="badge bg-label-primary rounded-pill"><?= $studentTotalPercentage.'%' ?></span>
            </div>
          </div>
        </div>
        <hr>

        <div class="d-flex mb-3">
          <div class="flex-grow-1 row">
            <div class="col-9 mb-sm-0 mb-2">
              <h6 class="mb-0">Pre-OJT Requirements</h6>
            </div>
            <div class="col-3 text-end">
              <span class="badge bg-label-success rounded-pill"><?= number_format($studentPreOjtPercentage, 0) ?>%</span>
            </div>
          </div>
        </div>
        <hr>

        <div class="d-flex mb-3">
          <div class="flex-grow-1 row">
            <div class="col-9 mb-sm-0 mb-2">
              <h6 class="mb-0">Task Completed</h6>
            </div>
            <div class="col-3 text-end">
              <span class="badge bg-label-warning rounded-pill"><?= $journals_completed ?>/<?= $journal_count ?></span>
            </div>
          </div>
        </div>
        <hr>

        <div class="d-flex mb-3">
          <div class="flex-grow-1 row">
            <div class="col-9 mb-sm-0 mb-2">
              <h6 class="mb-0">Hours Completed</h6>
            </div>
            <div class="col-3 text-end">
              <span class="badge bg-label-danger rounded-pill"><?= $student['compHours'] > 0 ? number_format($student['compHours'], 2) : 0 .'/'. number_format($student['reqHours'], 0) ?></span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>