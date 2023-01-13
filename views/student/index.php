<div class="row mb-3">
  <div class="col-md-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-8">
          <div class="card-body">
            <h5 class="card-title text-primary">Welcome to Intern Monitoring Evaluation System (IMES)! 🎉</h5>
            <ul>
              <?php if ($studentTotalPercentage < 100): ?>
                <li>
                  <p class="mb-1">
                    You have done <span class="fw-bold"><?= $studentTotalPercentage ?>%</span> of your Pre-OJT Requirements. Please complete it to proceed to OJT program.
                  </p>
                </li>
              <?php elseif ($studentPreOjtPercentage < 100): ?>
                <li>
                  <p class="mb-1">
                    You have done <span class="fw-bold"><?= $studentPreOjtPercentage ?>%</span> of your Pre-OJT Requirements. Please complete it to proceed to OJT program.
                  </p>
                </li>
              <?php elseif (!isset($studentOverview[1])): ?>
                <li>
                  <p class="mb-1">
                    You have uploaded all the needed Pre-OJT Requirements. Please wait for your Coordinator to evaluate the submitted documents.
                  </p>
                </li>
              <?php elseif (isset($studentOverview[1]) && empty($companyConnected)): ?>
                <li>
                  <p class="mb-1">
                    Uploaded Pre-OJT Requirements has been approved. Please wait for the assigning of your desired Company/Establishment.
                  </p>
                </li>
              <?php elseif (isset($studentOverview[1]) && !empty($companyConnected) && ($student['compHours'] == 0)): ?>
                <li>
                  <p class="mb-1">
                    You have been assigned to your desired Company/Establishment. Please check in your <u><b><a href="profile.php">Profile</a></b></u>.
                  </p>
                </li>
              <?php elseif (isset($studentOverview[1]) && !empty($companyConnected) && ($student['compHours'] > 0) && !$hasCompletedHours): ?>
                <li>
                  <p class="mb-1">
                    You are now ready to create your daily activity. Please check in your <u><b><a href="journal.php">Journal</a></b></u>.
                  </p>
                </li>
              <?php elseif ($hasCompletedHours && !isset($studentOverview[3])): ?>
                <li>
                  <p class="mb-1">
                    You have completed your required number of hours for this Program. You are now ready to accomplish the <u><b><a href="post-ojt-requirements.php">Post OJT Requirements</a></b></u>.
                  </p>
                </li>
              <?php else: ?>
                <li>
                  <p class="mb-1">
                    You have completed the OJT Program. Thank you
                  </p>
                </li>
              <?php endif ?>
            </ul>

            <!-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> -->
          </div>
        </div>
        <div class="col-sm-3 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mb-3">
  <div class="col-md-4 mb-3">
    <div class="card">
  
      <h5 class="card-header"><i class='bx bxs-hourglass-bottom' ></i> Daily Time Record</h5>
      <div class="card-body">
        <input type="hidden" id="dtrId" name="dtrId" value="<?= $dtr['id'] ?>">

        <div class="col-md-12"> 

          <div class="row mb-3">
            <div class="col-md-12">
                <div class="d-flex border-primary p-2 border rounded mb-4">
                  <div class="">
                    <i class="bx bx-calendar-check" style="font-size: 45px;"></i>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <p class="mb-0"><?= $dtr['dateFormat'] ?></p>
                      <a href="#" class="small" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Philippine Standard Time</a>
                    </div>
                    <div class="user-progress">
                      <div class="d-flex justify-content-center">
                        <h3 class="fw-bold mb-0 timer"></h3>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
          </div>

          <?php if (isset($studentOverview[1]) && (isset($companyConnected) && !empty($companyConnected))): ?>
            <div class="row mb-3">
            <div class="col-md-12">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td style="background-color: #b9b5b5; color: white;"><b>AM - Time In</b></td>
                    <td>

                      <?php if ($dtr['timeInFormat'] == ""): ?>
                        <div class="button-wrapper">
                          <button type="button" id="timeInAction" class="btn btn-primary btn me-2"><i class='bx bxs-check-circle'></i> <span class="customTimer"></span> Stamp</button>
                        </div>
                      <?php else: ?>
                        <input type="hidden" name="timeInRaw" value="<?= $dtr['timeInRaw'] ?>">
                        <?= $dtr['timeInFormat'] ?>    
                      <?php endif ?>

                    </td>
                  </tr>
                  <tr>
                    <td style="background-color: #b9b5b5; color: white;"><b>PM - Time Out</b></td>
                    <td>
                      <?php if ($dtr['timeOutFormat'] == "" && (!empty($dtr['timeInFormat']))): ?>
                        <div class="button-wrapper">
                          <button type="button" id="timeOutAction" class="btn btn-primary btn me-2"><i class='bx bxs-check-circle'></i> <span class="customTimer"></span> Stamp</button>
                        </div>
                      <?php else: ?>
                        <?= $dtr['timeOutFormat'] ?>
                      <?php endif ?>

                    </td>
                  </tr>
                  <tr>
                    <td style="background-color: #b9b5b5; color: white;"><b>Hours</b></td>
                    <td>
                      <?= $dtr['hours'] ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <?php endif ?>
          
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="row">
      <div class="col-md-4 mb-3">
        <div class="card-sl">
            <div class="card-image text-center">
              <span class='bx bxs-user-detail' style="font-size:190px; color:#1F487E;"></span>
            </div>

            <a class="card-action" href="#"><i class='bx bx-link-alt' ></i></a>
            <div class="card-heading">
                <?= $studentTotalPercentage.'%' ?> Completed
            </div>
            <div class="card-text">
                View and Update Student Information (School, Family Background and etc).
            </div>
            <div class="card-text">
                  
              </div>
            <a href="profile.php" class="card-button"><i class='bx bxs-folder-open'></i>&nbsp;View Profile</a>
        </div>
      </div>

      <div class="col-md-4 mb-3">
        <div class="card-sl">
            <div class="card-image text-center">
              <span class='bx bx-list-check' style="font-size:190px; color:#ec7878"></span>
            </div>

            <a class="card-action" href="#"><i class='bx bx-link-alt' ></i></a>
            <div class="card-heading">
                <?= $studentPreOjtPercentage.'%' ?> Completed
            </div>
            <div class="card-text">
                View and Upload Pre On-the-Job Training Requirements.
            </div>
            <div class="card-text">
                
            </div>
            <a href="pre_ojt_requirements.php" class="card-button" style="background-color: #ec7878;"><i class='bx bxs-folder-open'></i>&nbsp;View Pre-OJT Requirements</a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-sl">
            <div class="card-image text-center">
              <span class='bx bxs-book-content' style="font-size:190px; color:#ca732b"></span>
            </div>

            <a class="card-action" href="#"><i class='bx bx-link-alt' ></i></a>
            <div class="card-heading">
              <?= $student['compHours'] > 0 ? number_format($student['compHours'], 2) : 0 ?> Hours Completed
            </div>
            <div class="card-text">
                View and Create activities and task assigned by the OJT - Supervisor.
            </div>
            <div class="card-text">
            </div>
            <a href="journal.php" class="card-button" style="background-color:#ca732b"><i class='bx bxs-folder-open'></i>&nbsp;View Journal</a>
        </div>
      </div>


    </div>

  </div>
</div>

<div class="row">
  <div class="col-md-4">
    
  </div>

  <div class="col-md-8">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
      <div class="col-md-4 mb-3">
          <div class="card-sl">
              <div class="card-image text-center">
                <span class='bx bx-calendar-check' style="font-size:190px; color:#0a897b"></span>
              </div>

              <a class="card-action disabled" href="#"><i class='bx bx-link-alt' ></i></a>
              <div class="card-heading">
                  ---
              </div>
              <div class="card-text">
                  View and Upload documents during Post On-the-Job Training.
              </div>
              <div class="card-text">
                Cannot be accomplished as of now
              </div>
              <a href="#" class="card-button disabled" style="background-color:#0a897b"><i class='bx bxs-folder-open'></i>&nbsp;View POST-OJT Requirements</a>
          </div>
      </div>

      
      <div class="col-md-2"></div>

    </div>
  </div>

  <div class="col-md-3">&nbsp;</div>
</div>

    