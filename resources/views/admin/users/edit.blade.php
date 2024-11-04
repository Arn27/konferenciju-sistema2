@extends('layouts.app')

@section('title', __('messages.edit_user'))

@section('content')
<h1>{{ __('messages.edit_user') }}</h1>

@include('admin.users.form', [
    'action' => route('admin.users.update', $user['id']),
    'method' => 'POST',
    'user' => $user
])
@endsection
