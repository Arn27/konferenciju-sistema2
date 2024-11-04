@extends('layouts.app')

@section('title', __('messages.edit_conference'))

@section('content')
<h1>{{ __('messages.edit_conference') }}</h1>

@include('admin.conferences.form', [
    'action' => route('admin.conferences.update', $conference['id']),
    'method' => 'PUT',
    'conference' => $conference
])
@endsection
