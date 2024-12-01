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
           <x-button href="/suppliers/create">Add Supplier</x-button>
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
                        <td>
                             <!-- Edit button -->
                             <a href="/suppliers/{{ $supplier->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                            
                            <!-- Delete button with form -->
                            <form action="/suppliers/{{ $supplier->id }}" method="POST"  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this supplier?')">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $suppliers->links() }}
    </div>
</x-layout>



