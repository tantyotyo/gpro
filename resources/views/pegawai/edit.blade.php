@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="icon ion-person-stalker"></i> Data Pegawai</h1>
                <h3 class="card-title">Ini merupakan halaman untuk mengubah data pegawai.</h3>
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white"
                        style="background: url('{{asset('AdminLTE-3.2.0/dist/img/photo1.png')}}') center center;">
                        <h3 class="widget-user-username text-right">{{$pegawai->user->nama}}</h3>
                        <h5 class="widget-user-desc text-right">{{$pegawai->akses->namaakses}}</h5>
                    </div>
                    <div class="widget-user-image">
                        @if($pegawai->user->image != null)
                        @if(file_exists(public_path('storage/image/'.$pegawai->user->image)))
                        <img class="img-circle" src="{{asset('storage/image/'.$pegawai->user->image)}}"
                            alt="User Avatar">
                        @else
                        <img class="img-circle" src="{{asset('storage/image/default-150x150.png')}}" alt="User Image">
                        @endif
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">kosong</h5>
                                    <span class="description-text">kosong</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">kosong</h5>
                                    <span class="description-text">kosong</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">kosong</h5>
                                    <span class="description-text">kosong</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <a href="#" class="btn btn-danger btn-block"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b>Log
                            Out</b></a>
                    <form id="logout-form" action="#" method="POST" style="display: none;">@csrf
                    </form>
                </div>
                <!-- /.card -->
                <!-- About Me Box -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Tentang Saya</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                        <p class="text-muted">{{$pegawai->alamatpegawai}}</p>
                        <hr>
                        <strong><i class="fas fa-phone mr-1"></i> No. Telepon</strong>
                        <p class="text-muted">
                            {{$pegawai->telppegawai}}
                        </p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                            </li>
                            <li class="nav-item"><a class="nav-link active" href="#editdata" data-toggle="tab">Edit
                                    Data</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                            src="{{asset('storage/image/'.$pegawai->user->image)}}" alt="user image">
                                        <span class="username">
                                            <a href="#">{{$pegawai->user->nama}}</a>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                        </span>
                                        <span class="description">Shared publicly - 7:30 PM today</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore the hate as they create awesome
                                        tools to help create filler text for everyone from bacon lovers
                                        to Charlie Sheen fans.
                                    </p>
                                    <p>
                                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i>
                                            Share</a>
                                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i>
                                            Like</a>
                                        <span class="float-right">
                                            <a href="#" class="link-black text-sm">
                                                <i class="far fa-comments mr-1"></i> Comments (5)
                                            </a>
                                        </span>
                                    </p>
                                    <input class="form-control form-control-sm" type="text"
                                        placeholder="Type a comment">
                                </div>
                                <!-- /.post -->
                                <!-- Post -->
                                <div class="post clearfix">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm"
                                            src="{{asset('storage/image/'.$pegawai->user->image)}}" alt="User Image">
                                        <span class="username">
                                            <a href="#">{{$pegawai->user->nama}}</a>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                        </span>
                                        <span class="description">Sent you a message - 3 days ago</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        Lorem ipsum represents a long-held tradition for designers,
                                        typographers and the like. Some people hate it and argue for
                                        its demise, but others ignore the hate as they create awesome
                                        tools to help create filler text for everyone from bacon lovers
                                        to Charlie Sheen fans.
                                    </p>
                                    <form class="form-horizontal">
                                        <div class="input-group input-group-sm mb-0">
                                            <input class="form-control form-control-sm" placeholder="Response">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-danger">Send</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.post -->

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="settings">
                                <form action="/profile/{{base64_encode($pegawai->fk_iduser)}}" method="post"
                                    class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input type="text"
                                                class="form-control @error('namaBaru') is-invalid @enderror"
                                                id="inputName" name="namaBaru" placeholder="masukkan nama baru"
                                                value="{{old('namaBaru')}}">
                                            @error('namaBaru')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-7">
                                            <input type="email"
                                                class="form-control @error('emailBaru') is-invalid @enderror"
                                                id="inputEmail" name="emailBaru" placeholder="masukkan email baru"
                                                value="{{old('emailBaru')}}">
                                            @error('emailBaru')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-3">
                                            <input type="text"
                                                class="form-control @error('passwordBaru') is-invalid @enderror"
                                                id="inputName2" name="passwordBaru" placeholder="masukkan password baru"
                                                value="{{old('passwordBaru')}}">
                                            @error('passwordBaru')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="custom-file col-sm-4">
                                            <input type="file" class="custom-file-input" name="imgupload"
                                                id="customFile">
                                            <label class="custom-file-label" for="customFile">Pilih file</label>
                                            @error('imgupload')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit"
                                                class="btn btn-primary swalDefaultSuccess">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="active tab-pane" id="editdata">
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
                                                        id="namapegawai" name="namapegawai"
                                                        value="{{$pegawai->user->nama}}"
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
                                                    <textarea
                                                        class="form-control @error('alamatpegawai') is-invalid @enderror"
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
                                                    <select
                                                        class="form-control select2 @error('aksespegawai') is-invalid @enderror"
                                                        id="aksespegawai" name="aksespegawai" style="width:100%">
                                                        <option value="">Pilih Hak Akses</option>
                                                        @foreach($akses as $akses)
                                                        <option value="{{$akses->id}}" @if ($akses->id ===
                                                            $pegawai->fk_idakses) selected
                                                            @endif>{{$akses->namaakses}}
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
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-envelope"></i></span>
                                                        </div>
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" name="email" placeholder="masukkan email pegawai"
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
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-phone"></i></span>
                                                        </div>
                                                        <input type="text"
                                                            class="form-control @error('telppegawai') is-invalid @enderror"
                                                            id="telppegawai" name="telppegawai"
                                                            value="{{$pegawai->telppegawai}}"
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
                                                            <input type="radio" name="jkpegawai" id="radioPrimary1"
                                                                value="L" @if($pegawai->jkpegawai ==
                                                            'L') checked @endif>
                                                            <label for="radioPrimary1">Laki Laki</label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" name="jkpegawai" id="radioPrimary2"
                                                                value="P" @if($pegawai->jkpegawai ==
                                                            'P') checked @endif>
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
                                                            <input type="radio" name="statpegawai" id="radioPrimary3"
                                                                value="0" @if($pegawai->statpegawai == 0) checked
                                                            @endif>
                                                            <label for="radioPrimary3">Tidak Aktif</label>
                                                        </div>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" name="statpegawai" id="radioPrimary4"
                                                                value="1" @if($pegawai->statpegawai == 1) checked
                                                            @endif>
                                                            <label for="radioPrimary4">Aktif</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fas fa-check-circle"></i>
                                                    Update</button>
                                                <button type="reset" class="btn btn-danger"><i
                                                        class="fas fa-redo-alt"></i>
                                                    Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection