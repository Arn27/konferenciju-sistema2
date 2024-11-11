@extends('layouts.app')

@section('title', __('Admin Dashboard'))

@section('content')
    <h1>{{ __('Admin Dashboard') }}</h1>

    <div class="mb-4">
        <a href="{{ route('users.index') }}" class="btn btn-primary">{{ __('Manage Users') }}</a>
        <a href="{{ route('admin.conferences.index') }}" class="btn btn-primary">{{ __('Manage Conferences') }}</a>
    </div>

    <p>Welcome to the admin dashboard. Use the links above to manage users and conferences.</p>
@endsection
