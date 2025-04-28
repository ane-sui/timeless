<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Account') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Wallet Balance Card -->
                        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 hover:bg-gray-100">
                            @forelse ($wallet as $item)
                                <div class="mb-2">
                                    <h5 class="text-2xl font-bold tracking-tight text-gray-900">
                                        Available Balance
                                    </h5>
                                    <p class="mt-2 text-3xl font-extrabold text-teal-600">
                                        ${{ number_format($item->amount, 2) }}
                                    </p>
                        
                                    <p class=" text-gray-700 text-sm">
                                        Keep track of your balance and top up when needed. Secure and instant funding available!
                                    </p>
                                </div>
                            @empty
                                <p class="text-gray-500">
                                    No wallet information available.
                                </p>
                            @endforelse

                       
                        </div>

                        <!-- Create Form -->
                        <div>
                            @include('wallet.create')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
