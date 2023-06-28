@extends('layout.master')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}" />
@endsection

@section('script')
<script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset('assets/pages/product-create.js') }}"></script>
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Product</h3>
                <p class="text-subtitle text-muted">Kamu dapat mengelola product</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Table</li>
                    </ol> -->
                    {{ Breadcrumbs::render('product.create') }}
                </nav>

            </div>
        </div>
    </div>

    <section class="section">
        <div class="row match-height">
            <div class="col-12">
                @include('layout.partials.alert')
            </div>
            <div class="col-12">
                @if (auth()->user()->can('add product'))
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create new product</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal" method="post" action="{{ route('product.store') }}" id="form">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="product-code">Product Code</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="product-code" class="form-control" name="product_code" placeholder="Scan barcode to get a code">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="product-name">Product Name</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="product-name" class="form-control" name="product_name" placeholder="Enter a product name">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="unit-in-stock">Unit in stock</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" id="unit-in-stock" class="form-control" name="unit_in_stock" placeholder="Enter total unit in stock">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="unit-price">Unit price</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" id="unit-price" class="form-control" name="unit_price" placeholder="Enter a product price">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="category_id">Category</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select class="choices form-select" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="unit_id">Unit</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select class="choices form-select" name="unit_id">
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="alert alert-danger">
                    Sorry, you do not have permission to modify the database
                </div>
                @endif
            </div>
        </div>
    </section>
</div>
@endsection