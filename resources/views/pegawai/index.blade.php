@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
@include('layouts.core_konten_header')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h2><i class="icon ion-person-stalker"></i> Data Pegawai</h2>
                    <h3 class="card-title">Ini merupakan halaman data pegawai.</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pegawai</th>
                                <th>Alamat Pegawai</th>
                                <th>Jabatan</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $pegawai)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$pegawai->user->nama}}</td>
                                <td>{{$pegawai->alamatpegawai}}</td>
                                <td>{{$pegawai->akses->namaakses}}</td>
                                <td>{{$pegawai->user->email}}</td>
                                <td>{{$pegawai->telppegawai}}</td>
                                @if($pegawai->statpegawai==1)
                                <td><span class="badge badge-success">{{"Aktif"}}</span></td>
                                @else
                                <td><span class="badge badge-danger">{{"Non Aktif"}}</span></td>
                                @endif
                                <td>
                                    <button
                                        onclick="location.href='/pegawai/{{base64_encode($pegawai->fk_iduser)}}/edit'"
                                        type="button" class="rounded-pill btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i>
                                        Edit</button>
                                    <form action="/pegawai/{{ $pegawai->fk_iduser }}" method="post" class="d-inline"
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
</div>
<!-- /.content-wrapper -->
<!-- BASIC MODAL -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pegawai" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" class="form-control @error('namapegawai') is-invalid @enderror"
                                    id="namapegawai" name="namapegawai" placeholder="masukkan nama pegawai"
                                    value="{{old('namapegawai')}}">
                                @error('namapegawai')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Pegawai</label>
                                <textarea class="form-control @error('alamatpegawai') is-invalid @enderror"
                                    id="alamatpegawai" name="alamatpegawai"
                                    placeholder="masukkan alamat pegawai">{{old('alamatpegawai')}}</textarea>
                                @error('alamatpegawai')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hak Akses</label>
                                <select class="form-control select2 @error('aksespegawai') is-invalid @enderror"
                                    name="aksespegawai" style="width:100%;">
                                    <option value="">Pilih Hak Akses</option>
                                    @foreach($akses as $akses)
                                    @if (old('aksespegawai') === $akses->id)
                                    <option value="{{$akses->id}}" selected>{{$akses->namaakses}}</option>
                                    @else
                                    <option value="{{$akses->id}}">{{$akses->namaakses}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('aksespegawai')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Profil</label>
                                <input type="file" name="imgupload" id="imgupload"
                                    class="form-control @error('imgupload') is-invalid @enderror">
                                @error('imgupload')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Pegawai</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="masukkan email pegawai"
                                        value="{{old('email')}}" autocomplete="off">
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telepon</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control @error('telppegawai') is-invalid @enderror"
                                        id="telppegawai" name="telppegawai" value="{{old('telppegawai')}}"
                                        placeholder="masukkan nomor telepon">
                                    @error('telppegawai')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" class="@error('jkpegawai') is-invalid @enderror"
                                            id="radioPrimary1" name="jkpegawai" value="L" checked>
                                        <label for="radioPrimary1">Laki Laki</label>
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        <input type="radio" class="@error('jkpegawai') is-invalid @enderror"
                                            id="radioPrimary2" name="jkpegawai" value="P">
                                        <label for="radioPrimary2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    @endsection