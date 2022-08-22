@extends('layouts.landing')
@section('isikonten')
    <div class="jumbotron bg-primary">
        <div class="jumbotron bg-primary">
            <div class="row">
                <div class="col-lg-8 text-white" data-aos="fade-right" data-aos-duration="800">
                    <h1 class="display-4">Selamat Datang!</h1>
                    <p class="lead">Website ini menyediakan Informasi seputar permainan World of Warships.</p>
                </div>
                <div class="col-lg-4" data-aos="fade-right" data-aos-duration="800">
                    <img src="1.jpg" height="180" width="320" alt="Hero">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="card">
            <div class="row mx-2">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Info Permainan</h5>
                                    <span class="h2 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="bi bi-controller"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                Informasi Permainan disertai sejarahnya.    
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Terbaru</h5>
                                    <span class="h2 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="bi bi-calendar-check-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm d-block">
                                Info selalu "up-to-date" dan terbaru dari official!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Konten</h5>
                                    <span class="h2 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                                        <i class="bi bi-pencil-square"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                Konten yang ditampilkan mudah dipahami.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-xl-10">
        <h1 class="text-center text-dark">Sebelum menelusuri..</h1>
        <hr />
        <div class="row mb-5">
            <div class="center col-xl-8">
                <article>
                    Sebelum menelusuri website ini, jika tidak keberatan kamu disarankan mengunjungi
                    halaman tentang terlebih dahulu.

                    Pada permainan World of Warships istilah 'pay to win' tidak terlalu terlihat, namun kekuatan
                    sebuah tim lah yang mempengaruhi kemenangan di permainan ini. Karena percuma mempunyai
                    Senjata bagus tapi bermain individual, kerja sama tim adalah yang paling utama.
                </article>
            </div>
            <!--<div class="col-xl-6">
                <article>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis explicabo numquam
                    beatae
                    voluptatum! Qui fugiat quisquam rerum repudiandae et! Incidunt expedita est quasi
                    culpa
                    asperiores esse fugit, porro corrupti quia architecto in aspernatur ratione harum
                    explicabo?
                    Quos tenetur ullam laboriosam magni! Vitae autem incidunt dolorum id nostrum vel
                    neque?
                    Optio!
                </article>
            </div>-->
        </div>
    </div>
    <div class="bg-gray">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="card-title text-white mt-5">Kategori</h3>
            </div>
            <div class="container col-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($posts as $post)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->iteration }}"
                                class="{{ $loop->iteration == 1 ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($posts as $post)
                            <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                                @if ($post->image)
                                    <img class="w-100" src="{{ '/storage/' . $post->image }}" alt="First slide">
                                @else
                                    <img class="d-block w-100"
                                        src="https://img.youtube.com/vi/teA_3BP4OWo/0.jpg{{ $post->category->name }}"
                                        src="https://source.unsplash.com/500x300?{{ $post->category->name }}"
                                        alt="{{ $post->category->name }}">
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <h5 class="card-title" data-aos="zoom-in" data-aos-duration="800"><a href="/categories"
                        class="btn btn-primary">Lihat
                        Selengkapnya</a></h5>
            </div>
        </div>
    </div>
    <div id="map-default" class="map-canvas" data-lat="40.748817" data-lng="-73.985428" style="height: 600px;">
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
@endsection
{{-- @foreach ($posts as $post)
    @if ($post->image)
        <img class="d-block w-100" src="{{ '/storage/' . $post->image }}" alt="{{ $post->category->name }}">
    @else
        <img class="d-block w-100" src="https://source.unsplash.com/500x300?{{ $post->category->name }}"
            alt="{{ $post->category->name }}">
    @endif
@endforeach --}}
{{-- <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg">
                        <div class="card" data-aos="flip-down" data-aos-duration="800">
                            <img class="card-img-top" src="https://source.unsplash.com/500x300?{{ $category->name }}"
                                alt="{{ $category->name }}">
                            <div class="card-body">
                                <div class="position-center " style="background-color: rgb(0, 0, 0, 0.8">
                                    <div class="row justify-content-center">
                                        <p class="text-white">{{ $category->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
