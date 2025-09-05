@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Orders</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Create Order</a>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Table Number</th>
                <th>Total Price</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->table_number }}</td>
                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
