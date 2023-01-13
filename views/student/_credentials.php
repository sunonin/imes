<div class="card">
  <form method="POST" action="<?= $imes->route.'put-credentials.php'; ?>" enctype="multipart/form-data">    

  <h5 class="card-header">School Information</h5>
  <div class="card-body">
      <input type="hidden" name="userId" value="<?= $_SESSION['user']['id'] ?>">

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="username" class="form-label">Username</label>
          <input class="form-control" type="text" id="username" name="username" value="<?= $student['username'] ?>" placeholder = "Section"/>
        </div>

        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input class="form-control" type="text" id="email" name="email" value="<?= $student['email'] ?>" placeholder = "Email"/>
        </div>

      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="password" class="form-label">Password</label>
          <input class="form-control" type="password" id="password" name="password" value="" placeholder = "Password"/>
        </div>

        <div class="col-md-6">
          <label for="confirmPassword" class="form-label">Confirm Password</label>
          <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" value="" placeholder = "Confirm Password"/>
        </div>

      </div>
      
  </div>
  <div class="card-footer">
      <button type="submit" class="btn btn-primary"><i class='bx bxs-check-circle'></i> Save</button>        
  </div>
  </form>
</div>