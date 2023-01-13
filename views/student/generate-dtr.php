<div class="row text-end">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="javascript:void(0);">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Generate My Daily Time Record</li>
    </ol>
  </nav>
</div>

<div class="card mb-3">
  <div class="card-header">
    Filters
  </div>  
  <div class="card-body">
    <form method="POST" action="route/generate-dtr.php">
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="dateFrom" class="form-label">Date From:</label>
          <input class="form-control" type="date" value="" id="dateFrom" name="dateFrom" />
        </div>

        <div class="col-md-6">
          <label for="dateTo" class="form-label">Date To:</label>
          <input class="form-control" type="date" value="" id="dateTo" name="dateTo" />
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="supervisorName" class="form-label">Supervisor's Name:</label>
          <input class="form-control" type="text" value="" id="supervisorName" name="supervisorName" />
        </div>

        <div class="col-md-6">
          <label for="supervisorPosition" class="form-label">Supervisor's Position:</label>
          <input class="form-control" type="text" value="" id="supervisorPosition" name="supervisorPosition" />
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
              <button type="submit" class="btn btn-primary btn-md">
                <i class="bx bxs-check-square d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Generate</span>
              </button>
            </div>
        </div>
      </div>
    </form>
  </div>
</div>

