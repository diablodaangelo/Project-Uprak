<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Receipt #{{ $order->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        .order-info { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Restaurant Receipt</h1>
        <p>Order #{{ $order->id }}</p>
    </div>

    <div class="order-info">
        <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
        <p><strong>Table Number:</strong> {{ $order->table_number }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <table>
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

    <div class="total">
        <p>Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
    </div>

    <div style="text-align: center; margin-top: 50px;">
        <p>Thank you for your order!</p>
    </div>
</body>
</html>
