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
                    <li class="breadcrumb-item active">Data Jadwal Kapal</li>
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
                    <h2><i class="fas fa-clipboard-list"></i> Data Jadwal Kapal</h2>
                    <h3 class="card-title">Ini merupakan halaman data jadwal kapal.</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id Jadwal</th>
                                <th>Kapal</th>
                                <th>Rute</th>
                                <th>ETD</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal as $jadwal)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$jadwal->id}}</td>
                                <td>{{$jadwal->kapal->namakapal}} Voy. {{$jadwal->voyage}}</td>
                                <td>{{$jadwal->rute->namarute}}</td>
                                <td>{{date('d-m-Y', strtotime($jadwal->etd))}}</td>
                                <td>
                                    <button onclick="location.href='/jadwal/{{base64_encode($jadwal->id)}}/edit'"
                                        type="button" class="rounded-pill btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i>
                                        Edit</button>
                                    <form action="/jadwal/{{ $jadwal->id }}" method="post" class="d-inline"
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
                <form action="/jadwal" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Nama Kapal</label>
                                <select wire:model="idkapal"
                                    class="form-control select2 @error('idkapal') is-invalid @enderror" id="idkapal"
                                    name="idkapal" style="width:100%;">
                                    <option value="">Pilih Nama Kapal</option>
                                    @foreach($kapal as $kapal)
                                    <option value="{{$kapal->id}}">{{$kapal->namakapal}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('idkapal')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Voyage</label>
                                <input type="text" wire:model="voyage"
                                    class="form-control @error('voyage') is-invalid @enderror" id="voyage" name="voyage"
                                    placeholder="voyage" value="{{old('voyage')}}">
                                @error('voyage')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Rute</label>
                                <select wire:model="idrute"
                                    class="form-control select2 @error('idrute') is-invalid @enderror" id="idrute"
                                    name="idrute" style="width:100%;">
                                    <option value="">Pilih Rute</option>
                                    @foreach($rute as $rute)
                                    <option value="{{$rute->id}}">{{$rute->namarute}}</option>
                                    @endforeach
                                </select>
                                @error('idrute')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>ETD Kapal</label>
                                <input type="date" wire:model="etd"
                                    class="form-control @error('etd') is-invalid @enderror" id="etd" name="etd"
                                    placeholder="etd kapal">
                                @error('etd')
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