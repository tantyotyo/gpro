@extends('layouts.main')
@section('konten')
@include('layouts.core_konten_header')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h2><i class="icon fas fa-id-card"></i> Data Customer</h2>
                    <h3 class="card-title">Ini merupakan halaman data customer.</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th class="">Nama Customer</th>
                                <th class="">Alamat Customer</th>
                                <th class="">Email</th>
                                <th class="">Telepon</th>
                                <th class="">Nama PIC</th>
                                <th class="">Telepon PIC</th>
                                <th class="">TOP</th>
                                <th class="">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $customer)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$customer->namacustomer}}</td>
                                <td>{{$customer->alamatcustomer}}</td>
                                <td>{{$customer->user->email}}</td>
                                <td>{{$customer->telpcustomer}}</td>
                                <td>{{$customer->user->nama}}</td>
                                <td>{{$customer->telppiccustomer}}</td>
                                <td>{{$customer->topcustomer}} hari</td>
                                <td>
                                    <button
                                        onclick="location.href='/customer/{{base64_encode($customer->fk_iduser)}}/edit'"
                                        type="button" class="rounded-pill btn btn-warning btn-sm"><i
                                            class="fa fa-edit"></i> Edit</button>
                                    <form action="/customer/{{ $customer->fk_iduser }}" method="post" class="d-inline"
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
                <form action="/customer" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Nama Customer</label>
                                <input type="text" class="form-control @error('namacustomer') is-invalid @enderror"
                                    id="namacustomer" name="namacustomer" placeholder="masukkan nama customer"
                                    value="{{old('namacustomer')}}">
                                @error('namacustomer')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Foto Profil</label>
                                <input type="file" name="imgupload"
                                    class="form-control @error('imgupload') is-invalid @enderror"">
                                @error('imgupload')
                                <div class=" invalid-feedback">{{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
            </div>
            {{-- <input type="hidden" id="aksescustomer" name="aksescustomer" value="{{$akses->idakses}}"> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Alamat Customer</label>
                        <textarea class="form-control @error('alamatcustomer') is-invalid @enderror" id="alamatcustomer"
                            name="alamatcustomer"
                            placeholder="masukkan alamat customer">{{old('alamatcustomer')}}</textarea>
                        @error('alamatcustomer')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kota Asal</label>
                        <select class="form-control select2 @error('kotacustomer') is-invalid @enderror"
                            name="kotacustomer" id="kotacustomer" style="width:100%;">
                            <option value="">Pilih Kota</option>
                            @foreach($kota as $kota)
                            <option value="{{$kota->id}}">{{$kota->namakota}}</option>
                            @endforeach
                        </select>
                        @error('kotacustomer')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control @error('telpcustomer') is-invalid @enderror"
                                id="telpcustomer" name="telpcustomer" value="{{old('telpcustomer')}}"
                                placeholder="masukkan nomor telepon">
                            @error('telpcustomer')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No. Telepon 2</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control @error('telp2customer') is-invalid @enderror"
                                id="telp2customer" name="telp2customer" value="{{old('telp2customer')}}"
                                placeholder="masukkan nomor telepon">
                            @error('telp2customer')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Customer</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{old('email')}}" placeholder="masukkan alamat email">
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No. Fax</label>
                        <input type="text" class="form-control @error('faxcustomer') is-invalid @enderror"
                            id="faxcustomer" name="faxcustomer" value="{{old('faxcustomer')}}"
                            placeholder="masukkan nomor fax">
                        @error('faxcustomer')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>PIC Customer</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control @error('namapiccustomer') is-invalid @enderror"
                                id="namapiccustomer" name="namapiccustomer" placeholder="masukkan nama PIC"
                                value="{{old('namapiccustomer')}}">
                            @error('namapiccustomer')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>No. PIC Customer</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control @error('telppiccustomer') is-invalid @enderror"
                                id="telppiccustomer" name="telppiccustomer" value="{{old('telppiccustomer')}}"
                                placeholder="masukkan telepon PIC">
                            @error('telppiccustomer')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Marketing</label>
                        <select class="form-control select2 @error('idpegawai') is-invalid @enderror" name="idpegawai"
                            id="idpegawai" style="width:100%;">
                            <option value="">Pilih Marketing</option>
                            @foreach($pegawai as $pegawai)
                            <option value="{{$pegawai->id}}">{{$pegawai->nama}}</option>
                            @endforeach
                        </select>
                        @error('idpegawai')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="col-sm-2 mg-t-10 form-control-label">TOP</label>
                        <input type="number" min="1" max="30"
                            class="form-control @error('topcustomer') is-invalid @enderror" id="topcustomer"
                            name="topcustomer" placeholder="masukkan term of payment" value="{{old('topcustomer')}}"
                            oninput="validity.valid||(value='');">
                        @error('topcustomer')
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