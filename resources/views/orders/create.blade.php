<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
    
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/background2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glassmorphism.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>
</head>
<body>
<nav class="menu" id="nav">
    <span class="nav-item active">
        <span class="icon">
            <i data-feather="shopping-cart"></i>
        </span>
        <a href="/orders">Orders</a>
    </span>
    <span class="nav-item">
        <span class="icon">
            <i data-feather="heart"></i>
        </span>
        <a href="/medicines">Medicines</a>
    </span>
    <span class="nav-item">
        <span class="icon">
            <i data-feather="truck"></i>
        </span>
        <a href="/suppliers">Suppliers</a>
    </span>
    <span class="nav-item">
        <span class="icon">
            <i data-feather="log-out"></i>
        </span>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="nav-link btn btn-link text-white">
                <i class="bi bi-box-arrow-right">Logout</i> 
            </button>
        </form>
    </span>
</nav>

<div class="container mt-5 p-2">
    <h1>Create Order</h1>

    <div id="success-message" class="alert alert-success d-none" role="alert">
    </div>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-select" required>
                <option value="">Select Supplier</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="medicine-rows">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="medicines[]" class="form-label">Medicine</label>
                    <select name="medicines[]" class="form-select" required>
                        <option value="">Select Medicine</option>
                        @foreach($medicines as $medicine)
                            <option value="{{ $medicine->id }}">{{ $medicine->medicine_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="quantities[]" class="form-label">Quantity</label>
                    <input type="number" name="quantities[]" class="form-control" required>
                </div>
                <div class="col-md-2 mb-4">
                    <button type="button" class="btn btn-danger mt-4 remove-row">Remove</button>
                </div>
            </div>
        </div>

        <button type="button" id="add-medicine" class="btn btn-secondary mb-3">Add Medicine</button>

        <button type="submit" class="btn btn-primary mb-3">Submit Order</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js (Optional, but useful for Bootstrap components) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<!-- Custom JavaScript -->
<script>
document.getElementById('add-medicine').addEventListener('click', function() {
    const row = document.querySelector('.row.mb-3').cloneNode(true);
    document.getElementById('medicine-rows').appendChild(row);
    row.querySelector('input').value = '';
    row.querySelector('select').value = '';
});

document.addEventListener('click', function(event) {
    if (event.target.classList.contains('remove-row')) {
        event.target.closest('.row.mb-3').remove();
    }
});
</script>

</body>
</html>
