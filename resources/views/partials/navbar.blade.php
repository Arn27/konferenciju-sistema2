<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Konferencijos</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
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
