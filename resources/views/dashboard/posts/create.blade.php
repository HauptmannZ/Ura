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
                                <h3 class="mb-0 text-center mt-5">Buat Postingan Baru</h3>
                            </div>
                        </div>
                        <a class="btn btn-outline-success my-3" href="/dashboard/posts"><i class="fas fa-arrow-left"></i>
                            Kembali Ke daftar postingan
                            saya</a>
                        <div class="row align-items-center mt-5">
                            <div class="container">
                                <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title" class="form-control-label">Judul</label>
                                        <input class="form-control @error('title') is-invalid @enderror" name="title"
                                            id="title" type="text" value="{{ old('title') }}">
                                        @error('title')
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
                                    <div class="form-group">
                                        <label for="category" class="form-control-label">kategori</label>
                                        <select class="form-control @error('category_id') is-invalid @enderror"
                                            aria-label="Default select example" name="category_id">
                                            @foreach ($categories as $category)
                                                @if (old('category_id') == $category->id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Pilih Foto</label>
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="image" name="image" onchange="previewImage()">
                                        @error('image')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="body" class="form-control-label">Isi Postingan</label>
                                        @error('body')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                        <input type="hidden" id="body" name="body" value="{{ old('body') }}">
                                        <trix-editor input="body"></trix-editor>
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
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');
            // console.log(title);
            title.addEventListener('change', function() {
                fetch('/dashboard/posts/checkSlug?title=' + title.value)
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
            });

            document.addEventListener('trix-file-accept', function(e) {
                e.preventDefault();
            })

            function previewImage() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');
                imgPreview.style.display = 'block';
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);
                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
    @endsection
