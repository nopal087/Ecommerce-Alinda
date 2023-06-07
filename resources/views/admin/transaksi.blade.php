@extends('admin/layouts/main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Transaksi</h1>
        </div>
    </section>


    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <a href="#" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i>Tambah Transaksi</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Table Transaksi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total</th>
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
                                        delete
                                        hapus
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
