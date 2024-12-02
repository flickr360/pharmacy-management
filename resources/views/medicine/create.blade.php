<x-layout>
    <x-slot:heading>
        Add Medicine
    </x-slot:heading>

    <form method="POST" action="{{ route('medicines.store') }}">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-w-900">Create a New Medicine</h2>
                <p class="mt-1 text-sm leading-6 text-w-600">Please fill in the details for the new medicine.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <!-- Medicine Name -->
                    <x-form-field>
                        <x-form-label for="medicine_name">Medicine Name</x-form-label>
                        <div class ="mt-2" style="color: black;">
                            <select name="medicine_name" style="color: black;" id="medicine_name" class="block w-full p-2 border" required>
                                <option value="" style="color: black;">Select a Medicine</option>
                                @foreach($medicines as $medicine)
                                    <option value="{{ $medicine->id }}" style="color: black;">{{ $medicine->medicine_name }}</option>
                                @endforeach
                            </select>
                            <x-form-error name="medicine_name" />
                        </div>
                    </x-form-field>

                    <!-- Supplier Dropdown (Choose Supplier) -->
                    <x-form-field>
                        <x-form-label for="supplier_id">Supplier</x-form-label>
                        <div class="mt-2" style="color: black;">
                            <select name="supplier_id" style="color: black;" id="supplier_id" class="block w-full p-2 border" required>
                                <option value="" style="color: black;">Select a Supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" style="color: black;">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                            <x-form-error name="supplier_id" />
                        </div>
                    </x-form-field>

                    <!-- Unit Price -->
                    <x-form-field>
                        <x-form-label for="unit_price">Unit Price</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="unit_price" id="unit_price" placeholder="Unit Price" required />
                            <x-form-error name="unit_price" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('medicines.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Save Medicine</x-form-button>
        </div>
    </form>
</x-layout>
