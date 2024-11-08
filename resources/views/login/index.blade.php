<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.title')
    <!-- vendor css -->
    <link href="{{asset('admin2/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin2/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{asset('admin2/css/bracket.css')}}">
</head>

<body>

    <div class="d-flex align-items-center justify-content-center ht-100v">
        <video id="headVideo" class="pos-absolute a-0 wd-100p ht-100p object-fit-cover" autoplay muted loop>
            <source src="{{asset('admin2/videos/video1.mp4')}}" type="video/mp4">
            <source src="{{asset('admin2/videos/video1.ogv')}}" type="video/ogg">
            <source src="{{asset('admin2/videos/video1.webm')}}" type="video/webm">
        </video><!-- /video -->
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="overlay-body bg-black-7 d-flex align-items-center justify-content-center">
                <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bg-black-6">
                    <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal"></span>PT. Global
                        <span class="tx-info">Logistic</span> <span class="tx-normal"></span>
                    </div>
                    <div class="tx-white-5 tx-center mg-b-50">General Logistic Solutions</div>

                    <div class="form-group">
                        <input type="email" class="form-control fc-outline-dark @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Masukkan username anda" required
                            autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="password"
                            class="form-control fc-outline-dark @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Masukkan password anda" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!-- <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a> -->
                    </div><!-- form-group -->
                    <button type="submit" class="btn btn-info btn-block">Masuk</button>

                    <div class="mg-t-50 tx-center">Copyright &copy; 2020. All Rights Reserved<h6 class="tx-info">by <a
                                href="http://">@TantyoTyoTok</a></h6>
                    </div>
                </div><!-- login-wrapper -->
            </div><!-- overlay-body -->
    </div><!-- d-flex -->

    <script src="{{asset('admin2/lib/jquery/jquery.min.js')}}"></script>
    <script>
        $(function(){
            'use strict';

            // Check if video can play, and play it
            var video = document.getElementById('headVideo');
            video.addEventListener('canplay', function() {
            video.play();
            });
        });
    </script>

</body>

</html>