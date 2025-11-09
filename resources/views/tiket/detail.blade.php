@component('layout')
@include('navbar')

<main class="max-w-6xl mx-auto px-4 py-10">
  <section class="mb-8">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
      <div>
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Payment Confirmation</h1>
        <p class="text-sm text-gray-600">Review your order and complete the payment</p>
      </div>
      <div class="flex items-center gap-2">
        <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
          Invoice: {{ $transaction->invoice_number }}
        </span>
        <span class="inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-700">
          Status: {{ ucfirst($transaction->payment_status) }}
        </span>
      </div>
    </div>
    <div class="w-full h-0.5 bg-gray-100 mt-6"></div>
  </section>

  @php $__u = auth()->user(); @endphp
  <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
      <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
        <div class="p-6">
          <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <i class="ph ph-ticket text-gray-500"></i>
            Order Summary
          </h2>
          <div class="space-y-3">
            <div class="flex justify-between items-center">
              <span class="text-gray-600">Ticket Type</span>
              <span class="font-medium text-gray-800">{{ $transaction->ticket_type }}</span>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-gray-600">Visit Date</span>
              <span class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($transaction->visit_date)->translatedFormat('d/m/Y') }}</span>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-gray-600">Number of Visitors</span>
              <span class="font-medium text-gray-800">{{ $transaction->visitor_count }}</span>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-gray-600">Price per Ticket</span>
              <span class="font-medium text-gray-800">Rp {{ number_format($transaction->price, 0, ',', '.') }}</span>
            </div>
            <div class="pt-3 mt-1 border-t border-gray-100 flex justify-between items-center">
              <span class="text-gray-900 font-semibold">Total Price</span>
              <span class="text-xl font-bold text-gray-900">Rp {{ number_format($transaction->gross_amount, 0, ',', '.') }}</span>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
        <div class="p-6">
          <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <i class="ph ph-user text-gray-500"></i>
            Visitor Information
          </h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <p class="text-xs text-gray-500 mb-1">Nama Lengkap</p>
              <p class="font-medium text-gray-800">{{ $__u ? $__u->name : $transaction->name }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 mb-1">Email</p>
              <p class="font-medium text-gray-800">{{ $__u ? $__u->email : $transaction->email }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 mb-1">Phone Number</p>
              <p class="font-medium text-gray-800">{{ $__u ? $__u->no_hp : $transaction->phone }}</p>
            </div>
            <div>
              <p class="text-xs text-gray-500 mb-1">Special Notes</p>
              <p class="font-medium text-gray-800">{{ $transaction->notes }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="space-y-6">
      <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
        <div class="p-6">
          <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <i class="ph ph-credit-card text-gray-500"></i>
            Payment Details
          </h2>
          <div class="space-y-2">
            <div class="flex justify-between items-center">
              <span class="text-gray-600">Subtotal</span>
              <span class="font-medium text-gray-800">Rp {{ number_format($transaction->gross_amount, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-gray-600">Admin Fee</span>
              <span class="font-medium text-gray-800">Rp 0</span>
            </div>
            <div class="pt-3 mt-1 border-t border-gray-100 flex justify-between items-center">
              <span class="text-gray-900 font-semibold">Total Payment</span>
              <span class="text-xl font-bold text-gray-900">Rp {{ number_format($transaction->gross_amount, 0, ',', '.') }}</span>
            </div>
          </div>
          <button id="pay-button" class="mt-6 w-full bg-gray-900 hover:bg-gray-800 text-white font-semibold py-3 px-4 rounded-lg transition-colors">
            Confirm Payment
          </button>
          <p class="mt-3 text-xs text-gray-500 text-center">
            By making a payment, you agree to the <a href="#" class="text-gray-800 underline">Terms & Conditions</a>.
          </p>
        </div>
      </div>

      <a href="{{ url('/shopping') }}" class="inline-flex items-center justify-center w-full bg-white border border-gray-200 text-gray-700 px-4 py-3 rounded-lg hover:bg-gray-50 transition-colors">
        <i class="ph ph-arrow-left mr-2"></i>
        Back to History
      </a>
    </div>
  </section>
</main>

<!-- Midtrans Snap Script -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
  document.getElementById('pay-button').onclick = function() {
    snap.pay('{{ $snap_token }}', {
      onSuccess: function(result) {
        window.location.href = "{{ url('/shopping') }}"
      },
      onPending: function(result) {},
      onError: function(result) {}
    });
  };
</script>

@include('footer')
@endcomponent
       