@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="icon fas fa-ship"></i> Edit Data Kapal</h1>
                <h3 class="card-title">Ini merupakan halaman untuk mengedit data kapal.</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/kapal">Data Kapal</a></li>
                    <li class="breadcrumb-item active">Edit Data Kapal</li>
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
                    <form action="/kapal/{{base64_encode($kapal->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Kapal</label>
                                        <input type="text" class="form-control @error('namakapal') is-invalid @enderror"
                                            id="namakapal" name="namakapal" placeholder="masukkan nama kapal"
                                            value="{{$kapal->namakapal}}">
                                        @error('namakapal')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tahun Pembuatan</label>
                                        <input type="text"
                                            class="form-control @error('tahunpembuatan') is-invalid @enderror"
                                            id="tahunpembuatan" name="tahunpembuatan"
                                            placeholder="Tahun Pembuatan Kapal" value="{{$kapal->tahunpembuatan}}">
                                        @error('tahunpembuatan')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pelayaran</label>
                                        <select class="form-control select2 @error('idpelayaran') is-invalid @enderror"
                                            id="idpelayaran" name="idpelayaran">
                                            <option value="">Pilih Pelayaran</option>
                                            @foreach($pelayaran as $pelayaran)
                                            <option value="{{$pelayaran->id}}" @if ($pelayaran->id ===
                                                $kapal->fk_idpelayaran) selected @endif>
                                                {{$pelayaran->namapelayaran}}</option>
                                            @endforeach
                                        </select>
                                        @error('idpelayaran')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i>
                                        Update</button>
                                    <button type="reset" class="btn btn-danger"><i class="fas fa-redo-alt"></i>
                                        Reset</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
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