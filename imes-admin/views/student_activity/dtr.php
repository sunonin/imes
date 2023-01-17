<div class="row">
  <div class="col-md-12">
    <div class="row">

      <div class="col-md-3">
        <?php include 'left.php' ?>
      </div>

      <div class="col-md-9">
            <?php include '_nav_tab.php'; ?>

            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bx bxs-buildings"></i> Daily Time Record</h5>
                <div class="card-tools float-end">

                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="table-responsive mb-3 text-nowrap">
                    <div class="col-md-12">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th class="text-center" width="15%">Date</th>
                            <th class="text-center" width="15%">Time In</th>
                            <th class="text-center" width="10%">Time Out</th>
                            <th class="text-center" width="10%">Hours</th>
                            <th class="text-center" width="10%">Status</th>
                            <th class="text-center" width="10%">Excuse Letter</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        	<?php foreach ($studentDtrs as $key => $dtr): ?>
                            <tr>
                              <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i> <small><strong><?= $dtr['dateFormat'] ?></strong></small>
                              </td>
                              <td class="text-center"><i class="fab fa-angular fa-lg text-danger me-3"></i> <small><strong><?= $dtr['am_status'] != "absent" ? $dtr['timeInFormat'] : '' ?></strong></small></td>
                              <td class="text-center">
                                <small><strong><?= $dtr['timeOutFormat'] ?></strong></small>
                              </td>
                              <td class="text-center" style="word-wrap: break-word;min-width: 35%;max-width: 35%; white-space: normal !important; ">  <?= $dtr['hours'] ?>
                              </td>
                              <td class="text-center">
                                <?= $dtr['am_status'] ?>
                              </td>
                              <td class="text-center">
                                <?php if (!empty($dtr['attachment'])): ?>
                                  <a href="_uploads/absent-forms/<?= $dtr['attachment'] ?>" class="btn btn-sm btn-info" target="_blank"><i class='bx bx-link' ></i> View</a>
                                <?php endif ?>
                              </td>
                            </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
        </div>
      </div>

    </div>
  </div>
</div>