<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0"><i class='bx bx-task'></i> Daily Time Record List</h5>
    <div class="card-tools float-end">
      <a href="generate-dtr.php" class="btn btn-success btn-sm"><span class="tf-icons bx bxs-plus-square"></span> Generate DTR</a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table class="table table-hover table-sm" id="tb-journal">
        <thead>
          <tr>
            <th class="text-center">Date</th>
            <th class="text-center">Time In</th>
            <th class="text-center">Time Out</th>
            <th class="text-center">Hours</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php foreach ($dtrs as $key => $dtr): ?>
            <tr>
              <td>
                <i class="fab fa-angular fa-lg text-danger me-3"></i> <small><strong><?= $dtr['dateFormat'] ?></strong></small>
              </td>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <small><strong><?= $dtr['timeInFormat'] ?></strong></small></td>
              <td>
                <small><strong><?= $dtr['timeOutFormat'] ?></strong></small>
              </td>
              <td style="word-wrap: break-word;min-width: 35%;max-width: 35%; white-space: normal !important; ">  <?= $dtr['hours'] ?>
              </td>
              <td class="text-center">
                <div class="button-wrapper">
                    <a href="edit_dtr.php?dtr=<?= $dtr['id'] ?>" type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Edit">
                      <span class="tf-icons bx bx-edit-alt"></span>
                    </a>
                  </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>