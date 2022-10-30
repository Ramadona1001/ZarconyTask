@extends('layouts.app')

@section('title',$title)

@section('content')
<h4 class="fw-bold text-decoration-underline text-center mb-4">@yield('title')</h4>

@include('components.errors')

<div class="row mb-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update_users',['user'=>$user]) }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" id="name" class="form-control" required placeholder="Full Name">
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" required placeholder="Email Address">
                </div>

                <div class="form-group mb-3">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" value="{{ $user->mobile }}" class="form-control" required placeholder="Mobile">
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>

                <div class="form-group mb-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                </div>

                <div class="form-group mb-3">
                    <label for="type">Type</label>
                    <select name="type" required id="type" class="form-control">
                        @foreach (['client','admin'] as $type)
                            <option value="{{ $type }}" @if($user->type == $type) selected @endif>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" value="Save" class="btn btn-primary btn-sm">
            </form>
        </div>
    </div>
</div>

@endsection
