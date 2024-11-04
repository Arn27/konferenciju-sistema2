<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

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

    <!-- Title Field -->
    <div class="form-group">
        <label for="title">{{ __('messages.title') }}</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $conference['title'] ?? '') }}" required>
    </div>

    <!-- Description Field -->
    <div class="form-group">
        <label for="description">{{ __('messages.description') }}</label>
        <textarea name="description" id="description" class="form-control" required>{{ old('description', $conference['description'] ?? '') }}</textarea>
    </div>

    <!-- Lecturers Field -->
    <div class="form-group">
        <label for="lecturers">{{ __('messages.lecturers') }}</label>
        <input type="text" name="lecturers" id="lecturers" class="form-control" value="{{ old('lecturers', $conference['lecturers'] ?? '') }}" required>
    </div>

    <!-- Date Field -->
    <div class="form-group">
        <label for="date">{{ __('messages.date') }}</label>
        <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $conference['date'] ?? '') }}" required>
    </div>

    <!-- Time Field -->
    <div class="form-group">
        <label for="time">{{ __('messages.time') }}</label>
        <input type="time" name="time" id="time" class="form-control" value="{{ old('time', $conference['time'] ?? '') }}" required>
    </div>

    <!-- Address Field -->
    <div class="form-group">
        <label for="address">{{ __('messages.address') }}</label>
        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $conference['address'] ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
</form>
