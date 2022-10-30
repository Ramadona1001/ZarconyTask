@extends('layouts.app')

@section('title',$title)

@section('content')
<h4 class="fw-bold text-decoration-underline text-center mb-4">@yield('title')</h4>
<div class="row">
    <table class="table table-bordered text-center">
        <thead>
            <th>#</th>
            <th>User</th>
            <th>Type</th>
            <th>Activity</th>
            <th>At</th>
        </thead>
        <tbody>
            @foreach ($activities as $index => $activity)
                <tr>
                    <td>{{ ($index+1) }}</td>
                    <td>{{ $activity->user->name }}</td>
                    <td>{{ $activity->user->type }}</td>
                    <td>{{ $activity->activity }}</td>
                    <td>{{ $activity->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row">
    {{ $activities->links() }}
</div>

@endsection
