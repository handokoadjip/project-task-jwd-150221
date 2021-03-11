<?php

$page = isset($_GET['pref']) ? $_GET['pref'] : 'home';

?>

<aside class="main-sidebar elevation-4 sidebar-light-info">
  <!-- Brand-Logo -->
  <a href="#" class="brand-link navbar-light">
    <img src="public_html/vendor/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
    <span class="brand-text font-weight-light">BPPTIK Airport</span>
  </a>
  <!-- End-Brand-Logo -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar-User-Panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="public_html/vendor/adminlte/dist/img/user1-128x128.jpg" class=" img-circle elevation-2" alt="User Image" />
      </div>
      <div class="info">
        <a href="profile.html" class="d-block">Handoko Adji Pangestu</a>
      </div>
    </div>
    <!-- End-Sidebar-User-Panel -->

    <!-- Sidebar-Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="./index.php" class="nav-link <?= $page === 'home' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview <?= $page === 'airline' || $page === 'origin_airport' || $page === 'departure_airport' ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?= $page === 'airline' || $page === 'origin_airport' || $page === 'departure_airport' ? 'active' : ''; ?>">
            <i class="nav-icon fa fa-database"></i>
            <p>
              Master Data
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.php?pref=airline&page=index" class="nav-link <?= $page === 'airline' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Airlines</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index.php?pref=origin_airport&page=index" class="nav-link <?= $page === 'origin_airport' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Origin Airports</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./index.php?pref=departure_airport&page=index" class="nav-link <?= $page === 'departure_airport' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Departure Airports</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview <?= $page === 'flight' ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?= $page === 'flight' ? 'active' : ''; ?>">
            <i class="nav-icon fa fa-plane"></i>
            <p>
              Transaction
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.php?pref=flight&page=index" class="nav-link <?= $page === 'flight' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Flights</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- End-Sidebar-Menu -->
  </div>
  <!-- End-Sidebar -->
</aside>