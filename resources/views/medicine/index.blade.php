<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Inventory</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/background2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glassmorphism.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>
</head>

<style>
    h2{
        color:white;
    }
    .card-body{
        color: black !important;
    }
    .text-primary{
        color: black !important;
    }
    .filters{
        width: 150px;
    } 
    .w{
        width: 900px;
    }
</style>

<body>

<nav class="menu" id="nav">
<span class="nav-item">
        <span class="icon">
            <i data-feather="shopping-cart"></i>
        </span>
        <a href="/orders">Orders</a>
    </span>
    <span class="nav-item active">
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

<h2 class="text-center mt-2">Medicine Inventory</h2>

<form method="GET" action="{{ route('medicines.index') }}" class="row g-2 mb-4 w">
            @csrf

            <div class="col-md-4">
                <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Search by name" class="form-control">
            </div>

            <div class="col-md-3">
                <select name="sort_by" class="form-select">
                    <option value="alphabetical" {{ $sort_by == 'alphabetical' ? 'selected' : '' }}>Alphabetical</option>
                    <option value="quantity" {{ $sort_by == 'quantity' ? 'selected' : '' }}>Quantity</option>
                </select>
            </div>

            <div class="col-md-3">
                <select name="sort_order" class="form-select">
                    <option value="asc" {{ $sort_order == 'asc' ? 'selected' : '' }}>asc</option>
                    <option value="desc" {{ $sort_order == 'desc' ? 'selected' : '' }}>desc</option>
                </select>
            </div>

            <div class="filters col-md-2">
                <button type="submit" class="btn btn-primary w-200">Apply Filters</button>
            </div>
        </form>

    <div class="container mt-2 mb-2">

        <a href="{{ route('medicines.create') }}" class="btn btn-success ml-0 m-2">
            Add Medicine
        </a>

        <div class="row justify-content-center">
            @foreach ($medicines as $medicine)
                <div class="col-md-5 mb-4">
                    <a href="/medicines/{{ $medicine['id'] }}" class="card shadow-sm text-decoration-none">
                        <div class="card-body">
                            <div class="font-weight-bold text-primary">{{ $medicine->supplier->name }}</div>
                            <div class="mt-2">
                                <strong>{{ $medicine['medicine_name'] }}:</strong> Quantity {{ $medicine['quantity'] }} units
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    <div class="pagination d-flex justify-content-center">
        {{ $medicines->links('pagination::bootstrap-4') }}
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
