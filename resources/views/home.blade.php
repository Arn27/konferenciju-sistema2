@extends('layouts.app')

@section('title', __('messages.home'))

@section('content')
<h1>{{ __('messages.welcome') }}</h1>
<p>{{ __('messages.student_info') }}: [Tavo vardas, pavardė, grupė]</p>
<ul>
    <li><a href="{{ route('client.conferences') }}">{{ __('messages.client_subsystem') }}</a></li>
    <li><a href="{{ route('employee.conferences') }}">{{ __('messages.employee_subsystem') }}</a></li>
    <li><a href="{{ route('admin.dashboard') }}">{{ __('messages.admin_subsystem') }}</a></li>
</ul>
@endsection
