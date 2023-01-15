<form id="formAuthentication" class="mb-3" action="route/post-assessment-link.php" method="POST" enctype="multipart/form-data">

  <?php if (empty($lists)): ?>
    <div class="alert alert-danger" role="alert">
      <h6 class="alert-heading fw-bold mb-1">Assessment Link Unknown</h6>
      <span>The link does not exist. Please contact coordinator for technical support</span>
    </div>
  <?php elseif (!$status['is_done']): ?>
    <div class="text-nowrap mb-4">
      <input type="hidden" name="sid" value="<?= $_GET['id'] ?>">
      <input type="hidden" name="cid" value="<?= $_GET['comp'] ?>">

      <div class="row">
        <div class="mb-3 col-md-4">
          <label for="supervisor" class="form-label">Supervisor Name</label>
          <input class="form-control" type="text" value="" id="supervisor" name="supervisor" />
        </div>

        <div class="mb-3 col-md-4">
          <label for="position" class="form-label">Position</label>
          <input class="form-control" type="text" value="" id="position" name="position" />
        </div>
      </div>

      <div class="mb-3 col-12 mb-0">
        <div class="alert alert-info">
          <h6 class="alert-heading fw-bold mb-1">DIRECTION: </h6>
          <ul class="ps-3 mb-0">
            <li class="mb-0">
              Please rate by checking the appropriate column that best describes the performance of the above student trainee.
            </li>
              
            <li class="mb-0">Please use the ratings as follows: Five (5) being the highest and one (1) the lowest</li>
          </ul>
        </div>
      </div>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">Criteria</th>
            <th class="text-center">5</th>
            <th class="text-center">4</th>
            <th class="text-center">3</th>
            <th class="text-center">2</th>
            <th class="text-center">1</th>
          </tr>
        </thead>
        <tbody id="tbody-appraisal">
          <tr style="background-color: lightslategray; color: white;">
            <td colspan="6"><b>ATTENDANCE & PUNCTUALITY</b></td>
          </tr>
          <?php foreach ($appriasal_criterias[1] as $key => $criteria): ?>
            <tr>
              <td><?= $criteria['order'] ?>. <?= $criteria['name'] ?></td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaOne[1][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="5" data-rate="5" id="rate<?= $criteria['id'] ?> required">
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaOne[1][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="4" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaOne[1][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="3" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaOne[1][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="2" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaOne[1][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="1" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
          <tr style="background-color: lightslategray; color: white;">
            <td colspan="6"><b>PERFORMANCE</b></td>
          </tr>
          <?php foreach ($appriasal_criterias[2] as $key => $criteria): ?>
            <tr>
              <td><?= $criteria['order'] ?>. <?= $criteria['name'] ?></td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaTwo[2][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="5" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaTwo[2][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="4" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaTwo[2][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="3" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaTwo[2][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="2" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaTwo[2][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="1" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
          <tr style="background-color: lightslategray; color: white;">
            <td colspan="6"><b>GENERAL ATTITUDE</b></td>
          </tr>
          <?php foreach ($appriasal_criterias[3] as $key => $criteria): ?>
            <tr>
              <td><?= $criteria['order'] ?>. <?= $criteria['name'] ?></td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaThree[3][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="5" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaThree[3][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="4" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaThree[3][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="3" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaThree[3][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="2" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
              <td class="text-center">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="rate<?= $criteria['id'] ?>">
                    <input name="criteriaThree[3][<?= $criteria['id'] ?>]" class="form-check-input" type="radio" value="1" id="rate<?= $criteria['id'] ?>" required>
                  </label>
                </div>
              </td>
            </tr>
          <?php endforeach ?>

          <tr>
            <td style="text-align: right;"><b>TOTAL POINTS:</b></td>
            <td colspan="5"><input class="form-control" type="text" id="finalRate" name="finalRate" value="" placeholder="" readonly=""></td>
          </tr>


          <tr style="background-color: lightslategray; color: white;">
            <td colspan="6"><b>COMMENT/SUGGESTIONS</b></td>
          </tr>
          <?php foreach ($appriasal_criterias[4] as $key => $criteria): ?>
            <tr>
              <td colspan="6">&nbsp;
                <textarea class="form-control" id="comment" name="comment" rows="5" placeholder="-- Please input your Comment/Suggestions --" required></textarea>&nbsp;
              </td>
            </tr>
          <?php endforeach ?>

        </tbody>
      </table>
    </div>

    <div class="mb-5 col-12">
      <div class="alert alert-warning">
        <h6 class="alert-heading fw-bold mb-1">Please read carefully: </h6><br>
        <p class="text-center">
          I hereby approved that all submitted documents are correct and true. Therefore the student can now proceed and be accepted to On-the-Job (OJT) Training Program.
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-md">
              <i class="bx bxs-check-square d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Submit</span>
            </button>
          </div>
      </div>
    </div>  
  <?php else: ?>
    <div class="alert alert-warning" role="alert">
      <h6 class="alert-heading fw-bold mb-1">Assessment Link Expired</h6>
      <span>The link has been assessed already.</span>
    </div>
  <?php endif ?>
  
  
</form>