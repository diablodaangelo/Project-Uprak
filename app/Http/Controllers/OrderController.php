<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems.menu')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('orders.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'table_number' => 'required|integer|min:1',
            'menus' => 'required|array|min:1',
            'menus.*.id' => 'required|exists:menus,id',
            'menus.*.quantity' => 'required|integer|min:1',
        ]);

        $totalPrice = 0;
        $orderItems = [];

        foreach ($request->menus as $menuData) {
            $menu = Menu::find($menuData['id']);
            $subtotal = $menu->price * $menuData['quantity'];
            $totalPrice += $subtotal;

            $orderItems[] = [
                'menu_id' => $menu->id,
                'quantity' => $menuData['quantity'],
                'subtotal' => $subtotal,
            ];
        }

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'table_number' => $request->table_number,
            'total_price' => $totalPrice,
        ]);

        foreach ($orderItems as $item) {
            $item['order_id'] = $order->id;
            OrderItem::create($item);
        }

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show($id)
    {
        $order = Order::with('orderItems.menu')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function generateReceipt($id)
    {
        $order = Order::with('orderItems.menu')->findOrFail($id);
        $pdf = Pdf::loadView('orders.receipt', compact('order'));
        return $pdf->download('receipt_' . $order->id . '.pdf');
    }
}
