<x-layout>
<x-slot:heading>
        Medicine Inventory
    </x-slot:heading>
    <div class="space-y-4">
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