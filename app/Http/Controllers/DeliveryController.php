<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $deliveries = Auth::user()->deliveries()->latest()->get();
        return view('deliveries.index', compact('deliveries'));
    }

    public function create()
    {
        return view('deliveries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pickup_location' => 'required|string',
            'delivery_location' => 'required|string',
            'amount' => 'required|numeric|min:0',
        ]);

        $delivery = Auth::user()->deliveries()->create([
            'pickup_location' => $validated['pickup_location'],
            'delivery_location' => $validated['delivery_location'],
            'amount' => $validated['amount'],
            'status' => 'pending'
        ]);

        return redirect()->route('deliveries.show', $delivery)
            ->with('success', 'Delivery request created successfully!');
    }

    public function show(Delivery $delivery)
    {
        $this->authorize('view', $delivery);
        return view('deliveries.show', compact('delivery'));
    }

    public function update(Request $request, Delivery $delivery)
    {
        $this->authorize('update', $delivery);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,accepted,picked_up,delivered,cancelled',
        ]);

        $delivery->update($validated);

        return redirect()->route('deliveries.show', $delivery)
            ->with('success', 'Delivery status updated successfully!');
    }

    public function destroy(Delivery $delivery)
    {
        $this->authorize('delete', $delivery);
        
        $delivery->delete();

        return redirect()->route('deliveries.index')
            ->with('success', 'Delivery cancelled successfully!');
    }
}
