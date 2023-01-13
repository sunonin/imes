<div class="row">
  <div class="col-md-12">
    <div class="alert alert-secondary mb-4" role="alert">
      <div class="d-flex gap-3">
        <div class="flex-shrink-0">
          <span class="badge badge-center rounded-pill bg-secondary border-label-secondary p-3 me-2">
            <i class="bx bx-sm bx-purchase-tag fs-4"></i>
          </span>
        </div>
        <div class="flex-grow-1">
          <div class="fw-bold">Alert</div>
          <ul class="list-unstyled mb-0">
            <li> - Completed Task with color blue fonts <span class="badge bg-label-primary me-1" style="font-size:11px">
                  COMPLETED
                  </span> needs evaluation</li>
            <li> - Completed Task with color green fonts <span class="badge bg-label-success me-1" style="font-size:11px">
                  COMPLETED
                  </span> tagged as done.</li></li>
          </ul>
        </div>
      </div>
      <button type="button" class="btn-close btn-pinned" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0"><i class='bx bx-task'></i> Activity List</h5>
    <div class="card-tools float-end">
      <a href="add_task.php" class="btn btn-success btn-sm"><span class="tf-icons bx bxs-plus-square"></span> Create Activity</a>
      <a href="add_task.php" class="btn btn-success btn-sm"><span class="tf-icons bx bxs-plus-square"></span> Generate</a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table class="table table-hover table-sm" id="tb-journal">
        <thead>
          <tr>
            <th>#</th>
            <th class="text-center">Start Date</th>
            <th class="text-center">End Date</th>
            <th class="text-center">Status</th>
            <th class="text-center">Activity</th>
            <th class="text-center">Trainee</th>
            <th class="text-center">Remarks</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php foreach ($journals as $key => $journal): ?>
            <tr>
              <td><?= $key+1 ?></td>
              <td width="10%">
                <i class="fab fa-angular fa-lg text-danger me-3"></i> <small><strong><?= $journal['start_date'] ?></strong></small>
              </td>
              <td width="10%"><i class="fab fa-angular fa-lg text-danger me-3"></i> <small><strong><?= $journal['end_date'] ?></strong></small></td>
              <td width="10%">
                <?php if (!empty($journal['approved_by'])): ?>
                  <span class="badge bg-label-success me-1" style="font-size:11px">
                  <?= $journal['status'] ?>
                </span>
                <?php else: ?>
                  <span class="badge bg-label-primary me-1" style="font-size:11px">
                  <?= $journal['status'] ?>
                  </span>
                <?php endif ?>
              </td>
              <td width="35%" style="word-wrap: break-word;min-width: 35%;max-width: 35%; white-space: normal !important; ">  <?= $journal['title'] ?>
              </td>
              <td width="15%" style="word-wrap: break-word;min-width: 15%;max-width: 15%; white-space: normal !important; ">  <?= $journal['trainee'] ?>
              </td class="text-center">
              <td width="15%" style="word-wrap: break-word;min-width: 15%;max-width: 15%; white-space: normal !important; ">  <?= $journal['remarks'] ?>
              </td>
              <td class="text-center">
                <div class="button-wrapper">
                    <a href="edit_task.php?task=<?= $journal['id'] ?>" type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Edit">
                      <span class="tf-icons bx bx-edit-alt"></span>
                    </a>
                    <?php if ($journal['approved_by'] == 0): ?>
                      <button type="button" class="btn btn-icon btn-outline-danger btn-sm" id="btn-delete-user" data-bs-toggle="modal" data-bs-target="#deleteUserModal" data-id="<?= $journal['id'] ?>">
                        <span class="tf-icons bx bx-trash"></span>
                      </button>
                    <?php endif ?>
                  </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>