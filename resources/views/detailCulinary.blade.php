@component('layout')
@include('navbar')

<main class="max-w-6xl mx-auto px-4 py-12">
    {{-- HERO / GALLERY --}}
    @php use Illuminate\Support\Str; @endphp
    @php
        $url = $culinary->image_url ?? '';
        if (Str::startsWith($url, ['http://', 'https://'])) {
           $imgSrc = $url;
       } elseif ($url && Str::contains($url, 'assets/')) {
           $imgSrc = asset($url);
       } elseif ($url) {
           $imgSrc = asset('storage/' . ltrim($url, '/'));
       } else {
           $imgSrc = asset('assets/img/hero3.jpg');
       }
    @endphp
    <section class="mb-10">
        <div class="mb-6">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $culinary->name }}</h1>
            <div class="mt-3 inline-flex items-center rounded-full bg-gray-100 px-3 py-1 text-sm font-medium text-gray-700" aria-label="Price range">
                <span class="sr-only">Price Range:</span>
                {{ $culinary->price_range }}
            </div>
        </div>
        <div class="relative group overflow-hidden rounded-xl shadow-md">
            <img class="w-full h-[480px] object-cover transition-transform duration-500 group-hover:scale-105" src="{{ $imgSrc }}" alt="Main photo of {{ $culinary->name }}">
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
        </div>
    </section>

    {{-- DETAILS --}}
    <section class="mb-12">
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
            @if(!empty($culinary->address))
                <h2 class="text-xl md:text-2xl font-semibold text-gray-900 mb-2">Address</h2>
                <div class="flex items-start text-gray-700 mb-4">
                    <i class="ph ph-map-pin text-xl mr-2 mt-0.5 flex-shrink-0 text-gray-500"></i>
                    <p class="leading-relaxed">{{ $culinary->address }}</p>
                </div>
            @else
                <div class="mb-4 bg-yellow-50 border border-yellow-100 rounded-lg p-4 text-sm text-yellow-800">
                    Address information is unavailable for this place.
                </div>
            @endif
            @if(!empty($culinary->description))
                <h2 class="text-xl md:text-2xl font-semibold text-gray-900 mb-3">Description</h2>
                <p class="text-gray-700 leading-relaxed">{{ $culinary->description }}</p>
            @endif
        </div>
    </section>

    {{-- MAP --}}
    <section class="mb-12">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Location</h3>
        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
            <div id="culinary-map" class="w-full h-[400px]" role="region" aria-label="Map showing location of {{ $culinary->name }}"></div>
        </div>
        @if(is_null($culinary->latitude) || is_null($culinary->longitude))
            <div class="mt-4 bg-yellow-50 border border-yellow-100 rounded-lg p-4 text-sm text-yellow-800">
                Coordinates are not provided for this place. Map is centered to Pekanbaru as a reference.
            </div>
        @endif
    </section>

    <div class="pt-2">
        <a href="{{ route('culinary.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900">
            <i class="ph ph-arrow-left mr-2"></i> Back to Culinary List
        </a>
    </div>
</main>

{{-- Leaflet --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const lat = @json($culinary->latitude);
        const lng = @json($culinary->longitude);
        const hasCoords = lat !== null && lng !== null;
        const center = hasCoords ? [lat, lng] : [0.50735, 101.44785]; // Pekanbaru default

        const map = L.map('culinary-map', {
            scrollWheelZoom: true
        }).setView(center, hasCoords ? 15 : 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        if (hasCoords) {
            const name = @json($culinary->name);
            const address = @json($culinary->address);
            const price = @json($culinary->price_range);
            L.marker([lat, lng]).addTo(map)
                .bindPopup(`<b>${name}</b><br>${address}<br><span class="text-gray-700">Price: ${price}</span>`);
        }
    });
</script>

@include('footer')
@endcomponent
