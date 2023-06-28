@extends('layout.master')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('assets/compiled/css/error.css') }}">
@endsection

@section('content')
<div id="error">
  <div class="error-page container">
    <div class="col-md-8 col-12 offset-md-2">
      <div class="text-center">
        <img class="img-error" src="{{ asset('assets/compiled/svg/error-403.svg') }}" alt="Not Found" />
        <h1 class="error-title">Forbidden</h1>
        <p class="fs-5 text-gray-600">
          {{ $message ?? 'You are unauthorized to see this page.'}}
        </p>
        <!-- <a href="{{ route('dashboard') }}" class="btn btn-lg btn-outline-primary mt-3">Go Home</a> -->
      </div>
    </div>
  </div>
</div>
@endsection