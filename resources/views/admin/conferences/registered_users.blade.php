<!-- resources/views/admin/conferences/registered_users.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Users Registered for {{ $conference->title }}</h1>

    @if($conference->users->isEmpty())
        <p>No users have registered for this conference.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($conference->users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->pivot->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('admin.conferences.index') }}">Back to Conferences</a>
@endsection
