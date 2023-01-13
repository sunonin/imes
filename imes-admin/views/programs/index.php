<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Program List</h5>
    <div class="card-tools float-end">
      <a href="program_create.php" class="btn btn-success btn-sm"><span class="tf-icons bx bxs-plus-square"></span> Enroll Program</a>
  </div>
  </div>
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table id="tb-programs" class="table table-hover table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Major</th>
            <th>Length Of Program</th>
            <th>Department</th>
            <th>OJT Hours</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php if (!empty($programs)): ?>
            
            <?php foreach ($programs as $key => $program): ?>
              <tr>
                <td><?= $key+1 ?></td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $program['title'] ?></strong></td>
                <td><?= $program['major'] ?></td>
                <td><?= $program['length'] ?> Years</td>
                <td><?= $program['department'] ?></td>
                <td><?= $program['ojt_hours'] ?></td>
                <td>
                  <div>
                    <a href="program_edit.php?id=<?= $program['id'] ?>" type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Edit">
                      <span class="tf-icons bx bx-edit-alt"></span>
                    </a>
                    <button type="button" class="btn btn-icon btn-outline-danger btn-sm" id="btn-delete-company" data-bs-toggle="modal" data-bs-target="#deleteCompanyModal" data-id="<?= $program['id'] ?>">
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