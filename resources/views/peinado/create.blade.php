@extends('App.bootstrap.template')

@section('title', 'Add New Hairstyle')

@section('content')
<h2>Add a New Hairstyle</h2>

@error('general')
<div class="alert alert-danger">
    {{ $message }}
</div>
@enderror

@error('particular')
<div class="alert alert-danger">
    {{ $message }}
</div>
@enderror

<form action="{{ route('peinado.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Hairstyle Name:</label>
        <input type="text" class="form-control" minlength="3" maxlength="100" id="name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Author:</label>
        <input type="text" class="form-control" minlength="2" maxlength="60" id="author" name="author" value="{{ old('author') }}" required>
    </div>

    <div class="mb-3">
        <label for="hair_type" class="form-label">Hair Type:</label>
        <input type="text" class="form-control" minlength="3" maxlength="110" id="hair_type" name="hair_type" value="{{ old('hair_type') }}" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea class="form-control" id="description" minlength="50" name="description" rows="4" required>{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="number" class="form-control" step="0.01" min="0" max="999999.99" id="price" name="price" value="{{ old('price') }}" required>
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label">Hairstyle Image:</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Save Hairstyle</button>
        <a href="{{ route('peinado.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>

@endsection