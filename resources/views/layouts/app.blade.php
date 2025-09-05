<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Restaurant Ordering')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/images/restaurant-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            color: #ffffff;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.9) !important;
            border-bottom: 2px solid #007bff;
        }
        .navbar-brand, .nav-link {
            color: #007bff !important;
            font-weight: bold;
        }
        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
            background-color: transparent;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
        }
        .btn-outline-secondary {
            color: #6c757d;
            border-color: #6c757d;
            background-color: transparent;
        }
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #ffffff;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.95);
            border: 2px solid #007bff;
            color: #000000;
        }
        .table {
            background-color: rgba(255, 255, 255, 0.95);
            color: #000000;
            border: 1px solid #007bff;
        }
        .table th, .table td {
            border: 1px solid #007bff;
            background-color: transparent;
            color: #000000;
        }
        .table th {
            background-color: rgba(0, 123, 255, 0.1);
            color: #007bff;
            font-weight: bold;
        }
        .alert-success {
            background-color: rgba(40, 167, 69, 0.9);
            border-color: #28a745;
            color: #ffffff;
        }
        .form-control {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #007bff;
            color: #000000;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Restaurant Ordering</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('menus.index') }}">Menus</a>
                <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
