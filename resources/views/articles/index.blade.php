<x-layouts.app title="Articles - GolfHill Terraces">

    {{-- Page Header --}}
    <section class="pt-20 pb-12" style="background: linear-gradient(135deg, rgba(151, 231, 245, 0.30) 0%, #FFF 50%, #FFF 100%);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="gradient-bar mx-auto mb-10"></div>
            <h1 class="text-6xl font-bold mb-6" style="color: #00377D;">Articles</h1>
            <p class="text-xl" style="color: #4A5565;">Insights, stories, and updates about luxury living at Golfhill Terraces</p>
        </div>
    </section>

    {{-- Featured Article Hero --}}
    @if($articles->count() > 0)
    @php $featured = $articles->first(); @endphp
    <section class="bg-white pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('articles.show', $featured->slug) }}" class="block">
                <div class="relative h-[437px] rounded-3xl overflow-hidden shadow-2xl group">
                    {{-- Background gradient placeholder --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-blue-800 group-hover:scale-105 transition-transform duration-700"></div>
                    {{-- Dark gradient overlay --}}
                    <div class="absolute inset-0" style="background: linear-gradient(245deg, rgba(102, 102, 102, 0.00) 9.7%, rgba(0, 0, 0, 0.60) 57.13%, rgba(0, 0, 0, 0.75) 89.93%);"></div>

                    {{-- Articles badge --}}
                    <div class="absolute top-6 left-6">
                        <div class="flex items-center gap-2 px-4 py-2 rounded-full text-white text-sm" style="background: rgba(255, 255, 255, 0.65);">
                            <svg class="w-5 h-5" fill="none" stroke="white" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                            <span>Articles</span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="absolute bottom-12 left-16 right-16">
                        <h2 class="text-5xl font-bold text-white mb-6 leading-tight">{{ $featured->title }}</h2>
                        <p class="text-white text-xl italic mb-6 leading-relaxed">
                            {{ Str::limit(strip_tags($featured->excerpt ?? $featured->content), 120) }}...
                            <span class="not-italic font-semibold">read more</span>
                        </p>
                        <div class="flex items-center gap-6 text-white/90 text-sm">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ $featured->published_at->format('F d, Y') }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>{{ $featured->user->name }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Carousel dots --}}
                    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-3">
                        <div class="h-3 w-8 rounded-full bg-white"></div>
                        <div class="w-3 h-3 rounded-full bg-white/50"></div>
                        <div class="w-3 h-3 rounded-full bg-white/50"></div>
                    </div>
                </div>
            </a>
        </div>
    </section>
    @endif

    {{-- Articles Grid --}}
    <section class="py-10 pb-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Category Filter --}}
            <div class="flex flex-wrap gap-3 mb-10">
                <a href="{{ route('articles.index') }}"
                   class="px-5 py-2 rounded-full text-sm font-semibold transition {{ !request('category') ? 'text-white' : 'border border-gray-200 hover:border-gray-400' }}"
                   style="{{ !request('category') ? 'background-color: #00377D;' : 'color: #4A5565; background: white;' }}">
                    All
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('articles.index', ['category' => $cat->id]) }}"
                   class="px-5 py-2 rounded-full text-sm font-semibold transition {{ request('category') == $cat->id ? 'text-white' : 'border border-gray-200 hover:border-gray-400' }}"
                   style="{{ request('category') == $cat->id ? 'background-color: #00377D;' : 'color: #4A5565; background: white;' }}">
                    {{ $cat->name }}
                </a>
                @endforeach
            </div>

            {{-- 2-column grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                @forelse($articles as $article)
                <a href="{{ route('articles.show', $article->slug) }}" class="flex flex-col gap-6 group">
                    {{-- Image placeholder --}}
                    <div class="h-80 rounded-2xl overflow-hidden bg-gradient-to-br from-blue-50 to-cyan-100 flex items-center justify-center">
                        <svg class="w-16 h-16 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    {{-- Content --}}
                    <div>
                        <div class="text-sm font-semibold mb-2" style="color: #009ED1;">
                            {{ $article->published_at->format('F Y') }}
                        </div>
                        <h3 class="text-2xl font-bold mb-3 group-hover:opacity-75 transition leading-tight" style="color: #00377D;">
                            {{ $article->title }}
                        </h3>
                        <p class="text-base mb-4" style="color: #4A5565; line-height: 1.625;">
                            {{ Str::limit(strip_tags($article->excerpt ?? $article->content), 110) }}
                        </p>
                        <span class="text-base font-semibold" style="color: #22AE6C;">Read More →</span>
                    </div>
                </a>
                @empty
                <div class="col-span-2 text-center py-20">
                    <svg class="w-20 h-20 mx-auto text-gray-200 mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <p class="text-xl font-semibold text-gray-400 mb-2">No articles yet</p>
                    <p class="text-gray-400">Check back soon for the latest stories from Golfhill Terraces</p>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($articles->hasPages())
            <div class="mt-16 flex justify-center">
                {{ $articles->links() }}
            </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 text-center text-white" style="background: linear-gradient(131deg, #00377D 16.85%, #00377D 48.61%, #009ED1 80.36%);">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-5xl font-bold mb-4">Find Your Perfect Home</h2>
            <p class="text-xl text-white/90 mb-10">Experience the luxury lifestyle at Golfhill Terraces Apartment</p>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center justify-center px-16 py-5 rounded-2xl font-semibold text-lg text-white transition"
               style="background-color: #22AE6C; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1);">
                Contact Us
            </a>
        </div>
    </section>

</x-layouts.app>
