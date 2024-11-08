@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="icon fas fa-id-card"></i> Data Customer</h1>
                <h3 class="card-title">Ini merupakan halaman untuk mengubah data customer.</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/customer">Data Customer</a></li>
                    <li class="breadcrumb-item active">Edit Data Customer</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Profile Picture</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-center">
                            @if($customer->user->image!=null)
                            <img class="ukuran_gambar profile-user-img img-fluid img-circle"
                                src="{{asset('storage/image/'.$customer->user->image)}}" alt="User profile picture">
                            @else
                            <img class="ukuran_gambar profile-user-img img-fluid img-circle"
                                src="{{asset('storage/image/default-150x150.png')}}" alt="User profile picture">
                            @endif
                        </div>
                        <h3 class="text-center">{{$customer->user->nama}}</h3>
                        {{-- <p class="text-muted text-center">{{$customer->namaakses}}</p> --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- left column -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- form start -->
                        <form action="/customer/{{base64_encode($customer->fk_iduser)}}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Nama Customer</label>
                                        <input type="text"
                                            class="form-control @error('namacustomer') is-invalid @enderror"
                                            id="namacustomer" name="namacustomer" value="{{$customer->namacustomer}}"
                                            placeholder="masukkan nama customer">
                                        @error('namacustomer')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Customer</label>
                                <textarea class="form-control @error('alamatcustomer') is-invalid @enderror"
                                    id="alamatcustomer" name="alamatcustomer"
                                    placeholder="masukkan alamat customer">{{$customer->alamatcustomer}}</textarea>
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
                                    id="kotacustomer" name="kotacustomer" style="width:100%;">
                                    <option value="">Pilih Kota</option>
                                    @foreach($kota as $kota)
                                    <option value="{{$kota->id}}" @if ($kota->id ===
                                        $customer->kota->id) selected @endif>{{$kota->namakota}}</option>
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
                                        id="telpcustomer" name="telpcustomer" value="{{$customer->telpcustomer}}"
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
                                        id="telp2customer" name="telp2customer" value="{{$customer->telp2customer}}"
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
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{$customer->user->email}}"
                                        placeholder="masukkan alamat email">
                                    @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fax</label>
                                <input type="text" class="form-control @error('faxcustomer') is-invalid @enderror"
                                    id="faxcustomer" name="faxcustomer" value="{{$customer->faxcustomer}}"
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
                                <label>Nama PIC</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('namapiccustomer') is-invalid @enderror"
                                        id="namapiccustomer" name="namapiccustomer" value="{{$customer->user->nama}}"
                                        placeholder="masukkan nama PIC">
                                    @error('namapiccustomer')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telepon PIC</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text"
                                        class="form-control @error('telppiccustomer') is-invalid @enderror"
                                        id="telppiccustomer" name="telppiccustomer"
                                        value="{{$customer->telppiccustomer}}" placeholder="masukkan telepon PIC">
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
                                <select class="form-control select2 @error('idpegawai') is-invalid @enderror"
                                    id="idpegawai" name="idpegawai" style="width:100%;">
                                    <option value="">Pilih Marketing</option>
                                    @foreach($pegawai as $pegawai)
                                    <option value="{{$pegawai->id}}" @if ($pegawai->id ===
                                        $customer->fk_idpegawai) selected @endif>{{$pegawai->nama}}</option>
                                    @endforeach
                                </select>
                                @error('idpegawai')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>TOP</label>
                                <input type="text" class="form-control @error('topcustomer') is-invalid @enderror"
                                    id="topcus" name="topcustomer" value="{{$customer->topcustomer}}"
                                    placeholder="masukkan term of payment">
                                @error('topcustomer')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle"></i>
                                Update</button>
                            <button type="reset" class="btn btn-danger"><i class="fas fa-redo-alt"></i>
                                Reset</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content-wrapper -->

@endsection