<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medicine</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/glassmorphism.css') }}">;
    <link rel="stylesheet" href="{{ asset('css/background3.css') }}">;
    
</head>
<body>

    <div class="container mt-5">
        <form method="POST" action="{{ route('medicines.store') }}">
            @csrf

            <div class="card p-4 shadow-sm">
            <h2 class="text-center mb-4">Create a New Medicine</h2>
            <p class="text-center mb-4">Please fill in the details for the new medicine.</p>
                <div class="mb-3">
                    <!-- Medicine Name -->
                    <label for="medicine_name" class="form-label">Medicine Name</label>
                    <select name="medicine_name" id="medicine_name" class="form-select" required>
                        <option value="">Select a Medicine</option>
                        @foreach($medicines as $medicine)
                            <option value="{{ $medicine->id }}">{{ $medicine->medicine_name }}</option>
                        @endforeach
                    </select>
                    <!-- Display error message for medicine_name -->
                    @error('medicine_name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <!-- Supplier Dropdown -->
                    <label for="supplier_id" class="form-label">Supplier</label>
                    <select name="supplier_id" id="supplier_id" class="form-select" required>
                        <option value="">Select a Supplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                    <!-- Display error message for supplier_id -->
                    @error('supplier_id')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <!-- Unit Price -->
                    <label for="unit_price" class="form-label">Unit Price</label>
                    <input type="text" name="unit_price" id="unit_price" placeholder="Unit Price" class="form-control" required />
                    <!-- Display error message for unit_price -->
                    @error('unit_price')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Quantity (Hidden) -->
                <input type="hidden" name="quantity" id="quantity" value="1">

                <div class="d-flex justify-content-end">
                    <a href="{{ route('medicines.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Medicine</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Include Bootstrap JS and Popper (for dropdowns, tooltips, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
