@extends('layouts.app')

@section('title', __('Manage Conferences'))

@section('content')
    <h1>{{ __('Manage Conferences') }}</h1>

    <a href="{{ route('admin.conferences.create') }}" class="btn btn-success mb-4">{{ __('Create New Conference') }}</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($conferences) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($conferences as $conference)
                    <tr>
                        <td>{{ $conference->title }}</td>
                        <td>{{ $conference->date }}</td>
                        <td>
                            <a href="{{ route('admin.conferences.edit', $conference->id) }}" class="btn btn-warning">{{ __('Edit') }}</a>
                            <form action="{{ route('admin.conferences.destroy', $conference->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>{{ __('No conferences available.') }}</p>
    @endif
@endsection
