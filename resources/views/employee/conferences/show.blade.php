@extends('layouts.app')

@section('title', $conference['title'])

@section('content')
<h1>{{ $conference['title'] }}</h1>

<p><strong>{{ __('messages.date') }}:</strong> {{ $conference['date'] }} {{ $conference['time'] }}</p>
<p><strong>{{ __('messages.address') }}:</strong> {{ $conference['address'] }}</p>
<p><strong>{{ __('messages.lecturers') }}:</strong> {{ $conference['lecturers'] }}</p>
<p><strong>{{ __('messages.description') }}:</strong></p>
<p>{{ $conference['description'] }}</p>

<h2>{{ __('messages.registered_clients') }}</h2>

@if(count($registeredClients) > 0)
    <ul class="list-group">
        @foreach($registeredClients as $client)
            <li class="list-group-item">
                {{ $client['first_name'] }} {{ $client['last_name'] }}
            </li>
        @endforeach
    </ul>
@else
    <p>{{ __('messages.no_registered_clients') }}</p>
@endif

<a href="{{ route('employee.conferences') }}" class="btn btn-secondary">{{ __('messages.back_to_list') }}</a>
@endsection
