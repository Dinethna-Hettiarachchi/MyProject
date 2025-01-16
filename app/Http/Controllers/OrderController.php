<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // GET - List all orders for the authenticated user
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->get();
        return view('orders.index', compact('orders'));
    }

    // GET - Show the form to create a new order
    public function create()
    {
        return view('orders.create');
    }

    // POST - Store a new order
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pickup_address' => 'required|string|max:255',
            'delivery_address' => 'required|string|max:255',
            'package_description' => 'required|string|max:1000',
        ]);

        $order = auth()->user()->orders()->create($validated);

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order created successfully!');
    }

    // GET - Show a specific order
    public function show(Order $order)
    {
        $this->authorize('view', $order);
        return view('orders.show', compact('order'));
    }

    // PUT - Update order status
    public function update(Request $request, Order $order)
    {
        $this->authorize('update', $order);
        
        $validated = $request->validate([
            'status' => 'required|in:cancelled'
        ]);

        $order->update($validated);

        return redirect()->route('orders.show', $order)
            ->with('success', 'Order updated successfully!');
    }

    // DELETE - Cancel an order
    public function destroy(Order $order)
    {
        $this->authorize('delete', $order);
        
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order cancelled successfully!');
    }
}
