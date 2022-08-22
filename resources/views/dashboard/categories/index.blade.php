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
                                <h3 class="mb-0">Posts Kategori</h3>
                            </div>
                            <div class="col text-right">
                                <a href="/dashboard/categories/create" class="btn btn-sm btn-primary">Tambah Kategori</a>
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
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($categories->count())
                                    @foreach ($categories as $category)
                                        <tr>
                                            <th>
                                                {{ $loop->iteration }}
                                            </th>
                                            <th>
                                                {{ $category->name }}
                                            </th>
                                            <td class="text-center">
                                                <a href="/dashboard/categories/{{ $category->slug }}/edit"
                                                    class="btn btn-warning text-white"><i class="fas fa-edit"></i></a>
                                                <form action="/dashboard/categories/{{ $category->slug }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger text-white"
                                                        onclick="return confirm('Anda yakin ingin hapus?')" type="submit"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                    {{-- <button class="btn btn-danger text-white" onclick="ff()" type="submit"><i
                                                        class="fas fa-trash-alt"></i></button> --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <th colspan="4" class="text-center"><a class="display-4"> Belum Membuat
                                            Postingan</a></th>
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
