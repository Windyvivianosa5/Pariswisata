@component('layout')
@include('navbar')



<div>
    {{-- @dd($paymentSuccessItems) --}}
    <div class="text-gray-800 font-sans min-h-screen pt-10">

        <!-- Main Content -->
        <main class="max-w-6xl mx-auto">
            <!-- Tab Navigation -->
            <nav class="flex border-b-2 border-gray-300 mb-8">
                <button
                    class="py-3 px-6 font-semibold cursor-pointer transition-all duration-100 border-b-4 border-transparent bg-[#142e50] text-white rounded-t-lg"
                    data-tab="keranjang">
                    Unpaid Orders
                </button>
                <button
                    class="py-3 px-6 font-semibold cursor-pointer transition-all duration-100 border-b-4 border-transparent text-gray-600"
                    data-tab="riwayat">
                    Order History
                </button>
            </nav>

            {{-- @if ($activeTab === 'keranjang') --}}
                <!-- Konten Tab Keranjang (Pesanan Belum Dibayar) -->
                <section id="keranjang" class="tab-content">
                    @if ($paymentPendingItems->isEmpty())
                        <!-- Pesan Jika Tidak Ada Pesanan -->
                        <div class="text-center py-12 bg-white">
                            <i class="fas fa-clipboard-check text-6xl text-gray-300 mb-4"></i>
                            <p class="text-xl text-gray-500 mb-4">There are no orders awaiting payment.</p>
                            <a wire:navigate href="{{ route('tickets.create') }}"
                                class="inline-block bg-[#142e50] hover:bg-[#10243f] text-white font-bold py-2 px-6 rounded-lg transition-all duration-100">Buy
                                Tickets</a>
                        </div>
                    @else
                        <h2 class="text-2xl font-bold text-[#142e50] mb-4">Orders Awaiting Payment</h2>
                        <div>
                            @foreach ($paymentPendingItems as $item)
                                <article
                                    class="cart-item flex flex-col md:flex-row items-center bg-white p-5 rounded-lg shadow-md mb-4 gap-4 border border-gray-200">
                                    <div class="item-details flex-grow text-center md:text-left">
                                        <h3 class="text-lg font-bold text-[#142e50]">{{ $item->ticket_type }}</h3>
                                        <p class="text-sm text-gray-600">Visit Date:</p>
                                        <p class="text-sm text-gray-600">
                                            {{ \Carbon\Carbon::parse($item->visit_date)->translatedFormat('l, d F Y') }}
                                        </p>
                                    </div>
                                    <div class="item-action text-center md:text-right">
                                        <p class="text-sm text-gray-500">{{ $item->visitor_count }} Tickets</p>
                                        <p class="item-price font-bold text-lg text-[#142e50] mb-2">Rp
                                            {{ number_format($item->gross_amount, 0, ',', '.') }}</p>
                                        <a wire:navigate
                                            href="{{ route('tickets.detail', ['transaction' => $item->invoice_number]) }}"
                                            class="flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-lg transition-colors cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                                            </svg>
                                            Pay Now
                                        </a>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        @if ($paymentPendingItems->hasPages())
                            <div class="my-10 flex justify-center">
                                {{ $paymentPendingItems->links() }}
                            </div>
                        @endif
                    @endif
                </section>
            {{-- @else --}}
                <!-- Konten Tab Riwayat (Tidak Berubah) -->
                <section id="riwayat" class="tab-content hidden">
                    @if ($paymentSuccessItems->isEmpty())
                        <!-- Pesan Jika Tidak Ada Pesanan -->
                        <div class="text-center py-12 bg-white">
                            <i class="fas fa-clipboard-check text-6xl text-gray-300 mb-4"></i>
                            <p class="text-xl text-gray-500 mb-4">There are no paid orders.</p>
                        </div>
                    @else
                        <h2 class="text-2xl font-bold text-[#142e50] mb-4">Your Order History</h2>
                        <div>
                            @foreach ($paymentSuccessItems as $item)
                                <article
                                    class="history-item bg-white border border-gray-200 rounded-lg p-5 mb-4 shadow-md">
                                    <div
                                        class="history-header flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                                        <div>
                                            <strong class="text-lg">Order No.: {{ $item->invoice_number }}</strong>
                                            <p class="text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                                            </p>
                                        </div>
                                        <span
                                            class="status bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $item->payment_status }}</span>
                                    </div>
                                    <div class="history-body mb-4">
                                        <p>{{ $item->ticket_type . ' - ' . $item->visitor_count . ' Tickets' }}</p>
                                        <p class="font-bold text-[#142e50]">Total: Rp
                                            {{ number_format($item->gross_amount, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="history-footer flex gap-3">
                                        <a href="{{ route('tickets.detail', ['transaction' => $item->invoice_number])}}"
                                            class="px-4 py-2 border border-[#142e50] text-[#142e50] rounded hover:bg-[#142e50] hover:text-white transition-all">View
                                            Details</a>
                                        @if ($item->ticket_status == 'tersedia')
                                            <button
                                                class="px-4 py-2 border border-[#142e50] text-[#142e50] rounded hover:bg-[#142e50] hover:text-white transition-all">Download
                                                E-Ticket</button>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        @if ($paymentSuccessItems->hasPages())
                            <div class="my-10 flex justify-center">
                                {{ $paymentSuccessItems->links() }}
                            </div>
                        @endif
                    @endif
                </section>
            {{-- @endif --}}
        </main>
 </div>
</div>

<script>
    // Script to manage tabs
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('nav button');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function () {
                const target = this.getAttribute('data-tab');

                // Remove active classes from all tabs and hide all content
                tabs.forEach(t => {
                    t.classList.remove('bg-[#142e50]', 'text-white', 'rounded-t-lg', 'active');
                    t.classList.add('hover:text-[#142e50]', 'text-gray-600');
                });
                tabContents.forEach(content => content.classList.add('hidden'));

                // Add active classes to the clicked tab and show its content
                this.classList.add('bg-[#142e50]', 'text-white', 'rounded-t-lg', 'active');
                this.classList.remove('hover:text-[#142e50]', 'text-gray-600');
                document.getElementById(target).classList.remove('hidden');
            });
        });
    });
</script>

@endcomponent
