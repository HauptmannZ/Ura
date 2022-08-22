@extends('layouts.auth')
@section('auth')
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-header bg-transparent">
                            @if (session()->has('success'))
                                <div class="alert alert-success text-center" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            @endif
                            @if (session()->has('loginError'))
                                <div class="alert alert-danger text-center" role="alert">
                                    <strong>{{ session('loginError') }}</strong>
                                </div>
                            @endif
                            <div class="text-muted text-center mt-2 mb-0">
                                <h3>Silahkan login untuk komentar</h3>
                                <img src="https://source.unsplash.com/200x200?login" class="rounded-circle">
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" action="/loginPengunjung/{{ $slug }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control @error('email') is-invalid @enderror" name="email"
                                            id="email" placeholder="Email" type="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control @error('password') is-invalid @enderror" name="password"
                                            id="password" placeholder="Password" type="password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- {!! htmlFormSnippet() !!}
                                            @if ($errors->has('g-recaptcha-response'))
    <span class="help-block text-red">
                                                    <strong>{{ $errors->first('g-recaptcha-response', 'Harap verifikasi captcha!') }}</strong>
                                                </span>
    @endif -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Masuk</button>
                                </div>
                            </form>
                            <div class="row justify-content-center mb-3">
                                atau
                            </div>
                            <div class="row">
                                <div class="btn-wrapper text-center col-md-6 mb-3">
                                    <a href="/registerPengunjung/{{ $slug }}" class="btn btn-neutral btn-icon">
                                        <span class="btn-inner--icon"></span>Buat akun
                                    </a>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-5">
                                <a href="/"><i class="bi bi-caret-left-square-fill"></i> Kembali ke beranda</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
@endsection
