 <!-- User Pills -->
<ul class="nav nav-pills flex-column flex-md-row mb-3">

  <li class="nav-item">
    <a class="nav-link <?= isset($_GET['j']) ? 'active' : '' ?>" href="student_view.php?id=<?= $_GET['id'] ?>&j">
      <i class='bx bxs-calendar-edit me-1'></i>Journal</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= isset($_GET['p']) ? 'active' : '' ?>" href="student_profile.php?id=<?= $_GET['id'] ?>&p">
      <i class="bx bx-lock-alt me-1"></i>Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= isset($_GET['pr']) ? 'active' : '' ?>" href="student_pre_ojtreq.php?id=<?= $_GET['id'] ?>&pr"><i class="bx bx-detail me-1"></i>Pre-OJT Requirements</a>
  </li>

  <li class="nav-item">
    <a class="nav-link <?= isset($_GET['con']) ? 'active' : '' ?>" href="student_connection.php?id=<?= $_GET['id'] ?>&con"><i class="bx bx-detail me-1"></i>Connections</a>
  </li>

  <li class="nav-item">
    <a class="nav-link <?= isset($_GET['pos']) ? 'active' : '' ?>" href="student-post-ojt.php?id=<?= $_GET['id'] ?>&pos"><i class="bx bx-detail me-1"></i>Post-OJT Requirements</a>
  </li>

  <li class="nav-item">
    <a class="nav-link <?= isset($_GET['rt']) ? 'active' : '' ?>" href="student-final-rate.php?id=<?= $_GET['id'] ?>&rt"><i class="bx bx-detail me-1"></i>Rating</a>
  </li>
</ul>