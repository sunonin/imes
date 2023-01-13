<div class="row">
  <div class="col-md-12">
    <div class="row">

      <div class="col-md-3">
        <?php include 'left.php' ?>
      </div>

      <div class="col-md-9">
            <?php include '_nav_tab.php'; ?>

            <div class="alert alert-primary d-flex" role="alert">
              <span class="badge badge-center rounded-pill bg-dark border-label-dark p-3 me-2"><i class="bx bx-command fs-6"></i></span>
              <div class="d-flex flex-column ps-1">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Status Legend:</h6>
                <span style="color: #171419">

                  <span class="badge badge-center bg-secondary" style="font-size:25px"><i class="bx bxs-edit-alt"  style="font-size:20px"></i></span> Draft &nbsp;

                  <span class="badge badge-center bg-warning" style="font-size:25px"><i class="bx bx-rotate-left"  style="font-size:20px"></i></span> On-Going &nbsp;

                  <span class="badge badge-center bg-danger" style="font-size:25px"><i class="bx bx-no-entry"  style="font-size:20px"></i></span> Hold &nbsp;

                  <span class="badge badge-center bg-success" style="font-size:25px"><i class="bx bx-check"  style="font-size:20px"></i></span> Completed

                </span>
              </div>
            </div>

            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Activity List</h5>
                <div class="card-tools float-end">

                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="table-responsive mb-3 text-nowrap">
                    <div class="col-md-12">
                      <table id="tb-journal" class="table table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th class="text-center" width="10%">Date & Time</th>
                            <th class="text-center">Activity</th>
                            <!-- <th class="text-center" width="10%">Approved By</th> -->
                            <th class="text-center" width="10%">Status</th>
                            <th class="text-center" width="10%">Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                          <?php foreach ($journals as $key => $journal): ?>
                            <tr>
                              <td><?= $key+1 ?></td>
                              <td>
                                <div class="row py-2">
                                  <div class="col-md-12">
                                    <b>Start Date</b>
                                  </div>
                                  <div class="col-md-12">
                                    <span><?= $journal['start_date'] ?></span>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-12">
                                    <b>End Date</b>
                                  </div>
                                  <div class="col-md-12">
                                    <span><?= $journal['end_date'] ? $journal['end_date'] : '<i>No Record</i>' ?></span>
                                  </div>
                                </div>
                              </td>
                              <td width="45%" style="word-wrap: break-word;min-width: 35%;max-width: 35%; white-space: normal !important; ">
                                <?= $journal['title'] ?>    
                              </td>
                             
                              <td class="text-center">
                                <?php if ($journal['statusId'] == "0"): ?>
                                  <span class="badge bg-secondary" title="Draft"><i class="bx bxs-edit-alt"></i> Draft</span>
                                <?php endif ?>

                                <?php if ($journal['statusId'] == "1"): ?>
                                  <span class="badge bg-warning" title="On-Going"><i class="bx bx-rotate-left"></i> On-Going</span>
                                <?php endif ?>

                                <?php if ($journal['statusId'] == "2"): ?>
                                  <span class="badge bg-danger" title="Hold"><i class="bx bx-no-entry"></i> Hold</span>
                                <?php endif ?>

                                <?php if ($journal['statusId'] == "3"): ?>
                                  <span class="badge bg-success" title="Completed"><i class="bx bx-no-entry"></i> Completed</span>
                                <?php endif ?>

                              </td>
                              <td class="text-center">
                                <div>
                                  <button type="button" class="btn btn-outline-success btn-sm journalViewModal" data-bs-toggle="modal" data-bs-target="#journalViewModal" data-id="<?= $journal['id'] ?>"><span class="tf-icons bx bx-folder-open"></span> View</button>
                                </div>
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