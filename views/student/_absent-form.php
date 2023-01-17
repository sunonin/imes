<div class="modal fade" id="absentFormModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <form method="POST" action="route/post-absent-form.php" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <h5 class="pb-2 border-bottom mb-4"><span class="tf-icons bx bxs-time"></span> Leave of Absent Form</h5>
          <div class="info-container">

            <div class="col-md-12 mb-4">
              <label for="reason" class="form-label">Reason</label>
              <textarea class="form-control" id="reason" name="reason" rows="5" placeholder="-- Indicate Reasoon --"></textarea>
            </div>


            <div class="col-md-12">
              <label for="formFile" class="form-label">Upload Excuse Letter</label> <small class="text-muted">(<mark> signed document </mark>)</small>

              <input class="form-control" type="file" id="formFile" name="attachment" required>
            </div>

          </div> 

        </div>

        <div class="modal-footer">
          <div class="d-flex justify-content-center pt-3">
              <button type="submit" class="btn btn-info btn-block me-3">Submit</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>