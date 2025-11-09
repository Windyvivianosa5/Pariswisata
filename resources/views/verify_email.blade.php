@component('layout')

@if (session()->has('message'))
 <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div>
      <p class="font-bold">{{ session('message')}}</p>
    </div>
  </div>
</div>
@endif

<div class="bg-gradient-to-br from-green-50 to-emerald-100 min-h-screen flex items-center justify-center p-4">

  <div class="w-full max-w-md">
    <!-- Kartu Verifikasi -->
    <div class="bg-white rounded-2xl border border-green-100 shadow-sm overflow-hidden">

      <!-- Header -->
      <div class="text-center bg-gradient-to-b from-green-50 to-white pt-8 pb-6 px-6">
        <!-- Logo -->
        <div class="flex justify-center mb-3">
          <img src="{{ asset('assets/logopkura.png') }}" alt="Logo Okura" class="h-28 w-44 object-contain">
        </div>

        <h1 class="text-3xl font-bold text-gray-800">Thank You for Registering!</h1>
        <p class="text-gray-600 mt-2 text-sm leading-relaxed">
          The verification link has been sent to your email. <br>
          Please check your inbox and click the verification link <br>
          to activate your account.
        </p>
        <p class="text-gray-400 text-xs mt-2">The link will expire in 24 hours.</p>
      </div>

      <!-- Tombol -->
      <div class="p-8 space-y-5">

        <!-- Tombol Kirim Ulang -->
        <a href="{{ route('verification.resend', $id) }}"
           class="block w-full text-center bg-gradient-to-r from-green-500 to-emerald-600 text-white py-3 rounded-lg
                  font-semibold hover:from-green-600 hover:to-emerald-700
                  focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2
                  transition duration-200 transform hover:scale-[1.02]">
          Resend Verification Email
        </a>

        <!-- Garis -->
        <div class="border-t border-gray-200"></div>

        <!-- Kembali ke Login -->
        <p class="text-center text-sm text-gray-600">
          Already verified your account?
          <a href="/masuk" class="font-medium text-green-600 hover:text-green-500 transition duration-200">
            Back to Login
          </a>
        </p>
      </div>

    </div>
  </div>

</div>
@endcomponent
