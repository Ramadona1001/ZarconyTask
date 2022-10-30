@extends('layouts.app')

@section('title',$title)

@section('content')
<h4 class="fw-bold text-decoration-underline text-center mb-4">@yield('title')</h4>

@include('components.errors')

<div class="row mb-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('store_users') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" required placeholder="Full Name">
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="Email Address">
                </div>

                <div class="form-group mb-3">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" required placeholder="Mobile">
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
                </div>

                <div class="form-group mb-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required placeholder="Confirm Password">
                </div>

                <div class="form-group mb-3">
                    <label for="type">Type</label>
                    <select name="type" required id="type" class="form-control">
                        <option value="">Select Type</option>
                        @foreach (['user','admin'] as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" value="Save" class="btn btn-primary btn-sm">
            </form>
        </div>
    </div>
</div>

@endsection
