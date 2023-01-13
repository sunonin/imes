<div class="row text-end">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="javascript:void(0);">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
  </nav>
</div>


<div class="row">
  <div class="mt-3">
    <div class="row">
      <div class="col-md-3 col-12 mb-3 mb-md-0">
        <div class="list-group">
          <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-student"><i class="tf-icons bx bxs-user"></i> Student Information</a>
          <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-family"><i class='bx bxs-user-detail'></i> Family Background</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-school"><i class='bx bxs-school'></i> School Information</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-credentials"><i class='bx bxs-user-account'></i> Credentials</a>
        </div>
      </div>
      <div class="col-md-9 col-12">
        <div class="tab-content p-0">
          <div class="tab-pane fade active show" id="list-student">
            <?php include '_student_information.php' ?>
          </div>

          <div class="tab-pane fade" id="list-family">
            <?php include '_family_background.php' ?>
          </div>

          <div class="tab-pane fade" id="list-school">
            <?php include '_school_information.php' ?>
          </div>

          <div class="tab-pane fade" id="list-credentials">
            <?php include '_user_credentials.php' ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

