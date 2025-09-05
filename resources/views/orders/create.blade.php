@extends('layouts.app')

@section('title', 'Create Order')

@section('content')
<h1>Create Order</h1>

<form action="{{ route('orders.store') }}" method="POST" id="orderForm">
    @csrf
    <div class="mb-3">
        <label for="customer_name" class="form-label">Customer Name</label>
        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
    </div>
    <div class="mb-3">
        <label for="table_number" class="form-label">Table Number</label>
        <input type="number" class="form-control" id="table_number" name="table_number" required>
    </div>

    <h3>Menus</h3>
    <div id="menuItems">
        <div class="menu-item mb-3 border p-3">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Menu</label>
                    <select class="form-control menu-select" name="menus[0][id]" required>
                        <option value="">Select Menu</option>
                        @foreach($menus as $menu)
                            <option value="{{ $menu->id }}" data-price="{{ $menu->price }}">{{ $menu->name }} - Rp {{ number_format($menu->price, 0, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" class="form-control quantity" name="menus[0][quantity]" min="1" value="1" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Subtotal</label>
                    <input type="text" class="form-control subtotal" readonly>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-menu mt-4">Remove</button>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-secondary mb-3" id="addMenu">Add Menu</button>

    <div class="mb-3">
        <strong>Total: Rp <span id="totalPrice">0</span></strong>
    </div>

    <button type="submit" class="btn btn-primary">Create Order</button>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
</form>

<script>
let menuIndex = 1;

document.getElementById('addMenu').addEventListener('click', function() {
    const menuItems = document.getElementById('menuItems');
    const newItem = document.querySelector('.menu-item').cloneNode(true);
    newItem.querySelector('.menu-select').name = `menus[${menuIndex}][id]`;
    newItem.querySelector('.quantity').name = `menus[${menuIndex}][quantity]`;
    newItem.querySelector('.subtotal').value = '';
    menuItems.appendChild(newItem);
    menuIndex++;
    updateTotals();
});

document.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-menu')) {
        if (document.querySelectorAll('.menu-item').length > 1) {
            e.target.closest('.menu-item').remove();
            updateTotals();
        }
    }
});

document.addEventListener('change', function(e) {
    if (e.target.classList.contains('menu-select') || e.target.classList.contains('quantity')) {
        updateTotals();
    }
});

function updateTotals() {
    let total = 0;
    document.querySelectorAll('.menu-item').forEach(item => {
        const select = item.querySelector('.menu-select');
        const quantity = item.querySelector('.quantity');
        const subtotal = item.querySelector('.subtotal');
        const price = select.options[select.selectedIndex]?.getAttribute('data-price') || 0;
        const qty = parseInt(quantity.value) || 0;
        const sub = price * qty;
        subtotal.value = 'Rp ' + sub.toLocaleString('id-ID');
        total += sub;
    });
    document.getElementById('totalPrice').textContent = total.toLocaleString('id-ID');
}

updateTotals();
</script>
@endsection
