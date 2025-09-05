@extends('layouts.app')

@section('title', 'Menus')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Menus</h1>
    <a href="{{ route('menus.create') }}" class="btn btn-outline-primary">Add Menu</a>
</div>

<div class="row">
    @foreach($menus as $menu)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $menu->name }}</h5>
                    <p class="card-text">{{ $menu->description }}</p>
                    <p class="card-text"><strong>Category:</strong> {{ ucfirst($menu->category) }}</p>
                    <p class="card-text"><strong>Price:</strong> Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('menus.show', $menu) }}" class="btn btn-outline-info btn-sm">View</a>
                        <a href="{{ route('menus.edit', $menu) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                        <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
