@component('layout')
@include('navbar')

    <div class="bg-gray-50">
        <div class="min-h-screen py-8 px-4">
            <!-- Container -->
            <div class="max-w-6xl mx-auto px-6">

                <!-- Back Button -->
                <a href="{{ route('shopping.index') }}"
                    class="flex items-center gap-2 text-gray-600 hover:text-gray-900 mb-6 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    <span class="font-medium">Back to Orders</span>
                </a>

                <!-- Success Alert -->
                <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg mb-6">
                    <div class="flex items-center text-green-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-9 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <div>
                            <h3 class="font-bold text-green-800">Payment Successful!</h3>
                            <p class="text-sm text-green-700">Your order has been confirmed. The e-ticket has been sent to your email.</p>
                        </div>
                    </div>
                </div>
                <!-- Main Content -->
                <div class="space-y-6">

                    <!-- Ticket Card -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">

                        <!-- Ticket Details -->
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-6 pb-6 border-b border-gray-200">
                                <div>
                                    <p class="text-sm text-gray-600 mb-1">Order Number</p>
                                    <p class="text-xl font-bold" style="color: #142e50;">{{ $transaction->invoice_number }}
                                    </p>
                                </div>
                                <div class="text-right">

                                    <span
                                        class="inline-block px-4 py-2 text-sm font-semibold bg-green-100 text-green-800 rounded-full">
                                        {{ ucfirst($transaction->payment_status) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Event Info Grid -->
                            <div class="grid md:grid-cols-2 gap-6 mb-6">
                                <div class="flex items-start gap-3">
                                    <div class="w-12 h-12 rounded-lg flex items-center justify-center text-white"
                                        style="background-color: #142e50;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Ticket Type</p>
                                        <p class="font-bold text-gray-900">{{ $transaction->ticket_type }}</p>
                                        <p class="text-sm text-gray-700">{{ $transaction->visitor_count }} Tickets</p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="w-12 h-12 rounded-lg flex items-center justify-center text-white"
                                        style="background-color: #142e50;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </div>
                                    <div class="space-y-2">
                                        <p class="text-sm text-gray-600">Ticket Status</p>
                                        @switch($transaction->ticket_status)
                                            @case('tersedia')
                                                <p class="px-4 py-1 text-sm font-semibold bg-blue-100 text-blue-800 rounded-full">
                                                    {{ ucfirst($transaction->ticket_status) }}</p>
                                            @break

                                            @case('terpakai')
                                                <p class="px-4 py-1 text-sm font-semibold bg-green-100 text-green-800 rounded-full">
                                                    {{ ucfirst($transaction->ticket_status) }}</p>
                                            @break

                                            @default
                                                <p class="px-4 py-1 text-sm font-semibold bg-red-100 text-red-800 rounded-full">
                                                    {{ ucfirst($transaction->ticket_status) }}</p>
                                        @endswitch
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="w-12 h-12 rounded-lg flex items-center justify-center text-white"
                                        style="background-color: #142e50;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Visit Date</p>
                                        <p class="font-bold text-gray-900">
                                            {{ \Carbon\Carbon::parse($transaction->visit_date)->translatedFormat('l, d F Y') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <div class="w-12 h-12 rounded-lg flex items-center justify-center text-white"
                                        style="background-color: #142e50;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Customer</p>
                                        <p class="font-bold text-gray-900">{{ ucfirst($transaction->name) }}</p>
                                        <p class="text-sm text-gray-700">{{ $transaction->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ticket Holders -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <!-- Payment Summary -->
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Payment Details</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between text-sm">
                                <span
                                    class="text-gray-600">{{ $transaction->ticket_type . ' (' . $transaction->visitor_count . 'x)' }}</span>
                                <span class="font-semibold text-gray-900">Rp
                                    {{ number_format($transaction->gross_amount, 0, ',', '.') }}</span>
                            </div>

                            <div class="border-t border-gray-200 pt-3 mt-3">
                                <div class="flex justify-between items-center">
                                    <span class="font-bold text-gray-900">Total</span>
                                    <span class="font-bold text-xl" style="color: #142e50;">Rp
                                        {{ number_format($transaction->gross_amount, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <p class="text-sm text-gray-600 mb-1">Payment Method</p>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                                </svg>
                                <span
                                    class="font-semibold text-gray-900">{{ ucfirst($transaction->payment->payment_method) }}</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Paid on:
                                {{ \Carbon\Carbon::parse($transaction->payment->payment_date)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcomponent
