@extends('layouts.main')
@section('konten')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="icon fas fa-truck"></i> Detail Trucking</h1>
                <h3 class="card-title">berikut merupakan daftar sektor pengambilan muatan yang disupport oleh
                    trucking.</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/trucking">Data Trucking</a></li>
                    <li class="breadcrumb-item active">Detail Trucking</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container"></div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white"
                        style="background: url('{{asset('adminlte/dist/img/photo1.png')}}') center center;">
                        <h3 class="widget-user-username text-right">{{$trucking->namatrucking}}</h3>
                        <h5 class="widget-user-desc text-right">trucking</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="{{asset('storage/image/default-150x150.png')}}" alt="User Image">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">?</h5>
                                    <span class="description-text">????</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">?</h5>
                                    <span class="description-text">????</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">?</h5>
                                    <span class="description-text">????</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a>
                            </li>
                            <li class="nav-item"><a class="nav-link active" href="#sektor" data-toggle="tab">Sektor</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="activity">
                            </div>
                            <!-- /.tab-pane -->
                            <div class="active tab-pane" id="sektor">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sektor</th>
                                            <th>Jenis</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail as $detail)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$detail->sektor->namasektor}}</td>
                                            @if(strcasecmp($detail->jenis->namajenis,"pendek")==0)
                                            <td>20 FT</td>
                                            @elseif(strcasecmp($detail->jenis->namajenis,"panjang")==0)
                                            <td>40 FT</td>
                                            @elseif(strcasecmp($detail->jenis->namajenis,"combo")==0)
                                            <td>COMBO</td>
                                            @else
                                            <td><span class="badge badge-danger">undefined</span></td>
                                            @endif
                                            <td>Rp. {{number_format($detail->harga, 2, ',', '.') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection