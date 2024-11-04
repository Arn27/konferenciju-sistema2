@extends('layouts.app')

@section('title', __('messages.home'))

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">{{ __('messages.welcome') }}</h1>
    <p class="lead">{{ __('messages.use_navigation') }}</p>
    <a class="btn btn-primary btn-lg" href="{{ route('client.conferences') }}" role="button">{{ __('messages.view_conferences') }}</a>
</div>
@endsection
