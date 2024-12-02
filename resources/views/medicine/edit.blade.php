<x-layout>
    <x-slot:heading>
        Edit Medicine: {{ $medicine->medicine_name }}
    </x-slot:heading>

    <form method="POST" action="/medicines/{{ $medicine->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-white-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="medicine_name" class="block text-sm font-medium leading-6 text-white-900">Medicine Name</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="medicine_name"
                                    id="medicine_name"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-white-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Medicine Name"
                                    value="{{ $medicine->medicine_name }}"
                                    required>
                            </div>

                            @error('medicine_name')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="otc" class="block text-sm font-medium leading-6 text-white-900">OTC</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="boolean"
                                    name="otc"
                                    id="otc"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-white-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    value="{{ $medicine->otc }}"
                                    required>
                            </div>

                            @error('otc')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="unit_price" class="block text-sm font-medium leading-6 text-white-900">Unit Price</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="unit_price"
                                    id="unit_price"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-white-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    value="{{ $medicine->unit_price }}"
                                    required>
                            </div>

                            @error('unit_price')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-x-6">
            <a href="/medicines/{{ $medicine->id }}" class="text-sm font-semibold leading-6 text-white-900">Cancel</a>

            <div>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update
                </button>
            </div>
        </div>
    </form>

    <form method="POST" action="/medicines/{{ $medicine->id }}">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
