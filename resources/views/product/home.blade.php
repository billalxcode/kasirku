@extends('layout.master')

@section('stylesheet')

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
                    {{ Breadcrumbs::render('product') }}
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
                <div class="card">
                    <div class="card-body">
                        @if (auth()->user()->can('add product'))
                            <a href="{{ route('product.create') }}" class="btn btn-primary">
                                Add item
                            </a>
                            <a href="" class="btn btn-outline-primary">
                                Import item from file
                            </a>
                            <a href="" class="btn btn-outline-primary">
                                Export item to file
                            </a>
                        @else
                            <div class="alert alert-danger">
                                Sorry, you do not have permission to modify the database!!
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>CODE</th>
                                        <th>NAME</th>
                                        <th>STOCK</th>
                                        <th>PRICE</th>
                                        <th>CATEGORY</th>
                                        <th>UNIT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td class="text-bold-500">{{ $product->product_code }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->unit_in_stock }}</td>
                                        <td>{{ $product->unit_price }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->unit->unit_name }}</td>

                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
    </section>
</div>
@endsection