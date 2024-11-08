@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <button type="button" class="rounded-pill btn btn-primary" data-toggle="modal"
                    data-target="#modal-lg"><i class="fas fa-plus"></i> Tambah Data</button>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Container</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@include('layouts.notif')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-box-open"></i> Data Container</h2>
                    <h3 class="card-title">Ini merupakan halaman data container.</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Container</th>
                                <th>Nama Kapal</th>
                                <th>Jenis</th>
                                <th>Seal Pelayaran / GLog</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($container as $container)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$container->id}}</td>
                                <td>{{$container->jadwal->kapal->namakapal}} Voy. {{$container->jadwal->voyage}}
                                </td>
                                @if($container->jenis->namajenis=="PENDEK" ||
                                $container->jenis->namajenis=="pendek")
                                <td>20 FT</td>
                                @elseif($container->jenis->namajenis=="PANJANG" ||
                                $container->jenis->namajenis=="panjang")
                                <td>40 FT</td>
                                @else
                                <td>-</td>
                                @endif
                                <td>{{$container->nosegelpelayaran}} / {{$container->nosegelglobal}}</td>
                                <td>
                                    <button onclick="location.href='/container/{{base64_encode($container->id)}}/edit'"
                                        type="button" class="rounded-pill btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i>
                                        Edit</button>
                                    <form action="/container/{{ $container->id }}" method="post" class="d-inline"
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
                <h4 class="modal-title">Form Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/container" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Container</label>
                                <input type="text" class="form-control @error('nocontainer') is-invalid @enderror"
                                    id="nocontainer" name="nocontainer" value="{{old('nocontainer')}}"
                                    placeholder="masukkan nomor container">
                                @error('nocontainer')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Container</label>
                                <select class="form-control select2 @error('idjenis') is-invalid @enderror" id="idjenis"
                                    name="idjenis">
                                    <option value="">Pilih Jenis Container</option>
                                    @foreach($jenis as $jenis)
                                    <option value="{{$jenis->id}}">{{$jenis->namajenis}}</option>
                                    @endforeach
                                </select>
                                @error('idjenis')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Segel Pelayaran</label>
                                <input type="text" class="form-control @error('nosegelpelayaran') is-invalid @enderror"
                                    id="nosegelpelayaran" name="nosegelpelayaran" placeholder="masukkan segel peleyaran"
                                    value="{{old('nosegelpelayaran')}}">
                                @error('nosegelpelayaran')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Segel Global</label>
                                <input type="text" class="form-control @error('nosegelglobal') is-invalid @enderror"
                                    id="nosegelglobal" name="nosegelglobal" placeholder="masukkan segel global"
                                    value="{{old('nosegelglobal')}}">
                                @error('nosegelglobal')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Jadwal Kapal</label>
                                <select class="form-control select2 @error('idjadwal') is-invalid @enderror"
                                    id="idjadwal" name="idjadwal">
                                    <option value="">Pilih Kapal</option>
                                    @foreach($jadwal as $jadwal)
                                    <option value="{{$jadwal->id}}">
                                        {{ ($jadwal->kapal->namakapal && $jadwal->voyage ) ?
                                        $jadwal->kapal->namakapal.' | Voy.'.$jadwal->voyage.' | ETD:
                                        '.date_format(date_create($jadwal->etd),"d/m/Y") : '$jadwal->voyage' }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('idjadwal')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
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