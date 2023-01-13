<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Company List</h5>
    <div class="card-tools float-end">
      <a href="company_create.php" class="btn btn-success btn-sm"><span class="tf-icons bx bxs-plus-square"></span> Enroll Company</a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table id="tb-company" class="table table-hover table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Type</th>
            <th>Address</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php if (!empty($companies)): ?>
            
            <?php foreach ($companies as $key => $comp): ?>
              <tr>
                <td><?= $key+1 ?></td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $comp['name'] ?></strong></td>
                <td><span class="badge bg-label-success me-1"><?= $comp['type'] ?></span></td>
                <td style="word-wrap: break-word;min-width: 175px;max-width: 175px; white-space: normal !important; "><?= $comp['address'] ?></td>
                <td><?= $comp['email'] ?></td>
                <td>
                  <div>
                    <a href="company_edit.php?id=<?= $comp['id'] ?>" type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Edit">
                      <span class="tf-icons bx bx-edit-alt"></span>
                    </a>
                    <button type="button" class="btn btn-icon btn-outline-danger btn-sm" id="btn-delete-company" data-bs-toggle="modal" data-bs-target="#deleteCompanyModal" data-id="<?= $comp['id'] ?>">
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