@extends('layouts.app')

@section('title', __('Create Conference'))

@section('content')
    <h1>{{ __('Create New Conference') }}</h1>

    <form action="{{ route('admin.conferences.store') }}" method="POST">
        @csrf
        @include('admin.conferences.form')
        <button type="submit" class="btn btn-primary">{{ __('Save Conference') }}</button>
    </form>
@endsection
