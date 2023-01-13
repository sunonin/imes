<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Department List</h5>
    <div class="card-tools float-end">
      <a href="department_create.php" class="btn btn-success btn-sm"><span class="tf-icons bx bxs-plus-square"></span> Enroll Department</a>
  </div>
  </div>
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table id="tb-departments" class="table table-hover table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Dean</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php if (!empty($departments)): ?>
            
            <?php foreach ($departments as $key => $dept): ?>
              <tr>
                <td><?= $key+1 ?></td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $dept['title'] ?></strong></td>
                <td><span class="badge bg-label-success me-1"><?= $dept['dean'] ?></span></td>
                <td>
                  <div>
                    <a href="department_edit.php?id=<?= $dept['id'] ?>" type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Edit">
                      <span class="tf-icons bx bx-edit-alt"></span>
                    </a>
                    <button type="button" class="btn btn-icon btn-outline-danger btn-sm" id="btn-delete-company" data-bs-toggle="modal" data-bs-target="#deleteCompanyModal" data-id="<?= $dept['id'] ?>">
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