@extends('layout.master')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}" />
@endsection

@section('script')
<script>
    function generate_customer_code(max_length = 8) {
        let customer_code = ''
        for (let i = 0; i < max_length; i++) {
            customer_code += Math.floor(Math.random() * 9)
        }
        return customer_code
    }

    document.onload = function () {
        let customer_code_element = document.querySelector('#customer_code')
        let customer_code = generate_customer_code()
        customer_code_element.value = customer_code
    }()
</script>
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Customer</h3>
                <p class="text-subtitle text-muted">Kamu dapat mengelola customer</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Table</li>
                    </ol> -->
                    {{ Breadcrumbs::render('customer.create') }}
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
                @hasrole('owner')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create new customer</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal" method="post" action="{{ route('customer.store') }}" id="form">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="customer-code">Customer Code</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="customer_code" class="form-control" name="customer_code" placeholder="Enter a customer code" value="{{ old('customer_code') }}" readonly>
                                        @if ($errors->has('customer_code'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('customer_code') }}
                                        </small>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="customer_name">Customer Name</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="customer_name" class="form-control" name="customer_name" placeholder="Enter a full customer name" value="{{ old('customer_name') }}">
                                        @if ($errors->has('customer_name'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('customer_name') }}
                                        </small>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="contact">Contact</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="contact" class="form-control" name="contact" placeholder="Enter valid contact" value="{{ old('contact') }}">
                                        @if ($errors->has('contact'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('contact') }}
                                        </small>
                                        @endif
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="address" class="form-control" name="address" placeholder="Enter valid address" value="{{ old('address') }}">
                                        @if ($errors->has('address'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('address') }}
                                        </small>
                                        @endif
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