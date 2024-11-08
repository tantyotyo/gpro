@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="icon fas fa-ship"></i> Data Pelayaran</h1>
                <h3 class="card-title">Ini merupakan halaman untuk menambah data pelayaran.</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/pelayaran">Data Pelayaran</a></li>
                    <li class="breadcrumb-item active">Create Data Pelayaran</li>
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
                        <h3 class="card-title">Form Tambah Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <form action="/pelayaran" method="post" id="myForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Pelayaran</label>
                                        <input type="hidden" name="idpelayaran" id="idpelayaran">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('namapelayaran') is-invalid @enderror"
                                                id="namapelayaran" name="namapelayaran"
                                                placeholder="masukkan nama pelayaran" value="{{old('namapelayaran')}}"
                                                autocomplete="off">
                                            <div class="input-group-append">
                                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modal-xl"><i class="fa fa-search"></i> Cari</a>
                                            </div>
                                            @error('namapelayaran')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Alamat Pelayaran</label>
                                        <textarea class="form-control @error('alamatpelayaran') is-invalid @enderror"
                                            id="alamatpelayaran" name="alamatpelayaran"
                                            placeholder="masukkan alamat pelayaran"
                                            value="{{old('alamatpelayaran')}}"></textarea>
                                        @error('alamatpelayaran')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kota Asal</label>
                                        <select
                                            class="form-control select2 @error('kotapelayaran') is-invalid @enderror"
                                            id="kotapelayaran" name="kotapelayaran" value="{{old('kotapelayaran')}}">
                                            <option value="">Pilih Kota</option>
                                            @foreach($kota as $kota)
                                            <option value="{{$kota->id}}">{{$kota->namakota}}</option>
                                            @endforeach
                                        </select>
                                        @error('kotapelayaran')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('telppelayaran') is-invalid @enderror"
                                                id="telppelayaran" name="telppelayaran"
                                                placeholder="masukkan nomor telepon" value="{{old('telppelayaran')}}">
                                            @error('telppelayaran')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Rute</th>
                                        <th>Jenis Container</th>
                                        <th>Harga</th>
                                        <th style="text-align:center"><button type="button" onClick="addRow()"
                                                class="rounded-circle btn btn-sm btn-info"><i
                                                    class="fa fa-plus"></i></button></th>
                                    </tr>
                                </thead>
                                <tbody id="tambahSini">
                                    <tr>
                                        <td style="width:30%">
                                            <select class="form-control select2 @error('idrute') is-invalid @enderror"
                                                name="idrute[]" id="" value="{{old('idrute')}}">
                                                <option value="">Pilih Rute</option>
                                                @foreach($rute as $rute)
                                                <option value="{{$rute->id}}">{{$rute->namarute}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="width:30%">
                                            <select class="form-control select2 @error('idjenis') is-invalid @enderror"
                                                name="idjenis[]" id="" value="{{old('idjenis')}}">
                                                <option value="">Pilih Jenis Container</option>
                                                @foreach($jenis as $jenis)
                                                <option value="{{$jenis->id}}">{{$jenis->namajenis}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="width:30%"><input type="number" name="harga[]" id=""
                                                class="form-control" placeholder="Masukkan Harga"></td>
                                        <td style="text-align:center"><button type="button" onClick="delRow()"
                                                class="rounded-circle btn btn-sm btn-danger"><i
                                                    class="fa fa-minus"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i>
                                        Simpan</button>
                                    <button type="reset" onclick="myReset()" class="btn btn-danger"><i
                                            class="fas fa-redo"></i> Reset</button>
                                </div>
                            </div>
                        </form>
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

<!-- BASIC MODAL -->
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Pelayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id</th>
                            <th>Pelayaran</th>
                            <th>Alamat</th>
                            <th>Telpon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pelayaran as $pelayaran)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$pelayaran->id}}<input type="hidden" value="{{$pelayaran->id}}"
                                    id="{{$pelayaran->id}}id" /></td>
                            <td>{{$pelayaran->namapelayaran}}<input type="hidden" value="{{$pelayaran->namapelayaran}}"
                                    id="{{$pelayaran->id}}nama" /></td>
                            <td>{{$pelayaran->alamatpelayaran}}<input type="hidden"
                                    value="{{$pelayaran->alamatpelayaran}}" id="{{$pelayaran->id}}alamat" /></td>
                            <td>{{$pelayaran->telppelayaran}}<input type="hidden" value="{{$pelayaran->telppelayaran}}"
                                    id="{{$pelayaran->id}}telpon" />
                                <input type="hidden" value="{{$pelayaran->fk_idkota}}" id="{{$pelayaran->id}}kota" />
                            </td>
                            <td>
                                <button onclick="myFunc1(this.id)" id="{{$pelayaran->id}}"
                                    class="btn btn-primary btn-sm" data-dismiss="modal"><i class="fas fa-plus"></i>
                                    Pilih</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    function myFunc1(clicked) {
        document.getElementById("idpelayaran").value = document.getElementById(clicked + "id").value;
        document.getElementById("namapelayaran").value = document.getElementById(clicked + "nama").value;
        document.getElementById("alamatpelayaran").value = document.getElementById(clicked + "alamat").value;
        document.getElementById("kotapelayaran").value = document.getElementById(clicked + "kota").value;
        document.getElementById("telppelayaran").value = document.getElementById(clicked + "telpon").value;
        document.getElementById("namapelayaran").readOnly = true;
        document.getElementById("alamatpelayaran").readOnly = true;
        document.getElementById("kotapelayaran").disabled = true;
        document.getElementById("telppelayaran").readOnly = true;
    }

    function myReset() {
        document.getElementById("myForm").reset();
        document.getElementById("namapelayaran").readOnly = false;
        document.getElementById("alamatpelayaran").readOnly = false;
        document.getElementById("kotapelayaran").disabled = false;
        document.getElementById("telppelayaran").readOnly = false;
    }

    function addRow() {
        var tr = '<tr>' +
            '<td style="width:30%">' +
            '<select class="form-control select2 @error("idrute") is-invalid @enderror" name="idrute[]" id="" value="{{old("idrute")}}">' +
            '<option value="">Pilih Rute</option>' +
            '@foreach($rute2 as $rute)' +
            '<option value="{{$rute->id}}">{{$rute->namarute}}</option>' +
            '@endforeach' +
            '</select>' +
            '</td>' +
            '<td style="width:30%">' +
            '<select class="form-control select2 @error("idjenis") is-invalid @enderror" name="idjenis[]" id="" value="{{old("idjenis")}}">' +
            '<option value="">Pilih Jenis Container</option>' +
            '@foreach($jenis2 as $jenis)' +
            '<option value="{{$jenis->id}}">{{$jenis->namajenis}}</option>' +
            '@endforeach' +
            '</select>' +
            '</td>' +
            '<td style="width:30%"><input type="text" name="harga[]" id="" class="form-control" placeholder="Masukkan Harga"></td>' +
            '<td style="text-align:center"><button type="button" onClick="delRow()" class="rounded-circle btn btn-sm btn-danger"><i class="fa fa-minus"></i></button></td>' +
            +'</tr>';
        $('#tambahSini').append(tr);
    };

    function delRow() {
        document.getElementById("tambahSini").deleteRow(0);
    }

</script>
@endsection