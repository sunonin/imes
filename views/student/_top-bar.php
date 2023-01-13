<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="user-profile-header-banner" style="max-width: 100%;">
        <img src="assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top" width="100%">
      </div>
      <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto" style="max-width: 100%">
          <img src="../imes-admin/_images/<?= !empty($_SESSION['user']['avatar_id']) ? $_SESSION['user']['avatar_id'] : 'default_avatar.png' ?>" alt="user image" class="d-block ms-sm-4 rounded user-profile-img" height="100" width="100">
        </div>
        <div class="flex-grow-1 mt-3 mt-sm-5">
          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <h4><?= $student['fullname'] ?></h4>
              <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                <li class="list-inline-item fw-semibold">
                  <i class="bx bx-pen"></i> <?= $student['course'] ?>
                </li>
                <li class="list-inline-item fw-semibold">
                  <i class="bx bx-map"></i> <?= $student['present_address'] ?>
                </li>
                <li class="list-inline-item fw-semibold">
                  <i class="bx bx-calendar-alt"></i> <?= $student['birth_date'] ?>
                </li>
              </ul>
            </div>
            <a href="javascript:void(0)" class="btn btn-primary text-nowrap">
              <i class="bx bx-user-check"></i> Connected
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>