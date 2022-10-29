@extends('layouts.app')

@section('title',$title)

@section('content')
<h4 class="fw-bold text-decoration-underline text-center mb-4">@yield('title')</h4>
<div class="row">
    @foreach ($products as $product)
        @include('components.product-card',['product'=>$product])
    @endforeach
</div>
<div class="row">
    {{ $products->links() }}
</div>

@endsection
