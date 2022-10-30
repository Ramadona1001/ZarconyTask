@extends('layouts.app')

@section('title',$title)

@section('content')
<h4 class="fw-bold text-decoration-underline text-center mb-4">@yield('title')</h4>

@include('components.errors')

<div class="row mb-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('store_products') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Product Name</label>
                    <input type="text" name="title" id="title" class="form-control" required placeholder="Product Name">
                </div>

                <div class="form-group mb-3">
                    <label for="sku">Product SKU</label>
                    <input type="text" name="sku" id="sku" class="form-control" required placeholder="Product SKU">
                </div>

                <div class="form-group mb-3">
                    <label for="details">Product Details</label>
                    <textarea name="details" id="details" cols="30" rows="3" class="form-control" required placeholder="Product Details"></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="price">Product Price</label>
                    <input type="number" min="0.1" value="0.1" step="0.1" name="price" id="price" class="form-control" required placeholder="Product Price">
                </div>

                <div class="form-group mb-3">
                    <label for="brand">Product Brand</label>
                    <select name="brand" required id="brand" class="form-control">
                        <option value="">Select Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" value="Save" class="btn btn-primary btn-sm">
            </form>
        </div>
    </div>
</div>

@endsection
