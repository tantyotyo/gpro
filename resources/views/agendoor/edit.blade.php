@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="icon fas fa-users"></i> Data Agendoor</h1>
                <h3 class="card-title">Ini merupakan halaman untuk mengubah data agendoor.</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/agendoor">Data Agendoor</a></li>
                    <li class="breadcrumb-item active">Edit Data Agendoor</li>
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
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="/agendoor/{{base64_encode($agendoor->fk_iduser)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Agendoor</label>
                                        <input type="text" class="form-control @error('namaagen') is-invalid @enderror"
                                            id="namaagen" name="namaagen" value="{{$agendoor->user->nama}}"
                                            placeholder="masukkan nama agendoor">
                                        @error('namaagen')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Alamat Agendoor</label>
                                        <textarea class="form-control @error('alamatagen') is-invalid @enderror"
                                            id="alamatagen" name="alamatagen"
                                            placeholder="masukkan alamat agendoor">{{$agendoor->alamatagen}}</textarea>
                                        @error('alamatagen')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kota Asal</label>
                                        <select class="form-control select2 @error('kotaagendoor') is-invalid @enderror"
                                            id="kotaagendoor" name="kotaagendoor" style="width:100%;">
                                            <option value="">Pilih Kota</option>
                                            @foreach($kota as $kota)
                                            <option value="{{$kota->id}}" @if ($kota->id ===
                                                $agendoor->kota->id) selected @endif>{{$kota->namakota}}</option>
                                            @endforeach
                                        </select>
                                        @error('kotaagendoor')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email Agendoor</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" value="{{$agendoor->user->email}}"
                                                placeholder="masukkan alamat email">
                                            @error('email')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <input type="text" class="form-control @error('telpagen') is-invalid @enderror"
                                            id="telpagen" name="telpagen" value="{{$agendoor->telpagen}}"
                                            placeholder="masukkan nomor telepon">
                                        @error('telpagen')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
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
                        </form>
                    </div>
                    <!-- form start -->
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