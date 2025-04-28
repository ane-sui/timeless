

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8">
                    <h3 class="text-lg font-medium text-gray-900 mb-6">
                        {{ __('Add funds to your wallet') }}
                    </h3>

                    <form action="{{ route('wallet.store') }}" method="POST">
                        @csrf
                        
                        <!-- Amount Input Group -->
                        <div class="space-y-2">
                            <x-input-label for="amount" :value="__('Enter Amount')" class="text-gray-700" />
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">
                                    $
                                </span>
                                <x-text-input 
                                    id="amount" 
                                    class="block mt-1 w-full pl-8 pr-4 py-2 border-gray-300 focus:border-teal-500 focus:ring-teal-500" 
                                    type="number" 
                                    name="amount" 
                                    :value="old('amount')" 
                                    required 
                                    step="0.01" 
                                    min="0" 
                                    placeholder="0.00"
                                />
                            </div>
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>

                        {{-- <!-- Quick Amount Buttons -->
                        <div class="grid grid-cols-3 gap-4 mt-6">
                            <button type="button" class="quick-amount p-2 border rounded-md hover:bg-gray-50" data-amount="10">$10</button>
                            <button type="button" class="quick-amount p-2 border rounded-md hover:bg-gray-50" data-amount="25">$25</button>
                            <button type="button" class="quick-amount p-2 border rounded-md hover:bg-gray-50" data-amount="50">$50</button>
                        </div> --}}

                        <!-- Submit Button -->
                        <div class="mt-8">
                            <x-primary-button class="w-full justify-center py-3 bg-teal-600 hover:bg-teal-700">
                                {{ __('Top Up Now') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="mt-6 text-center text-sm text-gray-600">
                <p>Funds will be available in your wallet immediately after top-up</p>
            </div>
        </div>
    </div>
{{-- 
    @push('scripts')
    <script>
        document.querySelectorAll('.quick-amount').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('amount').value = button.dataset.amount;
            });
        });
    </script>
    @endpush --}}
