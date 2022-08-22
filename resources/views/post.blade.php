@extends('layouts.landing')
@section('isikonten')
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg">
                <h2 class="mt-5">{{ $post->title }}</h2>
                <h5>By. <a href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}</a> in <a
                        href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></h5>
                @if ($post->image)
                    <img src="{{ '/storage/' . $post->image }}" alt="{{ $post->category->name }}" class="img-fluid"
                        width="900" height="400">
                @else
                    <img src="https://source.unsplash.com/900x400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="img-fluid" width="900" height="400">
                @endif
                <article class="my-3">
                    {!! $post->body !!}
                </article>
                {{-- memasukan tag html --}}
                <br>
                <a href="/posts">Kembali Ke posting</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg">
                <div id="disqus_thread"></div>
            </div>
        </div>
    </div>
@endsection
{{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg">
                @auth('pengunjung')
                <p>Silahkan kirim komentar {{ \Auth::guard('pengunjung')->user()->email }}</p>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="/kirimKomentar/{{ $post->slug }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" class="form-control" name="post_id" value="{{ $post->id }}"
                                        readonly>
                                    <input type="text" class="form-control" name="isi" placeholder="Tulis komentar..">
                                </div>
                                <div class="col-lg-2 mt-2">
                                    <button type="submit" class="btn btn-outline-success">kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 mt-2">
                        <form action="/logoutPengunjung/{{ $post->slug }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="komentar" placeholder="Tulis komentar..">
                    </div>
                    <div class="col-lg-4">
                        <a href="/loginPengunjung/{{ $post->slug }}" class="btn btn-outline-primary">Login untuk
                            komentar</a>
                    </div>
                </div>
            @endauth
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg service-item">
                <h3>komentar</h3>
                <hr>
                @if ($komentar->count())
                    @foreach ($komentar as $km)
                        <p>{{ $km->pengunjung->email }} . {{ $km->created_at->diffForHumans() }}</p>
                      
                        <p>{{ $km->isi }}</p>
                        <hr>
                    @endforeach
                @else
                    <p>Belum ada komentar</p>
                @endif
            </div>
        </div>
    </div> --}}
{{-- tinker multi input --}}
{{-- Post::create([
'title' => 'judul keempat',
'category_id' => 1,
'slug' => 'judul-keempat',
'excerpt' => 'molestiae vero eveniet laboriosam voluptate enim harum.',
'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum distinctio veniam deserunt nulla voluptatibus in, nemo dolores id quis ratione</p><p> molestiae vero eveniet laboriosam voluptate enim harum voluptatem quae quam sint suscipit magni? Ab placeat dignissimos beatae vitae voluptatum deserunt corporis maiores nihil repellat nisi, dolores, quaerat sit quo error excepturi consectetur earum accusamus enim. Consequatur</p><p> accusamus sit porro, modi libero quibusdam deleniti eum omnis voluptatem vel recusandae, vitae obcaecati sed neque aspernatur dolor enim nostrum ipsa quod aliquid dolores. Ipsa, natus. Assumenda voluptatum, eligendi dolor error quos dolores rem laboriosam accusantium corporis et vitae natus consequuntur totam earum impedit sequi accusamus hic, placeat eius illum?</p><p> aspernatur voluptatum quia, aliquid aperiam nam earum suscipit modi! Rem, minus minima. Nobis quia ab explicabo, voluptate voluptates sunt error dolorem alias a iusto cumque officiis quod fuga saepe aliquid exercitationem aut. Repellat numquam ullam saepe? Nesciunt officia sunt provident perspiciatis.</p>'
]) --}}
{{-- Category::create([
'name' => 'Movie',
'slug' => 'Movie-fun'
]) --}}
