<div class="card">
    <h5 class="card-header"><i class='bx bxs-hourglass-bottom' ></i> Daily Time Record</h5>
    <div class="card-body">
      <input type="hidden" id="dtrId" name="dtrId" value="<?= $_GET['dtr'] ?>">

      <div class="col-md-12"> 

        <div class="row mb-3">
          <div class="col-md-4">
              <div class="d-flex border-primary p-2 border rounded mb-4">
                <div class="">
                  <i class="bx bx-calendar-check" style="font-size: 45px;"></i>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <p class="mb-0"><?= $dtr['dateFormat'] ?></p>
                    <a href="#" class="small" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">Philippine Standard Time</a>
                  </div>
                  <div class="user-progress">
                    <div class="d-flex justify-content-center">
                      <h3 class="fw-bold mb-0 timer"></h3>
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-4">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>Time In</td>
                  <td>
                    <input type="hidden" name="timeInRaw" value="<?= $dtr['timeInRaw'] ?>">
                    <?= $dtr['timeInFormat'] ?>    
                  </td>
                </tr>
                <tr>
                  <td>Time Out</td>
                  <td>
                    <?php if ($dtr['timeOutFormat'] == ""): ?>
                      <div class="button-wrapper">
                        <button type="button" id="timeOutAction" class="btn btn-primary btn me-2"><i class='bx bxs-check-circle'></i> <span class="customTimer"></span></button>
                      </div>
                    <?php else: ?>
                      <?= $dtr['timeOutFormat'] ?>
                    <?php endif ?>

                  </td>
                </tr>
                <tr>
                  <td>Hours</td>
                  <td>
                    <?= $dtr['hours'] ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        
      </div>
    </div>
  </div>
</div>