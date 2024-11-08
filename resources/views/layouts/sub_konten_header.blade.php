<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if(Request::is('akses'))
                <h2><i class="fas fa-user-cog"></i> Data Akses</h2>
                <h3 class="card-title">Ini merupakan halaman data hak akses user.</h3>
                @elseif(Request::is('servis'))
                <h2><i class="fas fa-poll"></i> Data Servis</h2>
                <h3 class="card-title">Ini merupakan halaman data servis.</h3>
                @elseif(Request::is('sektor'))
                <h2><i class="fas fa-map-marked-alt"></i> Data Sektor</h2>
                <h3 class="card-title">Ini merupakan halaman data sektor.</h3>
                @elseif(Request::is('kota'))
                <h2><i class="fas fa-city"></i> Data Kota</h2>
                <h3 class="card-title">Ini merupakan halaman data kota.</h3>
                @elseif(Request::is('jenis'))
                <h2><i class="fas fa-box"></i> Data Jenis Container</h2>
                <h3 class="card-title">Ini merupakan halaman data jenis container.</h3>
                @elseif(Request::is('rute'))
                <h2><i class="fas fa-route"></i> Data Rute</h2>
                <h3 class="card-title">Ini merupakan halaman data rute.</h3>
                @endif
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    @if(Request::is('akses'))
                    <li class="breadcrumb-item active">Data Akses</li>
                    @elseif(Request::is('servis'))
                    <li class="breadcrumb-item active">Data Servis</li>
                    @elseif(Request::is('sektor'))
                    <li class="breadcrumb-item active">Data Sektor</li>
                    @elseif(Request::is('kota'))
                    <li class="breadcrumb-item active">Data Kota</li>
                    @elseif(Request::is('jenis'))
                    <li class="breadcrumb-item active">Data Jenis Container</li>
                    @elseif(Request::is('rute'))
                    <li class="breadcrumb-item active">Data Rute</li>
                    @endif
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@include('layouts.notif')