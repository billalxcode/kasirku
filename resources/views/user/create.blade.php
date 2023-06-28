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
                <h3>User</h3>
                <p class="text-subtitle text-muted">Kamu dapat mengelola user</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Table</li>
                    </ol> -->
                    {{ Breadcrumbs::render('user.create') }}
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
                        <h4 class="card-title">Create new user</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal" method="post" action="{{ route('user.store') }}" id="form">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="username" class="form-control" name="username" placeholder="Enter a username" value="{{ old('username') }}">
                                        @if ($errors->has('username'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('username') }}
                                        </small>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="name" class="form-control" name="name" placeholder="Enter a full name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('name') }}
                                        </small>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Enter valid email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('email') }}
                                        </small>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Enter a password">
                                        @if ($errors->has('password'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('password') }}
                                        </small>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="role">Role</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select class="choices form-select" name="role">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role'))
                                        <small class="form-text text-danger">
                                            {{ $errors->first('role') }}
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