@extends('layouts.main')
@section('konten')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2><i class="fas fa-user-cog"></i> Data Akses</h2>
                <h3 class="card-title">Ini merupakan halaman untuk mengubah data hak akses.</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/akses">Data Akses</a></li>
                    <li class="breadcrumb-item active">Edit Data Akses</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form action="/akses/{{base64_encode($akses->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Akses</label>
                                        <input type="text" class="form-control @error('namaakses') is-invalid @enderror"
                                            id="namaakses" name="namaakses" placeholder="masukkan nama akses"
                                            value="{{$akses->namaakses}}">
                                        @error('namaakses')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i>
                                        Update</button>
                                    <button type="reset" class="btn btn-danger"><i class="fas fa-redo-alt"></i>
                                        Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection