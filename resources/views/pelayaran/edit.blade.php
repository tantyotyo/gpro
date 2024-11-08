@extends('layouts.main')
@section('konten')
<div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="/dashboard">Dashboard</a>
        <a class="breadcrumb-item" href="/pelayaran">Pelayaran</a>
        <span class="breadcrumb-item active">Edit Data Pelayaran</span>
    </nav>
</div><!-- br-pageheader -->

<div class="br-pagetitle">
    <i class="icon fas fa-ship"></i>
    <div>
        <h4>Edit Data Pelayaran</h4>
        <p class="mg-b-0">Ini merupakan halaman untuk mengubah data pelayaran.</p>
    </div>
</div><!-- d-flex -->
<div class="br-pagebody" id="exampleModal">
    <div class="br-section-wrapper pd-md-30">
        <div class="table-wrapper">
            <form action="/pelayaran/{{$pelayaran->id}}" method="post">
                @method('PUT')
                @csrf
                <!-- <label for="idpeg">Id Pegawai</label> -->
                <div class="row mg-t-20">
                    <label class="col-sm-2 mg-t-10 form-control-label"><span class="tx-danger">* </span>Nama
                        Pelayaran</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control @error('namapelayaran') is-invalid @enderror"
                            id="namapelayaran" name="namapelayaran" value="{{$pelayaran->namapelayaran}}"
                            placeholder="masukkan nama pelayaran">
                        @error('namapelayaran')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <label class="col-sm-2 mg-t-10 form-control-label"><span class="tx-danger">* </span>Alamat
                        Pelayaran</label>
                    <div class="col-lg-6">
                        <textarea class="form-control @error('alamatpelayaran') is-invalid @enderror"
                            id="alamatpelayaran" name="alamatpelayaran"
                            placeholder="masukkan alamat pelayaran">{{$pelayaran->alamatpelayaran}}</textarea>
                        @error('alamatpelayaran')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <label class="col-sm-2 mg-t-10 form-control-label"><span class="tx-danger">* </span>Kota
                        Asal</label>
                    <div class="col-lg-6">
                        <select class="form-control select2-show-search @error('kotapel') is-invalid @enderror"
                            id="kotapel" name="kotapel">
                            <option value="">Pilih Kota</option>
                            @foreach($kota as $kota)
                            <option value="{{$kota->id}}" @if ($kota->id === $pelayaran->kota->id) selected
                                @endif>{{$kota->namakota}}</option>
                            @endforeach
                        </select>
                        @error('kotapel')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <label class="col-sm-2 mg-t-10 form-control-label"><span class="tx-danger">* </span>Telepon
                        Pelayaran</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control @error('telppelayaran') is-invalid @enderror"
                            id="telppelayaran" name="telppelayaran" value="{{$pelayaran->telppelayaran}}"
                            placeholder="masukkan telp pelayaran">
                        @error('telppelayaran')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-sm-2 mg-t-10 form-control-label"></div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </div>
            </form>
        </div><!-- table-wrapper -->
    </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->

@endsection