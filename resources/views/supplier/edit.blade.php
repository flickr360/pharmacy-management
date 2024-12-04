<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier {{ $supplier->supplier }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/background4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glassmorphism.css') }}">
</head>
<body>
    <div class="container mt-4 p-5">
        <h1 class="mb-4">Edit Supplier: {{ $supplier->supplier }}</h1>

        <form method="POST" action="/suppliers/{{ $supplier->id }}">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="mb-3 col-sm-6">
                    <label for="name" class="form-label">Supplier Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Supplier Name" value="{{ $supplier->name }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-sm-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $supplier->address }}" required>
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-sm-6">
                    <label for="email" class="form-label">Supplier Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $supplier->email }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-sm-6">
                    <label for="phonenumber" class="form-label">Phone Number</label>
                    <input type="text" name="phonenumber" id="phonenumber" class="form-control" value="{{ $supplier->phonenumber }}" required>
                    @error('phonenumber')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-sm-6">
                    <label for="paymentterms" class="form-label">Payment Terms</label>
                    <input type="text" name="paymentterms" id="paymentterms" class="form-control" value="{{ $supplier->paymentterms }}" required>
                    @error('paymentterms')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="/suppliers/" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

        <form method="POST" action="/suppliers/{{ $supplier->id }}">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
