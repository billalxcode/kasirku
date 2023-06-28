@extends('layout.master')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}" />
@endsection

@section('script')
<script>
    function generate_supplier_code(max_length = 8) {
        let supplier_code = ''
        for (let i = 0; i < max_length; i++) {
            supplier_code += Math.floor(Math.random() * 9)
        }
        return supplier_code
    }

    document.onload = function () {
        let supplier_code_element = document.querySelector('#supplier_code')
        let supplier_code = generate_supplier_code()
        supplier_code_element.value = supplier_code
    }()
</script>
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Supplier</h3>
                <p class="text-subtitle text-muted">Kamu dapat mengelola supplier</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Table</li>
                    </ol> -->
                    {{ Breadcrumbs::render('supplier.create') }}
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
                        <h4 class="card-title">Create new supplier</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal" method="post" action="{{ route('supplier.store') }}" id="form">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="supplier-code">Supplier Code</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="supplier_code" class="form-control" name="supplier_code" placeholder="Enter a supplier code" value="{{ old('supplier_code') }}" readonly>
                                        @if ($errors->has('supplier_code'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('supplier_code') }}
                                        </small>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="supplier_name">Supplier Name</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="supplier_name" class="form-control" name="supplier_name" placeholder="Enter a full supplier name" value="{{ old('supplier_name') }}">
                                        @if ($errors->has('supplier_name'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('supplier_name') }}
                                        </small>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="contact">Contact</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="contact" class="form-control" name="supplier_contact" placeholder="Enter valid contact" value="{{ old('contact') }}">
                                        @if ($errors->has('supplier_contact'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('supplier_contact') }}
                                        </small>
                                        @endif
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="address" class="form-control" name="supplier_address" placeholder="Enter valid address" value="{{ old('address') }}">
                                        @if ($errors->has('supplier_address'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('supplier_address') }}
                                        </small>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="email" id="email" class="form-control" name="supplier_email" placeholder="Enter valid email" value="{{ old('email') }}">
                                        @if ($errors->has('supplier_email'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('supplier_email') }}
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