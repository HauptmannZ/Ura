@extends('dashboard.layouts.dashboard')
@section('dashboard')
    <div class="container-fluid">

    </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="container-fluid">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Akun Saya</h3>
                                </div>
                                <div class="col text-right">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <img src="{{ '/storage/profil/' . auth()->user()->image }}" alt="" class="img-fluid"
                                    width="200" height="200">
                            </div>
                            <div class="col-lg-6">
                                <h4 class="mb-0">Nama : {{ auth()->user()->name }}</h4>
                                <h4 class="mb-0">Username : {{ auth()->user()->username }}</h4>
                                <h4 class="mb-0">Email : {{ auth()->user()->email }}</h4>
                                <!--<h4 class="mb-0">Tanggal Di Aktifkan :
                                    {{ date('d F Y , H:i', strtotime(auth()->user()->email_verified_at)) }}
                                </h4> -->
                                <h4 class="mb-0">Tipe Akun : @if (auth()->user()->is_active == 1)
                                        Administrator
                                    @else
                                        Administrator
                                    @endif
                                </h4>
                                <h4 class="mb-0">Tanggal Di Buat :
                                    {{ date('d F Y , H:i', strtotime(auth()->user()->created_at)) }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="container-fluid">
                        @if (session()->has('successPassword'))
                            <div class="alert alert-success text-center mx-5" role="alert">
                                <strong>{{ session('successPassword') }}</strong>
                            </div>
                        @endif
                        @if (session()->has('errorPassword'))
                            <div class="alert alert-danger text-center mx-5" role="alert">
                                <strong>{{ session('errorPassword') }}</strong>
                            </div>
                        @endif
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Ganti Password</h3>
                                </div>
                                <div class="col text-right">
                                </div>
                            </div>
                        </div>
                        <form action="/dashboard/ubahPassword" method="POST">
                            @csrf
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
                            <button type="submit" class="btn btn-success my-4">Ubah Password</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="container-fluid">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Edit Akun Saya</h3>
                                </div>
                                <div class="col text-right">
                                </div>
                            </div>
                        </div>
                        <form action="/dashboard/editAkun" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (session()->has('successProfil'))
                                <div class="alert alert-success text-center mx-5" role="alert">
                                    <strong>{{ session('successProfil') }}</strong>
                                </div>
                            @endif
                            @if (session()->has('errorProfil'))
                                <div class="alert alert-danger text-center mx-5" role="alert">
                                    <strong>{{ session('errorProfil') }}</strong>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-6 mb-4 text-center">
                                    @if (auth()->user()->image)
                                        <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}">
                                        <img src="{{ '/storage/profil/' . auth()->user()->image }}" alt=""
                                            class="img-preview img-fluid mb-3 col-sm-5 d-block" width="200" height="200">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">Nama</label>
                                        <input class="form-control @error('name') is-invalid @enderror" name="name"
                                            id="name" type="text" value="{{ old('name', auth()->user()->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="image" name="image" onchange="previewImage()">
                                    </div>
                                    <button type="submit" class="btn btn-success my-4">Ubah Profil</button>
                                </div>
                            </div>
                        </form>
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
        <script>
            function previewImage() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');
                imgPreview.style.display = 'block';
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);
                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            };
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 2500);
        </script>
    @endsection
