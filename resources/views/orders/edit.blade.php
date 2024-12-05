<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/background4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glassmorphism.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>
</head>
<style>
.btn-danger{
    margin-top: 33px;
}
</style>
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
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </span>
</nav>

    <div class="container mt-5 p-2">
        <h1>Edit Order</h1>

        <div id="success-message">
            <div class="alert alert-success" id="success-alert" style="display: none;">
                Success message here
            </div>
        </div>

        <form action="/orders/{{ $order->id }}" method="POST">
            <div class="mb-3">
                <label for="supplier_id" class="form-label">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-control" required>
                    <option value="">Select Supplier</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" {{ $order->supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div id="medicine-rows">
                @foreach($order->medicines as $medicine)
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="medicines[]" class="form-label">Medicine</label>
                            <select name="medicines[]" class="form-control" required>
                                <option value="">Select Medicine</option>
                                @foreach($medicines as $m)
                                    <option value="{{ $m->id }}" {{ $medicine->id == $m->id ? 'selected' : '' }}>
                                        {{ $m->medicine_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="quantities[]" class="form-label">Quantity</label>
                            <input type="number" name="quantities[]" class="form-control" value="{{ $medicine->pivot->quantity }}" required>
                        </div>

                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger remove-row">Remove</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" id="add-medicine" class="btn btn-secondary">Add Medicine</button>

            <button type="submit" class="btn btn-primary">Update Order</button>
        </form>
    </div>

    <script>
    document.getElementById('add-medicine').addEventListener('click', function() {
        const row = document.querySelector('.row.mb-3').cloneNode(true);
        document.getElementById('medicine-rows').appendChild(row);
        row.querySelector('input').value = '';
        row.querySelector('select').value = '';
    });

    // Remove the selected row when the "Remove" button is clicked
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-row')) {
            event.target.closest('.row.mb-3').remove();
        }
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
