<div class="row">
  <div class="col-md-12">
    <!-- Navlist -->
    <?php include 'navlist.php' ?> 
    <form id="formAccountSettings" method="POST" action="<?= $route ?>" enctype="multipart/form-data">
      <!-- Profile -->
      <?php include 'profile.php' ?> 
      <!-- Credentials -->
      <?php include 'credentials.php' ?>
      
      <!-- Floating button -->
      <div class="fab-container">
        <button type="submit" class="btn btn-primary btn-md iconbutton">
          <i class="bx bxs-check-square d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Submit</span>
        </button>
      </div>
    </form>
  </div>
</div>