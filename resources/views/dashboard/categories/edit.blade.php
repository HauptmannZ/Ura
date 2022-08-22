@extends('dashboard.layouts.dashboard')
@section('dashboard')
    <div class="container-fluid">
    </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row ">
                            <div class="col mb-3">
                                <h3 class="mb-0 text-center mt-5">Ubah Kateogri</h3>
                            </div>
                        </div>
                        <a class="btn btn-outline-success my-3" href="/dashboard/categories"><i
                                class="fas fa-arrow-left"></i>
                            Kembali Ke daftar kategori</a>
                        <div class="row align-items-center mt-5">
                            <div class="container">
                                <form action="/dashboard/categories/{{ $category->slug }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label for="title" class="form-control-label">Judul</label>
                                        <input class="form-control @error('title') is-invalid @enderror" name="name"
                                            id="name" type="text" value="{{ old('name', $category->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="slug" class="form-control-label">slug</label>
                                        <input class="form-control @error('slug') is-invalid @enderror" name="slug"
                                            id="slug" type="text" readonly value="{{ old('slug', $category->slug) }}">
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success my-4">Ubah Posting</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
