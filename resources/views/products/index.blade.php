<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @include('alert')

                    <div class="overflow-x-auto">
                        <a href="{{ route('products.create') }}" class="mb-4 inline-flex items-center px-4 py-2 bg-teal-700 text-sm text-white rounded-md hover:bg-blue-700">
                            {{ __('Add New Product') }}
                        </a>
                        <table class="min-w-full bg-white border border-gray-300 text-sm">
                            
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-2 px-4 border-b text-left">Name</th>
                                    <th class="py-2 px-4 border-b text-left">Description</th>
                                    <th class="py-2 px-4 border-b text-left">Quantity</th>
                                    <th class="py-2 px-4 border-b text-left">Bid Price</th>
                                    <th class="py-2 px-4 border-b text-left">Due Date</th>
                                    <th class="py-2 px-4 border-b text-left">Image</th>
                                    <th class="py-2 px-4 border-b text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white text-sm">
                                @forelse($products as $product)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ Str::limit($product->description, 50) }}</td>
                                        <td class="py-2 px-4 border-b">{{ $product->quantity }}</td>
                                        <td class="py-2 px-4 border-b">${{ number_format($product->price, 2) }}</td>
                                        <td class="py-2 px-4 border-b">{{ $product->due_date }}</td>
                                        <td class="py-2 px-4 border-b">
                                            @if($product->image)
                                                <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" class="h-16 w-16 object-cover">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500 hover:underline">Edit</a>

                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">No products found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $products->links() }} <!-- Pagination links -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
