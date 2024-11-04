@extends('layouts.app')

@section('title', __('messages.admin_dashboard'))

@section('content')
<div class="container">
    <h1>{{ __('messages.admin_dashboard') }}</h1>
    <p>{{ __('messages.welcome_admin') }}</p>
</div>
@endsection
