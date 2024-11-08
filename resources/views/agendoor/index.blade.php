@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <button type="button" class="rounded-pill btn btn-primary" data-toggle="modal"
                    data-target="#modal-lg"><i class="fa fa-plus"></i> Tambah Data</button>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Agendoor</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
{{-- @include('layout/notif') --}}
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h2><i class="icon fas fa-users"></i> Data Agendoor</h2>
                    <h3 class="card-title">Ini merupakan halaman data agendoor.</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Agendoor</th>
                                <th>Alamat Agendoor</th>
                                <th>Kota</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agendoor as $agendoor)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$agendoor->namaagen}}</td>
                                <td>{{$agendoor->alamatagen}}</td>
                                <td>{{$agendoor->kota->namakota}}</td>
                                <td>{{$agendoor->telpagen}}</td>
                                <td>{{$agendoor->user->email}}</td>
                                <td>
                                    <button
                                        onclick="location.href='/agendoor/{{base64_encode($agendoor->fk_iduser)}}/edit'"
                                        type="button" class="rounded-pill btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i> Edit</button>
                                    <form action="/agendoor/{{ $agendoor->fk_iduser }}" method="post" class="d-inline"
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
                <form action="/agendoor" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Nama Agen</label>
                                <input type="text" class="form-control @error('namaagen') is-invalid @enderror"
                                    id="namaagen" name="namaagen" placeholder="masukkan nama agendoor"
                                    value="{{old('namaagen')}}" autocomplete="off">
                                @error('namaagen')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- <input type="hidden" id="aksesagen" name="aksesagen" value="{{$akses->idakses}}"> --}}
                    <!-- end coba -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Agen</label>
                                <textarea class="form-control @error('alamatagen') is-invalid @enderror" id="alamatagen"
                                    name="alamatagen" value="{{old('alamatagen')}}"
                                    placeholder="masukkan alamat agendoor">{{old('alamatagen')}}</textarea>
                                @error('alamatagen')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kota Asal</label>
                                <select class="form-control select2 @error('kotaagen') is-invalid @enderror"
                                    name="kotaagen" style="width:100%;">
                                    <option value="">Pilih Kota</option>
                                    @foreach($kota as $kota)
                                    <option value="{{$kota->id}}">{{$kota->namakota}}</option>
                                    @endforeach
                                </select>
                                @error('kotaagen')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Agen</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{old('email')}}"
                                        placeholder="masukkan alamat email">
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
                                    <input type="text" class="form-control @error('telpagen') is-invalid @enderror"
                                        id="telpagen" name="telpagen" value="{{old('telpagen')}}"
                                        placeholder="masukkan nomor telepon">
                                    @error('telpagen')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
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
</div>
<!-- /.modal -->
@endsection