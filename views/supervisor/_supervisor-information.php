<div class="card">
  <form method="POST" action="<?= $imes->route.'put-supervisor-profile.php'; ?>" enctype="multipart/form-data">    
    <div class="card-body">
      <input type="hidden" name="userId" value="<?= $_SESSION['user']['id'] ?>">
      <div class="row mb-3"> 
        <div class="col-md-4">
          <label for="supervisorLname" class="form-label">Last Name</label>
          <input class="form-control" type="text" id="supervisorLname" name="supervisorLname" value="<?= $supervisor['supervisorLname'] ?>" placeholder = "Supervisor Last Name"/>
        </div>

        <div class="col-md-4">
          <label for="supervisorFname" class="form-label">First Name</label>
          <input class="form-control" type="text" id="supervisorFname" name="supervisorFname" value="<?= $supervisor['supervisorFname'] ?>" placeholder = "Supervisor First Name"/>
        </div>

        <div class="col-md-4">
          <label for="supervisorMname" class="form-label">Middle Name</label>
          <input class="form-control" type="text" id="supervisorMname" name="supervisorMname" value="<?= $supervisor['supervisorMname'] ?>" placeholder = "Supervisor Middle Name"/>
        </div>

      </div>

      <div class="row mb-3"> 
        <div class="col-md-4">
          <label for="supervisorBirthDate" class="form-label">Birth Date</label>
            <input class="form-control" type="date" value="<?= $supervisor['supervisorBirthDate'] ?>" id="supervisorBirthDate" name="supervisorBirthDate" />
        </div>

        <div class="col-md-4">
          <label class="form-label" for="supervisorGender">Gender</label>
          <select id="supervisorGender" name="supervisorGender" class="select2 form-select">
            <option value="" selected disabled>-- Please Select Gender --</option>
            <option value="m" <?= $supervisor['supervisorGender'] == 'm' ? "selected" : "" ?>>Male</option>
            <option value="f" <?= $supervisor['supervisorGender'] == 'f' ? "selected" : "" ?>>Female</option>
          </select>
        </div>

      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="supervisorPosition" class="form-label">Position</label>
          <input class="form-control" type="text" id="supervisorPosition" name="supervisorPosition" value="<?= $supervisor['supervisorPosition'] ?>" placeholder = "Supervisor Position"/>
        </div>

        <div class="col-md-4">
          <label for="supervisorDepartment" class="form-label">Department</label>
          <input class="form-control" type="text" id="supervisorDepartment" name="supervisorDepartment" value="<?= $supervisor['supervisorDepartment'] ?>" placeholder = "Supervisor Department"/>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <label for="supervisorEmail" class="form-label">Email</label>
          <input class="form-control" type="text" id="supervisorEmail" name="supervisorEmail" value="<?= $supervisor['supervisorEmail'] ?>" placeholder = "Supervisor Email"/>
        </div>

        <div class="col-md-4">
          <label for="supervisorPhone" class="form-label">Phone</label>
          <input class="form-control" type="text" id="supervisorPhone" name="supervisorPhone" value="<?= $supervisor['supervisorPhone'] ?>" placeholder = "Supervisor Phone"/>
        </div>
      </div>

      
    </div>

    <!-- <div class="card-footer float-end">
      <button type="submit" class="btn btn-primary"><i class='bx bxs-check-circle'></i> Save</button>        
    </div> -->

  </form>
</div>