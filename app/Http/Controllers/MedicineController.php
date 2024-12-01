<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
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

        // Paginate the results (10 items per page)
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
        'supplier_name' => ['required'],
        'unit_price' => ['required'],
    ]);

    // Update the medicine record
    $medicine->update([
        'medicine_name' => request('medicine_name'),
        'otc' => request('otc'),
        'supplier_name' => request('supplier_name'),
        'unit_price' => request('unit_price'),
    ]);

    // Add logging or debug here
    \Log::debug('Updated Medicine:', $medicine->toArray());  // Log the updated data for debugging

    return redirect('/medicines/' . $medicine->id);    
}

}

