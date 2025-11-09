@php

    $countPendingTransaction = 0;

    if (auth()->check()) {

        $countPendingTransaction = \App\Models\Transaction::where('user_id', auth()->id())

            ->where('payment_status', 'pending')

            ->count();

}

@endphp
<nav class="bg-gray-200 shadow-md">
  <div class="max-w-6xl mx-auto flex items-center justify-between h-16 px-4">
    <!-- Logo -->
    <div class="flex items-center">
      <img class="h-12 w-auto" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
    </div>

    <!-- Menu utama (desktop) -->
    <ul id="nav-links" class="hidden md:flex items-center space-x-6 font-medium">
      <li><a href="/" class="nav-link transition {{ request()->is('/') ? 'border-b-2 border-blue-700 text-blue-700': ' text-black hover:text-blue-700'}} ">Home</a></li>
      <li><a href="{{ route('about') }}" class="nav-link transition {{ request()->is('about') ? 'border-b-2 border-blue-700 text-blue-700': ' text-black hover:text-blue-700'}}">About</a></li>
      <li class="relative inline-block text-left">
        <button type="button" command="--toggle" commandfor="recommendation-menu"
                class="nav-link transition inline-flex w-full justify-center gap-x-1.5 rounded-md bg-transparent py-2 font-medium text-base {{ (request()->is('hotel') || request()->is('culinary') || request()->is('culinary*')) ? 'border-b-2 border-blue-700 text-blue-700' : ' text-black hover:text-blue-700'}}">
          Recommendation
          <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
               class="-mr-1 size-5 text-gray-400">
            <path
              d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
              clip-rule="evenodd" fill-rule="evenodd" />
          </svg>
        </button>

        <el-disclosure id="recommendation-menu" hidden
          class="min-w-40 divide-y divide-gray-100 rounded-md bg-white shadow-lg outline-1 outline-black/5 transition transition-discrete absolute z-10 top-[40px] left-0 [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
          <div class="py-1">
            <a href="{{ route('hotels.index') }}"
               class="block px-3 py-2 text-sm font-medium {{ request()->is('hotel') ? 'text-blue-700 border-b-2 border-blue-700' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
              Hotel
            </a>
            <a href="{{ route('culinary.index') }}"
               class="block px-3 py-2 text-sm font-medium {{ (request()->is('culinary') || request()->is('culinary*')) ? 'text-blue-700 border-b-2 border-blue-700' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }}">
              Culinary
            </a>
          </div>
        </el-disclosure>
      </li>
      {{-- <li><a href="{{ route('index') }}" class="nav-link transition {{ request()->is('hotel') ? 'border-b-2 border-blue-700 text-blue-700': ' text-black hover:text-blue-700'}}">Hotel</a></li> --}}

      <li><a href="{{ route('contact') }}" class="nav-link transition {{ request()->is('contact') ? 'border-b-2 border-blue-700 text-blue-700': ' text-black hover:text-blue-700'}}">Contact</a></li>
        @if (auth()->check())
        <li class="relative inline-block text-left">
             <button type="button" command="--toggle" commandfor="profile-menu"
                            class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-transparent py-2 font-medium text-base text-black cursor-pointer">
                            {{ auth()->user()->name }}
                            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true"
                                class="-mr-1 size-5 text-gray-400">
                                <path
                                    d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" fill-rule="evenodd" />
                            </svg>
                        </button>

                        <el-disclosure id="profile-menu" hidden
                            class="w-25 divide-y divide-gray-100 rounded-md bg-white shadow-lg outline-1 outline-black/5 transition transition-discrete absolute z-10 bottom-[-40px] right-0 [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                            <div class="py-1">
                                <form action="{{ route('logout')}}" method="POST" class="w-full">
                                    @csrf
                                    @method('POST')
                                    <button type="submit"
                                        class="px-3 py-2 w-full text-sm font-medium cursor-pointer text-gray-700 text-left focus:bg-gray-100 focus:text-gray-900 focus:outline-hidden">Logout</button>
                                </form>
                            </div>

                        </el-disclosure>
        </li>

        @else
        <li>
            <a href="{{ route('login.index') }}"
               class="border-2 border-green-600 text-green-600 font-semibold px-5 py-2 rounded-full hover:bg-green-600 hover:text-white transition duration-300">
               Book Tickets
            </a>
        </li>
        @endif
        @auth
           </li>
        <li>
        <a href="{{ route('shopping.index') }}"
            class="px-1 flex relative border-2 border-transparent text-[#142e50] hover:text-[#8a97a8] focus:outline-none focus:text-gray-500 transition duration-150 ease-in-out"
            aria-label="Cart">
            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <span
                class="absolute inset-0 object-right-top top-[-8px] left-4 -mr-6 {{ $countPendingTransaction < 1 ? 'hidden' : '' }}">
                <div wire:poll='loadPendingTransaction'
                    class="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-semibold leading-4 bg-red-500 text-white">
                    {{ $countPendingTransaction }}
                </div>
            </span>
        </a>

    </li>
    <li>
        <a href="{{ route('tickets.index') }}"
           class="border-2 border-green-600 text-green-600 font-semibold px-5 py-2 rounded-full hover:bg-green-600 hover:text-white transition duration-300">
           Book Tickets
        </a>
    </li>
    @endauth

    </ul>

    <!-- Tombol hamburger (mobile) -->
    <button id="menu-btn" class="md:hidden focus:outline-none">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-black" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>

  <!-- Menu mobile -->
  <div id="menu" class="hidden md:hidden bg-gray-100 px-4 py-3 space-y-2 transition duration-300">
    <a href="/" class="nav-link block text-black hover:text-blue-700">Home</a>
    <a href="{{ route('about') }}" class="nav-link block text-black hover:text-blue-700">About</a>
    <a href="{{ route('hotels.index') }}" class="nav-link block text-black hover:text-blue-700">Hotel</a>
    <a href="{{ route('culinary.index') }}" class="nav-link block text-black hover:text-blue-700">Culinary</a>
    <a href="{{ route('contact') }}" class="nav-link block text-black hover:text-blue-700">Contact</a>
  </div>
</nav>

<script>
  const btn = document.getElementById("menu-btn");
  const menu = document.getElementById("menu");
  const navLinks = document.querySelectorAll(".nav-link");

  // Toggle menu mobile
  btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
  });

  // Highlight active link
  navLinks.forEach(link => {
    link.addEventListener("click", () => {
      navLinks.forEach(l => l.classList.remove("border-b-2", "border-blue-700", "text-blue-700"));
      link.classList.add("border-b-2", "border-blue-700", "text-blue-700");
    });
  });
</script>
