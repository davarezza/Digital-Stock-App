<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load relasi user dan urutkan pesanan terbaru
        $orders = Order::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_number'   => 'required|string|unique:orders,order_number',
            'user_id'        => 'nullable|exists:users,id',
            'customer_name'  => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'order_type'     => 'required|string',
            'total_value'    => 'required|numeric|min:0',
            'status'         => 'required|in:pending,processed,completed,cancelled',
        ]);

        Order::create($validated);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Pesanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // Load items dan relasi produk/unit-nya untuk halaman detail
        $order->load(['orderItems.product', 'orderItems.productUnit', 'user']);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'order_type'     => 'required|string',
            'total_value'    => 'required|numeric|min:0',
            'status'         => 'required|in:pending,processed,completed,cancelled',
        ]);

        $order->update($validated);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Pesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }
}