@extends('layouts.app')

@section('title', __('messages.all_conferences'))

@section('content')
    <h1 class="mb-4">{{ __('messages.all_conferences') }}</h1>

    @if(count($conferences) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('messages.title') }}</th>
                    <th>{{ __('messages.date') }}</th>
                    <th>{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($conferences as $conference)
                    <tr>
                        <td>{{ $conference->title }}</td>
                        <td>{{ $conference->date }}</td>
                        <td>
                            <a href="{{ route('employee.conferences.show', $conference->id) }}" class="btn btn-primary">{{ __('messages.view_details') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>{{ __('messages.no_conferences') }}</p>
    @endif
@endsection
