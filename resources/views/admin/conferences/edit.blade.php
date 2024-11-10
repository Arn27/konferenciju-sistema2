@extends('layouts.app')

@section('title', __('Edit Conference'))

@section('content')
    <h1>{{ __('Edit Conference') }}</h1>

    <form action="{{ route('admin.conferences.update', $conference->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.conferences.form')
        <button type="submit" class="btn btn-primary">{{ __('Update Conference') }}</button>
    </form>
@endsection
