@extends('layouts.landing')
@section('isikonten')
    <div class="container col-xl-10">
        <br>
        <br>
        <br>
        <br>
        <h1 class="text-center text-dark">Tentang</h1>
        <hr />
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg">
                    <div class="row justify-content-center">
                        <div class="col-xl service-item">
                            <a>{!! $tentang->body !!}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
