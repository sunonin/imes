<div class="card">
  <form method="POST" action="<?= $imes->route.'put-history.php'; ?>" enctype="multipart/form-data">    

    <div class="card-body">
      <input type="hidden" name="userId" value="<?= $_SESSION['user']['id'] ?>">

      <div class="col-md-12 mb-5">
        <div class="row mb-3">
          <small class="mb-3"><mark>if parents are deceased, give data for the nearest relative and indicate relationship to applicant</mark></small>

          <div class="col-md-7">
            <label for="fatherName" class="form-label">Father's Name</label>
            <input class="form-control" type="text" id="fatherName" name="fatherName" value="<?= $student['father'] ?>" placeholder = "Father's Name"/>
          </div>

          <div class="col-md-5">
            <label for="fatherOccupation" class="form-label">Occupation</label>
            <input class="form-control" type="text" id="fatherOccupation" name="fatherOccupation" value="<?= $student['father_occupation'] ?>" placeholder = "Occupation"/>
          </div>

        </div>

        <div class="row mb-3">
          <div class="col-md-7">
            <label for="motherName" class="form-label">Mother's Name</label>
            <input class="form-control" type="text" id="motherName" name="motherName" value="<?= $student['mother'] ?>" placeholder = "Mother's Name"/>
          </div>

          <div class="col-md-5">
            <label for="motherOccupation" class="form-label">Occupation</label>
            <input class="form-control" type="text" id="motherOccupation" name="motherOccupation" value="<?= $student['mother_occupation'] ?>" placeholder = "Occupation"/>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-7">
            <label for="parentsAddress" class="form-label">Address of Parents</label>
            <input class="form-control" type="text" id="parentsAddress" name="parentsAddress" value="<?= $student['parents_address'] ?>" placeholder = "Address of Parents"/>
          </div>

          <div class="col-md-5">
            <label for="parentsMobile" class="form-label">Tel No.</label>
            <input class="form-control" type="text" id="parentsMobile" name="parentsMobile" value="<?= $student['parents_mobile'] ?>" placeholder = "Tel No."/>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-7">
            <label for="guardiansName" class="form-label">Guardians Name</label>
            <input class="form-control" type="text" id="guardiansName" name="guardiansName" value="<?= $student['guardian'] ?>" placeholder = "Guardians Name"/>
          </div>

          <div class="col-md-5">
            <label for="guardiansMobile" class="form-label">Tel No.</label>
            <input class="form-control" type="text" id="guardiansMobile" name="guardiansMobile" value="<?= $student['guardians_mobile'] ?>" placeholder = "First Name"/>
          </div>
        </div>


        <div class="row mb-3">
          <div class="col-md-7">
            <label for="emergencyContact" class="form-label">In case of Emergency, notify</label>
            <select id="emergencyContact" name="emergencyContact" class="select2 form-select">
              <option value="" selected disabled>-- Please Select Contact --</option>
              <option value="1" <?= $student['notify'] == 1 ? 'selected' : '' ?>>Father</option>
              <option value="2" <?= $student['notify'] == 2 ? 'selected' : '' ?>>Mother</option>
              <option value="3" <?= $student['notify'] == 3 ? 'selected' : '' ?>>Guardian</option>
            </select>
          </div>

        </div>

      </div>
    </div>
    <div class="card-footer float-end">
      <button type="submit" class="btn btn-primary"><i class='bx bxs-check-circle'></i> Save</button>        
    </div>
  </form>
</div>