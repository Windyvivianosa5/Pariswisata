@component('layout')


<div class=" min-h-screen flex items-center justify-center p-4">

  <div class="w-full max-w-md justify-center">
    <!-- Kartu Registrasi -->
    <div class="bg-white rounded-2xl border border-green-100 overflow-hidden shadow-md">

      <!-- Bagian Header -->
      <div class="text-center ">
        <div class="flex justify-center">
          <img src="assets/img/logo-istanasiak.png" alt="Logo" class="h-32 w-48 object-contain rounded-lg">
        </div>

        <h1 class="text-3xl font-bold text-gray-800">Create Account</h1>
        <p class="text-gray-600">Register to get started</p>
      </div>

      <!-- Bagian Form -->
      <form action="{{ route('register') }}" method="post" class="p-8 space-y-4 bg-white">
        @csrf
        @method('post')
        <!-- Input Nama Lengkap -->
        <div>
          <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A9 9 0 1118.88 17.8M12 14v7m0 0H6m6 0h6" />
              </svg>
            </div>
            <input type="text" id="nama" name="name"
                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg
                          focus:ring-2 focus:ring-green-500 focus:border-transparent
                          placeholder-gray-400 transition duration-200 @error('name') border-red-600 @enderror"
                   placeholder="Enter your full name" />
                </div>
                @error('name')
                     <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Input Email & Nomor HP (kiri-kanan) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <!-- Email -->
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

          <!-- Nomor HP -->
          <div>
            <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 7M7 13l-1.293 1.293a1 1 0 00.707 1.707H18a1 1 0 00.707-1.707L17 13H7z" />
                </svg>
              </div>
              <input type="number" id="no_hp" name="no_hp"
                     class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg
                            focus:ring-2 focus:ring-green-500 focus:border-transparent
                            placeholder-gray-400 transition duration-200 @error('name') border-red-600 @enderror"
                     placeholder="08xxxxxxxxxx" />
                    </div>
                    @error('no_hp')
                       <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- Input Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </div>
            <input type="password" id="password" name="password"
                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg
                          focus:ring-2 focus:ring-green-500 focus:border-transparent
                          placeholder-gray-400 transition duration-200 @error('name') border-red-600 @enderror"
                   placeholder="••••••••" />
                </div>
                @error('password')
                     <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>

        <!-- Input Konfirmasi Password -->
        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
              </svg>
            </div>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg
                          focus:ring-2 focus:ring-green-500 focus:border-transparent
                          placeholder-gray-400 transition duration-200 @error('name') border-red-600 @enderror"
                   placeholder="Repeat password" />
                </div>
                @error('password_confirmation')
                     <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
         @enderror
        </div>

        <!-- Remember & Forgot Password -->
        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center space-x-2">
            <input type="checkbox" id="remember" name="remember"
                   class="h-4 w-4 text-green-500 focus:ring-green-400 border-gray-300 rounded">
            <span class="text-gray-700">Remember Me</span>
          </label>
          <a href="{{ route('password.forgot') }}" class="font-medium text-green-600 hover:text-green-500 transition duration-200">
            Forgot Password?
          </a>
        </div>

        <!-- Tombol Daftar -->
        <button type="submit"
                class="w-full bg-blue-300 text-white py-3 rounded-lg
                       font-semibold
                       transform transition duration-200 hover:scale-[1.02]">
          Register Now
        </button>

        <!-- Link Masuk -->
        <p class="text-center text-sm text-gray-600 mt-6">
          Already have an account?
          <a href="{{ route ('login.index')}}" class="font-medium text-green-600 hover:text-green-500 transition duration-200">
            Login here
          </a>
        </p>
      </form>

    </div>
  </div>
</div>

@endcomponent
