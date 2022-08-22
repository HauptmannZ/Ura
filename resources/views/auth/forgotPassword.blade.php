@extends('layouts.auth')
@section('auth')
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card bg-secondary border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            @if (session()->has('forgotError'))
                                <div class="alert alert-danger text-center" role="alert">
                                    <strong>{{ session('forgotError') }}</strong>
                                </div>
                            @endif
                            @if (session()->has('success'))
                                <div class="alert alert-success text-center" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            @endif
                            <div class="text-center text-muted mb-4">
                                <div class="container">
                                    <div class="header-body text-center mb-7">
                                        <div class="row justify-content-center">
                                            <div class="col px-5">
                                                <h1 class="text-dark">Forgot Password</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="/forgotPassword" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                            id="email" name="email" type="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- {!! htmlFormSnippet() !!} --}}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block text-red">
                                        <strong>{{ $errors->first('g-recaptcha-response', 'Harap verifikasi captcha!') }}</strong>
                                    </span>
                                @endif
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">Kirim link ubah password</button>
                                </div>
                            </form>
                            <div class="row justify-content-center mt-5">
                                <p>Sudah ingat password Kembali ke
                                    <a href="/login"> login</a>
                                </p>
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
