@extends('dashboard.layouts.dashboard')
@section('dashboard')
    <div class="container-fluid">
    </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row ">
                            <div class="col mb-3">
                                <h3 class="mb-0 text-center mt-5">Buat Kategori Baru</h3>
                            </div>
                        </div>
                        <a class="btn btn-outline-success my-3" href="/dashboard/categories"><i
                                class="fas fa-arrow-left"></i>
                            Kembali Ke daftar Kategori</a>
                        <div class="row align-items-center mt-5">
                            <div class="container">
                                <form action="/dashboard/categories" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="form-control-label">Nama</label>
                                        <input class="form-control @error('name') is-invalid @enderror" name="name"
                                            id="name" type="text" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="slug" class="form-control-label">slug</label>
                                        <input class="form-control @error('slug') is-invalid @enderror" name="slug"
                                            id="slug" type="text" readonly value="{{ old('slug') }}">
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success my-4">Posting</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-3">
                <div class="card border-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body text-warning">
                        <h5 class="card-title">Warning card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div> -->
        </div>
        <script>
            const name = document.querySelector('#name');
            const slug = document.querySelector('#slug');
            // console.log(title);
            name.addEventListener('change', function() {
                fetch('/dashboard/categories/checkSlug?name=' + name.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
            });
        </script>
    @endsection
