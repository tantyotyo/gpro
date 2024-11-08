@extends('layouts.main')
@section('konten')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2><i class="fas fa-route"></i> Data Rute</h2>
                <h3 class="card-title">Ini merupakan halaman untuk mengubah data rute.</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/rute">Data Rute</a></li>
                    <li class="breadcrumb-item active">Edit Data Rute</li>
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
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form action="/rute/{{base64_encode($rute->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Rute</label>
                                        <input type="text" class="form-control @error('namarute') is-invalid @enderror"
                                            id="namarute" name="namarute" value="{{$rute->namarute}}"
                                            placeholder="masukkan nama rute">
                                        @error('namarute')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Port of loading</label>
                                        <select
                                            class="form-control select2 @error('portofloading') is-invalid @enderror"
                                            id="portofloading" name="portofloading">
                                            <option value="">Pilih Port of Loading</option>
                                            @foreach($kota as $kota)
                                            <option value="{{$kota->namakota}}" @if ($kota->namakota ===
                                                $rute->portofloading)
                                                selected @endif>{{$kota->namakota}}</option>
                                            @endforeach
                                        </select>
                                        @error('portofloading')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Port of discharge</label>
                                        <select
                                            class="form-control select2 @error('portofdischarge') is-invalid @enderror"
                                            id="portofdischarge" name="portofdischarge">
                                            <option value="">Pilih Port of Discharge</option>
                                            @foreach($kota2 as $kota2)
                                            <option value="{{$kota2->namakota}}" @if ($kota2->namakota ===
                                                $rute->portofdischarge) selected @endif>
                                                {{$kota2->namakota}}</option>
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
                                        <input type="text"
                                            class="form-control @error('keterangan') is-invalid @enderror"
                                            id="keterangan" name="keterangan" placeholder="masukkan keterangan rute"
                                            value="{{$rute->keterangan}}" autocomplete="off">
                                        @error('keterangan')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i>
                                        Update</button>
                                    <button type="reset" class="btn btn-danger"><i class="fas fa-redo-alt"></i>
                                        Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
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