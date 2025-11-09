@component('layout')
@include('navbar')

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var map = L.map('map').setView([0.7855389117514734, 102.0510686628417], 10);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan semua hotel ke peta
        @foreach($hotels as $hotel)
            @if($hotel->detail && $hotel->detail->latitude && $hotel->detail->longitude)
                var marker = L.marker([{{ $hotel->detail->latitude }}, {{ $hotel->detail->longitude }}])
                    .addTo(map)
                    .bindPopup(
                        "<b>{{ $hotel->name }}</b><br>" +
                        "{{ $hotel->detail->alamat ?? $hotel->alamat }}<br>" +
                        "<span class='text-green-600 font-bold'>Rp {{ number_format($hotel->detail->harga ?? $hotel->harga, 0, ',', '.') }}</span>"
                    )
                    .bindTooltip(
                        "Rp {{ number_format($hotel->detail->harga ?? $hotel->harga, 0, ',', '.') }}",
                        { permanent: true, direction: "top", className: "hotel-label" }
                    );

                marker.on('click', function () {
                    window.location.href = "{{ route('hotels.detail', $hotel->id) }}";
                });

            @endif
        @endforeach
    });
</script>

<main class="max-w-6xl mx-auto py-12 px-4 ">
    <!-- Hero Section -->
    <section class="mb-16">
        <div class="text-center mb-5">
            <h1 class="text-3xl font-bold text-gray-800 mb-3">
                Hotels in Riau
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Find the best accommodations for your travel comfort
            </p>
            <div class="w-20 h-0.5 bg-gray-300 mx-auto "></div>
        </div>
    </section>

    <!-- Peta Hotel -->
    <section class="mb-16">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Hotel Locations on Map</h2>
            <p class="text-gray-600">Explore hotel locations and find those closest to your destination</p>
        </div>
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
            <div id="map" class="w-full h-[450px]"></div>
        </div>
    </section>

    <!-- Daftar Hotel -->
    <section class="mb-16">
        <div class="mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Explore Our Popular Hotels</h2>
            <p class="text-gray-600">Quality accommodations with the best facilities for you</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($hotels as $hotel)
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300 group">
                    <!-- Image Container -->
                    <div class="relative overflow-hidden h-56">
                        <img src="/storage/{{$hotel->image }}" alt="{{ $hotel->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>

                        <!-- Rating Badge on Image -->

                    </div>

                    <!-- Content Container -->
                    <div class="p-6">
                        <!-- Hotel Name -->
                        <a href="{{ route('hotels.detail', $hotel->id) }}" class="text-xl font-bold text-gray-800 mb-3 block hover:text-gray-600 transition-colors duration-200">
                            {{ $hotel->name }}
                        </a>

                        <!-- Rating Stars -->
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400 mr-2">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $hotel->rating)
                                        <i class="ph-fill ph-star text-base"></i>
                                    @else
                                        <i class="ph ph-star text-base"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="text-sm text-gray-500">{{ $hotel->rating }}/5</span>
                        </div>

                        <!-- Location Info -->
                        <div class="space-y-2 mb-4">
                            <div class="flex items-start gap-2 text-sm text-gray-600">
                                <i class="ph ph-map-pin text-gray-400 mt-0.5"></i>
                                <span>{{ $hotel->kota }}, {{ $hotel->provinsi }}</span>
                            </div>
                        </div>

                        <!-- Description -->
                        <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-2">
                            {{ $hotel->deskripsi }}
                        </p>

                        <!-- Action Button -->
                        <div class="pt-4 border-t border-gray-100">
                            <a href="{{ route('hotels.detail', $hotel->id) }}" class="inline-flex items-center justify-center w-full bg-gray-800 text-white px-4 py-2.5 rounded-lg font-medium hover:bg-gray-700 transition-colors duration-200 text-sm">
                                View Details
                                <i class="ph ph-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Info Section -->
    <section class="py-12 bg-gray-50 rounded-lg">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Why Choose Our Hotels?</h3>
                <p class="text-gray-600">We provide a variety of the best hotel choices for your comfort</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="text-3xl mb-3">🏆</div>
                    <h4 class="font-semibold text-gray-800 mb-2">Guaranteed Quality</h4>
                    <p class="text-sm text-gray-600">Curated hotels with top service standards</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="text-3xl mb-3">📍</div>
                    <h4 class="font-semibold text-gray-800 mb-2">Strategic Location</h4>
                    <p class="text-sm text-gray-600">Close to the city center and attractions</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 text-center">
                    <div class="text-3xl mb-3">💰</div>
                    <h4 class="font-semibold text-gray-800 mb-2">Competitive Prices</h4>
                    <p class="text-sm text-gray-600">Get the best deals for every budget</p>
                </div>
            </div>
        </div>
    </section>

</main>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .hotel-label {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        font-weight: 600;
        color: #374151;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }
</style>

@include('footer')
@endcomponent
