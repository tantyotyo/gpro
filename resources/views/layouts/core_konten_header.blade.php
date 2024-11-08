<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <button type="submit" class="rounded-pill btn btn-primary" data-toggle="modal"
                    data-target="#modal-lg"><i class="fas fa-plus"></i> Tambah Data</button>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    @if(Request::is('pegawai'))
                    <li class="breadcrumb-item active">Data Pegawai</li>
                    @elseif(Request::is('customer'))
                    <li class="breadcrumb-item active">Data Customer</li>
                    @elseif(Request::is('agendoor'))
                    <li class="breadcrumb-item active">Data Agendoor</li>
                    @elseif(Request::is('trucking'))
                    <li class="breadcrumb-item active">Data Trucking</li>
                    @elseif(Request::is('pelayaran'))
                    <li class="breadcrumb-item active">Data Pelayaran</li>
                    @elseif(Request::is('kapal'))
                    <li class="breadcrumb-item active">Data Kapal</li>
                    @elseif(Request::is('jadwalkapal'))
                    <li class="breadcrumb-item active">Data Jadwal Kapal</li>
                    @elseif(Request::is('container'))
                    <li class="breadcrumb-item active">Data Container</li>
                    @endif
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>