<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0"><i class='bx bx-task'></i> Overall Hours</h5>
    <div class="card-tools float-end">
      
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table class="table table-hover table-sm" id="tb-journal">
        <thead>
          <tr>
            <th>#</th>
            <th class="text-center">Trainee</th>
            <th class="text-center">Total Hours</th>
            <th class="text-center">Required Hours</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php foreach ($overviews as $key => $overview): ?>
            <tr>
              <td><?= $key+1 ?></td>
              <td>
                <i class="fab fa-angular fa-lg text-danger me-3"></i> <small><strong><?= $overview['trainee'] ?></strong></small>
              </td>
              <td class="text-center"><i class="fab fa-angular fa-lg text-danger me-3"></i> <small><strong><?= number_format($overview['total_hours'], 2); ?></strong></small>
              </td>
              <td class="text-center"><i class="fab fa-angular fa-lg text-danger me-3"></i> <small><strong>500.00</strong></small>
              </td>
              <td class="text-center">
                <div class="button-wrapper">
                  <?php if (!in_array($overview['id'], $overviewHours)): ?>
                    <button type="button" class="btn btn-success btn-sm postEvaluate" data-bs-toggle="modal" data-bs-target="#postEvaluate" data-id="<?= $overview['id'] ?>"><span class="tf-icons bx bx-list-check"></span> Complete</button>
                  <?php else: ?>
                    Completed
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