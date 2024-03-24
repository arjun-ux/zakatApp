<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ZakatApp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (Auth::user()->role =='admin')
                <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-th-large"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{ route('penampung.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                    Penampung
                    </p>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{ route('zakat.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>
                    Zakat
                    </p>
                </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                    Laporan
                    </p>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{ route('userIndex') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Users
                </p>
                </a>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penampung.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Penampung</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('zakat.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Zakat</p>
                    </a>
                </li>
            @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
