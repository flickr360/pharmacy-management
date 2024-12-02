<x-layout>
    <x-slot:heading>
        Medicine Information
    </x-slot:heading>

    @if (session('success'))
        <div class="mb-4 px-4 py-3 text-green-800 bg-green-100 border border-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="block px-4 py-6 border border-gray-200 rounded-lg">
        <x-form-label>Medicine name</x-form-label>
        <h1 class="font-bold text-lg mt-5 mb-5">{{ $medicine->medicine_name }}</h1>

        <x-form-label class="font-bold text-lg mt-10 mb-5">OTC:</x-form-label>
        <h1 class="font-bold text-lg mt-5 mb-5">{{ $medicine->otc }}</h1>

        <x-form-label>Supplier:</x-form-label>
        <h1 class="font-bold text-lg mt-5 mb-5">{{ $medicine->supplier->name }}</h1>

        <x-form-label>Unit Price:</x-form-label>
        <h1 class="font-bold text-lg mt-5 mb-5">{{ $medicine->unit_price }}</h1>
        @auth

        <p class="mt-6">
            <x-button href="/medicines/{{ $medicine->id }}/edit">Edit</x-button>
        </p>    
        @endauth
    </div>
</x-layout>
