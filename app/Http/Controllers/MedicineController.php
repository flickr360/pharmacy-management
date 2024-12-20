<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MedicineController extends Controller
{
    public function index(Request $request)
    {
        // Initialize the query to fetch medicines
        $query = Medicine::query();

        // Search by medicine name
        if ($request->has('search') && !empty($request->search)) {
            $query->where('medicine_name', 'like', '%' . $request->search . '%');
        }

        // Alphabetical Sort (A-Z or Z-A)
        if ($request->has('sort_by') && $request->sort_by == 'alphabetical') {
            $sort_order = $request->get('sort_order', 'asc');  // Default to 'asc' (A-Z)
            $query->orderBy('medicine_name', $sort_order);
        }

        // Quantity Sort (Lowest to Highest or Highest to Lowest)
        if ($request->has('sort_by') && $request->sort_by == 'quantity') {
            $sort_order = $request->get('sort_order', 'asc');  // Default to 'asc' (Lowest to Highest)
            $query->orderBy('quantity', $sort_order);
        }

        $medicines = $query->paginate(10);

        // Return the view with the filtered/sorted medicines and current search/filter parameters
        return view('medicine.index', compact('medicines'))->with([
            'search' => $request->get('search'),
            'sort_by' => $request->get('sort_by'),
            'sort_order' => $request->get('sort_order')
        ]);
    }
    public function show(Medicine $medicine)
    {
        return view('medicine.show', ['medicine' => $medicine]);
    }

    public function edit(Medicine $medicine)
    {
        return view('medicine.edit', ['medicine' => $medicine]);
    }

    public function update(Medicine $medicine)
{
    request()->validate([
        'medicine_name' => ['required', 'min:3'],
        'otc' => ['required'],
        'unit_price' => ['required'],
    ]);

    // Update the medicine record
    $medicine->update([
        'medicine_name' => request('medicine_name'),
        'otc' => request('otc'),
        'unit_price' => request('unit_price'),
    ]);

    // Add logging or debug here

    return redirect('/medicines/' . $medicine->id);    
}

    public function create()
    {
        // Fetch all suppliers to pass to the view
        $medicines = Medicine::all();
        $suppliers = Supplier::all();
        return view('medicine.create', compact('suppliers', 'medicines'));
        
    }

public function store(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'medicine_name' => 'required|string|max:255',
        'supplier_id' => 'required|exists:suppliers,id',
        'unit_price' => 'required|numeric',
    ]);

    // Create a new medicine record
    Medicine::create([
        'medicine_name' => $validated['medicine_name'],
        'supplier_id' => $validated['supplier_id'],
        'unit_price' => $validated['unit_price'],
    ]);

    // Redirect to the medicines index
    return redirect()->route('medicines.index')->with('success', 'Medicine created successfully!');
}
}
