@component('layout')


<!-- Simulasi Notifikasi Sukses/Error - Akan ditampilkan oleh JS -->
    <div id="status-message-container" class="fixed top-0 left-0 right-0 z-50 p-4 hidden">
        <div id="status-message"
            class="mx-auto max-w-md bg-teal-100 border-t-4 border-teal-500 rounded-lg text-teal-900 px-4 py-3 shadow-xl"
            role="alert">
            <div class="flex items-center">
                <div class="py-1">
                    <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold">Your password has been changed successfully.</p>
                    <p class="text-sm">You can now log in using your new password.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-gradient-to-br from-green-50 to-emerald-100 min-h-screen flex items-center justify-center p-4">

        <div class="w-full max-w-md justify-center">
            <!-- Kartu Ganti Password -->
            <div class="bg-white rounded-2xl border border-green-100 overflow-hidden shadow-2xl">

                <!-- Bagian Header -->
                <div class="text-center p-8 bg-gradient-to-b from-green-50 to-white border-b border-green-100">
                    <!-- Placeholder Logo (meniru logopkura.png) -->
                    <div class="flex justify-center mb-4">
                        <svg class="h-16 w-16 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 7a2 2 0 012 2v5.586l2.293 2.293a1 1 0 01-1.414 1.414L16 16.414V17a2 2 0 01-2 2H8a2 2 0 01-2-2v-5.586l-2.293-2.293a1 1 0 011.414-1.414L7 9.414V7a2 2 0 012-2h6z" />
                        </svg>
                    </div>

                    <h1 class="text-3xl font-bold text-gray-800 ">Change Password</h1>
                    <p class="text-gray-600 mt-2">Set your new password</p>
                </div>

                <!-- Bagian Form -->
                <form id="reset-form" action="{{ route('password.update') }}" method="post" class="p-8 space-y-6 bg-white">
                    @csrf
                    @method('POST')

                    <input type="hidden" name="token" value="{{$token}}">
                    <!-- Input Email (tetap ditampilkan karena ada di snippet user) -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <!-- Email Icon -->
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>
                            <input type="email" id="email" name="email"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg
                                      focus:ring-2 focus:ring-green-500 focus:border-green-500
                                      placeholder-gray-400 transition duration-200"
                                placeholder="name@email.com" required />
                        </div>
                        <!-- Simulasi Error: <p class="mt-2 text-sm text-red-600">Email tidak ditemukan.</p> -->
                    </div>

                    <!-- Input Password Baru -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <!-- Lock Icon -->
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" id="password" name="password"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg
                                      focus:ring-2 focus:ring-green-500 focus:border-green-500
                                      placeholder-gray-400 transition duration-200"
                                placeholder="Enter your new password" required />
                        </div>
                        <!-- Simulasi Error: <p class="mt-2 text-sm text-red-600">Kata sandi harus minimal 8 karakter.</p> -->
                    </div>

                    <!-- Input Konfirmasi Password Baru -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <!-- Lock Icon -->
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg
                                      focus:ring-2 focus:ring-green-500 focus:border-green-500
                                      placeholder-gray-400 transition duration-200"
                                placeholder="Repeat the new password" required />
                        </div>
                        <!-- Simulasi Error: <p class="mt-2 text-sm text-red-600">Konfirmasi kata sandi tidak cocok.</p> -->
                    </div>

                    <!-- Tombol Simpan Password Baru -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-green-500 to-emerald-600 text-white py-3 rounded-lg
                                font-semibold hover:from-green-600 hover:to-emerald-700
                                focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2
                                transform transition duration-200 hover:scale-[1.01] shadow-md shadow-green-200">
                        Save New Password
                    </button>

                    <!-- Link Kembali ke Login -->
                    <p class="text-center text-sm text-gray-600 mt-6 pb-4">
                        <a href="/masuk" class="font-medium text-green-600 hover:text-green-500 transition duration-200">
                            Back to Login Page
                        </a>
                    </p>
                </form>

            </div>
        </div>
    </div>
@endcomponent
