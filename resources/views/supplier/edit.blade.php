<x-layout>
    <x-slot:heading>
        Edit Supplier: {{ $supplier->supplier }}
    </x-slot:heading>

    <form method="POST" action="/suppliers/{{ $supplier->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-white-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-white-900">Supplier Name</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-white-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    placeholder="Supplier Name"
                                    value="{{ $supplier->name }}"
                                    required>
                            </div>

                            @error('name')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="address" class="block text-sm font-medium leading-6 text-white-900">Address</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="address"
                                    id="address"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-white-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    value="{{ $supplier->address }}"
                                    required>
                            </div>

                            @error('address')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-white-900">Supplier Email</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-white-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    value="{{ $supplier->email}}"
                                    required>
                            </div>

                            @error('email')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="phonenumber" class="block text-sm font-medium leading-6 text-white-900">Phone Number</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="phonenumber"
                                    id="phonenumber"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-white-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    value="{{ $supplier->phonenumber }}"
                                    required>
                            </div>

                            @error('phone_number')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="paymentterms" class="block text-sm font-medium leading-6 text-white-900">Payment Term</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    type="text"
                                    name="paymentterms"
                                    id="paymentterms"
                                    class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-white-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    value="{{ $supplier->paymentterms }}"
                                    required>
                            </div>

                            @error('paymentterms')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-x-6">
            <a href="/suppliers/" class="text-sm font-semibold leading-6 text-white-900">Cancel</a>

            <div>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update
                </button>
            </div>
        </div>
    </form>

    <form method="POST" action="/suppliers/{{ $supplier->id }}">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
