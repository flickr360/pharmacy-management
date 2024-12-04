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

        return redirect()->route('orders.index')->with('success', 'Order placed successfully.');
    }

    // app/Http/Controllers/OrderController.php
    public function index()
{
    $orders = Order::with(['supplier', 'medicines'])->paginate(10); // Paginate 10 orders per page
    return view('orders.index', compact('orders'));
}

    
    public function edit($id)
    {
        $order = Order::with('medicines')->findOrFail($id);
        $suppliers = Supplier::all();
        $medicines = Medicine::all();
        return view('orders.edit', compact('order', 'suppliers', 'medicines'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'medicines' => 'required|array',
            'quantities' => 'required|array',
        ]);
    
        $order = Order::findOrFail($id);
    
        // Collect existing medicines and their quantities
        $existingMedicines = $order->medicines->keyBy('id');
    
        // Prepare tracking for changes
        $deletedMedicines = [];
        $addedMedicines = [];
        $updatedQuantities = [];
    
        // Revert quantities for old medicines and identify deleted medicines
        foreach ($existingMedicines as $medicineId => $medicine) {
            if (!in_array($medicineId, $request->medicines)) {
                // Deleted medicine
                $deletedMedicines[] = "{$medicine->medicine_name} ({$medicine->pivot->quantity})";
                $medicine->quantity -= $medicine->pivot->quantity;
                $medicine->save();
            }
        }
    
        // Update order details
        $order->update(['supplier_id' => $request->supplier_id]);
    
        // Sync new medicines and adjust quantities
        $order->medicines()->detach();
        foreach ($request->medicines as $index => $medicineId) {
            $quantity = $request->quantities[$index];
            $medicine = Medicine::findOrFail($medicineId);
    
            if (!$existingMedicines->has($medicineId)) {
                // Added medicine
                $addedMedicines[] = "{$medicine->medicine_name} ({$quantity})";
            } else {
                // Updated quantity for an existing medicine
                $previousQuantity = $existingMedicines[$medicineId]->pivot->quantity;
                if ($previousQuantity != $quantity) {
                    $updatedQuantities[] = "{$medicine->medicine_name} (from {$previousQuantity} to {$quantity})";
                }
            }
    
            // Update quantity and attach to order
            $medicine->quantity += $quantity;
            $medicine->save();
            $order->medicines()->attach($medicineId, ['quantity' => $quantity]);
        }
    
        // Build success message
        $message = 'Order updated successfully.';
        if (!empty($deletedMedicines)) {
            $message .= ' Deleted medicines: ' . implode(', ', $deletedMedicines) . '.';
        }
        if (!empty($addedMedicines)) {
            $message .= ' Added medicines: ' . implode(', ', $addedMedicines) . '.';
        }
        if (!empty($updatedQuantities)) {
            $message .= ' Updated quantities: ' . implode(', ', $updatedQuantities) . '.';
        }
    
        return redirect()->route('orders.index')->with('success', $message);
    }
    
    public function destroy($id)
{
    $order = Order::with('medicines')->findOrFail($id);

    // Revert medicine quantities
    foreach ($order->medicines as $medicine) {
        $medicine->quantity -= $medicine->pivot->quantity;
        $medicine->save();
    }

    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
}


}
