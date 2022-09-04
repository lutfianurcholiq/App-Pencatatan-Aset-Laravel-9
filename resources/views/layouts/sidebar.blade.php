<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('images/logo/logo.png') }}" alt="Logo PenSet" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">PenSet App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-2 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/avatar/man.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
          <p class="text-center text-white mt-1 mb-0 text-uppercase">{{ auth()->user()->role }}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a>
          </li>
          <li class="nav-header">Master Data</li>
          <li class="nav-item">
            <a href="/aset" class="nav-link {{ Request::is('aset*') ? 'active' : '' }}"><i class=" nav-icon far fa-folder"></i> <p> Aset</p></a>
          </li>
          <li class="nav-item">
            <a href="/sekolah" class="nav-link {{ Request::is('sekolah*') ? 'active' : '' }}"><i class="nav-icon fas fa-school"></i> <p>Sekolah</p></a>
          </li>
          <li class="nav-item">
            <a href="/maps" class="nav-link {{ Request::is('maps*') ? 'active' : '' }}"><i class="nav-icon far fa-map"></i> <p>Maps</p></a>
          </li>
          <li class="nav-item">
            <a href="/coa" class="nav-link {{ Request::is('coa*') ? 'active' : '' }}"><i class="nav-icon fas fa-list-ol"></i> <p>Chart of Account</p></a>
          </li>
          {{-- <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link"><i class="nav-icon far fa-clipboard"></i> <p>Gallery</p></a>
          </li> --}}
          <li class="nav-header">Transaction</li>
          <li class="nav-item">
            <a href="/penyusutan" class="nav-link {{ Request::is('penyusutan*') ? 'active' : '' }}"><i class="nav-icon fas fa-calculator"></i> <p>Penyusutan</p></a>
          </li>
          <li class="nav-header">Report</li>
          <li class="nav-item">
            <a href="/" class="nav-link {{ Request::is('profile*') ? 'active' : '' }}"><i class="nav-icon far fa-folder"></i> <p>Laporan Penyusutan</p></a>
          </li>
          <li class="nav-header">Profile</li>
          <li class="nav-item">
            <a href="/profile" class="nav-link {{ Request::is('profile*') ? 'active' : '' }}"><i class="nav-icon far fa-user"></i> <p>Profile</p></a>
          </li>
          <li class="nav-header">Pengaturan</li>
          <li class="nav-item">
            <a href="/activeUser" class="nav-link {{ Request::is('activeUser*') ? 'active' : '' }}"><i class="nav-icon far fa-user-circle"></i> <p>User</p></a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>