@extends('layouts.app')

@section('title', 'Create Menu')

@section('content')
<h1>Create Menu</h1>

<form action="{{ route('menus.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-control" id="category" name="category" required>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create Menu</button>
    <a href="{{ route('menus.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
