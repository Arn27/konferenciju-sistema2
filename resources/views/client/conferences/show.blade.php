@extends('layouts.app')

@section('title', $conference['title'])

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h2>{{ $conference['title'] }}</h2>
    </div>
    <div class="card-body">
        <p><strong>{{ __('messages.date') }}:</strong> {{ $conference['date'] }} {{ $conference['time'] }}</p>
        <p><strong>{{ __('messages.address') }}:</strong> {{ $conference['address'] }}</p>
        <p><strong>{{ __('messages.lecturers') }}:</strong> {{ $conference['lecturers'] }}</p>
        <hr>
        <p>{{ $conference['description'] }}</p>

        <a href="{{ route('client.conferences.register', $conference['id']) }}" class="btn btn-success">
            <i class="fas fa-pen"></i> {{ __('messages.register') }}
        </a>
        <a href="{{ route('client.conferences') }}" class="btn btn-secondary">{{ __('messages.back_to_list') }}</a>
    </div>
</div>
@endsection
