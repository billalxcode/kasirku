@extends('layout.cashier.master')

@section('script')
@vite(['resources/js/cashier/barcode.js'])
@endsection

@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="card-title">Products</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" id="formbarcode">
                        <div class="form-group">
                            <label for="product-code">Product Code</label>
                            <input type="text" id="product-code" class="form-control" name="product_code" placeholder="Scan barcode to get a code" autofocus>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>PRODUK</th>
                                    <th>QTY</th>
                                    <th>HARGA</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-lg-6">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4 class="card-title">Tagihan</h4>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center">
                                Rp. <span id="total_tagihan">0</span>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4 class="card-title">Aksi</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <form action="" method="post" id="formvoucher">
                                        <div class="form-group">
                                            <label for="voucher-code">Voucher Code (Opsional)</label>
                                            <div class="input-group">
                                                <input type="text" id="voucher-code" class="form-control" name="voucher_code" placeholder="Enter voucher code" autofocus>
                                                <button class="btn btn-primary">Terapkan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-3">
                                            <button class="btn btn-outline-secondary w-100">Reset</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-primary w-100"><i class="fa fa-money-bill mx-1"></i> Bayar</button>
                                        </div>
                                        <div class="col-3">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection