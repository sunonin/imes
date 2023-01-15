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
                      <span class="tf-icons bx bxs-user"></span>
                    </button>
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-7 mb-sm-0 mb-2">
                      <h6 class="mb-0">OJT Supervisor: <?= isset($studentOverview[2]) ? $studentOverview[2]['supervisor'] : '' ?></h6>
                      <small class="text-bold"><?= isset($studentOverview[2]) ? $studentOverview[2]['date_created'] : '' ?></small>
                      <?php if (isset($studentOverview[2]) && !empty($studentOverview[2]['supervisor_upload'])): ?>
                        <br>
                        <a href="_images/<?= $studentOverview[2]['supervisor_upload'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View Attachment</a>
                      <?php endif ?>
                    </div>  
                    <div class="col-3 text-end">
                      <small class="text-muted"><?= isset($studentOverview[2]) ? $studentOverview[2]['remarks'] : '' ?></small><br>
                    </div>

                    <div class="col-2 text-end">
                      <small class="text-muted"><?= isset($studentOverview[2]) ? number_format($studentOverview[2]['rate'], 2) : '' ?></small><br>
                    </div>
                  </div>
                </div>




                <div class="d-flex mb-3">
                  <div class="flex-shrink-0">
                    <button type="button" class="btn rounded-pill btn-icon btn-secondary me-2 btn-sm" disabled>
                      <span class="tf-icons bx bxs-user"></span>
                    </button>
                  </div>
                  <div class="flex-grow-1 row">
                    <div class="col-7 mb-sm-0 mb-2">
                      <h6 class="mb-0">OJT Coordinator: <?= isset($studentOverview[3]) ? $studentOverview[3]['evaluator'] : '' ?></h6>
                      <small class="text-bold"><?= isset($studentOverview[3]) ? $studentOverview[3]['evaluator'] : '' ?></small>
                    </div>
                    <div class="col-3 text-end">
                      <small class="text-muted"><?= isset($studentOverview[3]) ? $studentOverview[3]['remarks'] : '' ?></small><br>
                    </div>
                    <div class="col-2 text-end">
                      <small class="text-muted"><?= isset($studentOverview[3]) ? number_format($studentOverview[3]['rate'], 2) : '' ?></small><br>
                    </div>
                  </div>
                </div>

                <?php if (isset($studentOverview[2]) && $studentOverview[2]['supervisor'] != ""): ?>
                  <hr>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="text-center">
                          <a href="route/generate-appraisal-form.php?sid=<?= $_GET['id'] ?>" class="btn btn-primary btn-md">
                            <i class="bx bxs-check-square d-block d-sm-none"></i>
                            <span class="d-none d-sm-block"><i class='bx bxs-file-pdf'></i> Generate Appraisal Form</span>
                          </a>
                        </div>
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