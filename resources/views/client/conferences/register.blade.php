@extends('layouts.app')

@section('title', __('messages.register_for_conference'))

@section('content')
<h1>{{ __('messages.register_for_conference') }}</h1>

<p>{{ __('messages.conference') }}: {{ $conference['title'] }}</p>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('client.conferences.register.submit', $conference['id']) }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">{{ __('messages.name') }}</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="email">{{ __('messages.email') }}</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">{{ __('messages.register') }}</button>
</form>
@endsection
