@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="/trucking/create" class="rounded-pill btn btn-primary"><i class="fa fa-plus"></i> Tambah
                    Data</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Trucking</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@include('layouts.notif')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-truck-moving"></i> Data Trucking</h2>
                    <h3 class="card-title">Ini merupakan halaman data trucking.</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Trucking</th>
                                <th>Alamat Trucking</th>
                                <th>Telepon</th>
                                <th>TOP</th>
                                <th>Armada 20</th>
                                <th>Armada 40</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trucking as $trucking)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$trucking->namatrucking}}</td>
                                <td>{{$trucking->alamattrucking}}</td>
                                <td>{{$trucking->telptrucking}}</td>
                                <td>{{$trucking->toptrucking.' hari'}}</td>
                                <td>{{$trucking->jmlarmada20.' mobil'}}</td>
                                <td>{{$trucking->jmlarmada40.' mobil'}}</td>
                                <td>
                                    <a href="/trucking/{{base64_encode($trucking->id)}}"
                                        class="rounded-pill btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                                    </a>
                                    <button onclick="location.href='#'" type="button"
                                        class="rounded-pill btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                                        Edit</button>
                                    <form action="/trucking/{{ $trucking->fk_iduser }}" method="post" class="d-inline"
                                        onsubmit="return submitForm(this)">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="rounded-pill btn btn-danger btn-sm"><i
                                                class="fa fa-trash"></i>
                                            Hapus</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<!-- /.content-wrapper -->
@endsection