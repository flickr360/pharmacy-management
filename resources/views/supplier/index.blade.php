<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/background1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glassmorphism.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            feather.replace();
        });
    </script>
</head>

<style>
    td{
        color: white !important;
    }
    h1{
        color: white !important;
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
    <span class="nav-item">
        <span class="icon">
            <i data-feather="heart"></i>
        </span>
        <a href="/medicines">Medicines</a>
    </span>
    <span class="nav-item active">
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

<h1 class="justify-content-center d-flex">Suppliers</h1>

    <div class="container mt-2">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="p-2">
            <a href="/suppliers/create" class="btn btn-primary">Add Supplier</a>
        </div>

        <!-- Suppliers Table -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Payment Terms</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->address }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->phonenumber }}</td>
                        <td>{{ $supplier->paymentterms }}</td>
                        <td>
                            <!-- Edit button -->
                            <a href="/suppliers/{{ $supplier->id }}/edit" class="btn btn-primary btn-sm">Edit</a>

                            <!-- Delete button -->
                            <form action="/suppliers/{{ $supplier->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this supplier?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    <div>
        <div class="pagination d-flex justify-content-center">
        {{ $suppliers->links('pagination::bootstrap-4') }}
    </div>

    </div>

    <!-- Include Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
