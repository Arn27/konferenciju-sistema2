@extends('layouts.app')

@section('title', __('Manage Conferences'))

@section('content')
    <h1>{{ __('Manage Conferences') }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('conferences.create') }}" class="btn btn-primary">{{ __('Create New Conference') }}</a>
    </div>

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
                        <a href="{{ route('conferences.edit', $conference->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                        <form action="{{ route('conferences.destroy', $conference->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
