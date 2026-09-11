<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex flex-column align-items-center justify-content-center py-3"
        href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3 h5 font-weight-bold mb-0">ShotSpace</div>
        <small class="text-white-50" style="font-size: 11px; text-transform: none; font-weight: normal;">Admin
            Panel</small>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Kelola Event -->
    <li class="nav-item {{ Request::is('event*') ? 'active' : '' }}">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Kelola Event</span>
        </a>
    </li>

    <!-- Nav Item - Data Pendaftaran -->
    <li class="nav-item {{ Request::is('pendaftaran*') ? 'active' : '' }}">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Data Pendaftaran</span>
        </a>
    </li>

    <!-- Nav Item - Kelola Admin -->
    <li class="nav-item {{ Request::is('admin*') ? 'active' : '' }}">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>Kelola Admin</span>
        </a>
    </li>

    <!-- Nav Item - Profil -->
    <li class="nav-item {{ Request::is('profil*') ? 'active' : '' }}">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
