<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Medicine</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/glassmorphism.css') }}">;
    <link rel="stylesheet" href="{{ asset('css/background1.css') }}">;
</head>
<body>
    <div class="container mt-4 p-2">
        <h1 class="text-center">Edit Medicine: {{ $medicine->medicine_name }}</h1>
        
        <form method="POST" action="/medicines/{{ $medicine->id }}">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="medicine_name" class="form-label">Medicine Name</label>
                <input type="text" name="medicine_name" id="medicine_name" class="form-control" placeholder="Medicine Name" value="{{ $medicine->medicine_name }}" required>
                @error('medicine_name')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="otc" class="form-label">OTC</label>
                <input type="checkbox" name="otc" id="otc" class="form-check-input" {{ $medicine->otc ? 'checked' : '' }} required>
                @error('otc')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="unit_price" class="form-label">Unit Price</label>
                <input type="text" name="unit_price" id="unit_price" class="form-control" placeholder="Unit Price" value="{{ $medicine->unit_price }}" required>
                @error('unit_price')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="/medicines/{{ $medicine->id }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

        <!-- Form for Delete (hidden) -->
        <form method="POST" action="/medicines/{{ $medicine->id }}" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <!-- Bootstrap JS (Optional for additional features like modals, tooltips) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
