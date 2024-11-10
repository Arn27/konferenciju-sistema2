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

    <h3>{{ __('messages.registered_clients') }}</h3>
    @if(count($conference->users) > 0)
        <ul>
            @foreach($conference->users as $user)
                <li>{{ $user->name }} - {{ $user->email }
