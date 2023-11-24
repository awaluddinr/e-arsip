<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link my-auto">
            <i class="fa fa-envelope brand-image img-circle" style="margin-top: 8.5px; margin-left: 18px"></i>
            {{-- <img src="{{ asset('assets/template') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
            <span class="brand-text font-weight-light">E-Arsip</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <!-- SidebarSearch Form -->
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                                {{-- <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>
                    </li>
                    @can('master-data (menu-utama)')
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->routeIs(['data-user', 'data-user.create', 'data-user.edit', 'klasifikasi']) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Master Data
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview bg-gray-dark">
                                @can('data-user (sub-menu)')
                                    <li class="nav-item">
                                        <a href="{{ route('data-user') }}"
                                            class="nav-link text-white {{ request()->routeIs(['data-user', 'data-user.create', 'data-user.edit']) ? 'active' : '' }}">
                                            <i
                                                class="{{ request()->routeIs(['data-user', 'data-user.create', 'data-user.edit']) ? ' fa fa-circle' : 'far fa-circle' }} nav-icon"></i>
                                            <p>Data User</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('klasifikasi-surat (sub-menu)')
                                    <li class="nav-item">
                                        <a href="{{ route('klasifikasi') }}"
                                            class="nav-link text-white {{ request()->routeIs('klasifikasi') ? 'active' : '' }}">
                                            <i
                                                class="{{ request()->routeIs('klasifikasi') ? ' fa fa-circle' : 'far fa-circle' }} nav-icon"></i>
                                            <p>Klasifikasi Surat</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('persuratan (menu-utama)')
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->routeIs(['surat-masuk', 'surat-masuk.create', 'surat-masuk.detail', 'surat-masuk.edit', 'surat-keluar', 'surat-keluar.create', 'surat-keluar.detail', 'surat-keluar.edit']) ? 'active' : '' }}">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>
                                    Persuratan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview bg-gray-dark bg-gray-dark">
                                @can('surat-masuk (sub-menu)')
                                    <li class="nav-item">
                                        <a href="{{ route('surat-masuk') }}"
                                            class="nav-link text-white {{ request()->routeIs(['surat-masuk', 'surat-masuk.create', 'surat-masuk.detail', 'surat-masuk.edit']) ? 'active' : '' }}">
                                            <i
                                                class="{{ request()->routeIs(['surat-masuk', 'surat-masuk.create', 'surat-masuk.detail', 'surat-masuk.edit']) ? ' fa fa-circle' : 'far fa-circle' }} nav-icon"></i>
                                            <p>Surat Masuk</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('surat-keluar (sub-menu)')
                                    <li class="nav-item">
                                        <a href="{{ route('surat-keluar') }}"
                                            class="nav-link text-white {{ request()->routeIs(['surat-keluar', 'surat-keluar.create', 'surat-keluar.detail', 'surat-keluar.edit']) ? 'active' : '' }}">
                                            <i
                                                class="{{ request()->routeIs(['surat-keluar', 'surat-keluar.create', 'surat-keluar.detail', 'surat-keluar.edit']) ? ' fa fa-circle' : 'far fa-circle' }} nav-icon"></i>
                                            <p>Surat Keluar</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('laporan (menu-utama)')
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->routeIs(['laporan-surat-masuk', 'laporan-surat-keluar']) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Laporan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview bg-gray-dark">
                                @can('laporan-surat-masuk (sub-menu)')
                                    <li class="nav-item">
                                        <a href="{{ route('laporan-surat-masuk') }}"
                                            class="nav-link text-white {{ request()->routeIs('laporan-surat-masuk') ? 'active' : '' }}">
                                            <i
                                                class="{{ request()->routeIs('laporan-surat-masuk') ? ' fa fa-circle' : 'far fa-circle' }} nav-icon"></i>
                                            <p>Surat Masuk</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('laporan-surat-keluar (sub-menu)')
                                    <li class="nav-item">
                                        <a href="{{ route('laporan-surat-keluar') }}"
                                            class="nav-link text-white {{ request()->routeIs('laporan-surat-keluar') ? 'active' : '' }}">
                                            <i
                                                class="{{ request()->routeIs('laporan-surat-keluar') ? ' fa fa-circle' : 'far fa-circle' }} nav-icon"></i>
                                            <p>Surat Keluar</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('pengaturan (menu-utama)')
                        <li class="nav-item">
                            <a href="#"
                                class="nav-link {{ request()->routeIs(['role', 'role.create', 'permission']) ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Pengaturan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview bg-gray-dark">
                                @can('role (sub-menu)')
                                    <li class="nav-item">
                                        <a href="{{ route('role') }}"
                                            class="nav-link text-white {{ request()->routeIs(['role', 'role.create']) ? 'active' : '' }}">
                                            <i
                                                class="{{ request()->routeIs(['role', 'role.create']) ? ' fa fa-circle' : 'far fa-circle' }} nav-icon"></i>
                                            <p>Role</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('hak-akses (sub-menu)')
                                    <li class="nav-item">
                                        <a href="{{ route('permission') }}"
                                            class="nav-link text-white {{ request()->routeIs('permission') ? 'active' : '' }}">
                                            <i
                                                class="{{ request()->routeIs('permission') ? ' fa fa-circle' : 'far fa-circle' }} nav-icon"></i>
                                            <p>Hak-Akses</p>
                                        </a>
                                    </li>
                                @endcan

                            </ul>
                        </li>
                    @endcan
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</div>
