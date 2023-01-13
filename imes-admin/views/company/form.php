<form method="POST" action="<?= $route ?>">
  <div class="row">

    <!-- COMPANY DETAILS -->
    <div class="col-md-12">
      <?php include 'company_details.php'; ?>
    </div>
  </div>

  <!-- Floating button -->
  <div class="fab-container">
    <button type="submit" class="btn btn-primary btn-md iconbutton">
      <i class="bx bxs-check-square d-block d-sm-none"></i>
      <span class="d-none d-sm-block">Submit</span>
    </button>
  </div>
</form>