<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-12">
                <div class="text-gray-900 dark:text-gray-100">
                    <p class="text-lg">{{ $product->description }}</p>
                    </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6">
                    Request a Quotation
                </h3>

                @if (session('success'))
                    <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('quotation.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_name" value="{{ $product->name }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="customer_name" :value="__('Full Name')" />
                            <x-text-input id="customer_name" class="block mt-1 w-full" type="text" name="customer_name" :value="old('customer_name')" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email Address')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>
                        <div>
                            <x-input-label for="phone_number" :value="__('Phone Number')" />
                            <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required />
                        </div>
                        <div>
                            <x-input-label for="quantity_kg" :value="__('Quantity (in KG)')" />
                            <x-text-input id="quantity_kg" class="block mt-1 w-full" type="text" name="quantity_kg" :value="old('quantity_kg')" required />
                        </div>
                        <div>
                            <x-input-label for="destination" :value="__('Destination (Port/City)')" />
                            <x-text-input id="destination" class="block mt-1 w-full" type="text" name="destination" :value="old('destination')" required />
                        </div>
                        <div>
                             <x-input-label for="transport_mode" :value="__('Mode of Transportation')" />
                             <select id="transport_mode" name="transport_mode" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="Sea">By Sea</option>
                                <option value="Air">By Air</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <x-primary-button>
                            {{ __('Submit Request') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>