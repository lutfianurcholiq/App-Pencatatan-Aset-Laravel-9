<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <h6 data-toggle="dropdown" class="mb-0">Hai, <b>{{ auth()->user()->name }}</b> <img src="{{ asset('images/avatar/man.png') }}" class="mr-4 ml-1" alt="" width="30px"></h6>
        {{-- <a class="nav-link" data-toggle="dropdown" href="#"><i class="far fa-user"></i></a> --}}
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <a href="/profile" class="dropdown-item"><i class="far fa-user"></i> Profile</a>
          <div class="dropdown-divider"></div>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>Logout</button>
          </form>
        </div>
      </li>
    </ul>
</nav>
<!-- /.navbar -->