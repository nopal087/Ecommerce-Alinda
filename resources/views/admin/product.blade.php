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
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Product</label>
                                        <input type="text" class="form-control" placeholder="Benang" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="email" class="form-control" placeholder="10.000">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Product</label>
                                        <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10" required
                                            placeholder="Isikan deskripsi tentang produk anda"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto Product</label>
                                        <div class="custom-file ">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn-submit-product">Submit</button>
                        </div>
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
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Benang</td>
                                    <td>Rp. 150.000</td>
                                    <td>1</td>
                                    <td>Rp. 150.000</td>
                                    <td>
                                        <a href="#" class="btn btn-icon icon-left btn-info"><i
                                                class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-icon icon-left btn-danger"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
