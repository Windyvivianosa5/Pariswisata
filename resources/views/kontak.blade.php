@component('layout')
@include('navbar')

<main class="max-w-6xl mx-auto px-4 py-12">
    <!-- Hero Section -->
    <section class="mb-16">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-3">
                Travel and Vacation in Riau
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Get complete information about Siak Palace (Istana Siak Sri Indrapura) and other travel destinations
            </p>
            <div class="w-20 h-0.5 bg-gray-300 mx-auto mt-4"></div>
        </div>

        <!-- Hero Image -->
        <div class="relative overflow-hidden rounded-lg shadow-lg group">
            <img src="assets/img/istana.jpg" alt="Istana Siak Sri Indrapura" class="w-full h-[400px] object-cover transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
            <div class="absolute bottom-6 left-6 text-white">
                <h2 class="text-2xl font-semibold mb-1">Istana Siak Sri Indrapura</h2>
                <p class="text-sm opacity-90">Malay Cultural Heritage</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="mb-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Contact Information -->
            <div>
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Contact Information</h3>
                    <p class="text-gray-600">Contact us for more information about your visit</p>
                </div>

                <div class="space-y-6">
                    <!-- Phone -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                <i class="ph ph-phone text-gray-700 text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm text-gray-500 mb-1">Requesting A Call:</h4>
                                <p class="text-lg font-semibold text-gray-800">(629) 555-0129</p>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                <i class="ph ph-envelope text-gray-700 text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm text-gray-500 mb-1">E-mail</h4>
                                <p class="text-lg font-semibold text-gray-800">istanaSiak@example.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                <i class="ph ph-map-pin text-gray-700 text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm text-gray-500 mb-1">Location</h4>
                                <p class="text-base font-semibold text-gray-800">Sri Indrapura, Kp. Dalam, Kec. Siak, Kabupaten Siak, Riau 28773</p>
                            </div>
                        </div>
                    </div>

                    <!-- Hours -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                <i class="ph ph-clock text-gray-700 text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm text-gray-500 mb-1">Every Day</h4>
                                <p class="text-lg font-semibold text-gray-800">07.00 - 17.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div>
                <div class="mb-4">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Our Location</h3>
                    <p class="text-gray-600">Find us on the map for easier visits</p>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div id="map" class="w-full h-[480px]">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.972088210432!2d102.04641157395874!3d0.7948122991974714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d4273f88da76f1%3A0xce5a6b2edf647c58!2sIstana%20Siak%20Sri%20Indrapura!5e1!3m2!1sid!2sid!4v1759120444287!5m2!1sid!2sid"
                            width="100%"
                            height="480"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <div class="mt-4 bg-blue-50 border border-blue-100 rounded-lg p-4">
                    <div class="flex items-start gap-3">
                        <i class="ph ph-info text-blue-600 text-xl mt-0.5"></i>
                        <p class="text-sm text-gray-700">
                            Click on the map to open in Google Maps and get directions
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Info Section -->
    <section class="bg-gray-50 rounded-lg p-8 border border-gray-100">
        <div class="text-center mb-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Visitor Information</h3>
            <p class="text-gray-600">Things you need to know before visiting</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                <div class="text-3xl mb-3">🎫</div>
                <h4 class="font-semibold text-gray-800 mb-2">Entrance Ticket</h4>
                <p class="text-sm text-gray-600">Ticket prices can be requested directly</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                <div class="text-3xl mb-3">📸</div>
                <h4 class="font-semibold text-gray-800 mb-2">Photos & Videos</h4>
                <p class="text-sm text-gray-600">Permitted for personal documentation</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                <div class="text-3xl mb-3">👕</div>
                <h4 class="font-semibold text-gray-800 mb-2">Attire</h4>
                <p class="text-sm text-gray-600">Wear modest and comfortable clothing</p>
            </div>
        </div>
    </section>


</main>

@include('footer')
@endcomponent
