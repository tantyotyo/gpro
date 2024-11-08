@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <a href="/pelayaran/create" class="rounded-pill btn btn-primary"><i class="fa fa-plus"></i> Tambah
                    Data</a>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Pelayaran</li>
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
                    <h2><i class="icon fas fa-ship"></i> Data Pelayaran</h2>
                    <h3 class="card-title">Ini merupakan halaman tampilan data pelayaran.</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pelayaran</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pelayaran as $pelayaran)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$pelayaran->namapelayaran}}</td>
                                <td>{{$pelayaran->alamatpelayaran}}</td>
                                <td>{{$pelayaran->kota->namakota}}</td>
                                <td>{{$pelayaran->telppelayaran}}</td>
                                <td>
                                    <button onclick="location.href='#'" type="button"
                                        class="rounded-pill btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                                        Edit</button>
                                    <form action="/pelayaran/{{ $pelayaran->id }}" method="post" class="d-inline"
                                        onsubmit="return submitForm(this)">
                                        @method('delete')
                                        @csrf
                                        <button class="rounded-pill btn btn-danger btn-sm"><i class="fa fa-trash"></i>
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
@endsection