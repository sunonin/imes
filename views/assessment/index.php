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



      <div class="flex-grow-1 row">
        <div class="col-5 mb-sm-0 mb-2">
          <div class="mb-3">
            <label for="formFile" class="form-label">Appraisal Form</label> <small class="text-muted">(<mark> signed document </mark>)</small>

              <input class="form-control" type="file" id="formFile" name="attachment">
          </div>
        </div>
      </div>
      <br>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">Trainee</th>
            <th class="text-center">Program</th>
            <th class="text-center">Rate</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($lists as $key => $list): ?>
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $list['fullname'] ?></strong></td>
              <td><?= $list['program'] .' - '.$list['major'] ?></td>
              <td><input class="form-control" type="text" id="rate" name="rate[<?= $key ?>]" value="" placeholder = "Rate"/></td>
            </tr>  
          <?php endforeach ?>
        </tbody>
      </table>
    </div>


      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
              <button type="submit" class="btn btn-primary btn-md">
                <i class="bx bxs-check-square d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Submit</span>
              </button>
              <a href="index.php" class="btn btn-secondary btn-md">
                <i class="bx bxs-check-square d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Cancel</span>
              </a>
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