<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Konferencijos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('messages.toggle_navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('client.conferences') }}">{{ __('messages.client_subsystem') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employee.conferences') }}">{{ __('messages.employee_subsystem') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('messages.admin_subsystem') }}</a>
            </li>
            <li class="nav-item">
                <span class="navbar-text">
                    {{ __('messages.user') }}: Jonas Jonaitis
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">{{ __('messages.logout') }}</a>
            </li>
        </ul>
    </div>
</nav>
