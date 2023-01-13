<div class="modal fade" id="companyViewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form method="POST" action="route/post-student-connect.php">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="userId" id="userId" value="<?= $_GET['id']; ?>">
          <input type="hidden" name="compId" id="compId" value="">

          <h5 class="pb-2 border-bottom mb-4">Details</h5>
          <div class="info-container">
            <ul class="list-unstyled">
              <li class="mb-3">
                <span class="fw-bold me-2">Address:</span>
                <span class="companyAddress"></span>
              </li>
              <li class="mb-3">
                <span class="fw-bold me-2">Email:</span>
                <span class="companyEmail"></span>
              </li>
              <li class="mb-3">
                <span class="fw-bold me-2">Status:</span>
                <span class="badge bg-label-success">Active</span>
              </li>
              <li class="mb-3">
                <span class="fw-bold me-2">Type:</span>
                <span class="companyType">Author</span>
              </li>
              <li class="mb-3">
                <span class="fw-bold me-2">Contact:</span>
                <span class="companyPhone"></span>
              </li>
              <li class="mb-3">
                <span class="fw-bold me-2">Country:</span>
                <span>Philippines</span>
              </li>
            </ul>
            <div class="d-flex justify-content-center pt-3">
              <?php if (!isset($companyConnected) || empty($companyConnected)): ?>
                <button type="submit" class="btn btn-primary btn-block me-3">Connect</button>
              <?php endif ?>
            </div>
          </div> 

        </div>

        <div class="modal-footer">
        </div>
      </form>
    </div>
  </div>
</div>