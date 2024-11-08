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
                    <form method="post" action="/rute">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Rute</label>
                                    <input type="text" class="form-control @error('namarute') is-invalid @enderror"
                                        id="namarute" name="namarute" placeholder="masukkan nama rute"
                                        value="{{old('namarute')}}" autocomplete="off">
                                    @error('namarute')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Port of Loading</label>
                                    <select class="form-control select2 @error('portofloading') is-invalid @enderror"
                                        id="portofloading" name="portofloading" style="width:100%;">
                                        <option value="">Pilih Port of Loading</option>
                                        @foreach($kota as $kota)
                                        @if (old('portofloading') === $kota->id)
                                        <option value="{{$kota->namakota}}" selected>
                                            {{$kota->namakota}}
                                        </option>
                                        @else
                                        <option value="{{$kota->namakota}}">
                                            {{$kota->namakota}}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('portofloading')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Port of Discharge</label>
                                    <select class="form-control select2 @error('portofdischarge') is-invalid @enderror"
                                        id="portofdischarge" name="portofdischarge" style="width:100%;">
                                        <option value="">Pilih Port of Discharge</option>
                                        @foreach($kota2 as $kota2)
                                        @if (old('portofdischarge') === $kota2->id)
                                        <option value="{{$kota2->namakota}}" selected>
                                            {{$kota2->namakota}}
                                        </option>
                                        @else
                                        <option value="{{$kota2->namakota}}">
                                            {{$kota2->namakota}}
                                        </option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('portofdischarge')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                        id="keterangan" name="keterangan" placeholder="masukkan keterangan rute"
                                        value="{{old('keterangan')}}" autocomplete="off">
                                    @error('keterangan')
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
                                <th>Nama Rute</th>
                                <th>Port of Loading</th>
                                <th>Port of Discharge</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rute as $rute)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$rute->namarute}}</td>
                                <td>{{$rute->portofloading}}</td>
                                <td>{{$rute->portofdischarge}}</td>
                                <td>{{$rute->keterangan}}</td>
                                <td>
                                    <button onclick="location.href='/rute/{{base64_encode($rute->id)}}/edit'"
                                        type="button" class="rounded-pill btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i> Edit</button>
                                    <form action="/rute/{{ $rute->id }}" method="post" class="d-inline"
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