<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/Logo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PT. Global Logistic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('AdminLTE-3.2.0/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Yuki Yoshi Hikari</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">FEATURES</li>
                <li
                    class="nav-item {{ Request::is('akses','servis','sektor','kota','jenis','rute') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('akses','servis','sektor','kota','jenis','rute') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Sub Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/akses" class="nav-link {{ Request::is('akses') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hak Akses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/servis" class="nav-link {{ Request::is('servis') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Servis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sektor" class="nav-link {{ Request::is('sektor') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sektor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kota" class="nav-link {{ Request::is('kota') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kota</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/jenis" class="nav-link {{ Request::is('jenis') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jenis Container</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/rute" class="nav-link {{ Request::is('rute') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rute</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ Request::is('pegawai','customer','agendoor','trucking','pelayaran','kapal','jadwalkapal','container') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('pegawai','customer','agendoor','trucking','pelayaran','kapal','jadwalkapal','container') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-server"></i>
                        <p>
                            Core Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/pegawai" class="nav-link {{ Request::is('pegawai') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/customer" class="nav-link {{ Request::is('customer') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/agendoor" class="nav-link {{ Request::is('agendoor') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Agendoor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/trucking" class="nav-link {{ Request::is('trucking') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trucking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pelayaran" class="nav-link {{ Request::is('pelayaran') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pelayaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kapal" class="nav-link {{ Request::is('kapal') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kapal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/jadwal" class="nav-link {{ Request::is('jadwalkapal') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jadwal Kapal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/container" class="nav-link {{ Request::is('container') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Container</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item {{ Request::is('penjualan','pengiriman','pemesanan','penerimaan') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::is('penjualan','pengiriman','pemesanan','penerimaan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penjualan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengiriman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pemesanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penerimaan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">EXTRA</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Mailbox
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/read-mail.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Read</p>
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
{{--
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside> --}}
<!-- /.control-sidebar -->