<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item">
        <a href="user_edit.php?id=<?= $_GET['id'] ?>" class="nav-link" href="user_create.php"><i class="bx bx-user me-1"></i> Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="pages-account-settings-notifications.html"
          ><i class="bx bx-link-alt me-1"></i> Role</a
        >
      </li>

      <?php if ($profile['role'] == 4): ?>
        <li class="nav-item">
          <a class="nav-link" href="student_information.php?id=<?= $_GET['id'] ?>"><i class='bx bxs-school me-1'></i></i> School Information</a>
        </li>
      <?php endif ?>

    </ul>

    <form id="formAccountSettings" method="POST" action="route/post_role.php">
    <input type="hidden" name="user_id" value="<?= $profile['id'] ?>">
    <div class="row">
      <div class="col-md-12 col-12 mb-md-0 mb-4">
        <div class="card">
          <h5 class="card-header">Account Role</h5>
          <div class="card-body">
            <p>User can only be given one(1) role. Please select the appropriate role. Once role has been assigned user will be tagged as <span class="badge bg-label-success me-1">Active</span> in the system.</p>
            <!-- Connections -->
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="assets/img/icons/brands/google.png" alt="google" class="me-3" height="30" />
              </div>
              <div class="flex-grow-1 row">
                <div class="col-9 mb-sm-0 mb-2">
                  <h6 class="mb-0"><?= $roles[4]['name'] ?></h6>
                  <small class="text-muted"><?= $roles[4]['description'] ?></small>
                </div>
                <div class="col-3 text-end">
                  <div class="form-check form-switch">
                    <input class="form-check-input float-end" name="userRole[4]" type="checkbox" <?= $profile['role'] == 4 ? 'checked' : '' ?> role="switch" />
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="assets/img/icons/brands/github.png" alt="github" class="me-3" height="30" />
              </div>
              <div class="flex-grow-1 row">
                <div class="col-9 mb-sm-0 mb-2">
                  <h6 class="mb-0"><?= $roles[2]['name'] ?></h6>
                  <small class="text-muted"><?= $roles[2]['description'] ?></small>
                </div>
                <div class="col-3 text-end">
                  <div class="form-check form-switch">
                    <input class="form-check-input float-end" name="userRole[2]" type="checkbox" <?= $profile['role'] == 2 ? 'checked' : '' ?> role="switch" />
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="assets/img/icons/brands/mailchimp.png" alt="mailchimp" class="me-3" height="30"/>
              </div>
              <div class="flex-grow-1 row">
                <div class="col-9 mb-sm-0 mb-2">
                  <h6 class="mb-0"><?= $roles[1]['name'] ?></h6>
                  <small class="text-muted"><?= $roles[1]['description'] ?></small>
                </div>
                <div class="col-3 text-end">
                  <div class="form-check form-switch">
                    <input class="form-check-input float-end" name="userRole[1]" type="checkbox" <?= $profile['role'] == 1 ? 'checked' : '' ?> role="switch" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>     

    <div class="fab-container">
      <button type="submit" class="btn btn-primary btn-md iconbutton">
        <i class="bx bxs-check-square d-block d-sm-none"></i>
        <span class="d-none d-sm-block">Submit</span>
      </button>
    </div>

  </form>
</div>
</div>