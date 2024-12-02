@extends('layouts.app')

<x-layout>
    <x-slot:heading>
        Orders
    </x-slot:heading>
    <div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered rounded-lg border-gray" style="background:white;">
        <thead>
            <tr>
                <th>#</th>
                <th>Supplier</th>
                <th>Order Date</th>
                <th>Medicines Ordered</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->supplier->name }}</td>
                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <ul>
                            @foreach($order->medicines as $medicine)
                                <li>{{ $medicine->medicine_name }} (Quantity: {{ $medicine->pivot->quantity }})</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-layout>
