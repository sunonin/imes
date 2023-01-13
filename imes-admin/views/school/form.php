<form method="POST" action="<?= $route ?>">
  <div class="row">

    <!-- COMPANY DETAILS -->
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header"><i class='bx bxs-school'></i> School Details</h5>

        <input type="hidden" name="schoolId" value="<?= $_GET['id'] ?>">

        <div class="card-body">
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="schoolName">Name</label>
              <input type="text" class="form-control" id="schoolName" name="schoolName" value="<?= !empty($school) ? $school['name'] : '' ?>" placeholder="School Name" />
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="schoolEmail">Email</label>
              <div class="input-group input-group-merge">
                <input
                  type="text"
                  id="schoolEmail"
                  name="schoolEmail"
                  class="form-control"
                  value="<?= !empty($school) ? $school['email'] : '' ?>"
                  placeholder="company.name"
                  aria-label="company.name"
                  aria-describedby="basic-default-email2"
                />
                <span class="input-group-text" id="basic-default-email2">@example.com</span>
              </div>
              <div class="form-text">You can use letters, numbers & periods</div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="schoolPhone">Phone</label>
              <input
                type="text"
                id="schoolPhone"
                name="schoolPhone"
                value="<?= !empty($school) ? $school['phone'] : '' ?>"
                class="form-control phone-mask"
                placeholder="658 799 8941"
              />
            </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" for="schoolAddress">Address</label>
              <textarea
                id="schoolAddress"
                name="schoolAddress"
                class="form-control"
                rows="3"
                value="<?= !empty($school) ? $school['address'] : '' ?>"
                placeholder="Please enter Address"
              ><?= !empty($school) ? $school['address'] : '' ?></textarea>
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