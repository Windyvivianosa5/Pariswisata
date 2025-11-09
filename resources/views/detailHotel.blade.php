@component('layout')
@include('navbar')

<main class="max-w-6xl mx-auto px-4 py-12">
    {{-- GALERI --}}
    <section class="mb-12">
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $hotel->name }}</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Foto utama --}}
            <div class="relative group overflow-hidden rounded-lg shadow-md">
                <img class="w-full h-[530px] object-cover transition-transform duration-500 group-hover:scale-105"
                     src="{{ asset('storage/' . $hotel->image) }}"
                     alt="Main photo of {{ $hotel->name }}">
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
            </div>

            {{-- Foto tambahan --}}
            <div class="grid grid-rows-2 gap-4">
                @if($hotel->detail && $hotel->detail->image2)
                    <div class="relative group overflow-hidden rounded-lg shadow-md">
                        <img class="w-full h-[260px] object-cover transition-transform duration-500 group-hover:scale-105"
                             src="{{ asset('storage/' . $hotel->detail->image2) }}"
                             alt="Additional photo 1 of {{ $hotel->name }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                    </div>
                @endif

                @if($hotel->detail && $hotel->detail->image3)
                    <div class="relative group overflow-hidden rounded-lg shadow-md">
                        <img class="w-full h-[260px] object-cover transition-transform duration-500 group-hover:scale-105"
                             src="{{ asset('storage/' . $hotel->detail->image3) }}"
                             alt="Additional photo 2 of {{ $hotel->name }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- DETAIL HOTEL --}}
    <section class="mb-12 bg-white rounded-lg shadow-sm border border-gray-100 p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div class="flex-1">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">{{ $hotel->name }}</h2>
                <div class="flex items-start text-gray-600 mb-2">
                    <i class="ph ph-map-pin text-xl mr-2 mt-0.5 flex-shrink-0"></i>
                    <p class="leading-relaxed">{{ $hotel->detail->alamat ?? $hotel->alamat }}</p>
                </div>
                <div class="flex items-center gap-2 mt-3">
                    <div class="flex text-yellow-400">
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
            </div>
            <div class="text-left md:text-right">
                <p class="text-sm text-gray-500 mb-1">Price per night</p>
                <p class="text-2xl md:text-3xl font-bold text-gray-800">
                    Rp {{ number_format($hotel->detail->harga ?? $hotel->harga, 0, ',', '.') }}
                </p>

            </div>
        </div>
    </section>

    {{-- DESKRIPSI --}}
    @if($hotel->deskripsi)
    <section class="mb-12">
        <h3 class="text-xl font-bold text-gray-800 mb-4">About the Hotel</h3>
        <div class="bg-gray-50 rounded-lg p-6 border border-gray-100">
            <p class="text-gray-600 leading-relaxed">{{ $hotel->deskripsi }}</p>
        </div>
    </section>
    @endif

    {{-- FASILITAS --}}
    <section class="mb-12">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Hotel Facilities</h3>
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="ph ph-car-simple text-xl text-gray-700"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Parking</span>
                </div>
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="ph ph-wifi-high text-xl text-gray-700"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Free Wi-Fi</span>
                </div>
                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="ph ph-wind text-xl text-gray-700"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Air Conditioning</span>
                </div>
            </div>
            <div class="pt-4 border-t border-gray-100">
                <p class="text-gray-600 leading-relaxed">Overall location is great for sightseeing, recreation, dining, and getting around.</p>
            </div>
        </div>
    </section>

    {{-- MAPS --}}
    <section class="mb-12">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Hotel Location</h3>
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            <div id="map" class="w-full h-[400px]"></div>
        </div>
        <div class="mt-4 bg-blue-50 border border-blue-100 rounded-lg p-4">
            <div class="flex items-start gap-3">
                <i class="ph ph-info text-blue-600 text-xl mt-0.5"></i>
                <div>
                    <p class="text-sm text-gray-700">
                        <span class="font-semibold">Address:</span> {{ $hotel->detail->alamat ?? $hotel->alamat }}
                    </p>
                    <p class="text-sm text-gray-600 mt-1">Click the marker on the map to view location details</p>
                </div>
            </div>
        </div>
    </section>

    {{-- INFO TAMBAHAN --}}
    <section class="bg-gray-50 rounded-lg p-6 border border-gray-100">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Important Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex items-start gap-3">
                <i class="ph ph-clock text-gray-400 text-xl mt-0.5"></i>
                <div>
                    <p class="font-semibold text-gray-800 text-sm">Check-in / Check-out</p>
                    <p class="text-sm text-gray-600">14:00 / 12:00</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <i class="ph ph-phone text-gray-400 text-xl mt-0.5"></i>
                <div>
                    <p class="font-semibold text-gray-800 text-sm">Hotel Contact</p>
                    <p class="text-sm text-gray-600">Contact the reception for more information</p>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- Leaflet --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var lat = {!! json_encode($hotel->detail->latitude ?? -0.502106) !!};
        var lng = {!! json_encode($hotel->detail->longitude ?? 101.447777) !!};

        var map = L.map('map').setView([lat, lng], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([lat, lng])
            .addTo(map)
            .bindPopup("<b>{{ $hotel->name }}</b><br>{{ $hotel->detail->alamat ?? $hotel->alamat }}<br><span class='text-green-600 font-bold'>Rp {{ number_format($hotel->detail->harga ?? $hotel->harga, 0, ',', '.') }}</span>")
            .openPopup();
    });
</script>

@include('footer')
@endcomponent
