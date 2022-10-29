@extends('layouts.app')

@section('title',$title)

@section('content')
<h4 class="fw-bold text-decoration-underline text-center mb-4">@yield('title')</h4>
<div class="row">
    @foreach ($brands as $brand)
        @include('components.brand-card',['brand'=>$brand])
    @endforeach
</div>
<div class="row">
    {{ $brands->links() }}
</div>

@endsection
