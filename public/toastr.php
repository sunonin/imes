<?php if (isset($_SESSION['toastr'])): ?>
  <?php $toastr = json_decode($_SESSION['toastr']); ?>

  <div class="bs-toast toast toast-placement-ex m-2 fade show bg-<?= $toastr->type ?> top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="bx bx-bell me-2"></i>
      <div class="me-auto fw-semibold"><?= $toastr->header ?></div>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      <?= $toastr->msg ?>
    </div>
  </div>
  <?php unset($_SESSION['toastr']) ?>
<?php endif ?>