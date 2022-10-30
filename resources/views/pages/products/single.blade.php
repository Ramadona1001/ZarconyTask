@extends('layouts.app')

@section('title',$title)

@section('content')
<h4 class="fw-bold text-decoration-underline text-center mb-4">@yield('title')</h4>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-5">
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
                <a class="btn btn-primary btn-sm" href="{{ route('add_to_cart',['product'=>$product]) }}">Add To Cart</a>
            </div>
        </div>
    </div>
</div>

@endsection
