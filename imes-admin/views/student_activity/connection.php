<div class="row">
  <div class="col-md-12">
    <div class="row">

      <div class="col-md-3">
        <?php include 'left.php' ?>
      </div>

      <div class="col-md-9">
            <?php include '_nav_tab.php'; ?>

            <div class="card mb-4">
		      <h5 class="card-header">Current Connection</h5>
		      <div class="card-body">
		      	<?php if (isset($companyConnected) && !empty($companyConnected)): ?>
		      		<span class="fw-bold me-2">Company: <?= $companyConnected['compName']; ?></span>
		      		<button type="button" class="btn btn-primary btn-sm companyViewModal" data-bs-toggle="modal" data-bs-target="#companyViewModal" data-id="<?= $companyConnected['id']; ?>"><span class="tf-icons bx bxs-folder-open"></span> View</button>
		      		<button type="button" class="btn btn-danger btn-sm companyRevokeModal" data-bs-toggle="modal" data-bs-target="#companyRevokeModal" data-id="<?= $companyConnected['id']; ?>"><span class="tf-icons bx bx-no-entry"></span> Revoke</button>
		      	<?php else: ?>
			    	<div class="alert alert-warning" role="alert">
		            	<h6 class="alert-heading fw-bold mb-1">Currently not connected to any company</h6>
		            	<span>Please select from the company list below</span>
		        	</div>
		      	<?php endif ?>
		      </div>
		    </div>

            <div class="card mb-4">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="bx bxs-buildings"></i> Registered Company List</h5>
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
                            <th class="text-center" width="15%">Name</th>
                            <th class="text-center" width="45%">Address</th>
                            <th class="text-center" width="10%">Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        	<?php foreach ($companies as $key => $company): ?>
                        		<tr>
                              <td><?= $key+1 ?></td>
                        			<td><?= $company['name']; ?></td>
                        			<td style="word-wrap: break-word;min-width: 175px;max-width: 175px; white-space: normal !important; "><?= $company['address']; ?></td>
                    				<td class="text-center">
		                              <div>
		                                <button type="button" class="btn btn-outline-success btn-sm companyViewModal" data-bs-toggle="modal" data-bs-target="#companyViewModal" data-id="<?= $company['id'] ?>"><span class="tf-icons bx bx-link-alt"></span> Connect</button>
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