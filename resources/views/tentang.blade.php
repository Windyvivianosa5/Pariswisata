@component('layout')
    @include('navbar')
   <main class="max-w-6xl mx-auto py-12 px-4">
        <!-- Tourism Hero Section -->
        <section class="mb-16">
            <div class="text-center mb-8">
                <h2 class="text-3xl md:text-3xl font-bold text-gray-800 mb-3">
                    Travel and Vacation in Riau
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto mb-4">
                    Explore the natural beauty, rich culture, and captivating historical heritage of Riau Province
                </p>
                <div class="w-20 h-0.5 bg-gray-300 mx-auto"></div>
            </div>

            <!-- Bridge Image -->
            <div class="mb-16 group relative overflow-hidden rounded-lg shadow-lg">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent z-10"></div>
                <img src="assets/img/hero3.jpg" alt="Jembatan Siak Sri Indrapura" class="w-full h-[450px] object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute bottom-6 left-6 z-20 text-white">
                    <h3 class="text-2xl font-semibold mb-1">Jembatan Siak Sri Indrapura</h3>
                    <p class="text-sm opacity-90">Pride of Riau</p>
                </div>
            </div>
        </section>

        <!-- Sejarah Section -->
        <section class="py-16 bg-gray-50 px-4 mb-16 rounded-lg">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <span class="inline-block bg-gray-100 text-gray-700 px-4 py-1.5 rounded-full text-sm font-medium mb-4">
                        🏛️ Historical Heritage
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                        Siak Sri Indrapura Kingdom
                    </h2>
                    <div class="w-20 h-0.5 bg-gray-300 mx-auto"></div>
                </div>

                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <!-- Image Column -->
                    <div class="w-full lg:w-1/2">
                        <div class="relative group">
                            <div class="bg-white p-3 rounded-lg shadow-md">
                                <img src="assets/img/siak.jpeg" alt="Istana Siak Sri Indrapura" class="w-full h-[400px] object-cover rounded-lg transition-transform duration-300 group-hover:scale-[1.02]" />
                            </div>

                            <!-- Stats Badge -->
                            <div class="absolute -bottom-4 -right-4 bg-white rounded-lg shadow-md p-3 border border-gray-100">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-700">1723</div>
                                    <div class="text-xs text-gray-500">Year Founded</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Column -->
                    <div class="w-full lg:w-1/2">
                        <div class="inline-flex items-center bg-white rounded-full px-5 py-2 shadow-sm border border-gray-200 mb-6">
                            <div class="w-2 h-2 bg-gray-600 rounded-full mr-3"></div>
                            <span class="text-gray-700 font-semibold text-sm">1723 - Present</span>
                        </div>

                        <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-5">
                            Islamic Malay Sultanate
                        </h3>

                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100 mb-6">
                            <p class="text-gray-600 leading-relaxed mb-4">
                                <span class="font-semibold text-gray-800">Siak Sri Indrapura Kingdom</span> is an Islamic Malay Sultanate established in Riau, Indonesia, in <span class="font-semibold text-gray-700">1723</span> by <span class="font-semibold text-gray-700">Raja Kecil (Sultan Abdul Jalil Rahmat Syah)</span>, following the contest for the throne of the Johor Sultanate.
                            </p>
                            <p class="text-gray-600 leading-relaxed">
                                This Sultanate is one of the most important Islamic kingdoms in Riau, playing a strategic role in maritime trade and the spread of Islam in eastern Sumatra. The majestic Siak Palace stands as a silent witness to past glory and remains a popular historical tourism destination.
                            </p>
                        </div>

                        <!-- Key Facts -->
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-white p-4 rounded-lg border border-gray-100 hover:border-gray-200 transition-colors duration-200">
                                <div class="text-2xl mb-2">👑</div>
                                <div class="font-semibold text-gray-800 text-sm">Founder</div>
                                <div class="text-xs text-gray-500 mt-1">Raja Kecil</div>
                            </div>
                            <div class="bg-white p-4 rounded-lg border border-gray-100 hover:border-gray-200 transition-colors duration-200">
                                <div class="text-2xl mb-2">🕌</div>
                                <div class="font-semibold text-gray-800 text-sm">Religion</div>
                                <div class="text-xs text-gray-500 mt-1">Islam</div>
                            </div>
                            <div class="bg-white p-4 rounded-lg border border-gray-100 hover:border-gray-200 transition-colors duration-200">
                                <div class="text-2xl mb-2">🏰</div>
                                <div class="font-semibold text-gray-800 text-sm">Heritage</div>
                                <div class="text-xs text-gray-500 mt-1">Istana Megah</div>
                            </div>
                            <div class="bg-white p-4 rounded-lg border border-gray-100 hover:border-gray-200 transition-colors duration-200">
                                <div class="text-2xl mb-2">📜</div>
                                <div class="font-semibold text-gray-800 text-sm">Age</div>
                                <div class="text-xs text-gray-500 mt-1">300+ Years</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Additional Info Section -->
        <section class="py-12 bg-gray-50 px-4 rounded-lg mt-16">
            <div class="max-w-4xl mx-auto text-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Why Visit Riau?</h3>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Riau offers a complete travel experience—from grand royal history and stunning natural beauty to the rich Malay culture that remains well preserved. Every corner of Riau holds stories and beauty to enrich your journey.
                </p>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <div class="text-3xl mb-3">🏛️</div>
                        <h4 class="font-semibold text-gray-800 mb-2">Rich History</h4>
                        <p class="text-sm text-gray-600">Heritage of the Malay Sultanate spanning centuries</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <div class="text-3xl mb-3">🌴</div>
                        <h4 class="font-semibold text-gray-800 mb-2">Beautiful Nature</h4>
                        <p class="text-sm text-gray-600">Rivers, forests, and captivating tropical scenery</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <div class="text-3xl mb-3">🎭</div>
                        <h4 class="font-semibold text-gray-800 mb-2">Living Culture</h4>
                        <p class="text-sm text-gray-600">Malay traditions that are well preserved</p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('footer')
@endcomponent
