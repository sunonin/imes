<ul class="nav nav-tabs nav-fill" role="tablist">  
  <li class="nav-item">
    <a
      href="student_journal.php?id=<?= $_GET['id'] ?>"
      class="nav-link active"
    >
      <i class="tf-icons bx bx-message-square"></i> Activity
    </a>
  </li>      
  <li class="nav-item">
    <a
      href="#"
      class="nav-link"
    >
      <i class="tf-icons bx bx-user"></i> Profile
    </a>
  </li>
  <li class="nav-item">
    <a
      href="student_pre_ojtreq.php?id=<?= $_GET['id'] ?>"
      class="nav-link"
      >
      <i class="tf-icons bx bx-briefcase-alt-2"></i> Pre-OJT Requirements
    </a>
  </li>
  <li class="nav-item">
    <a
      href="#"
      class="nav-link"
    >
      <i class="tf-icons bx bx-history"></i> Supervisor Feedback
    </a>
  </li>
  <li class="nav-item">
    <a
      href="#"
      class="nav-link"
    >
      <i class="tf-icons bx bxs-briefcase-alt"></i> Post-OJT Requirements
    </a>
  </li>
</ul>