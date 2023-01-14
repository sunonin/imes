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
                      <h6 class="mb-0">Resume</h6>
                      <small class="text-muted">Uploaded resume with profile?</small><br>
                      <small class="text-bold"><?= isset($preOjtRequirements['rsm']) ? $preOjtRequirements['rsm']['dateUploaded'] : '' ?></small>
                    </div>  
                    <div class="col-5 text-end">
                      <?php if (isset($preOjtRequirements) && isset($preOjtRequirements['rsm'])): ?>
                        <?php if ($preOjtRequirements['rsm']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $preOjtRequirements['rsm']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $preOjtRequirements['rsm']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[1])): ?>
                            <button type="button" class="btn btn-sm btn-danger preOJTModal" data-bs-toggle="modal" data-bs-target="#preOJTModal" data-id="<?= $preOjtRequirements['rsm']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
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
                      <h6 class="mb-0">Endorsement Letter</h6>
                      <small class="text-muted">Uploaded a signed Endorsement Letter?</small><br>
                      <small class="text-bold"><?= isset($preOjtRequirements['elr']) ? $preOjtRequirements['elr']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($preOjtRequirements) && isset($preOjtRequirements['elr'])): ?>
                        <?php if ($preOjtRequirements['elr']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $preOjtRequirements['elr']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $preOjtRequirements['elr']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[1])): ?>
                            <button type="button" class="btn btn-sm btn-danger preOJTModal" data-bs-toggle="modal" data-bs-target="#preOJTModal" data-id="<?= $preOjtRequirements['elr']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
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
                      <h6 class="mb-0">Acceptance Form</h6>
                      <small class="text-muted">Uploaded a signed Acceptance Form?</small>
                      <br>
                      <small class="text-bold"><?= isset($preOjtRequirements['acf']) ? $preOjtRequirements['acf']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($preOjtRequirements) && isset($preOjtRequirements['acf'])): ?>
                        <?php if ($preOjtRequirements['acf']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $preOjtRequirements['acf']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $preOjtRequirements['acf']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[1])): ?>
                            <button type="button" class="btn btn-sm btn-danger preOJTModal" data-bs-toggle="modal" data-bs-target="#preOJTModal" data-id="<?= $preOjtRequirements['acf']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
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
                      <h6 class="mb-0">Internship Agreement Form</h6>
                      <small class="text-muted">Uploaded a signed Internship Agreement Form?</small>
                      <br>
                      <small class="text-bold"><?= isset($preOjtRequirements['iaf']) ? $preOjtRequirements['iaf']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($preOjtRequirements) && isset($preOjtRequirements['iaf'])): ?>
                        <?php if ($preOjtRequirements['iaf']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $preOjtRequirements['iaf']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $preOjtRequirements['iaf']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>
                          
                          <?php if (!isset($studentOverview[1])): ?>
                            <button type="button" class="btn btn-sm btn-danger preOJTModal" data-bs-toggle="modal" data-bs-target="#preOJTModal" data-id="<?= $preOjtRequirements['iaf']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
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
                      <h6 class="mb-0">Parent/Guardian Consent Form</h6>
                      <small class="text-muted">Uploaded a signed Parent/Guardian Consent Form?</small>
                      <br>
                      <small class="text-bold"><?= isset($preOjtRequirements['pcf']) ? $preOjtRequirements['pcf']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($preOjtRequirements) && isset($preOjtRequirements['pcf'])): ?>
                        <?php if ($preOjtRequirements['pcf']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $preOjtRequirements['pcf']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $preOjtRequirements['pcf']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>
                          
                          <?php if (!isset($studentOverview[1])): ?>
                            <button type="button" class="btn btn-sm btn-danger preOJTModal" data-bs-toggle="modal" data-bs-target="#preOJTModal" data-id="<?= $preOjtRequirements['pcf']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
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
                      <h6 class="mb-0">Registration Form</h6>
                      <small class="text-muted">Uploaded a signed Registration Form?</small>
                      <br>
                      <small class="text-bold"><?= isset($preOjtRequirements['rgf']) ? $preOjtRequirements['rgf']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($preOjtRequirements) && isset($preOjtRequirements['rgf'])): ?>
                        <?php if ($preOjtRequirements['rgf']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $preOjtRequirements['rgf']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $preOjtRequirements['rgf']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[1])): ?>
                            <button type="button" class="btn btn-sm btn-danger preOJTModal" data-bs-toggle="modal" data-bs-target="#preOJTModal" data-id="<?= $preOjtRequirements['rgf']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
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
                      <h6 class="mb-0">Good Moral Character</h6>
                      <small class="text-muted">Uploaded a signed Good Moral Character?</small>
                      <br>
                      <small class="text-bold"><?= isset($preOjtRequirements['gmc']) ? $preOjtRequirements['gmc']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($preOjtRequirements) && isset($preOjtRequirements['gmc'])): ?>
                        <?php if ($preOjtRequirements['gmc']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $preOjtRequirements['gmc']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $preOjtRequirements['gmc']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[1])): ?>
                            <button type="button" class="btn btn-sm btn-danger preOJTModal" data-bs-toggle="modal" data-bs-target="#preOJTModal" data-id="<?= $preOjtRequirements['gmc']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
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
                      <span class="tf-icons bx bx-notepad"></span>
                    </button>
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                      <h6 class="mb-0">Memorandum of Agreement</h6>
                      <small class="text-muted">Uploaded a signed MOA/MOU?</small>
                      <br>
                      <small class="text-bold"><?= isset($preOjtRequirements['moa']) ? $preOjtRequirements['moa']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($preOjtRequirements) && isset($preOjtRequirements['moa'])): ?>
                        <?php if ($preOjtRequirements['moa']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $preOjtRequirements['moa']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $preOjtRequirements['moa']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[1])): ?>
                            <button type="button" class="btn btn-sm btn-danger preOJTModal" data-bs-toggle="modal" data-bs-target="#preOJTModal" data-id="<?= $preOjtRequirements['moa']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
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
                      <span class="tf-icons bx bx-notepad"></span>
                    </button>
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                      <h6 class="mb-0">On-the-Job Training Time Frame</h6>
                      <small class="text-muted">Uploaded a signed OJT Time Frame?</small>
                      <br>
                      <small class="text-bold"><?= isset($preOjtRequirements['otf']) ? $preOjtRequirements['otf']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($preOjtRequirements) && isset($preOjtRequirements['otf'])): ?>
                        <?php if ($preOjtRequirements['otf']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $preOjtRequirements['otf']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $preOjtRequirements['otf']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[1])): ?>
                            <button type="button" class="btn btn-sm btn-danger preOJTModal" data-bs-toggle="modal" data-bs-target="#preOJTModal" data-id="<?= $preOjtRequirements['otf']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
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
                      <span class="tf-icons bx bxs-book-content"></span>
                    </button>
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                      <h6 class="mb-0">Signed Evaluation Form (Registrar's Office)</h6>
                      <small class="text-muted">Uploaded a signed OJT Time Frame?</small>
                      <br>
                      <small class="text-bold"><?= isset($preOjtRequirements['sef']) ? $preOjtRequirements['sef']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($preOjtRequirements) && isset($preOjtRequirements['sef'])): ?>
                        <?php if ($preOjtRequirements['sef']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $preOjtRequirements['sef']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $preOjtRequirements['sef']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[1])): ?>
                            <button type="button" class="btn btn-sm btn-danger preOJTModal" data-bs-toggle="modal" data-bs-target="#preOJTModal" data-id="<?= $preOjtRequirements['sef']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
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
                      <span class="tf-icons bx bxs-comment-detail"></span>
                    </button>
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                      <h6 class="mb-0">Initial Individual Interview & Career Counseling for OJT</h6>
                      <small class="text-muted">Uploaded a signed Initial Individual Interview & Career Counseling for OJT?</small>
                      <br>
                      <small class="text-bold"><?= isset($preOjtRequirements['iic']) ? $preOjtRequirements['iic']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($preOjtRequirements) && isset($preOjtRequirements['iic'])): ?>
                        <?php if ($preOjtRequirements['iic']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $preOjtRequirements['iic']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $preOjtRequirements['iic']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[1])): ?>
                            <button type="button" class="btn btn-sm btn-danger preOJTModal" data-bs-toggle="modal" data-bs-target="#preOJTModal" data-id="<?= $preOjtRequirements['iic']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
                          <?php endif ?>

                        <?php endif ?>

                      <?php else: ?>
                        <small class="text-light fw-semibold">No Uploaded File</small>
                      <?php endif ?>
                    </div>
                  </div>
                </div>

                <div class="d-flex mb-5">
                  <div class="flex-shrink-0">
                    <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
                      <span class="tf-icons bx bxs-comment-detail"></span>
                    </button>
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-9 mb-sm-0 mb-2">
                      <h6 class="mb-0">Overtime Consent Form</h6>
                      <small class="text-muted">Uploaded a signed Initial Individual Interview & Career Counseling for OJT?</small>
                      <br>
                      <small class="text-bold"><?= isset($preOjtRequirements['ocf']) ? $preOjtRequirements['ocf']['dateUploaded'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <?php if (isset($preOjtRequirements) && isset($preOjtRequirements['ocf'])): ?>
                        <?php if ($preOjtRequirements['ocf']['status'] > 20 ): ?>
                          <span class="badge bg-label-danger"><?= $preOjtRequirements['ocf']['notes'] ?></span>
                        <?php else: ?>
                          <a href="_uploads/pre-ojt-requirements/<?= $preOjtRequirements['ocf']['filename'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>

                          <?php if (!isset($studentOverview[1])): ?>
                            <button type="button" class="btn btn-sm btn-danger preOJTModal" data-bs-toggle="modal" data-bs-target="#preOJTModal" data-id="<?= $preOjtRequirements['ocf']['reqId'] ?>"><i class='bx bx-rotate-left'></i> Return</button>
                          <?php endif ?>

                        <?php endif ?>

                      <?php else: ?>
                        <small class="text-light fw-semibold">No Uploaded File</small>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
                <!-- /Connections -->

              </div>
              <hr>
              <div class="row">
                <div class="">
                  <?php if (!isset($studentOverview[1])): ?>
                    <button type="button" class="btn btn-sm btn-primary text-end" data-bs-toggle="modal" data-bs-target="#preOJTEvaluateModal" data-id="<?= $_GET['id'] ?>"><i class='bx bx-list-check'></i> Evaluate</button>
                  <?php else: ?>
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#preOJTEvaluateReopenModal" data-id="<?= $_GET['id'] ?>"><i class='bx bx-list-check'></i> Reopen</button>


                    <div class="text-end mb-3">
                      <h6 class="mb-1">Approved By: <span class="text-body fw-normal"><?= $studentOverview[1]['evaluator'] ?></span></h6>
                      <h6 class="mb-1">Date Approved: <span class="text-body fw-normal"><?= $studentOverview[1]['date_created'] ?></span></h6>
                    </div>
                  <?php endif ?>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>