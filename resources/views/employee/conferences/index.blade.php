@extends('layouts.app')

@section('title', __('messages.conferences'))

@section('content')
<h1>{{ __('messages.conferences') }}</h1>

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(count($conferences) > 0)
    <ul class="list-group">
        @foreach($conferences as $conference)
            <li class="list-group-item">
                <h5>{{ $conference['title'] }}</h5>
                <p>{{ __('messages.date') }}: {{ $conference['date'] }} {{ $conference['time'] }}</p>
                <a href="{{ route('employee.conferences.show', $conference['id']) }}" class="btn btn-primary">{{ __('messages.view_conference') }}</a>
            </li>
        @endforeach
    </ul>
@else
    <p>{{ __('messages.no_conferences') }}</p>
@endif
@endsection
