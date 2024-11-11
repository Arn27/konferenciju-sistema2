<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="title">{{ __('Title') }}</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $conference->title ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="description">{{ __('Description') }}</label>
        <textarea name="description" id="description" class="form-control" required>{{ old('description', $conference->description ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label for="date">{{ __('Date') }}</label>
        <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $conference->date ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="location">{{ __('Location') }}</label>
        <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $conference->location ?? '') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
</form>
