<div class="modal fade" id="companyDetailsModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form method="POST" action="route/post-student-connect.php">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <input type="hidden" name="userId" id="userId" value="<?= $_GET['id']; ?>">
          <input type="hidden" name="compId" id="compId" value="">

          <div class="user-avatar-section">
            <div class=" d-flex align-items-center flex-column">
              <img class="img-fluid rounded my-4" src="../imes-admin/_images/29870-2019-1365-99.jpg" height="200" width="200" alt="User avatar">
              <div class="user-info text-center">
                <h4 class="mb-2 companyName"></h4>
                <span class="badge bg-label-secondary">Company Name</span>
              </div>
            </div>
          </div>
          <br><br>
              
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