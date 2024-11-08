<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('adminlte/dist/img/LOGO.png')}}" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><b>MyShipment</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="mt-4 mb-4">
            <div class="text-center pb-3">
                <img style="height:150px; width:150px" src="{{asset('storage/image/bacot1.jpg')}}"
                    class="img-circle elevation-2" alt="User Image">
                {{-- @if(Auth::user()->src != null)
                @if(file_exists(public_path('storage/image/'.Auth::user()->src)))
                <img style="height:150px; width:150px" src="{{asset('storage/image/'.Auth::user()->src)}}"
                    class="img-circle elevation-2" alt="User Image">
                @else
                <img style="height:150px; width:150px" src="{{asset('storage/image/default-150x150.png')}}"
                    class="img-circle elevation-2" alt="User Image">
                @endif
                @else
                <img style="height:150px; width:150px" src="{{asset('storage/image/default-150x150.png')}}"
                    class="img-circle elevation-2" alt="User Image">
                @endif --}}
            </div>
            <a href="#" class="d-block">
                <h3 class="text-center">{{'Hikari'}}</h3>
                {{-- <h3 class="text-center">{{Auth::user()->name}}</h3> --}}
            </a>
            <p class="text-muted text-center">{{'hikaripp@gmail.com'}}</p>
            {{--
            <p class="text-muted text-center">{{Auth::user()->email}}</p> --}}
        </div>
        <hr>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item"><a href="/" class="nav-link"><i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a></li>
                <li class="nav-header">FEATURES</li>
                <li class="nav-item has-treeview"><a href="#" class="nav-link"><i
                            class="nav-icon fas fa-folder-open"></i>
                        <p>Sub Master<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item"><a href="/akses" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Hak Akses</p>
                            </a></li>
                        <li class="nav-item"><a href="/servis" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Servis</p>
                            </a></li>
                        <li class="nav-item"><a href="/sektor" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Sektor</p>
                            </a></li>
                        <li class="nav-item"><a href="/kota" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Kota</p>
                            </a></li>
                        <li class="nav-item"><a href="/jenis" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Jenis Container</p>
                            </a></li>
                        <li class="nav-item"><a href="/rute" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Rute</p>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview"><a href="#" class="nav-link"><i class="nav-icon fas fa-database"></i>
                        <p>Core Master<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item"><a href="/pegawai" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Pegawai</p>
                            </a></li>
                        <li class="nav-item"><a href="/customer" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Customer</p>
                            </a></li>
                        <li class="nav-item"><a href="/agendoor" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Agendoor</p>
                            </a></li>
                        <li class="nav-item"><a href="/trucking" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Trucking</p>
                            </a></li>
                        <li class="nav-item"><a href="/pelayaran" class="nav-link"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Pelayaran</p>
                            </a></li>
                        <li class="nav-item"><a href="/kapal" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Kapal</p>
                            </a></li>
                        <li class="nav-item"><a href="/jadwal" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Jadwal Kapal</p>
                            </a></li>
                        <li class="nav-item"><a href="/container" class="nav-link"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Container</p>
                            </a></li>
                    </ul>
                </li>
                {{-- <li class="nav-item has-treeview"><a href="#" class="nav-link"><i class="nav-icon fas fa-book"></i>
                        <p>Pemilihan Vendor<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item"><a href="/kriteria" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Kriteria</p>
                            </a></li>
                        <li class="nav-item"><a href="/tender" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Tender Trucking</p>
                            </a></li>
                    </ul>
                </li> --}}
                <li class="nav-item has-treeview"><a href="#" class="nav-link"><i
                            class="nav-icon fas fa-shopping-cart"></i>
                        <p>Transaksi<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item"><a href="/pemesanancontainer" class="nav-link"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Order Harian</p>
                            </a></li>
                        <li class="nav-item"><a href="/pembuatansuratjalan" class="nav-link"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Pembuatan SJ</p>
                            </a></li>
                        <li class="nav-item"><a href="/pengesahansuratjalan" class="nav-link"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Pengesahan SJ</p>
                            </a></li>
                        <li class="nav-item"><a href="/pembuatanberitaacara" class="nav-link"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Pembuatan BA</p>
                            </a></li>
                        <li class="nav-item"><a href="/pendooringancontainer" class="nav-link"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Dooring</p>
                            </a></li>
                    </ul>
                </li>
                <li class="nav-header">EXTRA</li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-envelope"></i>
                        <p>Email</p>
                    </a></li>
                <li class="nav-item has-treeview"><a href="#" class="nav-link"><i
                            class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Laporan<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview ml-4">
                        <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i>
                                <p>Hak Akses</p>
                            </a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>