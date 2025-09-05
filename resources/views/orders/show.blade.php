@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<h1>Order #{{ $order->id }}</h1>

<div class="card mb-4">
    <div class="card-body">
        <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
        <p><strong>Table Number:</strong> {{ $order->table_number }}</p>
        <p><strong>Total Price:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
        <p><strong>Created At:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
    </div>
</div>

<h3>Order Items</h3>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->menu->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->menu->price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="{{ route('orders.receipt', $order->id) }}" class="btn btn-primary" target="_blank">Download Receipt</a>
<a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
@endsection
