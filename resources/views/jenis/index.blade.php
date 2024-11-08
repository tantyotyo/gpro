@extends('layouts.main')
@section('konten')
@include('layouts.sub_konten_header')

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
                    <form method="post" action="/jenis">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama Jenis</label>
                                    <input type="text" class="form-control @error('namajenis') is-invalid @enderror"
                                        id="namajenis" name="namajenis" placeholder="masukkan jenis container"
                                        value="{{old('namajenis')}}" autocomplete="off">
                                    @error('namajenis')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                        id="keterangan" name="keterangan"
                                        placeholder="masukkan keterangan jenis container" value="{{old('keterangan')}}"
                                        autocomplete="off">
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Jenis</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jenis as $jenis)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                {{-- @if(strcasecmp($jenis->namajenis,"pendek")==0)
                                <td>20 FT</td>
                                @elseif(strcasecmp($jenis->namajenis,"panjang")==0)
                                <td>40 FT</td>
                                @elseif(strcasecmp($jenis->namajenis,"combo")==0)
                                <td>COMBO</td>
                                @else
                                <td><span class="badge badge-danger">undefined</span></td>
                                @endif --}}
                                <td>{{$jenis->namajenis}}</td>
                                <td>{{$jenis->keterangan}}</td>
                                <td>
                                    <button onclick="location.href='/jenis/{{base64_encode($jenis->id)}}/edit'"
                                        type="button" class="rounded-pill btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i>
                                        Edit</button>
                                    <form action="/jenis/{{ $jenis->id }}" method="post" class="d-inline"
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
@endsection