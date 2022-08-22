@extends('layouts.landing')
@section('isikonten')
    <div class="container mb-7">
    </div>
    <div class="container col-xl-10 mt-6">
        <h1 class="text-center" data-aos="zoom-in-right" data-aos-duration="800">{{ $title }}</h1>
        <div class="row justify-content-center">
            <div class="col-md-6" data-aos="zoom-in-left" data-aos-duration="800">
                {{-- method 'post' = default laravel --}}
                <form action="/posts">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="input-group">
                        <input type="text" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari Postingan" name="search">
                        <button class="btn btn-outline-primary" type="submit" id="search">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        @if ($posts->count())
            <div class="card mb-1" data-aos="zoom-out">
                @if ($posts[0]->image)
                    <div style="max-height: 400px; overflow:hidden">
                        <img src="{{ '/storage/' . $posts[0]->image }}" alt="{{ $posts[0]->category->name }}"
                            class="img-fluid mx-auto d-block">
                    </div>
                @else
                    <img src="https://source.unsplash.com/900x400?{{ $posts[0]->category->name }}" class="card-img-top"
                        alt="{{ $posts[0]->category->name }}">
                @endif

                <div class="card-body text-center">
                    <h5 class="card-title">{{ $posts[0]->title }}</h5>
                    <h5>By. <a href="/posts?user={{ $posts[0]->user->username }}">{{ $posts[0]->user->name }}</a>
                        in
                        <a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a>
                    </h5>
                    <p class="card-text">{{ $posts[0]->excerpt }}</p>
                    <p class="card-text"><small class="text-muted">Post
                            {{ $posts[0]->created_at->diffForHumans() }}</small>
                    </p>
                    <a type="button" class="btn btn-info" href="/posts/{{ $posts[0]->slug }}">Selengkapnya</a>
                </div>
            </div>

            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-duration="1000">
                        <div class="card">
                            <div class="position-absolute px-3 py-" style="background-color: rgb(0, 0, 0, 0.6">
                                <a href="/posts?category={{ $post->category->slug }}"
                                    class="text-white">{{ $post->category->name }}</a>
                            </div>
                            @if ($post->image)
                                <img src="{{ '/storage/' . $post->image }}" alt="{{ $post->category->name }}"
                                    class="img-fluid" width="700" height="700">
                            @else
                                <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}"
                                    alt="{{ $post->category->name }}">
                            @endif
                            <div class="card-body d-flex align-items-stretch">
                                <h5 class="card-title">{{ $post->title }}</a>
                            </div>
                            <div class="card-body">
                                </h5>
                                <h5>By. <a href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}
                                        <p class="card-text"><small class="text-muted">Post
                                                {{ $post->created_at->diffForHumans() }}</small>
                                        </p>
                                    </a>
                                </h5>
                                <p>{{ $post->excerpt }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="/posts/{{ $post->slug }}" class="btn btn-info">Selengkapnya</a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
@else
    <h1 class="display-1 text-center mt-5">Belum ada Postingan</h1>
    @endif
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
