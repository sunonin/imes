<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="dashboard.php" class="app-brand-link">
      <span class="app-brand-logo demo">
        <div style="width:55px;">
          <img src="../imes-admin/_uploads/official-logo.png" style="width:100%; height: 100%;">
        </div>
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-1" style="text-transform: Uppercase;">IMES</span>
      <span class="app-brand-logo demo">
        <div style="width:55px;">
          <img src="../imes-admin/_uploads/official-logo-new.png" style="width:100%; height: 100%;">
        </div>
      </span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item <?= isset($menu['dashboard']) && $menu['dashboard'] ? 'active' : '' ?>">
      <a href="dashboard.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <li class="menu-item <?= isset($menu['profile']) && $menu['profile'] ? 'active' : '' ?>">
      <a href="profile.php" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-user-detail"></i>
        <div data-i18n="Analytics">Profile</div>
      </a>  
    </li> 

    <?php if ($_SESSION['user']['role_id'] == 4): ?>
      <li class="menu-item <?= isset($menu['pre_ojt_requirements']) && $menu['pre_ojt_requirements'] ? 'active' : '' ?>">
        <a href="pre_ojt_requirements.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-list-plus"></i>
          <div data-i18n="Analytics">Pre OJT Requirements</div>
        </a>
      </li>
    <?php endif ?>

    <li class="menu-item <?= isset($menu['daily_time_record']) && $menu['daily_time_record'] ? 'active' : '' ?>">
      <a href="daily_time_record.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-calendar-check"></i>
        <div data-i18n="Analytics">Daily Time Record</div>
      </a>
    </li>

    <li class="menu-item <?= isset($menu['journal']) && $menu['journal'] ? 'active' : '' ?>">
      <a href="journal.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-task"></i>
        <div data-i18n="Analytics">Journal</div>
      </a>
    </li>

    <?php if ($_SESSION['user']['role_id'] == 4): ?>
      <li class="menu-item <?= isset($menu['post-ojt-requirements']) && $menu['post-ojt-requirements'] ? 'active' : '' ?>">
        <a href="post-ojt-requirements.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-list-check"></i>
          <div data-i18n="Analytics">Post OJT Requirements</div>
        </a>
      </li>
    <?php else: ?>
      <li class="menu-item <?= isset($menu['post-ojt-requirements']) && $menu['post-ojt-requirements'] ? 'active' : '' ?>">
        <a href="post-ojt-requirements.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-list-check"></i>
          <div data-i18n="Analytics">Post OJT</div>
        </a>
      </li>
    <?php endif ?>

  </ul>
</aside>