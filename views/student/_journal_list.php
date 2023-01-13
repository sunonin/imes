<?php if (!isset($studentOverview[1])): ?>
  <div class="row mb-3">
    <div class="col-md-12">
      <ul class="list-group">
          <li class="list-group-item list-group-item-warning">
            <i class="bx bxs-info-circle"></i> All <u><b><a href="pre_ojt_requirements.php">Pre-OJT Requirements</a></b></u> must be uploaded and verified by the OJT - Coordinator in order to proceed in this transaction.
          </li>
      </ul>
    </div>
  </div>
<?php endif ?>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0"><i class='bx bx-task'></i> Activity List</h5>
    <div class="card-tools float-end">
      <?php if (isset($studentOverview[1])): ?>
        <a href="add_task.php" class="btn btn-success btn-sm"><span class="tf-icons bx bxs-plus-square"></span> Create Activity</a>
        <a href="generate-journal.php" class="btn btn-primary btn-sm"><span class="tf-icons bx bxs-plus-square"></span> Generate Journal</a>
      <?php endif ?>
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
                <span class="badge <?= $journal['status'] == "Completed" ? "bg-label-success" : "bg-label-primary" ?> me-1" style="font-size:11px">
                  <?= $journal['status'] ?>
                </span>
              </td>
              <td style="word-wrap: break-word; overflow-wrap: break-word;max-width: 120px; white-space: normal !important; ">  <?= $journal['title'] ?>
              </td>
              <td width="15%" style="word-wrap: break-word; overflow-wrap: break-word;min-width: 15%;max-width: 100px; white-space: normal !important; ">  <?= $journal['remarks'] ?>
              </td>
              <td class="text-center">
                <?php if (isset($studentOverview[1])): ?>
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
                <?php endif ?>

              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>