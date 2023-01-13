<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item">
        <a href="user_edit.php?id=<?= $_GET['id'] ?>" class="nav-link" href="user_create.php"><i class="bx bx-user me-1"></i> Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_role.php?id=<?= $_GET['id'] ?>"
          ><i class="bx bx-link-alt me-1"></i> Role</a
        >
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="pages-account-settings-notifications.html"
          ><i class="bx bx-link-alt me-1"></i> Upload Signature</a
        >
      </li>

      <?php if ($profile['role'] == 4): ?>
        <li class="nav-item">
          <a class="nav-link" href="student_information.php?id=<?= $_GET['id'] ?>"><i class='bx bxs-school me-1'></i></i> School Information</a>
        </li>
      <?php endif ?>

    </ul>

    <form id="formAccountSettings" method="POST" action="route/post-signature.php" enctype="multipart/form-data">
    <input type="hidden" name="user_id" value="<?= $profile['id'] ?>">
    <div class="row">
      <div class="col-md-12 col-12 mb-md-0 mb-4">
        <div class="card">
          <h5 class="card-header">Account Role</h5>
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
              <input class="form-control" type="file" id="formFile" name="signature">
            </div>
          </div>
          <div class="col-5 mb-2">
            
          </div>
          <div class="col-2 text-end">
            <?php if (isset($user_signature)): ?>
              <a href="../../imes-admin/_signatures/<?= $user_signature ?>" class="btn btn-sm btn-secondary" target="_blank"><i class='bx bx-link' ></i> View</a>
            <?php else: ?>
              <small>No Uploaded file</small>
            <?php endif ?>
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