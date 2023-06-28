@extends('layout.master')

@section('stylesheet')

@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Customers</h3>
                <p class="text-subtitle text-muted">Kamu dapat mengelola customer</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Table</li>
                    </ol> -->
                    {{ Breadcrumbs::render('customer') }}
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
                        <a href="{{ route('customer.create') }}" class="btn btn-primary">
                            Add item
                        </a>
                        <a href="" class="btn btn-outline-primary">
                            Import item from file
                        </a>
                        <a href="" class="btn btn-outline-primary">
                            Export item to file
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Customer List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>CODE</th>
                                        <th>NAME</th>
                                        <th>CONTACT</th>
                                        <th>ADDRESS</th>
                                        @hasrole('owner')
                                            <th>ACTION</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                    <tr>
                                        <td class="text-bold-500">{{ $customer->customer_code }}</td>
                                        <td>{{ $customer->customer_name }}</td>
                                        <td>{{ $customer->contact }}</td>
                                        <td>{{ $customer->address }}</td>
                                        @hasrole('owner')
                                        <td>
                                            <a href="{{ route('customer.destroy', $customer->id) }}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                        @endrole
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