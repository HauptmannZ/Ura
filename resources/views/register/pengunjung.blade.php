@extends('layouts.auth')
@section('auth')
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">buat akun untuk komentar</h1>
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
            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card bg-secondary border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                            </div>
                            <form action="/registerPengunjung/{{ $slug }}" method="POST">
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
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Password" id="password1" name="password1"
                                            type="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Konfirmasi Password" id="password" name="password" type="password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <span id='message'></span>
                                </div>
                                <!-- {!! htmlFormSnippet() !!}
                                                @if ($errors->has('g-recaptcha-response'))
    <span class="help-block text-red">
                                                        <strong>{{ $errors->first('g-recaptcha-response', 'Harap verifikasi captcha!') }}</strong>
                                                    </span>
    @endif -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">Buat Akun</button>
                                </div>
                            </form>
                            <div class="row justify-content-center mt-5">
                                <p>Sudah punya akun Kembali ke
                                    <a href="/loginPengunjung/{{ $slug }}"> login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        const isEmpty = str => !str.trim().length;
        $('#password1, #password').on('keyup', function() {
            if ($('#password1').val() == $('#password').val()) {
                $('#message').html('Password sama').css('color', 'green');
            } else {
                $('#message').html('Password Tidak Sama').css('color', 'red');
            }
            if (isEmpty(this.value)) {
                $('#message').html('').css('color', 'green');
            }
        });
    </script>
@endsection
