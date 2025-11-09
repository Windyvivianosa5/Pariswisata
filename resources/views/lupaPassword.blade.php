@component('layout')
@if (session()->has('status'))
 <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div>
      <p class="font-bold">{{ session('status')}}</p>
    </div>
  </div>
</div>
@endif

<div class="bg-gradient-to-br to-emerald-100 min-h-screen flex items-center justify-center p-4">

  <div class="w-full max-w-md justify-center">
    <!-- Kartu Login -->
    <div class="bg-white rounded-2xl border border-green-100 overflow-hidden">

      <!-- Bagian Header -->
      <div class="text-center bg-gradient-to-b from-green-50 to-white">
        <!-- Logo -->
        <div class=" flex justify-center">
          <img src="{{asset('assets/logopkura.png') }}" alt="Logo" class="h-32 w-48 object-contain rounded-lg">
        </div>

        <h1 class="text-3xl font-bold text-gray-800 ">Forgot Password</h1>
        <p class="text-gray-600">Enter your registered email</p>
      </div>

      <!-- Bagian Form -->
      <form action="{{ route('password.email') }}" method="post" class="px-8 space-y-6 bg-white">
        @csrf
        @method('post')

        <!-- Input Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
              </svg>
            </div>
            <input type="email" id="email" name="email"
                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg
                          focus:ring-2 focus:ring-green-500 focus:border-transparent
                          placeholder-gray-400 transition duration-200 @error('name') border-red-600 @enderror"
                   placeholder="name@email.com" />
          </div>
          @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
             @enderror
        </div>

        <!-- Tombol Login -->
        <button type="submit"
                class="w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white py-3 rounded-lg
                       font-semibold hover:from-green-600 hover:to-emerald-700
                       focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2
                       transform transition duration-200 hover:scale-[1.02]">
          Send Password Reset Link
        </button>

        <!-- Link Daftar -->
        <p class="text-center text-sm text-gray-600 mt-6 pb-8">
          Already have an account?
          <a href="{{ route('login.index') }}" class="font-medium text-green-600 hover:text-green-500 transition duration-200">
            Login here
          </a>
        </p>
      </form>

    </div>
  </div>
</div>
@endcomponent
