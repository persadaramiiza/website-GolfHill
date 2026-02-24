<x-layouts.app>
    {{-- Hero Section --}}
    <section class="relative bg-gray-900 text-white py-20 md:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Discover Your Dream Home at GolfHill
                </h1>
                <p class="text-xl text-gray-300 mb-8">
                    Premium property development offering luxury living spaces in prime locations. Find your perfect apartment, house, or commercial space today.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('units.index') }}" 
                       class="bg-white text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition text-center">
                        Explore Units
                    </a>
                    <a href="{{ route('contact') }}" 
                       class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-gray-900 transition text-center">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Units Section --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Units</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Browse our selection of premium properties available for sale
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($units as $unit)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="bg-gray-200 h-64 flex items-center justify-center text-gray-400">
                        {{-- Image placeholder - will show unit images when uploaded --}}
                        <span class="text-sm">{{ $unit->name }}</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span class="bg-gray-100 px-3 py-1 rounded">{{ $unit->unitType->name }}</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $unit->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($unit->description, 60) }}</p>
                        <div class="flex items-center text-sm text-gray-600 mb-4 space-x-4">
                            @if($unit->bedrooms)<span>🛏️ {{ $unit->bedrooms }} Beds</span>@endif
                            @if($unit->bathrooms)<span>🚿 {{ $unit->bathrooms }} Baths</span>@endif
                            @if($unit->size)<span>📐 {{ $unit->size }}m²</span>@endif
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-gray-900">${{ number_format($unit->price) }}</span>
                            <a href="{{ route('units.show', $unit->slug) }}" 
                               class="text-gray-900 font-medium hover:underline">View Details →</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 mb-4">No units available yet.</p>
                    <a href="{{ route('units.index') }}" class="text-gray-900 underline">Browse all units</a>
                </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('units.index') }}" 
                   class="inline-block bg-gray-900 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-800 transition">
                    View All Units
                </a>
            </div>
        </div>
    </section>

    {{-- Lifestyle Articles Section --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Lifestyle & Insights</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Latest articles about property trends, design tips, and community news
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($articles as $article)
                <article class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                    <div class="bg-gray-200 h-48 flex items-center justify-center text-gray-400">
                        <span class="text-sm">{{ $article->title }}</span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-xs bg-gray-100 px-3 py-1 rounded">{{ $article->category->name }}</span>
                            <span class="text-xs text-gray-500">{{ $article->published_at?->format('M d, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $article->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($article->excerpt ?? strip_tags($article->content), 80) }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-600">
                                <span>{{ $article->user->name }}</span>
                            </div>
                            <a href="{{ route('articles.show', $article->slug) }}" 
                               class="text-gray-900 font-medium hover:underline">Read More →</a>
                        </div>
                    </div>
                </article>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 mb-4">No articles published yet.</p>
                    <a href="{{ route('articles.index') }}" class="text-gray-900 underline">Browse all articles</a>
                </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('articles.index') }}" 
                   class="inline-block border-2 border-gray-900 text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-gray-900 hover:text-white transition">
                    All Articles
                </a>
            </div>
        </div>
    </section>
</x-layouts.app>
