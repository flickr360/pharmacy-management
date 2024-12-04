<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glassmorphism.css') }}">;
    <link rel="stylesheet" href="{{ asset('css/background5.css') }}">;


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
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </span>
</nav>


    <div class="container mt-4 p-2">
        <!-- Heading -->
        <div class="row">
            <div class="col">
                <h1 class="text-center">Medicine Information</h1>
            </div>
        </div>

        @if (session('success'))
        <div class="mb-4 alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <!-- Medicine Details -->
        <div class="block px-4 py-8">
            <div class="mb-4">
                <label class="form-label">Medicine name</label>
                <h1 class="font-weight-bold text-lg mt-3">{{ $medicine->medicine_name }}</h1>
            </div>

            <div class="mb-4">
                <label class="form-label font-weight-bold text-lg mt-3">OTC:</label>
                <h1 class="font-weight-bold text-lg mt-3">{{ $medicine->otc }}</h1>
            </div>

            <div class="mb-4">
                <label class="form-label">Supplier:</label>
                <h1 class="font-weight-bold text-lg mt-3">{{ $medicine->supplier->name }}</h1>
            </div>

            <div class="mb-4">
                <label class="form-label">Unit Price:</label>
                <h1 class="font-weight-bold text-lg mt-3">{{ $medicine->unit_price }}</h1>
            </div>

            @auth
            <p class="mt-4">
                <a href="/medicines/{{ $medicine->id }}/edit" class="btn btn-primary">Edit</a>
            </p>    
            @endauth
        </div>
    </div>

    <!-- Bootstrap JS (Optional for additional features like modals, tooltips) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
