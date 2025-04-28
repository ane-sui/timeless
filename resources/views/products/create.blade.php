<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Left side: Image Preview -->
                        <div class="flex flex-col items-center justify-center border border-gray-300 rounded-md p-3">
                            <p class="text-gray-400 mb-2">Image Preview</p>
                            <img id="previewImage" src="" alt="Preview" class="rounded-md object-contain h-48 w-48">
                        </div>

                        <!-- Right side: Form -->
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-1" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" rows="2" required>{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-1" />
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="quantity" :value="__('Quantity')" />
                                    <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity')" required min="1" />
                                    <x-input-error :messages="$errors->get('quantity')" class="mt-1" />
                                </div>

                                <div>
                                    <x-input-label for="bid_price" :value="__('Bid Price')" />
                                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required step="0.01" min="0" />
                                    <x-input-error :messages="$errors->get('price')" class="mt-1" />
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <x-input-label for="due_date" :value="__('Due Date')" />
                                    <x-text-input id="due_date" class="block mt-1 w-full" type="date" name="due_date" :value="old('due_date')" required />
                                    <x-input-error :messages="$errors->get('due_date')" class="mt-1" />
                                </div>

                                <div>
                                    <x-input-label for="image" :value="__('Image')" />
                                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" onchange="previewSelectedImage(event)" />
                                    <x-input-error :messages="$errors->get('image')" class="mt-1" />
                                </div>
                            </div>

                            <div class="text-right">
                                <x-primary-button>{{ __('Submit') }}</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewSelectedImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('previewImage').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>
