@extends('layouts.app')

@section('title', 'Menu Details')

@section('content')
<h1>{{ $menu->name }}</h1>

<div class="card">
    <div class="card-body">
        <p><strong>Category:</strong> {{ ucfirst($menu->category) }}</p>
        <p><strong>Price:</strong> Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
        <p><strong>Description:</strong> {{ $menu->description }}</p>
    </div>
</div>

<a href="{{ route('menus.index') }}" class="btn btn-secondary mt-3">Back to Menus</a>
@endsection
