<div class="row g-4">
  
  <?php if (isset($companyConnected) && !empty($companyConnected)): ?>
    <div class="col-xl-4 col-lg-6 col-md-6">
      <div class="card">
        <div class="card-body text-center">
          <h5 class="mb-1 card-title"><?= $companyConnected['compName'] ?></h5>
          <span><?= $companyConnected['compAddress'] ?></span>
          <div class="d-flex align-items-center justify-content-center my-3 gap-2">
            <a href="javascript:;" class="me-1"><span class="badge bg-label-secondary"><?= $companyConnected['compTypeText'] ?></span></a>
            <a href="javascript:;"><span class="badge bg-label-warning"><?= $companyConnected['compEmail'] ?></span></a>
            <a href="javascript:;"><span class="badge bg-label-danger"><?= $companyConnected['compPhone'] ?></span></a>
          </div>
          <br>
          <div class="d-flex align-items-center justify-content-center">
            <a href="javascript:;" class="btn btn-success d-flex align-items-center me-3"><i class="bx bx-user-check me-1"></i>Connected</a>

            <button type="button" class="btn btn-primary companyDetailsModal" data-bs-toggle="modal" data-bs-target="#companyDetailsModal" data-id="<?= $companyConnected['id']; ?>"><span class="tf-icons bx bx-no-entry"></span> View</button>
          </div>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="col-xl-12 col-lg-6 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="alert alert-warning" role="alert">
              <h6 class="alert-heading fw-bold mb-1">Currently not connected to any company yet</h6>
              <span>Please wait for your coordinator to issue your designated company.</span>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
  
</div>