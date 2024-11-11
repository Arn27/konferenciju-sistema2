@extends('layouts.app')

@section('title', $conference->title)

@section('content')
    <h1>{{ $conference->title }}</h1>

    <div class="mb-4">
        <p><strong>{{ __('messages.description') }}:</strong> {{ $conference->description }}</p>
        <p><strong>{{ __('messages.date') }}:</strong> {{ $conference->date }}</p>
        <p><strong>{{ __('messages.time') }}:</strong> {{ $conference->time }}</p>
        <p><strong>{{ __('messages.location') }}:</strong> {{ $conference->location }}</p>
        <p><strong>{{ __('messages.lecturers') }}:</strong> {{ $conference->lecturers }}</p>
    </div>

    @if($conference->users->contains(auth()->user()))
    <p>You are registered for this conference.</p>
    <form action="{{ route('client.conferences.cancel', $conference->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Cancel Registration</button>
    </form>
@else
    <form action="{{ route('client.conferences.register.submit', $conference->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endif

@endsection
