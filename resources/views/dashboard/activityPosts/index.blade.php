@extends('dashboard.layouts.dashboard')
@section('dashboard')
    <div class="container-fluid">

    </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-11 offset-1">
                <div class="card">
                    <div class="card-header border-0">
                        <form action="/dashboard/semuaActivityPosts" method="GET">

                            <div class="row">
                                <div class="col-md-2">
                                    <label class="pt-2" for="dari">Dari tanggal</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control datepicker" placeholder="Input tanggal"
                                        value="{{ request('dari') }}" name="dari">
                                </div>
                                <div class="col-md-2">
                                    <label class="pt-2" for="dari">Sampai tanggal</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control datepicker" placeholder="Input Tanggal"
                                        value="{{ request('ke') }}" name="ke">
                                </div>
                                <div class="col-md-2">
                                    <a href="/dashboard/semuaActivityPosts" class="btn btn-success">reset</a>
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Semua Data Postingan</h3>
                            </div>
                            {{-- <div class="col text-right">
                            <a href="/dashboard/posts/create" class="btn btn-sm btn-primary">Tambah Postingan</a>
                        </div> --}}
                        </div>
                    </div>
                    @if (session()->has('success'))
                        <div class="alert alert-success text-center mx-5" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush" >
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Penulis</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">dibuat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($posts->count())
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th>
                                                {{ $loop->iteration }}
                                            </th>
                                            <th>
                                                {{ $post->user->name }}
                                            </th>
                                            <th>
                                                {{ $post->title }}
                                            </th>
                                            <td>
                                                {{ $post->category->name }}
                                            </td>
                                            <td>
                                                {{ date('d F Y , H:i', strtotime($post->created_at)) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <th colspan="4" class="text-center"><a class="display-4"> Belum Data
                                            Postingan</a>
                                    </th>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // $(document).on('click', '#btn-editUser', function() {
            //     let id = $(this).data('id')
            //     let isActive = $(this).data('active')
            //     let isAdmin = $(this).data('status')
            //     $('.modal-body #id').val(id)
            //     $('.modal-body #is_active').val(isActive)
            //     $('.modal-body #is_admin').val(isAdmin)
            // })
        </script>
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 2500);
        </script>
    @endsection
