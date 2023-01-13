<div class="row mb-3">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-8">
          <div class="card-body">
            <h5 class="card-title text-primary">Welcome to Intern Monitoring Evaluation System (IMES)! 🎉</h5>
            <!-- <h5 class="card-title text-primary">Congratulations John! 🎉</h5> -->
            <!-- <p class="mb-4">
              You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
              your profile.
            </p> -->

            <p class="mb-4">
              You are currently logged in as <span class="fw-bold">SUPERVISOR</span> for blablabla.
            </p>

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
  <div class="col-md-2"></div>
</div>

<div class="row mb-3">
  <div class="col-md-3 mb-3">
    <div class="card-sl">
        <div class="card-image text-center">
          <span class='bx bxs-buildings' style="font-size:190px; color:#1F487E;"></span>
        </div>

        <a class="card-action" href="profile.php"><i class='bx bx-link-alt' ></i></a>
        <div class="card-heading">
            100% Completed
        </div>
        <div class="card-text">
            View and Update Company Profile (Address, Tel. No., Department and etc).
        </div>
        <div class="card-text">
              
          </div>
        <a href="profile.php" class="card-button"><i class='bx bxs-folder-open'></i>&nbsp;View Profile</a>
    </div>
  </div>

  <div class="col-md-3 mb-3">
      <div class="card-sl">
          <div class="card-image text-center">
            <span class='bx bxs-book-content' style="font-size:190px; color:#ec7878"></span>
          </div>

          <a class="card-action" href="#"><i class='bx bx-link-alt' ></i></a>
          <div class="card-heading">
            <?= $countEnrolledTrainee ?> Enrolled Trainee
          </div>
          <div class="card-text">
              View attendance of Students.
          </div>
          <div class="card-text">
          </div>
          <a href="daily_time_record.php?id=19" class="card-button" style="background-color: #ec7878;"><i class='bx bxs-folder-open'></i>&nbsp;View Daily Time Record</a>
      </div>
  </div>

  <div class="col-md-3 mb-3">
      <div class="card-sl">
          <div class="card-image text-center">
            <span class='bx bxs-book-content' style="font-size:190px; color:#ca732b"></span>
          </div>

          <a class="card-action" href="#"><i class='bx bx-link-alt' ></i></a>
          <div class="card-heading">
            <?= $completedJournals .' / '.count($journals) ?> Completed
          </div>
          <div class="card-text">
              View, Create and Approved activities assigned by the OJT - Supervisor.
          </div>
          <div class="card-text">
          </div>
          <a href="journal.php?id=19" class="card-button" style="background-color:#ca732b"><i class='bx bxs-folder-open'></i>&nbsp;View Journal</a>
      </div>
  </div>
  <div class="col-md-3">
    <div class="card-sl">
        <div class="card-image text-center">
          <span class='bx bx-stats' style="font-size:190px; color:#0a890a"></span>
        </div>

        <a class="card-action disabled" href="#"><i class='bx bx-link-alt' ></i></a>
        <div class="card-heading">
            ---
        </div>
        <div class="card-text">
          View and Create final rating, comments and others for Trainees.
        </div>
        <div class="card-text">
          
        </div>
        <a href="post-ojt-requirements.php" class="card-button" style="background-color:#0a890a"><i class='bx bxs-folder-open'></i>&nbsp;View Post OJT</a>
    </div>
  </div>
</div>



    