<x-layout>
    <x-slot:heading>
        Add Medicine
    </x-slot:heading>

    <form method="POST" action="/medicines">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create a New Medicine</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="medicine_name">Medicine Name</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="medicine_name" id="medicine_name" placeholder="Acetaminophen" />

                            <x-form-error name="medicine_name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="otc">Over-the-Counter</x-form-label>

                        <div class="mt-2">
                            <input type="radio" id="true" name="otc" value="1">
                            <label for="true">True</label><br>
                            <input type="radio" id="false" name="otc" value="0">
                            <label for="false">False</label><br>
                            <x-form-error name="otc" />
                        </div>
                    </x-form-field>
                    
                    <x-form-field>
                        <x-form-label for="medicine_name">Medicine Name</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="medicine_name" id="medicine_name" placeholder="Acetaminophen" />

                            <x-form-error name="medicine_name" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>
