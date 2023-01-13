<div class="row">
  <div class="col-md-12">
    <div class="row">

      <div class="col-md-3">
        <?php include 'left.php' ?>
      </div>

      <div class="col-md-9">
          <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" role="tablist">
              <li class="nav-item">
                <a
                  href="#"
                  class="nav-link active"
                >
                  <i class="tf-icons bx bx-message-square"></i> Journal
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="student_view.php?id=<?= $_GET['id'] ?>"
                  class="nav-link"
                >
                  <i class="tf-icons bx bx-user"></i> Profile
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="student_pre_ojtreq.php?id=<?= $_GET['id'] ?>"
                  class="nav-link"
                >
                  <i class="tf-icons bx bx-briefcase-alt-2"></i> Pre-OJT Requirements
                </a>
              </li>
              <li class="nav-item">
                <button
                  type="button"
                  class="nav-link"
                  role="tab"
                  data-bs-toggle="tab"
                  data-bs-target="#navs-justified-messages"
                  aria-controls="navs-justified-messages"
                  aria-selected="false"
                >
                  <i class="tf-icons bx bx-history"></i> History
                </button>
              </li>
              <li class="nav-item">
                <button
                  type="button"
                  class="nav-link"
                  role="tab"
                  data-bs-toggle="tab"
                  data-bs-target="#navs-justified-messages"
                  aria-controls="navs-justified-messages"
                  aria-selected="false"
                >
                  <i class="tf-icons bx bxs-briefcase-alt"></i> Post-OJT Requirements
                </button>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                
                <div class="accordion mt-3" id="accordionExample">
                  <div class="card accordion-item" style="border: 1px #c8c8c8 solid;">
                    <h2 class="accordion-header" id="headingOne">
                      <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">
                        Thursday - Aug. 01, 2022 (6 hours)
                      </button>
                    </h2>

                    <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                      <div class="accordion-body" style="background-color: whitesmoke">
                        <div class="row" style="background-color: whitesmoke; padding-top: 10px;">
                        </div>
                        <div class="row" style="padding-top: 10px; background-color: white; border-radius: 3px;">
                          <div class="col-md-12">
                            <table class="table table-borderless">
                              <tbody>
                                <tr>
                                  <td class="lead text-center">Time</td>
                                  <td class="lead text-center">Task / Activity</td>
                                  <td class="lead text-center">Status</td>
                                  <td class="lead text-center">No. of Hours</td>
                                </tr>
                                <tr>
                                  <td class="align-middle" width="20%"><small>08:00 am - 10:00 am</small></td>
                                  <td class="" width="50%">
                                    <p class="mb-0">
                                      Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est
                                      non commodo luctus. Duis mollis, est non commodo luctus.Duis mollis, est non commodo
                                      luctus.
                                    </p>
                                  </td>
                                  <td width="15%"><span class="badge bg-label-success me-1">Completed</span></td>
                                  <td width="20%">2 Hours</td>
                                </tr>
                                <tr>
                                  <td class="align-middle" width="20%"><small>10:00 am - 03:00 pm</small></td>
                                  <td class="" width="50%">
                                    <p class="mb-0">
                                      Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est
                                      non commodo luctus. Duis mollis, est non commodo luctus.Duis mollis, est non commodo
                                      luctus.
                                    </p>
                                  </td>
                                  <td width="15%"><span class="badge bg-label-success me-1">Completed</span></td>
                                  <td width="20%">5 Hours</td>
                                </tr>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td><b><small>Rate</small></b></td>
                                  <td><b>5</b></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td><b><small>Approved & Rated By</small></b></td>
                                  <td><b>OJT-Supervisor / 01-09-2022</b></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tfoot>
                            </table>

                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card accordion-item" style="border: 1px #c8c8c8 solid;">
                    <h2 class="accordion-header" id="headingOne">
                      <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionOne">
                        Friday - Aug. 02, 2022 (8 hours)
                      </button>
                    </h2>

                    <div id="accordionTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                      <div class="accordion-body" style="background-color: whitesmoke">
                        <div class="row" style="background-color: whitesmoke; padding-top: 10px;">
                        </div>
                        <div class="row" style="padding-top: 10px; background-color: white; border-radius: 3px;">
                          <div class="col-md-12">
                            <table class="table table-borderless">
                              <tbody>
                                <tr>
                                  <td class="lead text-center">Time</td>
                                  <td class="lead text-center">Task / Activity</td>
                                  <td class="lead text-center">Status</td>
                                  <td class="lead text-center">No. of Hours</td>
                                </tr>
                                <tr>
                                  <td class="align-middle" width="20%"><small>08:00 am - 12:00 am</small></td>
                                  <td class="" width="50%">
                                    <p class="mb-0">
                                      Task 1
                                    </p>
                                  </td>
                                  <td width="15%"><span class="badge bg-label-success me-1">Completed</span></td>
                                  <td width="20%">4 Hours</td>
                                </tr>
                                <tr>
                                  <td class="align-middle" width="20%"><small>08:00 am - 12:00 am</small></td>
                                  <td class="" width="50%">
                                    <p class="mb-0">
                                      Task 2 - <b><small>Issued by OJT-Supervisor</small></b><br>
                                      <mark><small>Remarks: Failed to finish the task due to sudden stomach ache</small></mark>
                                    </p>
                                  </td>
                                  <td width="15%"><span class="badge bg-label-primary me-1">Ongoing</span></td>
                                  <td width="20%">4 Hours</td>
                                </tr>
                                <tr>
                                  <td class="align-middle" width="20%"><small>01:00 am - 05:00 pm</small></td>
                                  <td class="" width="50%">
                                    <p class="mb-0">
                                      Task 3
                                    </p>
                                  </td>
                                  <td width="15%"><span class="badge bg-label-success me-1">Completed</span></td>
                                  <td width="20%">4 Hours</td>
                                </tr>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td><b><small>Rate</small></b></td>
                                  <td><b>4</b></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                                <tr>
                                  <td><b><small>Approved & Rated By</small></b></td>
                                  <td><b>OJT-Supervisor / 05-09-2022</b></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                              </tfoot>
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
      </div>

    </div>
  </div>
</div>