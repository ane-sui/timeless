<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @forelse ($products as $product)
                            <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition">
                                <a href="#">
                                    <img src="{{ asset('images/' . $product->image) }}" class="rounded-t-lg w-full h-32 object-cover" alt="Product Image">
                                </a>
                                <div class="p-4">
                                    <h5 class="text-lg font-semibold tracking-tight text-gray-900 truncate">
                                        {{ $product->name }}
                                    </h5>
                                    <p class="text-sm text-gray-600 truncate mt-1">
                                        {{ $product->description }}
                                    </p>
                                    <p class="mt-2 text-xs text-gray-700">
                                        <strong>Price:</strong> ${{ number_format($product->price, 2) }}
                                    </p>
                                    <p class="mt-1 text-xs text-gray-700">
                                        <strong>Due:</strong> {{ \Carbon\Carbon::parse($product->due_date)->format('d M Y') }}
                                    </p>
                                    <p class="mt-1 text-xs text-gray-700">
                                        <strong>Qty:</strong> {{ $product->quantity }}
                                    </p>
                                    <a href="{{ route('products.show',$product->id) }}" class="mt-3 inline-flex items-center px-3 py-1 text-xs font-medium text-white bg-teal-600 rounded hover:bg-teal-700 focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                        Bid
                                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-4 text-center text-gray-500">
                                No products to display.
                            </div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
