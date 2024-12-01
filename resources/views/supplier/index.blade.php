<!-- resources/views/suppliers/index.blade.php -->

@extends('layouts.app')
<x-layout>
  
<x-slot:heading>Suppliers</x-slot:heading>
    <div class="container">

        <!-- Check if there's any success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <p class="mt-6">
           <x-form-button    href="{{ route('suppliers.create') }}">Add Supplier</x-button>
        </p>
        <!-- Display a table of suppliers -->
        <table class="table rounded-md" style="background:white;">
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
</x-layout>



