<div class="card mb-4">
  <h5 class="card-header">Company Details</h5>

  <input type="hidden" name="companyId" value="<?= $_GET['id'] ?>">

  <div class="card-body">
    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label" for="compName">Name</label>
        <input type="text" class="form-control" id="compName" name="compName" value="<?= !empty($company) ? $company['compName'] : '' ?>" placeholder="Company Name" />
      </div>
    </div>

    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label" for="compType">Type</label>
        <select id="compType" name="compType" class="select2 form-select">
          <option value="" selected disabled>-- Please Select Type --</option>
          <option value="1" <?= !empty($company) ? ($company['compType'] == '1' ? 'selected' : '' ) : '' ?>>Private</option>
          <option value="2" <?= !empty($company) ? ($company['compType'] == '2' ? 'selected' : '' ) : '' ?>>Government</option>
        </select>
      </div>
    </div>

    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label" for="compEmail">Email</label>
        <div class="input-group input-group-merge">
          <input
            type="text"
            id="compEmail"
            name="compEmail"
            class="form-control"
            value="<?= !empty($company) ? $company['compEmail'] : '' ?>"
            placeholder="company.name"
            aria-label="company.name"
            aria-describedby="basic-default-email2"
          />
          <span class="input-group-text" id="basic-default-email2">@example.com</span>
        </div>
        <div class="form-text">You can use letters, numbers & periods</div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label" for="compPhone">Phone</label>
        <input
          type="text"
          id="compPhone"
          name="compPhone"
          value="<?= !empty($company) ? $company['compPhone'] : '' ?>"
          class="form-control phone-mask"
          placeholder="658 799 8941"
        />
      </div>
    </div>

    <div class="col-md-12">
      <div class="mb-3">
        <label class="form-label" for="compAddress">Address</label>
        <textarea
          id="compAddress"
          name="compAddress"
          class="form-control"
          value="<?= !empty($company) ? $company['compAddress'] : '' ?>"
          placeholder="Please enter Address"
        ><?= !empty($company) ? $company['compAddress'] : '' ?></textarea>
      </div>
    </div>

  </div>
</div>