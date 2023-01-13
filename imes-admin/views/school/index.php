<div class="row">
  <div class="col-md-12">
    <div class="alert alert-info mb-4" role="alert">
      <h6 class="alert-heading fw-bold mb-1"><i class="fa fa-square-info"></i> Note!</h6>
      <span>Only 1 school details can be added</span>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0"><i class='bx bxs-school'></i> School Details</h5>
    <div class="card-tools float-end">
      <!-- will only display if there is no registered school yet -->
      <?php if (count($schools) == 0): ?>
        <a href="school_create.php" class="btn btn-success btn-sm"><span class="tf-icons bx bxs-plus-square"></span> Enroll School</a>
      <?php endif ?>
  </div>
  </div>
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table id="tb-school" class="table table-hover table-sm">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php if (!empty($schools)): ?>
            <?php foreach ($schools as $key => $school): ?>
              <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $school['name'] ?></strong></td>
                <td><?= $school['email'] ?></td>
                <td><?= $school['phone'] ?></td>
                <td><span class="badge bg-label-success me-1"><?= $school['address'] ?></span></td>
                <td>
                  <div>
                    <a href="school_view.php?id=<?= $school['id'] ?>" type="button" class="btn btn-icon btn-outline-success btn-sm" title="View">
                      <i class='bx bx-folder-open'></i>
                    </a>
                    <a href="school_edit.php?id=<?= $school['id'] ?>" type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Edit">
                      <span class="tf-icons bx bx-edit-alt"></span>
                    </a>
                    <button type="button" class="btn btn-icon btn-outline-danger btn-sm" id="btn-delete-company" data-bs-toggle="modal" data-bs-target="#deleteCompanyModal" data-id="<?= $key ?>">
                      <span class="tf-icons bx bx-trash"></span>
                    </button>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>