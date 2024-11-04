<form action="{{ $action }}" method="POST">
    @csrf

    <!-- Display validation errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- First Name Field -->
    <div class="form-group">
        <label for="first_name">{{ __('messages.first_name') }}</label>
        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $user['first_name'] ?? '') }}" required>
    </div>

    <!-- Last Name Field -->
    <div class="form-group">
        <label for="last_name">{{ __('messages.last_name') }}</label>
        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $user['last_name'] ?? '') }}" required>
    </div>

    <!-- Email Field -->
    <div class="form-group">
        <label for="email">{{ __('messages.email') }}</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user['email'] ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
</form>
