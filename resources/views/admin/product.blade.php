@extends('admin/layouts/main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product</h1>
        </div>
    </section>


    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-login-part"><i class="fas fa-plus"></i>
                    Tambah Product</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modal-login-part" tabindex="-1" role="dialog"
                aria-labelledby="modal-login-part-label" aria-hidden="true">
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


            <div class="card">
                <div class="card-header">
                    <h4>Table Product</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok Produk</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><img src="{{ asset('store/' . $item->foto_produk) }}" class="img-fluid"
                                                width="100" height="200"></td>
                                        <td>{{ $item->nama_produk }}</td>
                                        <td>{{ $item->deskripsi_produk }}</td>
                                        <td>{{ number_format($item->harga_produk) }}</td>
                                        <td>{{ $item->stok_produk }}</td>
                                        <td>

                                            <div class="row">
                                                <div class="m-1">
                                                    <a href="#" class="btn btn-icon icon-center btn-info"
                                                        data-toggle="modal"
                                                        data-target=".bd-edit-modal-lg-{{ $item->id }}"><i
                                                            class="fas fa-edit"></i></a>

                                                    <!-- Modal -->
                                                    <div class="modal fade bd-edit-modal-lg-{{ $item->id }}"
                                                        id="modal-edit-part" tabindex="-1" role="dialog"
                                                        aria-labelledby="modal-edit-part-label" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modal-edit-part-label">
                                                                        Edit
                                                                        Product
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="/Product/{{ $item->id }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label>Nama Product</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $item->nama_produk }}"
                                                                                    name="nama_produk" required="">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Deskripsi Product</label>
                                                                                <textarea class="form-control" id="" cols="30" rows="10" required name="deskripsi_produk">{{ $item->deskripsi_produk }}</textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Harga</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $item->harga_produk }}"
                                                                                    name="harga_produk">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Stok Product</label>
                                                                                <input type="number" class="form-control"
                                                                                    value="{{ $item->stok_produk }}"
                                                                                    name="stok_produk">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Foto Product</label>
                                                                                @if ($item->foto_produk)
                                                                                    <img src="{{ asset('store/' . $item->foto_produk) }}"
                                                                                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                                                @else
                                                                                    <img
                                                                                        class="img-preview img-fluid mb-3 col-sm-5">
                                                                                @endif
                                                                                <div class="custom-file">
                                                                                    <input type="file"
                                                                                        class="custom-file-input"
                                                                                        name="foto_produk"
                                                                                        accept="image/*" id="customFile"
                                                                                        onchange="updateFileNameLabel()">
                                                                                    <label class="custom-file-label"
                                                                                        for="customFile"
                                                                                        id="fileNameLabel">
                                                                                        @if ($item->foto_produk)
                                                                                            <small>Gambar Terpakai:
                                                                                                {{ $item->foto_produk }}</small>
                                                                                        @endif
                                                                                    </label>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                        id="btn-submit-product">Submit</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-1">
                                                    <form action="/Product/{{ $item->id }}" method="POST">
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
