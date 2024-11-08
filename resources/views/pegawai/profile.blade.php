@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="icon ion-person-stalker"></i> Data Pegawai</h1>
                <h3 class="card-title">Ini merupakan halaman untuk mengedit data pegawai.</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/pegawai">Data Pegawai</a></li>
                    <li class="breadcrumb-item active">Edit Data Pegawai</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container"></div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Profile Picture</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-center">
                            @if($pegawai->user->image!=null)
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('storage/image/'.$pegawai->user->image) }}" id="image"
                                onchange="previewImage()" alt="User profile picture">
                            @else
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('AdminLTE-3.2.0/dist/img/user4-128x128.jpg') }}" id="image"
                                alt="User profile picture">
                            @endif
                        </div>
                        <h3 class="text-center">{{$pegawai->user->nama}}</h3>
                        <p class="text-muted text-center">{{$pegawai->user->akses->namaakses}}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/pegawai/{{base64_encode($pegawai->fk_iduser)}}" method="post"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Pegawai</label>
                                        <input type="text"
                                            class="form-control @error('namapegawai') is-invalid @enderror"
                                            id="namapegawai" name="namapegawai" value="{{$pegawai->user->nama}}"
                                            placeholder="masukkan nama pegawai" autocomplete="off">
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
                                            placeholder="masukkan alamat pegawai">{{$pegawai->alamatpegawai}}</textarea>
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
                                            id="aksespegawai" name="aksespegawai" style="width:100%">
                                            <option value="">Pilih Hak Akses</option>
                                            @foreach($akses as $akses)
                                            <option value="{{$akses->idakses}}" @if ($akses->idakses ===
                                                $pegawai->user->fk_idakses) selected @endif>{{$akses->namaakses}}
                                            </option>
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
                                        <input type="file" name="imgupload"
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
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" placeholder="masukkan email pegawai"
                                                value="{{$pegawai->user->email}}" autocomplete="off">
                                            @error('email')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('telppegawai') is-invalid @enderror"
                                                id="telppegawai" name="telppegawai" value="{{$pegawai->telppegawai}}"
                                                placeholder="masukkan telepon pegawai">
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
                                                <input type="radio" name="jkpegawai" id="radioPrimary1" value="L"
                                                    @if($pegawai->jkpegawai == 'L') checked @endif>
                                                <label for="radioPrimary1">Laki Laki</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" name="jkpegawai" id="radioPrimary2" value="P"
                                                    @if($pegawai->jkpegawai == 'P') checked @endif>
                                                <label for="radioPrimary2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status Pegawai</label>
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" name="statpegawai" id="radioPrimary3" value="0"
                                                    @if($pegawai->statpegawai == 0) checked @endif>
                                                <label for="radioPrimary3">Tidak Aktif</label>
                                            </div>
                                            <div class="icheck-primary d-inline">
                                                <input type="radio" name="statpegawai" id="radioPrimary4" value="1"
                                                    @if($pegawai->statpegawai == 1) checked @endif>
                                                <label for="radioPrimary4">Aktif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
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
<!-- /.content-wrapper -->

@endsection