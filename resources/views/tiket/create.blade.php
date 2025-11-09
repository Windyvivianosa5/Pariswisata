@include('navbar')
@component('layout')

    <div class="max-w-6xl mx-auto mt-20">
        <!-- Form Container -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 border border-gray-200">
            <!-- Judul di dalam container -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-1">Book Tickets for Istana Siak Sri Indrapura</h2>
                <p class="text-sm text-gray-600">Fill in the details to proceed with your booking</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Left Section - Informasi Pengunjung -->
                <div class="space-y-4">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Visitor Information</h3>
                    </div>
                    <form action="{{ route('tickets.create') }}" method="POST">
                        @csrf
                       @method('POST')
                    <!-- Nama Lengkap -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1 text-sm">Full Name</label>
                        <div class="relative">
                            <input
                                name="name"
                                type="text"
                                placeholder="Enter full name"
                                value="{{ auth()->check() ? auth()->user()->name : old('name') }}"
                                class="w-full px-4 py-3 pl-10 bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition"
                                @error('name') border-red-600 @enderror
                                @if(auth()->check()) readonly @endif
                                >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1 text-sm">Email</label>
                        <div class="relative">
                            <input
                                name="email"
                                type="email"
                                placeholder="email@example.com"
                                value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                                class="w-full px-4 py-3 pl-10 bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition"
                                @error('email') border-red-600 @enderror
                                @if(auth()->check()) readonly @endif
                                >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                          @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1 text-sm">Phone Number</label>
                        <div class="relative">
                            <input
                                name="phone"
                                type="tel"
                                placeholder="Enter phone number"
                                value="{{ auth()->check() ? auth()->user()->no_hp : old('phone') }}"
                                class="w-full px-4 py-3 pl-10 bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition"
                                @error('phone') border-red-600 @enderror
                                @if(auth()->check()) readonly @endif
                                >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                    </div>
                      @error('phone')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Right Section - Detail Kunjungan -->
                <div class="space-y-4">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-gray-900 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Visit Details</h3>
                    </div>

                    <!-- Tiket -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1 text-sm">Ticket</label>
                        <div class="relative">
                            <select
                            name="ticket_type"
                            id="ticketType" class="w-full px-4 py-3 pl-10 bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition appearance-none cursor-pointer">
                            @error('ticket_type') border-red-600 @enderror
                            <option value="">Select Ticket</option>
                               @foreach ($ticketTypes as $type)
                                    <option value="{{ $type->name }}" data-price="{{ $type->price }}">
                                        {{ $type->name }} - Rp {{ number_format($type->price, 0, ',', '.') }}
                                    </option>

                            @endforeach
                            </select>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                          @error('ticket_type')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    </div>

                    <!-- Tanggal Kunjungan -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1 text-sm">Visit Date</label>
                        <div class="relative">
                            <input
                                name="visit_date"
                                type="date"
                                class="w-full px-4 py-3 pl-10 bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition"
                                min="{{ \Carbon\Carbon::now('Asia/Jakarta')->toDateString() }}"
                                @error('visit_date') border-red-600 @enderror
                                >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                          @error('visit_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    </div>

                    <!-- Jumlah Pengunjung -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1 text-sm">Number of Visitors</label>
                        <div class="flex items-center gap-3 bg-white border-2 border-gray-300 rounded-lg p-3">
                            <button type="button" id="decreaseBtn" class="w-10 h-10 bg-gray-900 hover:bg-gray-800 rounded-full flex items-center justify-center transition shadow-md hover:shadow-lg text-white">
                                <span class="text-xl text-white font-bold">−</span>
                            </button>
                            <input
                                name="visitor_count"
                                type="number"
                                id="visitorCount"
                                value="1"
                                min="1"
                                class="flex-1 text-center text-xl font-bold px-3 py-1 bg-white border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-400"
                                readonly
                            >
                            <button type="button" id="increaseBtn" class="w-10 h-10 bg-gray-900 hover:bg-gray-800 rounded-full flex items-center justify-center transition shadow-md hover:shadow-lg text-white">
                                <span class="text-xl text-white font-bold">+</span>
                            </button>
                        </div>
                    </div>

                    <!-- Catatan Khusus -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1 text-sm">Special Notes (Optional)</label>
                        <textarea
                            name="notes"
                            placeholder="Special requests or additional information..."
                            rows="2"
                            class="w-full px-4 py-3 bg-white border-2 border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition resize-none"
                        ></textarea>
                    </div>
                </div>
            </div>

            <!-- Total Harga Section -->
            <div class="mt-6 bg-white border border-gray-200 rounded-xl p-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-600">Total Price</p>
                        <p class="text-xs text-gray-500 mt-1">Price updates automatically</p>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-gray-900">
                            Rp <span id="totalPrice">0</span>
                        </p>
                        <!-- Input tersembunyi untuk dikirim ke backend -->
                        <input type="hidden" name="gross_amount" id="totalHargaInput" value="0">
                        <input type="hidden" name="price" id="harga" value="0">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-gray-900 hover:bg-gray-800 text-white font-bold py-4 px-6 rounded-xl transition duration-300 flex items-center justify-center gap-3 text-base shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Continue to Payment
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>
            </div>
        </form>

            <!-- Info Box -->
            <div class="mt-6 bg-gray-50 border border-gray-200 rounded-lg p-3">
                <div class="flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <p class="text-xs text-gray-700"><strong class="text-gray-800">Important Info:</strong> Purchased tickets are non-refundable. Please ensure your information is correct before submitting.</p>
                    </div>
                </div>
            </div>
        </div>
    <script>
        // Handle increasing and decreasing visitor count
        document.addEventListener('DOMContentLoaded', function() {
            const decreaseBtn = document.getElementById('decreaseBtn');
            const increaseBtn = document.getElementById('increaseBtn');
            const visitorCount = document.getElementById('visitorCount');
            const ticketType = document.getElementById('ticketType');
            const totalPriceElement = document.getElementById('totalPrice');

            // Calculate total price
            function calculateTotal() {
                const selectedOption = ticketType.options[ticketType.selectedIndex];
                const pricePerTicket = selectedOption.getAttribute('data-price') || 0;
                const count = parseInt(visitorCount.value);
                const total = pricePerTicket * count;

                // Format price with thousands separator
                totalPriceElement.textContent = total.toLocaleString('id-ID');
                document.getElementById('totalHargaInput').value = total; // when price updates
                document.getElementById('harga').value = pricePerTicket; // when price updates

            }

            // Event listener for decrease button
            decreaseBtn.addEventListener('click', function() {
                let currentValue = parseInt(visitorCount.value);
                if (currentValue > 1) {
                    visitorCount.value = currentValue - 1;
                    calculateTotal();
                }
            });

            // Event listener for increase button
            increaseBtn.addEventListener('click', function() {
                let currentValue = parseInt(visitorCount.value);
                visitorCount.value = currentValue + 1;
                calculateTotal();
            });

            // Event listener for ticket type change
            ticketType.addEventListener('change', function() {
                calculateTotal();
            });

            // Initialize total price on page load
            calculateTotal();
        });
    </script>


@endcomponent
