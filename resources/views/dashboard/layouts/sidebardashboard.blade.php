<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-warning bg-dark" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="/assetsdashboard/img/brand/blue.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                            <i class="fas fa-tachometer-alt text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}"
                            href="/dashboard/posts">
                            <i class="fas fa-pencil-ruler text-primary"></i>
                            {{-- <i class="ni ni-tv-2 text-primary"></i> --}}
                            <span class="nav-link-text">Posts Saya</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/semuaActivityPosts*') ? 'active' : '' }}"
                            href="/dashboard/semuaActivityPosts">
                            <i class="fas fa-pencil-ruler text-primary"></i>
                            {{-- <i class="ni ni-tv-2 text-primary"></i> --}}
                            <span class="nav-link-text">Semua Posts</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/profile*') ? 'active' : '' }}"
                            href="/dashboard/profile">
                            <i class="fas fa-user-circle text-primary"></i>
                            <span class="nav-link-text">Akun Saya</span>
                        </a>
                    </li>
                </ul>
                <hr>
                @can('admin')
                    <h4 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 text-muted">
                        <span>Administrator</span>
                    </h4>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                                href="/dashboard/categories">
                                <i class="fas fa-th-large text-primary"></i>
                                <span class="nav-link-text">Post Kategori</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/dashboard/dataUser*') ? 'active' : '' }}"
                                href="/dashboard/dataUser">
                                <i class="fas fa-th-large text-primary"></i>
                                <span class="nav-link-text">Data Admin</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard/tentang*') ? 'active' : '' }}"
                                href="/dashboard/tentang">
                                <i class="fas fa-user-circle text-primary"></i>
                                <span class="nav-link-text">Tentang</span>
                            </a>
                        </li>
                    </ul>
                @endcan
            </div>
        </div>
    </div>
</nav>
