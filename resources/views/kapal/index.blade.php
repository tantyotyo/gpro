@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2><i class="icon fas fa-ship"></i> Data Kapal</h2>
                <h3 class="card-title">Ini merupakan halaman data kapal.</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Kapal</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@include('layouts.notif')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="post" action="/kapal">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Kapal</label>
                                    <input type="text" class="form-control @error('namakapal') is-invalid @enderror"
                                        id="namakapal" name="namakapal" placeholder="masukkan nama kapal"
                                        value="{{old('namakapal')}}" autocomplete="off">
                                    @error('namakapal')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tahun Pembuatan</label>
                                    <input type="number"
                                        class="form-control @error('tahunpembuatan') is-invalid @enderror"
                                        id="tahunpembuatan" name="tahunpembuatan" value="{{old('tahunpembuatan')}}"
                                        placeholder="Tahun Pembuatan Kapal">
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
                                        wire:model="idpelayaran" id="idpelayaran" name="idpelayaran"
                                        style="width:100%;">
                                        <option value="">Pilih Pelayaran</option>
                                        @foreach($pelayaran as $pelayaran)
                                        <option value="{{$pelayaran->id}}">{{$pelayaran->namapelayaran}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('idpelayaran')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-8">
            <!-- /.card -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Tampil Data</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kapal</th>
                                <th>Pelayaran</th>
                                <th>Tahun Pembuatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kapal as $kapal)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$kapal->namakapal}}</td>
                                <td>{{$kapal->pelayaran->namapelayaran}}</td>
                                <td>{{$kapal->tahunpembuatan}}</td>
                                <td>
                                    <button onclick="location.href='/kapal/{{base64_encode($kapal->id)}}/edit'"
                                        type="button" class="rounded-pill btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i>
                                        Edit</button>
                                    <form action="/kapal/{{ $kapal->id }}" method="post" class="d-inline"
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