<!-- resources/views/suppliers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Suppliers</h1>

        <!-- Check if there's any success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display a table of suppliers -->
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Payment Terms</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $suppliers->links() }}
    </div>
@endsection
