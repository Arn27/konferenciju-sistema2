@extends('layouts.app')

@section('title', __('Conferences'))

@section('content')
    <h1>{{ __('Conferences') }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Location') }}</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conferences as $conference)
                <tr>
                    <td>{{ $conference->title }}</td>
                    <td>{{ $conference->date }}</td>
                    <td>{{ $conference->location }}</td>
                    <td>
                        <!-- Show "Cancel Registration" if the user is already registered, otherwise "Register" -->
                        @if($conference->users->contains(auth()->user()))
                            <form action="{{ route('client.conferences.cancel', $conference->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('Cancel Registration') }}</button>
                            </form>
                        @else
                            <form action="{{ route('client.conferences.register.submit', $conference->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                            </form>
                        @endif
                        <a href="{{ route('client.conferences.show', $conference->id) }}" class="btn btn-secondary">{{ __('View Conference') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
