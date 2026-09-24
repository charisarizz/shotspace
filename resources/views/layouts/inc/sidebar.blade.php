<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex flex-column align-items-center justify-content-center py-3"
        href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-text mx-3 h5 font-weight-bold mb-0">ShotSpace</div>
        <small class="text-white-50" style="font-size: 11px; text-transform: none; font-weight: normal;">Admin
            Panel</small>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('admin/event*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.event.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Kelola Event</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('pendaftaran*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.pendaftaran.index') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Data Pendaftaran</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('admin/users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.kelola_admin.index') }}">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>Kelola Admin</span>
        </a>
    </li>


    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
