<div class="row">
  <div class="col-md-12">
    <div class="row">

      <div class="col-md-3">
        <?php include 'left.php' ?>
      </div>

      <div class="col-md-9">
          <div class="nav-align-top mb-4">
            <?php include '_nav_tab.php' ?>
            <div class="tab-content">
              <?php if ($student['req']): ?>
              <form method="POST" action="route/generate-reqLink.php">
                <input type="hidden" name="userId" value="<?= $_GET['id'] ?>">
                <button type="submit" class="btn btn-primary me-2"><i class='bx bxs-check-circle'></i> Accept Request</button>
                
              </form>
              <?php else: ?>
              <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                
                <!-- Connections -->
                <div class="d-flex mb-3">
                  <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                      <h6 class="mb-0"></h6>
                      <small class="text-muted"></small>
                    </div>
                    <div class="col-3 text-end">                     
                    </div>
                  </div>
                </div>
                <hr>

                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
                      <span class="tf-icons bx bxs-file"></span>
                    </button>
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-7 mb-sm-0 mb-2">
                      <h6 class="mb-0">Student Trainee Performance Appraisal Report</h6>
                      <small class="text-muted">Uploaded resume with profile?</small>
                      <br>
                      <small class="text-bold"><?= isset($postOjtRequirements['stpar']) ? $postOjtRequirements['stpar']['dateUploaded'] : '' ?></small>
                    </div>  
                    <div class="col-5 text-end">
                      <?php if (isset($postOjtRequirements) && isset($postOjtRequirements['stpar'])): ?>
                        <?php if ($postOjtRequirements['stpar']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $postOjtRequirements['stpar']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $postOjtRequirements['stpar']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[3])): ?>
                            <button type="button" class="btn btn-sm btn-danger postOJTModal" data-bs-toggle="modal" data-bs-target="#postOJTModal" data-id="<?= $postOjtRequirements['stpar']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
                          <?php endif ?>

                        <?php endif ?>

                      <?php else: ?>
                        <small class="text-light fw-semibold">No Uploaded File</small>
                      <?php endif ?>
                    </div>
                  </div>
                </div>

                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
                      <span class="tf-icons bx bxs-file"></span>
                    </button>
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                      <h6 class="mb-0">Training Supervisor Feedback Form</h6>
                      <small class="text-muted">Uploaded a signed Endorsement Letter?</small><br>
                      <small class="text-bold"><?= isset($postOjtRequirements['tsff']) ? $postOjtRequirements['tsff']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($postOjtRequirements) && isset($postOjtRequirements['tsff'])): ?>
                        <?php if ($postOjtRequirements['tsff']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $postOjtRequirements['tsff']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $postOjtRequirements['tsff']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[3])): ?>
                            <button type="button" class="btn btn-sm btn-danger postOJTModal" data-bs-toggle="modal" data-bs-target="#postOJTModal" data-id="<?= $postOjtRequirements['tsff']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
                          <?php endif ?>

                        <?php endif ?>

                      <?php else: ?>
                        <small class="text-light fw-semibold">No Uploaded File</small>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
                      <span class="tf-icons bx bxs-file"></span>
                    </button>
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                      <h6 class="mb-0">Student Trainee Feedback Form</h6>
                      <small class="text-muted">Uploaded a signed Acceptance Form?</small><br>
                      <small class="text-bold"><?= isset($postOjtRequirements['stff']) ? $postOjtRequirements['tsff']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($postOjtRequirements) && isset($postOjtRequirements['stff'])): ?>
                        <?php if ($postOjtRequirements['stff']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $postOjtRequirements['stff']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $postOjtRequirements['stff']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[3])): ?>
                            <button type="button" class="btn btn-sm btn-danger postOJTModal" data-bs-toggle="modal" data-bs-target="#postOJTModal" data-id="<?= $postOjtRequirements['stff']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
                          <?php endif ?>

                        <?php endif ?>

                      <?php else: ?>
                        <small class="text-light fw-semibold">No Uploaded File</small>
                      <?php endif ?>
                    </div>
                  </div>
                </div>

                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
                      <span class="tf-icons bx bxs-file"></span>
                    </button>
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                      <h6 class="mb-0">Narrative Report</h6>
                      <small class="text-muted">Uploaded a signed Internship Agreement Form?</small><br>
                      <small class="text-bold"><?= isset($postOjtRequirements['stpar']) ? $postOjtRequirements['tsff']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($postOjtRequirements) && isset($postOjtRequirements['nr'])): ?>
                        <?php if ($postOjtRequirements['nr']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $postOjtRequirements['nr']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $postOjtRequirements['nr']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>
                          
                          <?php if (!isset($studentOverview[3])): ?>
                            <button type="button" class="btn btn-sm btn-danger postOJTModal" data-bs-toggle="modal" data-bs-target="#postOJTModal" data-id="<?= $postOjtRequirements['nr']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
                          <?php endif ?>

                        <?php endif ?>

                      <?php else: ?>
                        <small class="text-light fw-semibold">No Uploaded File</small>
                      <?php endif ?>
                    </div>
                  </div>
                </div>

              </div>
              <hr>
              <div class="row">
                <div class="">
                  <?php if (!isset($studentOverview[3])): ?>
                    <button type="button" class="btn btn-sm btn-primary text-end" data-bs-toggle="modal" data-bs-target="#postOJTEvaluateModal" data-id="<?= $_GET['id'] ?>"><i class='bx bx-list-check'></i> Evaluate</button>
                  <?php else: ?>
                    <div class="text-end mb-3">
                      <h6 class="mb-1">Approved By: <span class="text-body fw-normal"><?= $studentOverview[3]['evaluator'] ?></span></h6>
                      <h6 class="mb-1">Date Approved: <span class="text-body fw-normal"><?= $studentOverview[3]['date_created'] ?></span></h6>
                    </div>
                  <?php endif ?>

                </div>
              </div>  
              <?php endif ?>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>