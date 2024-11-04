@extends('layouts.app')

@section('title', __('messages.conference_list'))

@section('content')
<h1>{{ __('messages.conference_list') }}</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('admin.conferences.create') }}" class="btn btn-primary mb-3">{{ __('messages.create_conference') }}</a>

@if(count($conferences) > 0)
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>{{ __('messages.title') }}</th>
            <th>{{ __('messages.date') }}</th>
            <th>{{ __('messages.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($conferences as $conference)
        <tr>
            <td>{{ $conference['id'] }}</td>
            <td>{{ $conference['title'] }}</td>
            <td>{{ $conference['date'] }}</td>
            <td>
                <a href="{{ route('admin.conferences.edit', $conference['id']) }}" class="btn btn-sm btn-warning">{{ __('messages.edit') }}</a>
                <form action="{{ route('admin.conferences.destroy', $conference['id']) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">{{ __('messages.delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>{{ __('messages.no_conferences') }}</p>
@endif
@endsection
