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
                            <div class="col">
                                <h3 class="mb-0">Posts Saya</h3>
                            </div>
                            <div class="col text-right">
                                <a href="/dashboard/posts/create" class="btn btn-sm btn-primary">Tambah Postingan</a>
                            </div>
                        </div>
                    </div>
                    @if (session()->has('success'))
                        <div class="alert alert-success text-center mx-5" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">komentar</th>
                                    <th scope="col">Postingan</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($komentar->count())
                                    @foreach ($komentar as $km)
                                        <tr>
                                            <th>
                                                {{ $loop->iteration }}
                                            </th>
                                            <th>
                                                {{ $km->pengunjung->email }}
                                            </th>
                                            <td>
                                                {{ $km->isi }}
                                            </td>
                                            <td>
                                                {{ $km->post->title }}
                                            </td>
                                            <td class="text-center">
                                                <form action="/dashboard/komentar/{{ $km->id }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger text-white"
                                                        onclick="return confirm('Anda yakin ingin hapus?')" type="submit"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
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
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 2500);
        </script>
    @endsection
