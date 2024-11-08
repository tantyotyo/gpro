@extends('layouts.main')
@section('konten')
@include('layouts.sub_konten_header')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
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
                        <form method="post" action="/servis">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Servis</label>
                                        <input type="text"
                                            class="form-control @error('namaservis') is-invalid @enderror"
                                            id="namaservis" name="namaservis" value="{{old('namaservis')}}"
                                            placeholder="masukkan nama servis" autocomplete="off">
                                        @error('namaservis')
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
            <div class="col-md-8">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Tampil Data</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Servis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($servis as $servis)
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{$servis->namaservis}}</td>
                                    <td>
                                        <button onclick="location.href='/servis/{{base64_encode($servis->id)}}/edit'"
                                            type="button" class="rounded-pill btn btn-warning btn-sm"><i
                                                class="fa fa-edit"></i>
                                            Edit</button>
                                        <form action="/servis/{{$servis->id}}" onsubmit="return submitForm(this)"
                                            method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="rounded-pill btn btn-danger btn-sm"><i
                                                    class="fa fa-trash"></i> Hapus</button>
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
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection