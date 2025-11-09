@component('layout')
@include('navbar')

<!-- Breadcrumb -->
<section class="max-w-6xl mx-auto px-4 mb-6 pt-6">
  <div class="mb-2">
    <ul class="flex flex-wrap items-center gap-2 text-sm text-gray-600">
      <li><a href="#" class="hover:underline">Indonesia</a></li>
      <li>/</li>
      <li><a href="#" class="hover:underline">Things to do</a></li>
      <li>/</li>
      <li><a href="#" class="hover:underline">Attractions</a></li>
    </ul>
  </div>
  <hr class="my-3">
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
    <ul class="flex flex-wrap gap-2 text-sm text-gray-600">
      <li><a href="#" class="hover:underline">Indonesia</a></li>
      <li>/</li>
      <li><a href="#" class="hover:underline">Riau</a></li>
      <li>/</li>
      <li><a href="#" class="hover:underline">Istana Siak Sri Indrapura</a></li>
    </ul>
    <p class="text-sm md:text-base font-medium">Travel and Vacation in Riau</p>
  </div>
</section>

<!-- Hero -->
<section class="max-w-6xl mx-auto px-4">
  @if($hero)
  <div class="relative">
    <img src="{{ asset('storage/' . $hero->hero_image) }}" alt="{{ $hero->hero_title }}" class="w-full h-80 md:h-[28rem] rounded-xl object-cover shadow-lg">
    <div class="absolute inset-0 bg-black bg-opacity-40 rounded-xl flex items-center justify-center">
      <div class="text-center text-white">
        <h2 class="text-2xl md:text-4xl font-bold mb-2">{{ $hero->hero_title }}</h2>
        <p class="text-sm md:text-lg">{{ $hero->hero_description }}</p>
      </div>
    </div>
  </div>
  @else
  <img src="assets/img/istana.jpg" alt="Istana Siak" class="w-full h-80 md:h-[28rem] rounded-xl object-cover shadow">
  @endif
</section>

<!-- Tombol Simpan -->
<div class="max-w-6xl mx-auto flex justify-center py-6">
  <button class="flex items-center gap-2 border border-gray-700 rounded-full px-5 py-2 text-sm md:text-base hover:bg-gray-100 transition">
    <i class="ph ph-heart text-lg"></i> Save
  </button>
</div>

<!-- Jelajahi Riau -->
<section class="max-w-6xl mx-auto px-4">
  <h1 class="text-2xl sm:text-3xl md:text-6xl font-bold mb-2">Explore Riau</h1>
  <p class="text-sm md:text-base text-gray-700 mb-5">
    Must-do in Riau <br>Select categories to filter your recommendations
  </p>
  <ul class="flex flex-wrap gap-3 mb-6 text-sm">
    <li class="border border-gray-600 rounded-full px-4 py-2 hover:bg-gray-200 cursor-pointer">Must-do</li>
    <li class="border border-gray-600 rounded-full px-4 py-2 hover:bg-gray-200 cursor-pointer">Family</li>
    <li class="border border-gray-600 rounded-full px-4 py-2 hover:bg-gray-200 cursor-pointer">Less Popular</li>
    <li class="border border-gray-600 rounded-full px-4 py-2 hover:bg-gray-200 cursor-pointer">Museum</li>
  </ul>
</section>

<!-- Hal yang dapat dilakukan -->
<section class="max-w-6xl mx-auto px-4">
  <h4 class="font-bold text-lg mb-4">Things to do</h4>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($todoPosts as $todoPost)
    <div class="flex flex-col p-5 shadow-md rounded-xl bg-white hover:shadow-lg transition space-y-3">
      <p class="font-semibold text-gray-800">{{$todoPost->title}}</p>
      <img src="{{ asset('storage/' . $todoPost->image) }}" alt="{{$todoPost->title}}" class="w-full h-48 object-cover rounded-md">
      <p class="text-sm text-gray-600">{{$todoPost->description}}</p>
    </div>
    @endforeach
  </div>
</section>

<!-- Koleksi -->
<section class="max-w-6xl mx-auto px-4 mt-10">
  <h4 class="font-bold text-lg mb-4">Browse Collections</h4>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($koleksiPosts as $koleksiPost)
    <div class="flex flex-col p-5 shadow-md rounded-xl bg-white hover:shadow-lg transition space-y-3">
      <p class="font-semibold text-gray-800">{{$koleksiPost->title}}</p>
      <img src="{{ asset('storage/' . $koleksiPost->image) }}" alt="{{$koleksiPost->title}}" class="w-full h-60 object-cover rounded-md">
      <p class="text-sm text-gray-600">{{$koleksiPost->description}}</p>
    </div>
    @endforeach
  </div>
</section>

<!-- Cerita terkait -->
<div class="max-w-xl mx-auto flex justify-center my-10">
  <p class="border border-gray-700 rounded-full px-6 py-2 text-sm hover:bg-gray-100 cursor-pointer">Related Stories</p>
</div>

<!-- Sejarah -->
<section class="max-w-6xl mx-auto px-4">
  <div class="grid md:grid-cols-2 gap-8 items-center">
    <div class="bg-gray-100 rounded-xl p-6 shadow">
      <p class="text-sm md:text-base text-gray-700 leading-relaxed">
        The Siak Sri Indrapura Kingdom is an Islamic Malay Sultanate established in Riau in 1723
        by Raja Kecil (Sultan Abdul Jalil Rahmat Syah), following the contest for the Johor Sultanate's throne.
      </p>
    </div>
    <img src="assets/img/siak.jpeg" alt="Siak" class="w-full h-72 object-cover rounded-xl shadow">
  </div>
</section>

<!-- Wisata terbaik -->
<section class="max-w-6xl mx-auto px-4 my-12">
  <h4 class="font-bold text-lg mb-4">Best attractions to visit in Riau</h4>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($wisatas as $wisata)
    <div class="flex flex-col items-center p-5 shadow-md rounded-xl bg-white hover:shadow-lg transition space-y-3">
      <p class="font-semibold text-gray-800">{{$wisata->title}}</p>
      <img src="{{ asset('storage/' . $wisata->image) }}" alt="{{$wisata->title}}" class="w-full h-60 object-cover rounded-md">
    </div>
    @endforeach
  </div>
</section>

<section class="max-w-6xl mx-auto px-4 my-12">
<h1 class="text-center text-3xl font-['Montserrat'] text-[#142e50] font-bold mb-10">Visitor Experiences at Siak Palace Sri Indrapura
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
            @foreach ($reviews as $review)
                <div class="flex flex-col items-center p-10 bg-[#dfe2e7] rounded-xl space-y-5">
                    <img src="{{ asset('assets/img/avatar-placeholder.jpg') }}" alt="" width="70"
                        class="rounded-full" />
                    <p>
                        @for ($i = 0; $i < $review->rating; $i++)
                            ⭐
                        @endfor
                    </p>
                    <p>"{{ $review->review }}"</p>
                    <p class="font-bold text-[#142e50]">{{ $review->user->name }}</p>
                </div>
            @endforeach
        </div>
    </section>


    @auth
<section class="max-w-6xl mx-auto px-4 my-12">
<div class="grid md:grid-cols-2 gap-0 bg-white rounded-3xl shadow-2xl overflow-hidden">
                <!-- Left Section - Tagline -->
                <div class="bg-[#6a7079] p-12 flex flex-col justify-center items-center text-white">
                    <div class="text-center space-y-6">
                        <div class="inline-block bg-white bg-opacity-20 rounded-full p-3 mb-4 text-yellow-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-12 h-12">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                    clip-rule="evenodd" />
                            </svg>


                        </div>

                        <h1 class="text-4xl font-bold leading-tight">
                            Share<br>Your Experience
                        </h1>

                        <div class="w-20 h-1 bg-yellow-400 mx-auto"></div>

                        <p class="text-lg text-blue-100 leading-relaxed">
                            Your review means a lot to us and other travelers
                        </p>
                    </div>
                </div>

                <!-- Right Section - Form -->
                <div class="px-12 py-5">
                    <form action="{{ route('submit.review')}}" id="reviewForm" class="space-y-8 " method="POST">
                        @csrf
                        @method('POST')
                        <!-- Rating Section -->
                        <div>
                            <div class="flex flex-row-reverse justify-center gap-2 py-4" id="starRating">
                                <input type="radio" id="star5" name="rating" value="5"
                                    class="hidden peer/star5">
                                <label for="star5"
                                    class="cursor-pointer text-5xl text-gray-300 transition-all duration-200 hover:text-yellow-400 hover:scale-110 peer-checked/star5:text-yellow-400 hover:[&~label]:text-yellow-400"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-10 h-10">
                                        <path fill-rule="evenodd"
                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </label>

                                <input type="radio" id="star4" name="rating" value="4"
                                    class="hidden peer/star4">
                                <label for="star4"
                                    class="cursor-pointer text-5xl text-gray-300 transition-all duration-200 hover:text-yellow-400 hover:scale-110 peer-checked/star4:text-yellow-400 peer-checked/star5:text-yellow-400 hover:[&~label]:text-yellow-400"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-10 h-10">
                                        <path fill-rule="evenodd"
                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </label>

                                <input type="radio" id="star3" name="rating" value="3"
                                    class="hidden peer/star3">
                                <label for="star3"
                                    class="cursor-pointer text-5xl text-gray-300 transition-all duration-200 hover:text-yellow-400 hover:scale-110 peer-checked/star3:text-yellow-400 peer-checked/star4:text-yellow-400 peer-checked/star5:text-yellow-400 hover:[&~label]:text-yellow-400"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-10 h-10">
                                        <path fill-rule="evenodd"
                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </label>

                                <input type="radio" id="star2" name="rating" value="2"
                                    class="hidden peer/star2">
                                <label for="star2"
                                    class="cursor-pointer text-5xl text-gray-300 transition-all duration-200 hover:text-yellow-400 hover:scale-110 peer-checked/star2:text-yellow-400 peer-checked/star3:text-yellow-400 peer-checked/star4:text-yellow-400 peer-checked/star5:text-yellow-400 hover:[&~label]:text-yellow-400"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-10 h-10">
                                        <path fill-rule="evenodd"
                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </label>

                                <input type="radio" id="star1"name="rating" value="1"
                                    class="hidden peer/star1">
                                <label for="star1"
                                    class="cursor-pointer text-5xl text-gray-300 transition-all duration-200 hover:text-yellow-400 hover:scale-110 peer-checked/star1:text-yellow-400 peer-checked/star2:text-yellow-400 peer-checked/star3:text-yellow-400 peer-checked/star4:text-yellow-400 peer-checked/star5:text-yellow-400 hover:[&~label]:text-yellow-400"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-10 h-10">
                                        <path fill-rule="evenodd"
                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </label>
                            </div>
                            @error('rating')
                                <p class="text-center text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="text-center text-gray-500 text-sm">Click the stars to give a rating</p>
                        </div>

                        <!-- Review Section -->
                        <div>
                            <label class="block text-[#142e50] font-semibold mb-3 text-lg" for="review">
                                <i class="fas fa-comment-dots mr-2"></i>Your Review
                            </label>
                            <textarea id="review" name="review" rows="4"
                                class="w-full px-4 py-4 border-2 border-gray-300 rounded-xl focus:outline-none focus:border-[#142e50] transition resize-none @error('password') border-red-600 @enderror"
                                placeholder="Describe your travel experience here..."></textarea>
                            @error('review')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="text-gray-500 text-sm mt-2">Minimum 10 characters</p>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                        class="w-full bg-[#6a7079] text-white font-bold py-4 px-6 rounded-xl hover:opacity-90 transition duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-paper-plane mr-2"></i>Submit Review
                    </button>
                </form>
            </div>

        </div>
    </section>
    @endauth
@include('footer')
@endcomponent
