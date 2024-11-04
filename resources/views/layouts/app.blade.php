<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Konferencijų sistema</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
@include('partials.navbar')
    <div class="container mt-4">
        @yield('content')
    </div>
    <a href="{{ route('client.conferences.register', $conference['id']) }}" class="btn btn-success">
        <i class="fas fa-pen"></i> {{ __('messages.register') }}
    </a>


    <footer class="bg-light text-center py-3 mt-4">
        <p>&copy; {{ date('Y') }} VVK</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
