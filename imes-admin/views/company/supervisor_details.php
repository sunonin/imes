<div class="card mb-4">
  <h5 class="card-header">Supervisor's Details</h5>
  <div class="card-body">
    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label" for="country">Name</label>
        <select id="supervisorName" name="supervisorName" class="select2 form-select" onChange="handleChangeSupervisor($(this))">
          <option value="" selected disabled>-- Please Select Supervisor --</option>
          <?php foreach ($supervisor_opts as $key => $supervisor): ?>
            <?php if (!empty($company) && ($company['supervisor'] == $key)): ?>
              <option value="<?= $key ?>" data-mobile="<?= $supervisor['mobile'] ?>" data-email="<?= $supervisor['email'] ?>" selected><?= $supervisor['fullname'] ?></option>
            <?php else: ?>  
              <option value="<?= $key ?>" data-mobile="<?= $supervisor['mobile'] ?>" data-email="<?= $supervisor['email'] ?>"><?= $supervisor['fullname'] ?></option>
            <?php endif ?>
          <?php endforeach ?>
        </select>
      </div>
    </div>

    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label" for="supervisorPosition">Position</label>
        <input type="text" class="form-control" id="supervisorPosition" name="supervisorPosition" value="<?= !empty($company) ? $company['supPosition'] : '' ?>" placeholder="John Doe" />
      </div>
    </div>

    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label" for="supervisorDepartment">Department</label>
        <input type="text" class="form-control" id="supervisorDepartment" name="supervisorDepartment" value="<?= !empty($company) ? $company['supDepartment'] : '' ?>" placeholder="John Doe" />
      </div>
    </div>

    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label" for="supervisorEmail">Email</label>
        <div class="input-group input-group-merge">
          <input
            type="text"
            id="supervisorEmail"
            name="supervisorEmail"
            class="form-control"
            value="<?= !empty($company) ? $company['supEmail'] : '' ?>"
            placeholder="john.doe"
            aria-label="john.doe"
            aria-describedby="basic-default-email2"
          />
          <span class="input-group-text" id="basic-default-email2">@example.com</span>
        </div>
        <div class="form-text">You can use letters, numbers & periods</div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label" for="supervisorPhone">Phone</label>
        <input
          type="text"
          id="supervisorPhone"
          name="supervisorPhone"
          value="<?= !empty($company) ? $company['supPhone'] : '' ?>"
          class="form-control phone-mask"
          placeholder="658 799 8941"
        />
      </div>
    </div>
  </div>
</div>