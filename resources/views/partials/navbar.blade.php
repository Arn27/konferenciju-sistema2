<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Konferencijos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('messages.toggle_navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @if(auth()->check() && auth()->user()->hasRole('client'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.conferences') }}">{{ __('messages.client_subsystem') }}</a>
                    </li>
                @endif
                @if(auth()->check() && auth()->user()->hasRole('employee'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employee.conferences') }}">{{ __('messages.employee_subsystem') }}</a>
                    </li>
                @endif
                @if(auth()->check() && auth()->user()->hasRole('admin'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('messages.admin_subsystem') }}</a>
                    </li>
                @endif

                @if(auth()->check())
                    <li class="nav-item">
                        <span class="navbar-text">
                            {{ __('messages.user') }}: {{ auth()->user()->name }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="display: inline; padding: 0; margin: 0; border: none;">
                                {{ __('messages.logout') }}
                            </button>
                        </form>
                    </li>
                @endif
            </ul>

            <!-- Language Switcher -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                        <a class="dropdown-item" href="{{ route('change_language', ['locale' => 'en']) }}">English</a>
                        <a class="dropdown-item" href="{{ route('change_language', ['locale' => 'lt']) }}">Lietuvių</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
