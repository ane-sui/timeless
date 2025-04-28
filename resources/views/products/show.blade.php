<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product Details') }}
            </h2>
            <nav class="text-sm breadcrumbs">
                <ol class="flex space-x-2">
                    <li><a href="#" class="text-blue-600 hover:underline">Products</a></li>
                    <li class="text-gray-500 flex items-center"><svg class="w-3 h-3 mx-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></li>
                    <li class="text-gray-500">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="md:flex">
                    <!-- Product Image Section -->
                    <div class="md:w-1/2 p-6">
                        <div class="relative overflow-hidden rounded-lg bg-gray-100 flex items-center justify-center" style="min-height: 400px">
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-contain">
                            
                            <!-- Status Badge -->
                            <div class="absolute top-4 left-4 
                                @if (\Carbon\Carbon::parse($product->due_date)->isPast())
                                    bg-red-500
                                @else
                                    bg-green-500
                                @endif
                                text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                                @if (\Carbon\Carbon::parse($product->due_date)->isPast())
                                    Expired
                                @else
                                    Active Auction
                                @endif
                            </div>
                        </div>
                        
                        <!-- Thumbnails (if you have multiple images) -->
                        <div class="flex mt-4 space-x-2 overflow-x-auto pb-2">
                            <button class="w-20 h-20 rounded-md border-2 border-blue-500 overflow-hidden">
                                <img src="{{ asset('images/' . $product->image) }}" class="w-full h-full object-cover">
                            </button>
                            <!-- Add more thumbnail placeholders as needed -->
                            <div class="w-20 h-20 rounded-md border border-gray-300 bg-gray-100"></div>
                            <div class="w-20 h-20 rounded-md border border-gray-300 bg-gray-100"></div>
                        </div>
                    </div>

                    <!-- Product Details Section -->
                    <div class="md:w-1/2 p-6 md:border-l border-gray-200 flex flex-col">
                        <div class="flex-grow">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                            
                            <!-- Countdown Timer -->
                            <div class="mb-6">
                                <div class="flex items-center mb-2">
                                    <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                    <span class="font-medium text-gray-700">Auction Ends In:</span>
                                </div>
                                <div class="bg-gray-100 rounded-lg p-3 flex justify-center">
                                    <div id="countdown" class="grid grid-cols-4 gap-2 text-center w-full">
                                        <div class="bg-white rounded-md p-2 shadow-sm">
                                            <span id="days" class="text-2xl font-bold text-gray-800 block">--</span>
                                            <span class="text-xs text-gray-500">Days</span>
                                        </div>
                                        <div class="bg-white rounded-md p-2 shadow-sm">
                                            <span id="hours" class="text-2xl font-bold text-gray-800 block">--</span>
                                            <span class="text-xs text-gray-500">Hours</span>
                                        </div>
                                        <div class="bg-white rounded-md p-2 shadow-sm">
                                            <span id="minutes" class="text-2xl font-bold text-gray-800 block">--</span>
                                            <span class="text-xs text-gray-500">Minutes</span>
                                        </div>
                                        <div class="bg-white rounded-md p-2 shadow-sm">
                                            <span id="seconds" class="text-2xl font-bold text-gray-800 block">--</span>
                                            <span class="text-xs text-gray-500">Seconds</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Description -->
                            <div class="mb-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Description</h3>
                                <p class="text-gray-700">{{ $product->description }}</p>
                            </div>
                            
                            <!-- Product Details -->
                            <div class="mb-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Details</h3>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                        <span class="text-gray-700"><strong>Quantity:</strong> {{ $product->quantity }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                        <span class="text-gray-700"><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($product->due_date)->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Bidding Section -->
                        <div class="mt-auto pt-6 border-t border-gray-200">
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <p class="text-gray-500 text-sm">Current Bid</p>
                                    <p id="price" class="text-3xl font-bold text-green-600">${{ number_format($product->price, 2) }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-gray-500 text-sm">Your Wallet</p>
                                    <p class="text-sm font-semibold text-teal-600">
                                        @if(isset($wallet->amount))
                                            ${{ number_format($wallet->amount, 2) }}
                                        @else
                                            
                                            <a href="{{ route('wallet.index') }}" class="text-teal-500 p-2 hover:bg-teal-800 hover:text-white rounded">Please Load Your Account</a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Bid Input and Button -->
                            <div class="flex space-x-2">
                                <form id="bidForm" class="flex-grow" action="{{ route('bids.store', $product->id) }}" method="POST">
                                    @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <label for="bidAmount" class="text-gray-500 text-sm">Place Your Bid:</label>
                                <input type="number" name="amount" id="bidAmount" step="0.01" min="{{ $product->price + ($product->price * 0.10) }}" value="{{ $product->price + ($product->price * 0.10) }}" class="w-full rounded-lg border-gray-300 focus:border-teal-500 focus:ring focus:ring-blue-200" placeholder="Enter bid amount">
                                <button id="bidButton" class="px-2 mt-2 py-2 bg-teal-600 text-white font-medium rounded-lg hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition-colors duration-200 flex items-center justify-center min-w-[120px]">
                                    <span>Place Bid</span>
                                </button>
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Minimum bid increment: 10%</p>
                        </div>
                    </div>
                </div>
                <!-- Bid History Section -->
                <div class="border-t border-gray-200 p-6">
                    <h3 class="text-md font-medium text-gray-900 mb-4">Bid History</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bidder</th>
                                    <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                    <th class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date & Time</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200" id="bidHistory">
                                @forelse($product->bids->sortByDesc('amount') as $bid)
                                    <tr>
                                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $bid->user->name }}</td>
                                        <td class="px-6 py-2 whitespace-nowrap text-sm font-medium text-gray-900">${{ number_format($bid->amount, 2) }}</td>
                                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-500">{{ $bid->created_at->format('M d, Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-4 text-center text-red-500">No bids yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bidding and Countdown Scripts -->
    <script>
        // Handle Bidding
        document.getElementById('bidButton').addEventListener('click', function() {
            const bidAmountInput = document.getElementById('bidAmount');
            const bidAmount = parseFloat(bidAmountInput.value);
            const priceElement = document.getElementById('price');
            let currentPrice = parseFloat(priceElement.textContent.replace('$', '').replace(',', ''));
           @if (isset($wallet->amount))
                const walletBalance = parseFloat("{{ $wallet->amount }}");
            @else
                const walletBalance = 0;
           @endif
           
            const minBid = currentPrice + (currentPrice * 0.10);
            
            function showMessage(message, type) {
                const messageDiv = document.createElement('div');
                messageDiv.className = `fixed bottom-4 right-4 px-4 py-2 rounded-lg shadow-lg ${
                    type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
                }`;
                messageDiv.textContent = message;
                document.body.appendChild(messageDiv);
                setTimeout(() => messageDiv.remove(), 3000);
            }
            
            if (isNaN(bidAmount) || bidAmount < minBid) {
                showMessage('Your bid must be at least 10% higher than the current bid.', 'error');
                return;
            }
            
            if (walletBalance >= bidAmount) {
                priceElement.textContent = '$' + bidAmount.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                
                // Add to bid history
                const bidHistory = document.getElementById('bidHistory');
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">You</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$${bidAmount.toFixed(2)}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${new Date().toLocaleString()}</td>
                `;
                bidHistory.insertBefore(newRow, bidHistory.firstChild);
                
                // Update min bid
                bidAmountInput.min = bidAmount + (bidAmount * 0.10);
                bidAmountInput.value = bidAmount + (bidAmount * 0.10);
                
                showMessage('Bid placed successfully!', 'success');
            } else {
                showMessage('Insufficient wallet balance to place this bid.', 'error');
                // Reset bid amount to current price + 10%
                bidAmountInput.value = minBid.toFixed(2);
            }
        });

        // Enhanced Countdown Timer
        const dueDate = new Date("{{ \Carbon\Carbon::parse($product->due_date)->format('Y-m-d H:i:s') }}").getTime();
        const daysElement = document.getElementById('days');
        const hoursElement = document.getElementById('hours');
        const minutesElement = document.getElementById('minutes');
        const secondsElement = document.getElementById('seconds');
        const bidButton = document.getElementById('bidButton');
        const bidAmountInput = document.getElementById('bidAmount');

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = dueDate - now;

            if (distance < 0) {
                daysElement.textContent = "0";
                hoursElement.textContent = "0";
                minutesElement.textContent = "0";
                secondsElement.textContent = "0";
                
                bidButton.disabled = true;
                bidButton.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                bidButton.classList.add('bg-gray-400', 'cursor-not-allowed');
                bidAmountInput.disabled = true;
                
                const expiredBadge = document.createElement('div');
                expiredBadge.className = 'px-4 py-2 bg-red-500 text-white font-medium rounded-lg text-center';
                expiredBadge.textContent = 'Auction Ended';
                bidButton.parentNode.replaceChild(expiredBadge, bidButton);
                
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            daysElement.textContent = String(days).padStart(2, '0');
            hoursElement.textContent = String(hours).padStart(2, '0');
            minutesElement.textContent = String(minutes).padStart(2, '0');
            secondsElement.textContent = String(seconds).padStart(2, '0');
        }

        // Initial call
        updateCountdown();
        
        // Update every second
        const countdownInterval = setInterval(updateCountdown, 1000);
    </script>
</x-app-layout>