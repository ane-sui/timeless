<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow-md">

                @include('alert') <!-- In case you have alerts -->

                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" 
                                class="block w-full mt-1" 
                                value="{{ old('name', $product->name) }}" 
                                required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Quantity -->
                        <div>
                            <x-input-label for="quantity" :value="__('Quantity')" />
                            <x-text-input id="quantity" name="quantity" type="number" 
                                class="block w-full mt-1" 
                                value="{{ old('quantity', $product->quantity) }}" 
                                required min="1" />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>

                        <!-- Bid Price -->
                        <div>
                            <x-input-label for="price" :value="__('Bid Price ($)')" />
                            <x-text-input id="price" name="price" type="number" 
                                class="block w-full mt-1" 
                                value="{{ old('price', $product->price) }}" 
                                required step="0.01" min="0" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Due Date -->
                        <div>
                            <x-input-label for="due_date" :value="__('Due Date')" />
                            <x-text-input id="due_date" name="due_date" type="date" 
                                class="block w-full mt-1" 
                                value="{{ old('due_date', $product->due_date) }}" 
                                required />
                            <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
                        </div>

                    </div>

                    <!-- Description (full width) -->
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea id="description" name="description" 
                            rows="5" 
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" 
                            required>{{ old('description', $product->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Image Upload Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">

                        <div>
                            <x-input-label for="image" :value="__('Upload New Image')" />
                            <x-text-input id="image" name="image" type="file" 
                                class="block w-full mt-1" 
                                accept="image/*" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Current Image Preview -->
                        @if($product->image)
                            <div class="flex flex-col items-center">
                                <p class="text-gray-600 text-sm mb-2">Current Image:</p>
                                <img src="{{ asset('images/' . $product->image) }}" 
                                     alt="Current Product Image" 
                                     class="h-32 w-32 object-cover rounded-md shadow-md">
                            </div>
                        @endif
                        
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <x-primary-button class="mt-4 bg-teal-600 hover:bg-teal-700">
                            {{ __('Update Product') }}
                        </x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
