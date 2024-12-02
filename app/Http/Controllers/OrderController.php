<?php

// app/Http/Controllers/OrderController.php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create()
    {
        $suppliers = Supplier::all();
        $medicines = Medicine::all();
        return view('orders.create', compact('suppliers', 'medicines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'medicines' => 'required|array',
            'quantities' => 'required|array',
        ]);

        $order = Order::create(['supplier_id' => $request->supplier_id]);

        foreach ($request->medicines as $index => $medicineId) {
            $quantity = $request->quantities[$index];
            $medicine = Medicine::findOrFail($medicineId);
            $medicine->quantity += $quantity; // Update existing medicine quantity
            $medicine->save();

            $order->medicines()->attach($medicineId, ['quantity' => $quantity]);
        }

        return redirect()->route('orders.create')->with('success', 'Order placed successfully.');
    }

    // app/Http/Controllers/OrderController.php
    public function index()
    {
        $orders = Order::with(['supplier', 'medicines'])->get(); // Load supplier and medicines relationships
        return view('orders.index', compact('orders'));
    }

}
