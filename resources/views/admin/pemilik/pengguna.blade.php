@extends('admin/layouts/main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengguna</h1>
        </div>
    </section>

    <div class="mb-2">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-login-part"><i class="fas fa-plus"></i>
            Tambah Pengguna</button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-login-part" tabindex="-1" role="dialog" aria-labelledby="modal-login-part-label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-login-part-label">Tambah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/pengguna/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="" name="name" required="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="" name="email" required="">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" id="" cols="30" rows="10" name="alamat" required placeholder=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor HP</label>
                                <input type="number" class="form-control" name="nohp" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                    <option value="pemilik">pemilik</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-submit-pengguna">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Table Pengguna</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nohp</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                    $data = App\Models\User::all();
                                @endphp --}}
                                @foreach ($pengguna as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->nohp }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>
                                            @if ($item->role === 'user')
                                                <span class="badge badge-info">{{ $item->role }}</span>
                                            @elseif ($item->role === 'admin')
                                                <span class="badge badge-warning">{{ $item->role }}</span>
                                            @elseif ($item->role === 'pemilik')
                                                <span class="badge badge-danger">{{ $item->role }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="row">
                                                <div class="m-1">
                                                    <a href="#" class="btn btn-icon icon-center btn-info"
                                                        data-toggle="modal" data-target="#modal-edit-part"><i
                                                            class="fas fa-edit"></i></a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal-edit-part" tabindex="-1"
                                                        role="dialog" aria-labelledby="modal-edit-part-label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modal-edit-part-label">
                                                                        Edit
                                                                        Pengguna
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="/pengguna/{{ $item->id }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label>Nama</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $item->name }}"
                                                                                    name="name" required="">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Email</label>
                                                                                <input type="email" class="form-control"
                                                                                    value="{{ $item->email }}"
                                                                                    name="email" required="">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Alamat</label>
                                                                                <textarea class="form-control" id="" cols="30" rows="10" name="alamat" required>{{ $item->alamat }}</textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Nomor HP</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="nohp"
                                                                                    value="{{ $item->nohp }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Role</label>
                                                                                <select class="form-control"
                                                                                    name="role"
                                                                                    value="{{ $item->role }}">
                                                                                    <option value="user">User</option>
                                                                                    <option value="admin">Admin</option>
                                                                                    <option value="pemilik">pemilik
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            {{-- <div class="form-group">
                                                                                <label>Password</label>
                                                                                <input type="password"
                                                                                    class="form-control"
                                                                                    name="password"value="{{ $item->password }}">
                                                                            </div> --}}
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        id="btn-submit-pengguna">Submit</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="m-1">
                                                    <form action="/pengguna/{{ $item->id }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button"
                                                            class="btn btn-icon icon-center btn-danger"data-toggle="modal"
                                                            data-target=".bd-hapus-modal-sm-{{ $item->id }}"><i
                                                                class="fas fa-trash"></i></button>
                                                        <!-- Modal -->
                                                        <div class="modal fade bd-hapus-modal-sm-{{ $item->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content d-flex justify-content-center">
                                                                    {{-- <i class="fas fa-exclamation-circle fa-lg"></i> --}}
                                                                    <p>Apakah anda yakin untuk menghapus?</p>
                                                                    <div
                                                                        class="modal-footer p-2 justify-content-center d-flex">
                                                                        <button type="submit"
                                                                            class="btn btn-danger row">Hapus</button>
                                                                        <button type="button"
                                                                            class="btn btn-secondary row"
                                                                            data-dismiss="modal">Batal</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
