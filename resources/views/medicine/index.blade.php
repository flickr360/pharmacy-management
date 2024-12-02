<x-layout>
    <x-slot:heading>
        Medicine Inventory
    </x-slot:heading>
    <div class="space-y-4">
        <!-- Search and Filter Form -->
        <form method="GET" action="{{ route('medicines.index') }}" class="text-gray-900">
            @csrf

            <!-- Search form fields -->
            <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Search by name">
            
            <!-- Sort Options -->
            <select name="sort_by">
                <option value="alphabetical" {{ $sort_by == 'alphabetical' ? 'selected' : '' }}>Alphabetical</option>
                <option value="quantity" {{ $sort_by == 'quantity' ? 'selected' : '' }}>Quantity</option>
            </select>

            <!-- Sort Order Options (Asc or Desc) -->
            <select name="sort_order">
                <option value="asc" {{ $sort_order == 'asc' ? 'selected' : '' }}>asc</option>
                <option value="desc" {{ $sort_order == 'desc' ? 'selected' : '' }}>desc</option>
            </select>

            <x-form-button>Apply Filters</x-form-button>
        </form>

        <!-- Add Medicine Button -->
        <a href="{{ route('medicines.create') }}" class="inline-flex items-center px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700 mt-4">
            Add Medicine
        </a>

        <!-- Display Medicines -->
        @foreach ($medicines as $medicine)
            <a href="/medicines/{{ $medicine['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $medicine->supplier->name }}</div>
                <div>
                    <strong class="text-laracasts">{{ $medicine['medicine_name'] }}:</strong> Quantity {{ $medicine['quantity'] }} units
                </div>
            </a>
        @endforeach

        <!-- Pagination Links -->
        <div>
            {{ $medicines->links() }}
        </div>
    </div>
</x-layout>
