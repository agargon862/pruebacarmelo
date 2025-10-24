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

<form action="{{ route('peinado.store') }}" method="POST">
    
    @csrf
    <div class="form-group">
        <label for="name">Hairstyle Name:</label>
        <input type="text"  minlength= "3"  maxlength= "100" id="name" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" minlength= "2"  maxlength= "60" id="author" name="author" value="{{ old('author') }}" required>
    </div>

    <div class="form-group">
        <label for="hair_type">Hair Type:</label>
        <input type="text" minlength= "3"  maxlength= "110" id="hair_type" name="hair_type" value="{{ old('hair_type') }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" minlength= "50" name="description" rows="4" required>{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" step="0.01" min="0" max="999999.99" id="price" name="price" value="{{ old('price') }}" required>
    </div>

    <div class="form-group">
        <button type="submit" value="Add new hairsy">Save Hairstyle</button>
    </div>

</form>
@endsection
