@extends('layouts.app')

@section('title', __('messages.create_conference'))

@section('content')
<h1>{{ __('messages.create_conference') }}</h1>

@include('admin.conferences.form', [
    'action' => route('admin.conferences.store'),
    'method' => 'POST',
    'conference' => null
])
@endsection
