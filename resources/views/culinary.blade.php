@component('layout')
@include('navbar')

<main class="max-w-6xl mx-auto py-12 px-4">
    <!-- Hero Section -->
    <section class="mb-12">
        <div class="text-center mb-5">
            <h1 class="text-3xl font-bold text-gray-800 mb-3">
                Culinary in Riau
            </h1>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Discover popular culinary spots with authentic flavors and great ambience
            </p>
            <div class="w-20 h-0.5 bg-gray-300 mx-auto "></div>
        </div>
    </section>

    <!-- Culinary List -->
    <section>
        <div class="mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Explore Culinary Destinations</h2>
            <p class="text-gray-600">Handpicked restaurants and eateries worth your visit</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @php use Illuminate\Support\Str; @endphp
            @forelse($culinaries as $culinary)
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
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300 group">
                    <!-- Image -->
                    <div class="relative overflow-hidden h-56">
                        <img src="{{ $imgSrc }}" alt="{{ $culinary->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
                        <span class="absolute top-3 left-3 inline-flex items-center rounded-full bg-white/90 px-3 py-1 text-xs font-medium text-gray-800 shadow">
                            {{ $culinary->price_range }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <div class="flex items-start justify-between gap-4">
                            <h3 class="text-xl font-bold text-gray-800">
                                {{ $culinary->name }}
                            </h3>
                        </div>

                        <div class="mt-3 space-y-2">
                            @if(!empty($culinary->address))
                                <div class="flex items-start gap-2 text-sm text-gray-600">
                                    <i class="ph ph-map-pin text-gray-400 mt-0.5"></i>
                                    <span>{{ $culinary->address }}</span>
                                </div>
                            @endif
                        </div>

                        <p class="text-gray-600 text-sm leading-relaxed mt-3 line-clamp-2">
                            {{ $culinary->description }}
                        </p>

                        <div class="pt-4 border-t border-gray-100 mt-4">
                            <a href="{{ route('culinary.detail', $culinary->id) }}" class="inline-flex items-center justify-center w-full bg-gray-800 text-white px-4 py-2.5 rounded-lg font-medium hover:bg-gray-700 transition-colors duration-200 text-sm">
                                View Details
                                <i class="ph ph-map-pin ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2">
                    <div class="bg-white border border-gray-200 rounded-lg p-8 text-center text-gray-600">
                        No culinary data available yet.
                    </div>
                </div>
            @endforelse
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
</style>

@include('footer')
@endcomponent
