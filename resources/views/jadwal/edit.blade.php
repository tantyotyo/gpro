@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="icon fas fa-clipboard-list"></i> Edit Data Jadwal</h1>
                <h3 class="card-title">Ini merupakan halaman untuk mengubah data jadwal kapal.</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/jadwal">Data Jadwal</a></li>
                    <li class="breadcrumb-item active">Edit Data Jadwal</li>
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
                    <form action="/jadwal/{{base64_encode($jadwal->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Nama Kapal</label>
                                        <select class="form-control select2 @error('idkapal') is-invalid @enderror"
                                            id="idkapal" name="idkapal">
                                            <option value="">Pilih Kapal</option>
                                            @foreach($kapal as $kapal)
                                            <option value="{{$kapal->id}}" @if ($kapal->id ===
                                                $jadwal->kapal->id) selected @endif>{{$kapal->namakapal}}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('idkapal')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Voyage</label>
                                        <input type="text" class="form-control @error('voyage') is-invalid @enderror"
                                            id="voyage" name="voyage" placeholder="Voyage" value="{{$jadwal->voyage}}">
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
                                        <select class="form-control select2 @error('idrute') is-invalid @enderror"
                                            id="idrute" name="idrute">
                                            <option value="">Pilih Rute</option>
                                            @foreach($rute as $rute)
                                            <option value="{{$rute->id}}" @if ($rute->id ===
                                                $jadwal->rute->id) selected @endif>{{$rute->namarute}}
                                            </option>
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
                                        <input type="date" class="form-control @error('etd') is-invalid @enderror"
                                            id="etd" name="etd" value="{{$jadwal->etd}}">
                                        @error('etd')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
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
@endsection