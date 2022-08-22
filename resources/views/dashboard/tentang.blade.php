@extends('dashboard.layouts.dashboard')
@section('dashboard')
<div class="container-fluid">
</div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg-9 offset-1">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row ">
                        <div class="col mb-3">
                            <h3 class="mb-0 text-center mt-5">Tentang</h3>
                        </div>
                    </div>
                    <div class="row align-items-center mt-5">
                        <div class="container">
                            @if (session()->has('success'))
                                <div class="alert alert-success text-center" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            @endif
                            <form action="/dashboard/tentang/{{ $tentang->id }}" method="POST">
                                @csrf
                                <label for="body" class="form-control-label">Isi Tentang</label>
                                @error('body')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <input type="hidden" id="body" name="body"
                                    value="{{ old('body', $tentang->body) }}">
                                <trix-editor input="body"></trix-editor>
                                <button type="submit" class="btn btn-success my-4">Ubah Tentang</button>
                            </form>
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