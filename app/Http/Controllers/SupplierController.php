<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Show the form to create a new supplier
    public function create()
    {
        return view('supplier.create'); // The view for creating a supplier
    }

    // Store the supplier in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'address'     => 'required|string|max:255',
            'email'       => 'required|email|max:125',
            'phonenumber' => 'required|string|max:12',
            'paymentterms' => 'required|string|max:12',
        ]);

        // Create a new supplier using the validated data
        Supplier::create($validated);

        // Redirect to the list of suppliers (replace 'suppliers.index' with your actual route name)
        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully!');
    }

    // Show a list of all suppliers (or paginate them if you have many)
    public function index()
    {
        
        // Get all suppliers (or paginate them if you have many)
        $suppliers = Supplier::paginate(10); // Paginate 10 suppliers per page

        // Return the suppliers view with the suppliers data
        return view('supplier.index', compact('suppliers'));
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', ['supplier' => $supplier]);
    }

    public function update(Supplier $supplier)
    {
        request()->validate([
            'name' => ['required', 'min:3'],
            'address' => ['required'],
            'email' => ['required'],
            'phonenumber' => ['required'],
            'paymentterms' => ['required'],
        ]);
    
        // Update the supplier record
        $supplier->update([
            'name' => request('name'),
            'address' => request('address'),
            'email' => request('email'),
            'phonenumber' => request('phonenumber'),
            'paymentterms' => request('paymentterms'),
        ]);
    
        // Add logging or debug here
    
        return redirect('/suppliers/');    
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect('/suppliers');
    }
}
