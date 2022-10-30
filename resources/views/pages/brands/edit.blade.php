@extends('layouts.app')

@section('title',$title)

@section('content')
<h4 class="fw-bold text-decoration-underline text-center mb-4">@yield('title')</h4>

@include('components.errors')

<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update_brands',['brand'=>$brand]) }}" method="post">
                @csrf
                <label for="name">Brand Name</label>
                <input type="text" name="name" value="{{ $brand->name }}" id="name" class="form-control" required placeholder="Brand Name">
                <input type="submit" value="Save" class="btn btn-primary btn-sm mt-3">
            </form>
        </div>
    </div>
</div>

@endsection
