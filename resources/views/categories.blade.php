@extends('layouts.landing')
@section('isikonten')
    <div class="container col-xl-10">
        <h1 class="mb-5">Post Categories</h1>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-lg" data-aos="zoom-out-up" data-aos-duration="800">
                    <div class="card">
                        <img class="card-img-top" src="/assetsdashboard/img/brand/category_map.jpg"
                            alt="{{ $category->name }}">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/posts?category={{ $category->slug }}"
                                    class="btn btn-primary">{{ $category->name }}</a></h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
