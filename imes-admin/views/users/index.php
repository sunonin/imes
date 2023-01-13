<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Users List</h5>
    <div class="card-tools float-end">
      <a href="user_create.php" class="btn btn-success btn-sm"><span class="tf-icons bx bxs-plus-square"></span> Enroll User</a>
  </div>
  </div>
  <div class="card-body">
    <div class="table-responsive text-nowrap">
      <table id="tb-users" class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>M.I</th>
            <th>Profile</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          <?php if (!empty($users)): ?>
            <?php foreach ($users as $key => $user): ?>
              <tr>
                <td><?= $key+1 ?></td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $user['lname'] ?></strong></td>
                <td><?= $user['fname'] ?></td>
                <td><?= $user['mname'] ?></td>
                <td>
                  <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="<?= $user['fullname'] ?>">
                      <img src="_images/<?= isset($user['avatar_id']) ? $user['avatar_id'] : 'default-avatar.png' ?>" alt="Avatar" class="rounded-circle">
                    </li>
                  </ul>
                </td>
                <td><?= $user['role'] ?></td>
                <td>
                  <?php if ($user['status'] > 0): ?>
                    <span class="badge bg-label-success me-1">Active</span>
                  <?php else: ?>
                    <span class="badge bg-label-primary me-1">Inactive</span>
                  <?php endif ?>
                </td>
                <td>
                  <div>
                    <a href="user_edit.php?id=<?= $user['id'] ?>" type="button" class="btn btn-icon btn-outline-primary btn-sm" title="Edit">
                      <span class="tf-icons bx bx-edit-alt"></span>
                    </a>
                    <button type="button" class="btn btn-icon btn-outline-danger btn-sm" id="btn-delete-user" data-bs-toggle="modal" data-bs-target="#deleteUserModal" data-id="<?= $user['id'] ?>">
                      <span class="tf-icons bx bx-trash"></span>
                    </button>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>
    </div>    
  </div>

</div>