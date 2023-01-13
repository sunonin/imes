<ul class="nav nav-pills flex-column flex-md-row mb-3">
  <li class="nav-item">
    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
  </li>
  <?php if (isset($_GET['id'])): ?>
    <li class="nav-item">
      <a class="nav-link" href="user_role.php?id=<?= $_GET['id'] ?>"><i class="bx bx-link-alt me-1"></i> Role</a>
    </li>

   <!--  <li class="nav-item">
      <a class="nav-link" href="user-signature.php?id= //$_GET['id']"><i class="bx bx-link-alt me-1"></i> Upload Signature</a>
    </li> -->

    <?php if ($profile['role'] == 4): ?>
        <li class="nav-item">
          <a class="nav-link" href="student_information.php?id=<?= $_GET['id'] ?>"><i class="bx bx-link-alt me-1"></i> School Information</a>
        </li>
      <?php endif ?>
  <?php endif ?>
</ul>