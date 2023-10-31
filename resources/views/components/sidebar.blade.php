<div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
            <img src="{{ asset('assets/template') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
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
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                                {{-- <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Master Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview bg-gray">
                            <li class="nav-item">
                                <a href="{{ route('data-user') }}" class="nav-link text-white">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Pengguna</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('klasifikasi') }}" class="nav-link text-white">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Klasifikasi Surat</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p>
                                Persuratan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview bg-gray bg-gray">
                            <li class="nav-item">
                                <a href="{{ route('surat-masuk') }}" class="nav-link text-white text-white">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Surat Masuk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('surat-keluar') }}" class="nav-link text-white">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Surat Keluar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview bg-gray">
                            <li class="nav-item">
                                <a href="{{ route('laporan-surat-masuk') }}" class="nav-link text-white">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Surat Masuk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('laporan-surat-keluar') }}" class="nav-link text-white">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Surat Keluar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Pengaturan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview bg-gray">
                            <li class="nav-item">
                                <a href="{{ route('role') }}" class="nav-link text-white">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('permission') }}" class="nav-link text-white">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permission</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</div>
