@extends('layouts.app')

@section('title',$title)

@section('content')
<h4 class="fw-bold text-decoration-underline text-center mb-4">@yield('title')</h4>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Type</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($users as $index => $user)
                <tr>
                    <td>{{ ($index+1) }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ ucfirst($user->type) }}</td>
                    <td>
                        <a href="{{ route('edit_users',['user'=>$user]) }}" class="btn btn-warning btn-sm">Edit</a>
                        @if($user->type != 'admin')
                            <a href="{{ route('delete_users',['user'=>$user]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')">Delete</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    {{ $users->links() }}
</div>

@endsection
