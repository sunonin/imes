<form method="POST" action="<?= $route ?>">
  <div class="row">

    <!-- COMPANY DETAILS -->
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header"><i class='bx bxs-bank'></i> Department Details</h5>

        <input type="hidden" name="departmentId" value="<?= $_GET['id'] ?>">

        <div class="card-body">
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="departmentTitle">Title</label>
              <input type="text" class="form-control" id="departmentTitle" name="departmentTitle" value="<?= !empty($department) ? $department['title'] : '' ?>" placeholder="Department Name" />
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="departmentDean">Dean</label>
              <input type="text" class="form-control" id="departmentDean" name="departmentDean" value="<?= !empty($department) ? $department['dean'] : '' ?>" placeholder="Dean Name" />
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="departmentPhone">Phone</label>
              <input type="text" class="form-control" id="departmentPhone" name="departmentPhone" value="<?= !empty($department) ? $department['phone'] : '' ?>" placeholder="Phone" />
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="departmentEmail">Email</label>
              <input type="text" class="form-control" id="departmentEmail" name="departmentEmail" value="<?= !empty($department) ? $department['email'] : '' ?>" placeholder="Email" />
            </div>
          </div>

        </div>
      </div>
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