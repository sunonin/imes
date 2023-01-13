<div class="card">
  <form method="POST" action="<?= $imes->route.'put-profile.php'; ?>" enctype="multipart/form-data">    
    <div class="card-body">
      <input type="hidden" name="userId" value="<?= $_SESSION['user']['id'] ?>">
      <div class="row mb-3"> 
        <div class="col-md-12">
          <label for="companyName" class="form-label">Company Name</label>
          <input class="form-control" type="text" id="companyName" name="companyName" value="<?= $supervisor['compName'] ?>" placeholder = "Company Name"/>
        </div>
      </div>

      <div class="row mb-3"> 
        <div class="col-md-5">
          <label class="form-label" for="civilStatus">Type</label>
          <select id="civilStatus" name="civilStatus" class="select2 form-select">
            <option value="" selected disabled>-- Please Select Type --</option>
            <option value="1" <?= $supervisor['compType'] == '1' ? "selected" : "" ?>>Private</option>
            <option value="2" <?= $supervisor['compType'] == '2' ? "selected" : "" ?>>Government</option>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-5">
          <label for="companyEmail" class="form-label">Email</label>
          <input class="form-control" type="text" id="companyEmail" name="companyEmail" value="<?= $supervisor['compEmail'] ?>" placeholder = "Email"/>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-5">
          <label for="companyPhone" class="form-label">Phone</label>
          <input class="form-control" type="text" id="companyPhone" name="companyPhone" value="<?= $supervisor['compPhone'] ?>" placeholder = "Phone"/>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-12">
          <label for="companyAddress" class="form-label">Address</label>
          <textarea class="form-control" id="companyAddress" name="companyAddress" rows="3" placeholder="-- Indicate Exact Address --"><?= $supervisor['compAddress'] ?></textarea>
        </div>
      </div>
    </div>

    <!-- <div class="card-footer float-end">
      <button type="submit" class="btn btn-primary"><i class='bx bxs-check-circle'></i> Save</button>        
    </div> -->

  </form>
</div>