@extends('layouts.app')

@section('title', __('messages.conferences'))

@section('content')
<h1 class="mb-4">{{ __('messages.conferences') }}</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(count($conferences) > 0)
    <div class="row">
        @foreach($conferences as $conference)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $conference['title'] }}</h5>
                        <p class="card-text">{{ Str::limit($conference['description'], 100) }}</p>
                        <p class="card-text">
                            <small class="text-muted">{{ __('messages.date') }}: {{ $conference['date'] }}</small>
                        </p>

                        <a href="{{ route('client.conferences.show', $conference['id']) }}" class="btn btn-primary mt-auto mb-2">
                            {{ __('messages.view_conference') }}
                        </a>

                        <form action="{{ route('client.conferences.register.submit', $conference['id']) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success mt-auto">{{ __('messages.register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>{{ __('messages.no_conferences') }}</p>
@endif
@endsection
