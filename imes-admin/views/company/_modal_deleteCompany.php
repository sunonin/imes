<div class="modal fade" id="deleteCompanyModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <form method="POST" action="route/delete_company.php">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <input type="hidden" name="comp_id" value="">

          <div class="row">
            <div class="col mb-3">
              <span class="tf-icons bx bxs-trash" style="font-size: 4.15rem; color: red;"></span>
            </div>
          </div>

          <div class="row">
            <div class="col mb-3">
              <p style="font-size: 1.3rem;"><b>Are you sure?</b></p>
              <p>Do you really want to delete this company? This process cannot be undone.</p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No
          </button>
          <button type="submit" class="btn btn-danger"><i class='bx bxs-check-circle'></i> Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>