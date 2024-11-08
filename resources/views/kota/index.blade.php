@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
@include('layouts.sub_konten_header')

{{-- @include('layout/notif') --}}

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
                    <form method="post" action="/kota">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Kota</label>
                                    <input type="text" class="form-control @error('namakota') is-invalid @enderror"
                                        id="namakota" name="namakota" placeholder="masukkan nama kota"
                                        value="{{old('namakota')}}" autocomplete="off">
                                    @error('namakota')
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
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kota</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kota as $kota)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$kota->namakota}}</td>
                                <td>
                                    <button onclick="location.href='/kota/{{base64_encode($kota->id)}}/edit'"
                                        type="button" class="rounded-pill btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i> Edit</button>
                                    <form action="/kota/{{ $kota->id }}" method="post" class="d-inline"
                                        onsubmit="return submitForm(this)">
                                        @method('delete')
                                        @csrf
                                        <button class="rounded-pill btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                            Hapus</button>
                                    </form>
                                </td>
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