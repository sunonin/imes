<?php if ($student['compHours'] > 0 && $student['compHours'] >= $student['reqHours']): ?>

  <?php if (!$student['req']): ?>

    <?php if (isset($al) && !empty($al)): ?>

      <?php if (!$al['is_done']): ?>
        <form method="POST" action="route/post-assessment-link">
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                  <div class="card-header">
                    <h6 class="mb-0">Copy this link</h6>
                    <div class="demo-inline-spacing">
                      <?= $base_url."/assessment-link.php?id=".$al['sid'].'&comp='.$al['comp_id'] ?>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </form>
      <?php else: ?>
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                  <h6 class="mb-0">Info</h6>
                  <div class="demo-inline-spacing">
                    Supervisor has issued rating.
                  </div>
                </div>
            </div>
          </div>
        </div>
      <?php endif ?>

    <?php else: ?>
      <form method="POST" action="route/create-assessment-link.php">
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                  <h6 class="mb-0">Post-OJT Requirements</h6>
                  <div class="demo-inline-spacing">
                    <input type="hidden" name="comp_id" value="<?= $student['compId']; ?>">
                    <button type="submit" class="btn btn-primary"> Create Link</button>

                  </div>
                </div>
            </div>
          </div>
        </div>
      </form>
    <?php endif ?>


<div class="row">
  <div class="col-md-12">
    <form method="POST" action="route/post-postojt-req.php" enctype="multipart/form-data">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="mb-0">Post-OJT Requirements</h6>
          <hr>
          <div class="demo-inline-spacing">
            <ul class="list-group">
              <li class="list-group-item list-group-item-primary"><i class="bx bxs-info-circle"></i> All requirements must be submitted</li>
            </ul>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex mb-3 custom-border">
            <div class="flex-shrink-0">
              <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
                <span class="tf-icons bx bxs-file"></span>
              </button>
            </div>
            <div class="flex-grow-1 row">
              <div class="col-5 mb-sm-0 mb-2">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Student Trainee Performance Appraisal Report</label> <small class="text-muted">(<mark> signed document </mark>)</small>

                    <?php if (!isset($studentOverview[3])): ?>
                      <input class="form-control" type="file" id="formFile" name="attachment[stpar]">
                    <?php endif ?>
                </div>
              </div>
              <div class="col-5 mb-2">
                <?php if (isset($postojt_reqs['stpar']) && $postojt_reqs['stpar']['notes'] != ""): ?>
                  <small>
                    <div class="demo-inline-spacing">
                      <ul class="list-group">
                        <li class="list-group-item list-group-item-danger"><?= $postojt_reqs['stpar']['notes'] ?></li>
                      </ul>
                    </div>
                  </small>
                <?php endif ?>
              </div>
              <div class="col-2 text-end">
                <?php if (isset($postojt_reqs['stpar'])): ?>
                  <a href="../../imes-admin/_uploads/pre-ojt-requirements/<?= $postojt_reqs['stpar']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
                <?php else: ?>
                  <small>No Uploaded file</small>
                <?php endif ?>
              </div>
            </div>
          </div>
          

          <div class="d-flex mb-3 custom-border">
            <div class="flex-shrink-0">
              <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
                <span class="tf-icons bx bxs-file"></span>
              </button>
            </div>
            <div class="flex-grow-1 row">
              <div class="col-5 mb-sm-0 mb-2">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Training Supervisor Feedback Form</label> <small class="text-muted">(<mark> signed document </mark>)</small>
                  <?php if (!isset($studentOverview[3])): ?>
                      <input class="form-control" type="file" id="formFile" name="attachment[tsff]">
                    <?php endif ?>
                </div>
              </div>
              <div class="col-5 mb-2">
                <?php if (isset($postojt_reqs['tsff']) && $postojt_reqs['tsff']['notes'] != ""): ?>
                  <small>
                    <div class="demo-inline-spacing">
                      <ul class="list-group">
                        <li class="list-group-item list-group-item-danger"><?= $postojt_reqs['tsff']['notes'] ?></li>
                      </ul>
                    </div>
                  </small>
                <?php endif ?>
              </div>
              <div class="col-2 text-end">
                <?php if (isset($postojt_reqs['tsff'])): ?>
                  <a href="../../imes-admin/_uploads/pre-ojt-requirements/<?= $postojt_reqs['tsff']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
                <?php else: ?>
                  <small>No Uploaded file</small>
                <?php endif ?>
              </div>
            </div>
          </div>

          <div class="d-flex mb-3 custom-border">
            <div class="flex-shrink-0">
              <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
                <span class="tf-icons bx bxs-file"></span>
              </button>
            </div>
            <div class="flex-grow-1 row">
              <div class="col-5 mb-sm-0 mb-2">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Student Trainee Feedback Form</label> <small class="text-muted">(<mark> signed document </mark>)</small>
                  <?php if (!isset($studentOverview[3])): ?>
                      <input class="form-control" type="file" id="formFile" name="attachment[stff]">
                    <?php endif ?>
                </div>
              </div>
              <div class="col-5 mb-2">
                <?php if (isset($postojt_reqs['stff']) && $postojt_reqs['stff']['notes'] != ""): ?>
                  <small>
                    <div class="demo-inline-spacing">
                      <ul class="list-group">
                        <li class="list-group-item list-group-item-danger"><?= $postojt_reqs['stff']['notes'] ?></li>
                      </ul>
                    </div>
                  </small>
                <?php endif ?>
              </div>
              <div class="col-2 text-end">
                <?php if (isset($postojt_reqs['stff'])): ?>
                  <a href="../../imes-admin/_uploads/pre-ojt-requirements/<?= $postojt_reqs['stff']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
                <?php else: ?>
                  <small>No Uploaded file</small>
                <?php endif ?>
              </div>
            </div>
          </div>

          <div class="d-flex mb-3 custom-border">
            <div class="flex-shrink-0">
              <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
                <span class="tf-icons bx bxs-file"></span>
              </button>
            </div>
            <div class="flex-grow-1 row">
              <div class="col-5 mb-sm-0 mb-2">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Narrative Report</label> <small class="text-muted">(<mark> signed document </mark>)</small>
                  <?php if (!isset($studentOverview[3])): ?>
                      <input class="form-control" type="file" id="formFile" name="attachment[nr]">
                    <?php endif ?>
                </div>
              </div>
              <div class="col-5 mb-2">
                <?php if (isset($postojt_reqs['nr']) && $postojt_reqs['nr']['notes'] != ""): ?>
                  <small>
                    <div class="demo-inline-spacing">
                      <ul class="list-group">
                        <li class="list-group-item list-group-item-danger"><?= $postojt_reqs['nr']['notes'] ?></li>
                      </ul>
                    </div>
                  </small>
                <?php endif ?>
              </div>
              <div class="col-2 text-end">
                <?php if (isset($postojt_reqs['nr'])): ?>
                  <a href="../../imes-admin/_uploads/pre-ojt-requirements/<?= $postojt_reqs['nr']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
                <?php else: ?>
                  <small>No Uploaded file</small>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="button-wrapper float-end">
            <?php if (!isset($studentOverview[3])): ?>
              <button type="submit" class="btn btn-primary me-2"><i class='bx bxs-check-circle'></i> Save</button>
            <?php else: ?>
              <div class="text-end mb-3">
                <h6 class="mb-1">Approved By: <span class="text-body fw-normal"><?= $studentOverview[3]['evaluator'] ?></span></h6>
                <h6 class="mb-1">Date Approved: <span class="text-body fw-normal"><?= $studentOverview[3]['date_created'] ?></span></h6>
              </div>
            <?php endif ?>
          </div>
        </div>


      </div>
    </form>
  </div>
</div>
      
<?php else: ?>

  <?php if ($student['req']): ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6 class="mb-0">Post-OJT Requirements</h6>
            <hr>
            <div class="demo-inline-spacing">
              Has sent requested link
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php else: ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header">
              <h6 class="mb-0">Post-OJT Requirements</h6>
              <div class="demo-inline-spacing">
                <form method="POST" action="route/generate-reqLink.php">
                  <button type="submit" class="btn btn-primary me-2"><i class='bx bxs-check-circle'></i> Generate Link</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php endif ?>
  
<?php endif ?>


<?php else: ?>
  <div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header">
          <h6 class="mb-0">Post-OJT Requirements</h6>
          <hr>
          <div class="demo-inline-spacing">
            <ul class="list-group">
              <li class="list-group-item list-group-item-primary"><i class="bx bxs-info-circle"></i> Cannot proceed <?= $student['compHours'] > 0 ? number_format($student['reqHours'], 2) : 0 ?> Required Hours</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif ?> 