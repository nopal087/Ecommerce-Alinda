@extends('admin/layouts/main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pesanan</h1>
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
                    <h5 class="modal-title" id="modal-login-part-label">Tambah Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/Product/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Product</label>
                                <input type="text" class="form-control" placeholder="Benang" name="nama_produk"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Product</label>
                                <textarea class="form-control" id="" cols="30" rows="10" name="deskripsi_produk" required
                                    placeholder="Isikan deskripsi tentang produk anda"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="text" class="form-control" name="harga_produk" placeholder="10.000">
                            </div>
                            <div class="form-group">
                                <label>Stok Product</label>
                                <input type="number" class="form-control" name="stok_produk" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Foto Product</label>
                                <div class="custom-file">
                                    <label class="custom-file-label" for="customFile" id="fileNameLabel">Choose
                                        file</label>
                                </div>
                                <input type="file" class="custom-file-input" id="customFile" name="foto_produk"
                                    accept="image/*" onchange="updateFileNameLabel()">
                            </div>
                            {{-- javascript digunakan untuk menampilkan nama file ketika file diupload --}}
                            <script>
                                function updateFileNameLabel() {
                                    var fileName = document.getElementById("customFile").files[0].name;
                                    document.getElementById("fileNameLabel").innerHTML = fileName;
                                }
                            </script>
                            {{-- end script --}}
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-submit-product">Submit</button>
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

                                        <td>edit delete</td>
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
