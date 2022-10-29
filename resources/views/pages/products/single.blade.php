@extends('layouts.app')

@section('title',$title)

@section('content')
<h4 class="fw-bold text-decoration-underline text-center mb-4">@yield('title')</h4>
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4>Name : {{ $product->title }}</h4>
        </div>
        <div class="card-body">
            <h5>
                {{ $product->details }}
            </h5>
            <hr>
            <p>SKU : {{ $product->sku }}</p>
            <p>Price : ${{ $product->price }}</p>
            <p>Brand : {{ $product->brand->name }}</p>
        </div>
        <div class="card-footer">
            <form action="" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm">Add to cart</button>
            </form>
        </div>
    </div>
</div>

@endsection
