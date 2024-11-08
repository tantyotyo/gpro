@extends('layouts.main')
@section('konten')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-truck-moving"></i> Data Trucking</h1>
                <h3 class="card-title">Ini merupakan halaman untuk menambah data trucking.</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/trucking">Data Trucking</a></li>
                    <li class="breadcrumb-item active">Create Data Trucking</li>
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
                        <form action="/trucking" method="post" id="myForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Trucking</label>
                                        {{-- <input type="hidden" name="idakses" value="{{$akses->idakses}}"> --}}
                                        <input type="hidden" name="idtruck" id="idtruck">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control @error('namatrucking') is-invalid @enderror"
                                                id="namatrucking" name="namatrucking"
                                                placeholder="masukkan nama trucking" value="{{old('namatrucking')}}">
                                            <div class="input-group-append">
                                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modal-xl"><i class="fa fa-search"></i>
                                                    Cari</a>
                                            </div>
                                            @error('namatrucking')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Alamat Trucking</label>
                                        <textarea class="form-control @error('alamattrucking') is-invalid @enderror"
                                            id="alamattrucking" name="alamattrucking"
                                            placeholder="masukkan alamat trucking"
                                            value="{{old('alamattrucking')}}"></textarea>
                                        @error('alamattrucking')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kota Asal</label>
                                        <select class="form-control @error('kotatrucking') is-invalid @enderror"
                                            id="kotatrucking" name="kotatrucking" value="{{old('kotatrucking')}}">
                                            <option value="Pilih Kota">Pilih Kota</option>
                                            @foreach($kota as $kota)
                                            <option value="{{$kota->id}}">{{$kota->id}} - {{$kota->namakota}}</option>
                                            @endforeach
                                        </select>
                                        @error('kotatrucking')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>No. Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text"
                                                class="form-control @error('telptrucking') is-invalid @enderror"
                                                id="telptrucking" name="telptrucking"
                                                placeholder="masukkan telp trucking" value="{{old('telptrucking')}}">
                                            @error('telptrucking')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Term of Payment</label>
                                        <input type="number"
                                            class="form-control @error('toptrucking') is-invalid @enderror"
                                            id="toptrucking" min="1" max="50" name="toptrucking"
                                            placeholder="masukkan TOP trucking" value="{{old('toptrucking')}}"
                                            oninput="validity.valid||(value='');">
                                        @error('toptrucking')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jumlah Armada 20</label>
                                        <input type="number"
                                            class="form-control @error('jmlarmada20') is-invalid @enderror"
                                            id="jmlarmada20" min="1" max="100" name="jmlarmada20"
                                            placeholder="jumlah armada 20" value="{{old('jmlarmada20')}}"
                                            oninput="validity.valid||(value='');">
                                        @error('jmlarmada20')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jumlah Armada 40</label>
                                        <input type="number"
                                            class="form-control @error('jmlarmada40') is-invalid @enderror"
                                            id="jmlarmada40" min="1" max="100" name="jmlarmada40"
                                            placeholder="jumlah armada 40" value="{{old('jmlarmada40')}}"
                                            oninput="validity.valid||(value='');">
                                        @error('jmlarmada40')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tahun Aktif</label>
                                        <input type="number"
                                            class="form-control @error('tahunaktif') is-invalid @enderror"
                                            id="tahunaktif" name="tahunaktif" placeholder="masukkan tahun aktif vendor"
                                            value="{{old('tahunaktif')}}">
                                        @error('tahunaktif')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email Trucking</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" value="{{old('email')}}"
                                                placeholder="masukkan alamat email">
                                            @error('email')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Nama Sektor</th>
                                        <th>Jenis Container</th>
                                        <th>Harga</th>
                                        <th style="text-align:center"><button type="button" onClick="addRow()"
                                                class="rounded-circle btn btn-sm btn-primary"><i
                                                    class="fa fa-plus"></i></button></th>
                                    </tr>
                                </thead>
                                <tbody id="tambahSini">
                                    <tr>
                                        <td style="width:30%">
                                            <select class="form-control select2 @error('idsektor') is-invalid @enderror"
                                                name="idsektor[]" id="" value="{{old('idsektor[0]')}}">
                                                <option value="">Pilih Sektor</option>
                                                @foreach($sektor as $sektor)
                                                <option value="{{$sektor->id}}">{{$sektor->namasektor}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="width:30%">
                                            <select class="form-control select2 @error('idjenis') is-invalid @enderror"
                                                name="idjenis[]" id="" value="{{old('idjenis[0]')}}">
                                                <option value="">Pilih Jenis Container</option>
                                                @foreach($jenis as $jenis)
                                                <option value="{{$jenis->id}}">{{$jenis->namajenis}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="width:30%"><input type="number" name="harga[]" id=""
                                                class="form-control"></td>
                                        <td style="text-align:center"><button type="button" onClick="delRow()"
                                                class="rounded-circle btn btn-sm btn-danger"><i
                                                    class="fa fa-minus"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i>
                                        Simpan</button>
                                    <button type="reset" onclick="myReset()" class="btn btn-danger"><i
                                            class="fas fa-redo-alt"></i> Reset</button>
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
                <h4 class="modal-title">Data Trucking</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id Trucking</th>
                            <th>Nama Trucking</th>
                            <th>Alamat</th>
                            <th>Telpon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trucking as $trucking)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$trucking->id}}<input type="hidden" value="{{$trucking->id}}"
                                    id="{{$trucking->id}}id" /></td>
                            <td>{{$trucking->namatrucking}}<input type="hidden" value="{{$trucking->namatrucking}}"
                                    id="{{$trucking->id}}nama" /></td>
                            <td>{{$trucking->alamattrucking}}<input type="hidden" value="{{$trucking->alamattrucking}}"
                                    id="{{$trucking->id}}alamat" /></td>
                            <td>{{$trucking->telptrucking}}<input type="hidden" value="{{$trucking->telptrucking}}"
                                    id="{{$trucking->id}}telpon" />
                                <input type="hidden" value="{{$trucking->fk_idkota}}" id="{{$trucking->id}}kota" />
                                <input type="hidden" value="{{$trucking->user->email}}" id="{{$trucking->id}}mail" />
                                <input type="hidden" value="{{$trucking->toptrucking}}" id="{{$trucking->id}}top" />
                                <input type="hidden" value="{{$trucking->jmlarmada20}}"
                                    id="{{$trucking->id}}armada20" />
                                <input type="hidden" value="{{$trucking->jmlarmada40}}"
                                    id="{{$trucking->id}}armada40" />
                                <input type="hidden" value="{{$trucking->tahunaktif}}" id="{{$trucking->id}}thnaktif" />
                            </td>
                            <td>
                                <button onclick="myFunc1(this.id)" class="btn btn-primary btn-sm" id="{{$trucking->id}}"
                                    data-dismiss="modal"><i class="fas fa-plus"></i> Pilih</button>
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
        // console.log(clicked);
        document.getElementById("idtruck").value = document.getElementById(clicked + "id").value;
        document.getElementById("namatrucking").value = document.getElementById(clicked + "nama").value;
        document.getElementById("alamattrucking").value = document.getElementById(clicked + "alamat").value;
        document.getElementById("kotatrucking").value = document.getElementById(clicked + "kota").value;
        document.getElementById("email").value = document.getElementById(clicked + "mail").value;
        document.getElementById("telptrucking").value = document.getElementById(clicked + "telpon").value;
        document.getElementById("toptrucking").value = document.getElementById(clicked + "top").value;
        document.getElementById("jmlarmada20").value = document.getElementById(clicked + "armada20").value;
        document.getElementById("jmlarmada40").value = document.getElementById(clicked + "armada40").value;
        document.getElementById("tahunaktif").value = document.getElementById(clicked + "thnaktif").value;
        console.log(document.getElementById(clicked + "kota").value);
        document.getElementById("namatrucking").readOnly = true;
        document.getElementById("kotatrucking").disabled = true;
        document.getElementById("email").readOnly = true;
        document.getElementById("alamattrucking").readOnly = true;
        document.getElementById("telptrucking").readOnly = true;
        document.getElementById("toptrucking").readOnly = true;
        document.getElementById("jmlarmada20").readOnly = true;
        document.getElementById("jmlarmada40").readOnly = true;
        document.getElementById("tahunaktif").readOnly = true;
    }

    function myReset() {
        document.getElementById("myForm").reset();
        document.getElementById("namatrucking").readOnly = false;
        document.getElementById("email").readOnly = false;
        document.getElementById("kotatrucking").disabled = false;
        document.getElementById("alamattrucking").readOnly = false;
        document.getElementById("telptrucking").readOnly = false;
        document.getElementById("toptrucking").readOnly = false;
        document.getElementById("jmlarmada20").readOnly = false;
        document.getElementById("jmlarmada40").readOnly = false;
        document.getElementById("tahunaktif").readOnly = false;
    }

    function addRow() {
        var tr = '<tr>' +
            '<td style="width:30%">' +
            '<select class="form-control select2 @error("idsektor") is-invalid @enderror" name="idsektor[]" id="" value="{{old("idsektor[0]")}}">' +
            '<option value="">Pilih Sektor</option>' +
            '@foreach($sektor2 as $sektor)' +
            '<option value="{{$sektor->id}}">{{$sektor->namasektor}}</option>' +
            '@endforeach' +
            '</select>' +
            '</td>' +
            '<td style="width:30%">' +
            '<select class="form-control select2 @error("idjenis") is-invalid @enderror" name="idjenis[]" id="" value="{{old("idjenis[0]")}}">' +
            '<option value="">Pilih Jenis Container</option>' +
            '@foreach($jenis2 as $jenis)' +
            '<option value="{{$jenis->id}}">{{$jenis->namajenis}}</option>' +
            '@endforeach' +
            '</select>' +
            '</td>' +
            '<td style="width:30%"><input type="text" name="harga[]" id="" class="form-control"></td>' +
            '<td style="text-align:center"><button type="button" onClick="delRow()" class="rounded-circle btn btn-sm btn-danger"><i class="fa fa-minus"></i></button></td>' +
            +'</tr>';
        $('#tambahSini').append(tr);
    };

    function delRow() {
        document.getElementById("tambahSini").deleteRow(0);
    }

</script>
@endsection