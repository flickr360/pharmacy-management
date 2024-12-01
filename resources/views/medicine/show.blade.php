<x-layout>
    <x-slot:heading>
        Medicine Information
    </x-slot:heading>
    <div class="block px-4 py-6 border border-gray-200 rounded-lg">
    <x-form-label>
        Medicine name
    </x-form-label>
    <h1 class="font-bold text-lg mt-5 mb-5">{{ $medicine->medicine_name }}</h2>
    <x-form-label class="font-bold text-lg mt-10 mb-5">
        OTC: 
    </x-form-label>
    <h1 class="font-bold text-lg mt-5 mb-5">{{ $medicine->otc }}</h2>
    <x-form-label>
        Supplier:
    </x-form-label>
    <h1 class="font-bold text-lg mt-5 mb-5"> {{ $medicine->supplier }}</h2>
    <x-form-label>
        Unit Price: 
    </x-form-label>
    <h1 class="font-bold text-lg mt-5 mb-5">{{ $medicine->unit_price }}</h2>
    
    <p class="mt-6">
        <x-button href="/medicines/{{ $medicine->id }}/edit">Edit</x-button>
        </p>    
</div>


</x-layout>
