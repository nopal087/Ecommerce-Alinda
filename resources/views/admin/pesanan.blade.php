@extends('admin/layouts/main')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pesanan</h1>
        </div>
    </section>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Table Pesanan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Harga satuan</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Rifqy</td>
                                    <td>Benang</td>
                                    <td>1</td>
                                    <td>Rp. 10.000</td>
                                    <td>Rp. 10.000</td>
                                    <td><span class="badge badge-success">Lunas</span></td>
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
