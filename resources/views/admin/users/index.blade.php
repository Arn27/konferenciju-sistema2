@extends('layouts.app')

@section('title', __('messages.users'))

@section('content')
<h1>{{ __('messages.users') }}</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(count($users) > 0)
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>{{ __('messages.first_name') }}</th>
            <th>{{ __('messages.last_name') }}</th>
            <th>{{ __('messages.email') }}</th>
            <th>{{ __('messages.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user['id'] }}</td>
            <td>{{ $user['first_name'] }}</td>
            <td>{{ $user['last_name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user['id']) }}" class="btn btn-sm btn-warning">{{ __('messages.edit') }}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>{{ __('messages.no_users') }}</p>
@endif
@endsection
