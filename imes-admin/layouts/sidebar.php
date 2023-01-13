<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="dashboard.php" class="app-brand-link">
      <span class="app-brand-logo demo">
        <div style="width:55px;">
          <img src="_uploads/official-logo.png" style="width:100%; height: 100%;">
        </div>
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-1" style="text-transform: Uppercase;">IMES</span>
      <span class="app-brand-logo demo">
        <div style="width:55px;">
          <img src="_uploads/official-logo-new.png" style="width:100%; height: 100%;">
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

    <!-- Layouts -->
    <li class="menu-item <?= (isset($menu['users']) || isset($menu['company']) || isset($menu['school']) || isset($menu['departments']) || isset($menu['programs'])) && ($menu['users'] || $menu['company'] || $menu['school'] || $menu['departments'] || $menu['programs']) ? 'active open' : '' ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Layouts">Settings</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item <?= isset($menu['users']) && $menu['users'] ? 'active' : '' ?>">
          <a href="users.php" class="menu-link">
            <i class='menu-icon bx bxs-user-detail'></i>
            <div data-i18n="Analytics">Users</div>
          </a>
        </li>

        <li class="menu-item <?= isset($menu['school']) && $menu['school'] ? 'active' : '' ?>">
          <a href="school.php" class="menu-link">
            <i class='menu-icon bx bxs-school'></i>
            <div data-i18n="Analytics">School Details</div>
          </a>
        </li>

        <li class="menu-item <?= isset($menu['departments']) && $menu['departments'] ? 'active' : '' ?>">
          <a href="departments.php" class="menu-link">
            <i class='menu-icon bx bxs-bank'></i>
            <div data-i18n="Analytics">Departments</div>
          </a>
        </li>

        <li class="menu-item <?= isset($menu['programs']) && $menu['programs'] ? 'active' : '' ?>">
          <a href="programs.php" class="menu-link">
            <i class='menu-icon bx bx-list-plus'></i>
            <div data-i18n="Analytics">Programs</div>
          </a>
        </li>

        <li class="menu-item <?= isset($menu['company']) && $menu['company'] ? 'active' : '' ?>">
          <a href="company.php" class="menu-link">
            <i class='menu-icon bx bxs-buildings'></i>
            <div data-i18n="Analytics">Company</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Dashboard -->
    <li class="menu-item <?= isset($menu['student']) && $menu['student'] ? 'active' : '' ?>">
      <a href="student_activity.php" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-user-detail"></i>
        <div data-i18n="Analytics">Student Activity</div>
      </a>
    </li>

  </ul>
</aside>