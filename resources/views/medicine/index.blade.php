<x-layout>
<x-slot:heading>
        Medicine Inventory
    </x-slot:heading>
    <div class="space-y-4 " >
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
        @foreach ($medicines as $medicine)
            <a href="/medicines/{{ $medicine['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $medicine['supplier']}}</div>

                <div>
                    <strong class="text-laracasts">{{ $medicine['medicine_name'] }}:</strong> Quantity {{ $medicine['quantity'] }} units
                </div>
            </a>
        @endforeach

        <div>
        {{ $medicines->links() }}

        </div>
    </div>
</x-layout>