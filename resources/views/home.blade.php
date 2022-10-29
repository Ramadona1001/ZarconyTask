@extends('layouts.app')

@section('title','Zarcony Task')

@section('content')

<div class="row justify-content-center">
    <div class="col-4">
        <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Our brands</h5>
              <h6 class="card-subtitle mb-2 text-muted">You can see our brands</h6>
              <a href="{{ route('brands') }}" class="card-link">List of brands</a>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Our products</h5>
              <h6 class="card-subtitle mb-2 text-muted">You can see our products</h6>
              <a href="{{ route('products') }}" class="card-link">List of products</a>
            </div>
        </div>
    </div>
</div>

@endsection
