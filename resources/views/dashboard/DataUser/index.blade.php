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
                                <h3 class="mb-0">Data Admin</h3>
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
                        <table class="table align-items-center table-flush" id="tableUsers">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    {{-- <th scope="col">Status</th>
                                    <th scope="col">Role</th>
                                    <th scope="col" class="text-center">Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count())
                                    @foreach ($users as $user)
                                        <tr>
                                            <th>
                                                {{ $loop->iteration }}
                                            </th>
                                            <th>
                                                {{ $user->name }}
                                            </th>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            {{-- <td>
                                                @if ($user->email_verified_at == null)
                                                    <span class="badge badge-warning">Belum diaktifkan</span>
                                                @elseif ($user->is_active == 0)
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                @else
                                                    <span class="badge badge-success">Aktif</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->is_admin == 0)
                                                    <span class="badge badge-success">User</span>
                                                @else
                                                    <span class="badge badge-primary">Admin</span>
                                                @endif
                                            </td> --}}
                                            {{-- <td class="text-center">
                                                <a href="/dashboard/posts/{{ $user->id }}/edit">
                                                <a href="" class="btn btn-warning text-white" data-toggle="modal"
                                                    data-target="#editUser-{{ $user->id }}"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="/dashboard/dataUser/{{ $user->id }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger text-white"
                                                        onclick="return confirm('Anda yakin ingin hapus?')" type="submit"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td> --}}
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

        @foreach ($users as $data)
            {{-- modal --}}
            <div class="modal fade" id="editUser-{{ $data->id }}" tabindex="-1" aria-labelledby="editUserLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserLabel">Atur User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/dashboard/dataUser/{{ $data->id }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="modal-body">
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="form-group">
                                    <select name="is_active" id="roleid" class="form-control">
                                        {{-- <option value="">Pilih Status</option> --}}
                                        @if ($data->is_active == 1)
                                            <option value="{{ $data->is_active }}" selected>Aktif
                                            </option>
                                            <option value="0">Tidak Aktif</option>
                                        @elseif($data->is_active == 0)
                                            <option value="1">Aktif</option>
                                            <option value="{{ $data->is_active }}" selected>Tidak Aktif
                                            </option>
                                        @else
                                            <option value="{{ $data->is_active }}">Belum diaktifkan</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="is_admin" id="roleid" class="form-control">
                                        {{-- <option value="">Pilih Status</option> --}}
                                        @if ($data->is_admin == 1)
                                            <option value="{{ $data->is_admin }}" selected>Admin
                                            </option>
                                            <option value="0">User</option>
                                        @elseif($data->is_admin == 0)
                                            <option value="1">Admin</option>
                                            <option value="{{ $data->is_admin }}" selected>User
                                            </option>
                                        @else
                                            <option value="{{ $data->is_admin }}">Belum diaktifkan</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="sumbit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
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