<div class="card mb-4">
  <div class="card-header">
    <h6 class="mb-0">Pre-OJT Requirements</h6>
    <hr>
    <div class="demo-inline-spacing">
      <ul class="list-group">
        <?php if ($studentTotalPercentage < 100): ?>
          <li class="list-group-item list-group-item-warning"><i class="bx bxs-info-circle"></i> Profile is incomplete. Please accomplish all reqiured details in <u><b><a href="profile.php">Profile Page</a></b></u> before proceeding to submisison of Pre-OJT Requirements.</li>
        <?php elseif (!isset($studentOverview[1])): ?>
          <li class="list-group-item list-group-item-info"><i class="bx bxs-info-circle"></i> All documents must be uploaded and verified by the OJT - Coordinator in order to be accepted to On-the-Job Training Program.</li>
        <?php else: ?>
          <li class="list-group-item list-group-item-success"><i class="bx bxs-info-circle"></i> All requirements has been approved.</li>
        <?php endif ?>
      </ul>
    </div>
  </div>

  <?php if ($studentTotalPercentage == 100): ?>
    <div class="card-body">

      <div class="d-flex mt-2 mb-3 custom-border">
        <div class="flex-shrink-0">
          <button type="button" class="btn rounded-pill btn-icon btn-success me-2 btn-sm" disabled>
            <span class="tf-icons bx bxs-file"></span>
          </button>
        </div>
        <div class="flex-grow-1 row">
          <div class="col-5 mb-sm-0 mb-2">
            <div class="mb-3">
              <label for="formFile" class="form-label">Resume</label> <small class="text-muted">(<mark> signed document </mark>)</small>

                <?php if (!isset($studentOverview[1])): ?>
                  <input class="form-control" type="file" id="formFile" name="attachment[rsm]">
                <?php endif ?>
            </div>
          </div>
          <div class="col-5 mb-2">
            <?php if (isset($preojt_reqs['rsm']) && $preojt_reqs['rsm']['notes'] != ""): ?>
              <small>
                <div class="demo-inline-spacing">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-danger"><?= $preojt_reqs['rsm']['notes'] ?></li>
                  </ul>
                </div>
              </small>
            <?php endif ?>
          </div>
          <div class="col-2 text-end">
            <?php if (isset($preojt_reqs['rsm'])): ?>
              <a href="imes-admin/_uploads/pre-ojt-requirements/<?= $preojt_reqs['rsm']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
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
              <label for="formFile" class="form-label">Endorsement Letter</label> <small class="text-muted">(<mark> signed document </mark>)</small>
              <?php if (!isset($studentOverview[1])): ?>
                  <input class="form-control" type="file" id="formFile" name="attachment[elr]">
                <?php endif ?>
            </div>
          </div>
          <div class="col-5 mb-2">
            <?php if (isset($preojt_reqs['elr']) && $preojt_reqs['elr']['notes'] != ""): ?>
              <small>
                <div class="demo-inline-spacing">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-danger"><?= $preojt_reqs['elr']['notes'] ?></li>
                  </ul>
                </div>
              </small>
            <?php endif ?>
          </div>
          <div class="col-2 text-end">
            <?php if (isset($preojt_reqs['elr'])): ?>
              <a href="imes-admin/_uploads/pre-ojt-requirements/<?= $preojt_reqs['elr']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
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
              <label for="formFile" class="form-label">Acceptance Form</label> <small class="text-muted">(<mark> signed document </mark>)</small>
              <?php if (!isset($studentOverview[1])): ?>
                  <input class="form-control" type="file" id="formFile" name="attachment[acf]">
                <?php endif ?>
            </div>
          </div>
          <div class="col-5 mb-2">
            <?php if (isset($preojt_reqs['acf']) && $preojt_reqs['acf']['notes'] != ""): ?>
              <small>
                <div class="demo-inline-spacing">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-danger"><?= $preojt_reqs['acf']['notes'] ?></li>
                  </ul>
                </div>
              </small>
            <?php endif ?>
          </div>
          <div class="col-2 text-end">
            <?php if (isset($preojt_reqs['acf'])): ?>
              <a href="imes-admin/_uploads/pre-ojt-requirements/<?= $preojt_reqs['acf']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
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
              <label for="formFile" class="form-label">Internship Agreement Form</label> <small class="text-muted">(<mark> signed document </mark>)</small>
              <?php if (!isset($studentOverview[1])): ?>
                  <input class="form-control" type="file" id="formFile" name="attachment[iaf]">
                <?php endif ?>
            </div>
          </div>
          <div class="col-5 mb-2">
            <?php if (isset($preojt_reqs['iaf']) && $preojt_reqs['iaf']['notes'] != ""): ?>
              <small>
                <div class="demo-inline-spacing">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-danger"><?= $preojt_reqs['iaf']['notes'] ?></li>
                  </ul>
                </div>
              </small>
            <?php endif ?>
          </div>
          <div class="col-2 text-end">
            <?php if (isset($preojt_reqs['iaf'])): ?>
              <a href="imes-admin/_uploads/pre-ojt-requirements/<?= $preojt_reqs['iaf']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
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
              <label for="formFile" class="form-label">Parent/Guardian Consent Form</label> <small class="text-muted">(<mark> signed document </mark>)</small>
              <?php if (!isset($studentOverview[1])): ?>
                  <input class="form-control" type="file" id="formFile" name="attachment[pcf]">
                <?php endif ?>
            </div>
          </div>
          <div class="col-5 mb-2">
            <?php if (isset($preojt_reqs['pcf']) && $preojt_reqs['pcf']['notes'] != ""): ?>
              <small>
                <div class="demo-inline-spacing">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-danger"><?= $preojt_reqs['pcf']['notes'] ?></li>
                  </ul>
                </div>
              </small>
            <?php endif ?>
          </div>
          <div class="col-2 text-end">
            <?php if (isset($preojt_reqs['pcf'])): ?>
              <a href="imes-admin/_uploads/pre-ojt-requirements/<?= $preojt_reqs['pcf']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
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
              <label for="formFile" class="form-label">Registration Form</label> <small class="text-muted">(<mark> signed document </mark>)</small>
              <?php if (!isset($studentOverview[1])): ?>
                  <input class="form-control" type="file" id="formFile" name="attachment[rgf]">
                <?php endif ?>
            </div>
          </div>
          <div class="col-5 mb-2">
            <?php if (isset($preojt_reqs['rgf']) && $preojt_reqs['rgf']['notes'] != ""): ?>
              <small>
                <div class="demo-inline-spacing">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-danger"><?= $preojt_reqs['rgf']['notes'] ?></li>
                  </ul>
                </div>
              </small>
            <?php endif ?>
          </div>
          <div class="col-2 text-end">
            <?php if (isset($preojt_reqs['rgf'])): ?>
              <a href="imes-admin/_uploads/pre-ojt-requirements/<?= $preojt_reqs['rgf']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
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
              <label for="formFile" class="form-label">Good Moral Character</label> <small class="text-muted">(<mark> signed document </mark>)</small>
              <?php if (!isset($studentOverview[1])): ?>
                  <input class="form-control" type="file" id="formFile" name="attachment[gmc]">
                <?php endif ?>
            </div>
          </div>
          <div class="col-5 mb-2">
            <?php if (isset($preojt_reqs['gmc']) && $preojt_reqs['gmc']['notes'] != ""): ?>
              <small>
                <div class="demo-inline-spacing">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-danger"><?= $preojt_reqs['gmc']['notes'] ?></li>
                  </ul>
                </div>
              </small>
            <?php endif ?>
          </div>
          <div class="col-2 text-end">
            <?php if (isset($preojt_reqs['gmc'])): ?>
              <a href="imes-admin/_uploads/pre-ojt-requirements/<?= $preojt_reqs['gmc']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
            <?php else: ?>
              <small>No Uploaded file</small>
            <?php endif ?>
          </div>
        </div>
      </div>

      <div class="d-flex mb-3 custom-border">
        <div class="flex-shrink-0">
          <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
            <span class="tf-icons bx bx-notepad"></span>
          </button>
        </div>
        <div class="flex-grow-1 row">
          <div class="col-5 mb-sm-0 mb-2">
            <div class="mb-3">
              <label for="formFile" class="form-label">Memorandum of Agreement</label> <small class="text-muted">(<mark> signed document </mark>)</small>
              <?php if (!isset($studentOverview[1])): ?>
                  <input class="form-control" type="file" id="formFile" name="attachment[moa]">
                <?php endif ?>
            </div>
          </div>
          <div class="col-5 mb-2">
            <?php if (isset($preojt_reqs['moa']) && $preojt_reqs['moa']['notes'] != ""): ?>
              <small>
                <div class="demo-inline-spacing">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-danger"><?= $preojt_reqs['moa']['notes'] ?></li>
                  </ul>
                </div>
              </small>
            <?php endif ?>
          </div>
          <div class="col-2 text-end">
            <?php if (isset($preojt_reqs['moa'])): ?>
              <a href="imes-admin/_uploads/pre-ojt-requirements/<?= $preojt_reqs['moa']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
            <?php else: ?>
              <small>No Uploaded file</small>
            <?php endif ?>
          </div>
        </div>
      </div>

      <div class="d-flex mb-3 custom-border">
        <div class="flex-shrink-0">
          <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
            <span class="tf-icons bx bx-notepad"></span>
          </button>
        </div>
        <div class="flex-grow-1 row">
          <div class="col-5 mb-sm-0 mb-2">
            <div class="mb-3">
              <label for="formFile" class="form-label">On-the-Job Training Time Frame</label> <small class="text-muted">(<mark> signed document </mark>)</small>
              <?php if (!isset($studentOverview[1])): ?>
                  <input class="form-control" type="file" id="formFile" name="attachment[otf]">
                <?php endif ?>
            </div>
          </div>
          <div class="col-5 mb-2">
            <?php if (isset($preojt_reqs['otf']) && $preojt_reqs['otf']['notes'] != ""): ?>
              <small>
                <div class="demo-inline-spacing">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-danger"><?= $preojt_reqs['otf']['notes'] ?></li>
                  </ul>
                </div>
              </small>
            <?php endif ?>
          </div>
          <div class="col-2 text-end">
            <?php if (isset($preojt_reqs['otf'])): ?>
              <a href="imes-admin/_uploads/pre-ojt-requirements/<?= $preojt_reqs['otf']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
            <?php else: ?>
              <small>No Uploaded file</small>
            <?php endif ?>
          </div>
        </div>
      </div>

      <div class="d-flex mb-3 custom-border">
        <div class="flex-shrink-0">
          <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
            <span class="tf-icons bx bxs-book-content"></span>
          </button>
        </div>
        <div class="flex-grow-1 row">
          <div class="col-5 mb-sm-0 mb-2">
            <div class="mb-3">
              <label for="formFile" class="form-label">Signed Evaluation Form (Registrar's Office)</label> <small class="text-muted">(<mark> signed document </mark>)</small>
              <?php if (!isset($studentOverview[1])): ?>
                  <input class="form-control" type="file" id="formFile" name="attachment[sef]">
                <?php endif ?>
            </div>
          </div>
          <div class="col-5 mb-2">
            <?php if (isset($preojt_reqs['sef']) && $preojt_reqs['sef']['notes'] != ""): ?>
              <small>
                <div class="demo-inline-spacing">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-danger"><?= $preojt_reqs['sef']['notes'] ?></li>
                  </ul>
                </div>
              </small>
            <?php endif ?>
          </div>
          <div class="col-2 text-end">
            <?php if (isset($preojt_reqs['sef'])): ?>
              <a href="imes-admin/_uploads/pre-ojt-requirements/<?= $preojt_reqs['sef']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
            <?php else: ?>
              <small>No Uploaded file</small>
            <?php endif ?>
          </div>
        </div>
      </div>

      <div class="d-flex mb-3 custom-border">
        <div class="flex-shrink-0">
          <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
            <span class="tf-icons bx bxs-comment-detail"></span>
          </button>
        </div>
        <div class="flex-grow-1 row">
          <div class="col-5 mb-sm-0 mb-2">
            <div class="mb-3">
              <label for="formFile" class="form-label">Initial Individual Interview & Career Counseling for OJT</label> <small class="text-muted">(<mark> signed document </mark>)</small>
              <?php if (!isset($studentOverview[1])): ?>
                  <input class="form-control" type="file" id="formFile" name="attachment[iic]">
                <?php endif ?>
            </div>
          </div>
          <div class="col-5 mb-2">
            <?php if (isset($preojt_reqs['iic']) && $preojt_reqs['iic']['notes'] != ""): ?>
              <small>
                <div class="demo-inline-spacing">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-danger"><?= $preojt_reqs['iic']['notes'] ?></li>
                  </ul>
                </div>
              </small>
            <?php endif ?>
          </div>
          <div class="col-2 text-end">
            <?php if (isset($preojt_reqs['iic'])): ?>
              <a href="imes-admin/_uploads/pre-ojt-requirements/<?= $preojt_reqs['iic']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
            <?php else: ?>
              <small>No Uploaded file</small>
            <?php endif ?>
          </div>
        </div>
      </div>


      <div class="d-flex">
        <div class="flex-shrink-0">
          <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
            <span class="tf-icons bx bxs-comment-detail"></span>
          </button>
        </div>
        <div class="flex-grow-1 row">
          <div class="col-5 mb-sm-0 mb-2">
            <div class="mb-3">
              <label for="formFile" class="form-label">Overtime Consent Form</label> <small class="text-muted">(<mark> signed document </mark>)</small>
              <?php if (!isset($studentOverview[1])): ?>
                  <input class="form-control" type="file" id="formFile" name="attachment[ocf]">
                <?php endif ?>
            </div>
          </div>
          <div class="col-5 mb-2">
            <?php if (isset($preojt_reqs['ocf']) && $preojt_reqs['ocf']['notes'] != ""): ?>
              <small>
                <div class="demo-inline-spacing">
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-danger"><?= $preojt_reqs['ocf']['notes'] ?></li>
                  </ul>
                </div>
              </small>
            <?php endif ?>
          </div>
          <div class="col-2 text-end">
            <?php if (isset($preojt_reqs['ocf'])): ?>
              <a href="imes-admin/_uploads/pre-ojt-requirements/<?= $preojt_reqs['ocf']['filename'] ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
            <?php else: ?>
              <small>No Uploaded file</small>
            <?php endif ?>
          </div>
        </div>
      </div>

    </div>

  <hr>
  <div class="card-footer">
    <div class="button-wrapper float-end">
      <?php if (!isset($studentOverview[1])): ?>
        <button type="submit" class="btn btn-primary me-2"><i class='bx bxs-check-circle'></i> Save</button>
      <?php else: ?>
        <div class="text-end mb-3">
            <h6 class="mb-1">Approved By: <span class="text-body fw-normal"><?= $studentOverview[1]['evaluator'] ?></span></h6>
            <h6 class="mb-1">Date Approved: <span class="text-body fw-normal"><?= $studentOverview[1]['date_created'] ?></span></h6>
          </div>
      <?php endif ?>


    </div>
  </div>    
  <?php endif ?>

</div>  