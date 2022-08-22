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
                        <div class="row align-items-center">
                            <div class="col mb-3">
                                <h3 class="mb-0">Detail Posts {{ $post->title }}</h3>
                            </div>
                            <a class="btn btn-outline-success my-2" href="/dashboard/posts"><i class="fas fa-arrow-left"></i>
                                Kembali Ke daftar postingan
                                saya</a>
                            <a class="btn btn-outline-warning my-2" href="/dashboard/posts/{{ $post->slug }}/edit"><i
                                    class="fas fa-edit"></i>
                                Edit</a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger my-2"
                                    onclick="return confirm('Anda yakin ingin hapus?')" type="submit"><i
                                        class="fas fa-trash-alt"></i> Hapus</button>
                            </form>
                        </div>
                        <div class="container ">
                            <div class="row justify-content-center">
                                <div class="col-xl">
                                    <h2 class="mt-5">{{ $post->title }}</h2>
                                    @if ($post->image)
                                        <img src="{{ '/storage/' . $post->image }}" alt="{{ $post->category->name }}"
                                            class="img-fluid" width="400" height="400">
                                    @else
                                        <img src="https://source.unsplash.com/900x400?{{ $post->category->name }}"
                                            alt="{{ $post->category->name }}" class="img-fluid" width="900"
                                            height="400">
                                    @endif
                                    <article class="my-3">
                                        {!! $post->body !!}
                                    </article>
                                    {{-- memasukan tag html --}}
                                    <br>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
