<x-layouts.app>
    {{-- Hero Section - Figma Design --}}
    <section class="relative h-[665px] bg-cover bg-center" style="background-image: url('{{ asset('images/HomePageBackground-new.jpeg') }}');">
       <div class="absolute inset-0 hero-overlay"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
            <div class="max-w-3xl text-white">
                <h1 class="text-6xl md:text-7xl font-bold mb-6" style="line-height: 90px;">
                    Where Convenience<br>Meets Luxury
                </h1>
                <p class="text-2xl text-white/90 mb-12 leading-relaxed">
                    198 Golf Course Facing Residences in Pondok Indah
                </p>
                <div class="flex flex-col sm:flex-row gap-6">
                    <a href="{{ route('contact') }}" 
                       class="inline-flex items-center justify-center px-16 py-4 rounded-2xl font-semibold text-lg text-white transition shadow-xl"
                       style="background-color: #22AE6C; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);">
                        Contact Us
                    </a>
                    <a href="{{ route('units.index') }}" 
                       class="inline-flex items-center justify-center px-12 py-4 rounded-2xl font-semibold text-lg text-white transition border-2 border-white hover:bg-white/10">
                        Explore Units
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Units Section --}}
    <!-- <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl font-bold mb-3" style="color: #00377D;">Our Units</h2>
                    <p class="text-gray-600">Discover our wide range of available premium properties</p>
                </div>
                <a href="{{ route('units.index') }}" class="font-semibold hover:opacity-80 transition" style="color: #009ED1;">
                    View All →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($units as $unit)
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden card-hover border border-gray-100">
                    <div class="relative h-64 bg-gradient-to-br from-blue-100 to-blue-50">
                        {{-- Placeholder for unit image --}}
                        <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <span class="absolute top-4 right-4 badge-available">
                            {{ ucfirst($unit->status) }}
                        </span>
                        <span class="absolute bottom-4 left-4 bg-white/90 backdrop-blur-sm text-gray-700 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $unit->unitType->name }}
                        </span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $unit->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ Str::limit($unit->description, 80) }}</p>
                        
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-5 pb-5 border-b">
                            @if($unit->bedrooms)
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                <span>{{ $unit->bedrooms }} BR</span>
                            </div>
                            @endif
                            @if($unit->bathrooms)
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>{{ $unit->bathrooms }} BA</span>
                            </div>
                            @endif
                            @if($unit->size)
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                                <span>{{ $unit->size }}m²</span>
                            </div>
                            @endif
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-gray-500 mb-1">Starting From</p>
                                <p class="text-2xl font-bold" style="color: #009ED1;">${{ number_format($unit->price) }}</p>
                            </div>
                            <a href="{{ route('units.show', $unit->slug) }}" 
                               class="px-5 py-2.5 rounded-lg text-sm font-semibold text-white hover:opacity-90 transition"
                               style="background-color: #00377D;">
                                Details
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-16">
                    <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <p class="text-gray-500 text-lg mb-3">No units available yet</p>
                    <p class="text-gray-400 text-sm">Please check back later or contact us for more information</p>
                </div>
                @endforelse
            </div>
        </div>
    </section> -->

    {{-- An Oasis Section - Figma Design --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                {{-- Image --}}
                <div>
                    <picture>
                        <source srcset="{{ asset('images/homepage-oasis-living-room.webp') }}" type="image/webp">
                        <img src="{{ asset('images/homepage-oasis-living-room.jpg') }}"
                             alt="Luxury Interior"
                             class="w-full h-[600px] object-cover rounded-3xl shadow-2xl"
                             loading="lazy" decoding="async">
                    </picture>
                </div>

                {{-- Content --}}
                <div class="space-y-6">
                    <div class="gradient-bar"></div>
                    
                    <h2 class="text-5xl font-bold leading-tight" style="color: #00377D;">
                        An Oasis in the Heart of Jakarta
                    </h2>

                    <div class="space-y-6 text-lg leading-relaxed" style="color: #364153;">
                        <p>
                            Located in prime Pondok Indah area, short distance to malls & business districts. 
                            Designed with subtle Mediterranean architecture by award-winning American firm Design International.
                        </p>
                        <p>
                            Experience luxury living where every detail has been carefully crafted to provide the perfect blend of elegance, comfort, and convenience. 
                            Surrounded by lush greenery and overlooking a pristine golf course, Golfhill Terraces offers an unparalleled lifestyle in Jakarta's most prestigious neighborhood.
                        </p>
                    </div>

                    {{-- Stats Card --}}
                    <div class="mt-8 p-6 rounded-2xl border border-[#009ED1]/20]" 
                         style="background: linear-gradient(135deg, rgba(151, 231, 245, 0.2) 0%, #FFF 100%);">
                        <div class="grid grid-cols-3 gap-8">
                            <div class="text-center">
                                <div class="text-3xl font-bold" style="color: #00377D;">198</div>
                                <div class="text-sm" style="color: #4A5565;">Residences</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold" style="color: #22AE6C;">6</div>
                                <div class="text-sm" style="color: #4A5565;">Unit Types</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold" style="color: #009ED1;">215</div>
                                <div class="text-sm" style="color: #4A5565;">Max SQM</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Facilities Section - Figma Design --}}
    <section id="facilities" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="gradient-bar mx-auto mb-8"></div>
                <h2 class="text-5xl font-bold" style="color: #00377D;">Gallery</h2>
            </div>

            @php
                $facilities = [
                    ['name' => 'Tennis Court',        'image' => asset('images/tennis-court-renoved.webp'),        'fallback' => asset('images/tennis-court-renoved.jpeg')],
                    ['name' => 'Swimming Pool',        'image' => asset('images/pool.webp'),          'fallback' => asset('images/pool.jpg')],
                    ['name' => 'Fitness Center',       'image' => asset('images/fitness.webp'),       'fallback' => asset('images/fitness.jpg')],
                    ['name' => 'EV Charger',           'image' => asset('images/ev.webp'),            'fallback' => asset('images/ev.jpg')],
                    ['name' => 'Children Playground',  'image' => asset('images/playground.webp'),    'fallback' => asset('images/playground.jpg')],
                    ['name' => 'Restaurant',           'image' => asset('images/restraurant.webp'),   'fallback' => asset('images/restraurant.jpg')],
                    ['name' => 'Jogging Track',        'image' => asset('images/track.webp'),         'fallback' => asset('images/track.jpg')],
                    ['name' => 'Function Room',        'image' => asset('images/function.webp'),      'fallback' => asset('images/function.jpg')],
                    ['name' => 'Pickleball Court',        'image' => asset('images/pickle-ball-court.webp'),      'fallback' => asset('images/pickle-ball-court.png')]
                ];
            @endphp

            <div class="photo-slider" data-photo-slider>
                <div class="photo-slider-stage">
                    @foreach($facilities as $index => $facility)
                        <article
                            class="photo-slider-card{{ $index === 0 ? ' is-active' : '' }}"
                            data-photo-slide
                            aria-hidden="{{ $index === 0 ? 'false' : 'true' }}"
                        >
                            <picture>
                                <source srcset="{{ $facility['image'] }}" type="image/webp">
                                <img src="{{ $facility['fallback'] }}" alt="{{ $facility['name'] }}" class="photo-slider-image" loading="lazy" decoding="async">
                            </picture>
                            <div class="photo-gallery-overlay"></div>
                            <div class="photo-slider-caption">
                                <p class="photo-gallery-kicker">GolfHill Lifestyle</p>
                                <h3>{{ $facility['name'] }}</h3>
                            </div>
                        </article>
                    @endforeach

                    <button type="button" class="photo-slider-arrow is-left" data-photo-slider-prev aria-label="Previous photo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button type="button" class="photo-slider-arrow is-right" data-photo-slider-next aria-label="Next photo">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

                <div class="photo-slider-dots" role="tablist" aria-label="Photo Galleries Slider">
                    @foreach($facilities as $index => $facility)
                        <button
                            type="button"
                            class="photo-slider-dot{{ $index === 0 ? ' is-active' : '' }}"
                            data-photo-slider-dot
                            data-slide-index="{{ $index }}"
                            aria-label="Show {{ $facility['name'] }}"
                        ></button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
<!-- 
    {{-- Lifestyle Articles Section --}}
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl font-bold mb-3" style="color: #00377D;">Lifestyle</h2>
                    <p class="text-gray-600">Discover articles, news, and insights about GolfHill living</p>
                </div>
                <a href="{{ route('articles.index') }}" class="font-semibold hover:opacity-80 transition" style="color: #009ED1;">
                    View All →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($articles as $article)
                <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden card-hover border border-gray-100">
                    <div class="relative h-56 bg-gradient-to-br from-cyan-50 to-blue-50">
                        {{-- Placeholder for article image --}}
                        <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </div>
                        <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-semibold text-white" style="background-color: #00377D;">
                            {{ $article->category->name }}
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <span>{{ $article->user->name }}</span>
                            <span class="mx-2">•</span>
                            <time>{{ $article->published_at->format('M d, Y') }}</time>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">{{ $article->title }}</h3>
                        <p class="text-gray-600 text-sm mb-5 line-clamp-3">{{ Str::limit($article->excerpt ?? strip_tags($article->content), 120) }}</p>
                        <a href="{{ route('articles.show', $article->slug) }}" 
                           class="inline-flex items-center font-semibold hover:opacity-80 transition group"
                           style="color: #009ED1;">
                            Read Article
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </article>
                @empty
                <div class="col-span-3 text-center py-16">
                    <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <p class="text-gray-500 text-lg mb-3">No articles published yet</p>
                    <p class="text-gray-400 text-sm">Check back soon for lifestyle content and updates</p>
                </div>
                @endforelse
            </div>
        </div>
    </section> -->

    {{-- CTA Section - Figma Design --}}
    <section class="py-20 text-center text-white" style="background: linear-gradient(131deg, #0D2F4F 16.85%, #0a8f71 80.36%);">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-5xl font-bold mb-4 leading-tight">
                Find Your Perfect Home
            </h2>
            <p class="text-xl text-white/90 mb-10">
                Experience Effortless Living at Golfhill Terraces
            </p>
            <a href="{{ route('contact') }}" 
               class="inline-flex items-center justify-center px-16 py-5 rounded-2xl font-semibold text-lg text-white transition shadow-xl"
               style="background-color: #22AE6C; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);">
                Contact Us
            </a>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('[data-photo-slider]').forEach((slider) => {
                const slides = Array.from(slider.querySelectorAll('[data-photo-slide]'));
                const dots = Array.from(slider.querySelectorAll('[data-photo-slider-dot]'));
                const prevButton = slider.querySelector('[data-photo-slider-prev]');
                const nextButton = slider.querySelector('[data-photo-slider-next]');

                if (!slides.length) {
                    return;
                }

                let activeIndex = 0;

                const updateSlider = () => {
                    const lastIndex = slides.length - 1;
                    const prevIndex = activeIndex === 0 ? lastIndex : activeIndex - 1;
                    const nextIndex = activeIndex === lastIndex ? 0 : activeIndex + 1;

                    slides.forEach((slide, index) => {
                        slide.classList.remove('is-active', 'is-prev', 'is-next');

                        if (index === activeIndex) {
                            slide.classList.add('is-active');
                            slide.setAttribute('aria-hidden', 'false');
                        } else if (index === prevIndex) {
                            slide.classList.add('is-prev');
                            slide.setAttribute('aria-hidden', 'true');
                        } else if (index === nextIndex) {
                            slide.classList.add('is-next');
                            slide.setAttribute('aria-hidden', 'true');
                        } else {
                            slide.setAttribute('aria-hidden', 'true');
                        }
                    });

                    dots.forEach((dot, index) => {
                        dot.classList.toggle('is-active', index === activeIndex);
                        dot.setAttribute('aria-selected', index === activeIndex ? 'true' : 'false');
                    });
                };

                prevButton?.addEventListener('click', () => {
                    activeIndex = activeIndex === 0 ? slides.length - 1 : activeIndex - 1;
                    updateSlider();
                });

                nextButton?.addEventListener('click', () => {
                    activeIndex = activeIndex === slides.length - 1 ? 0 : activeIndex + 1;
                    updateSlider();
                });

                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        activeIndex = index;
                        updateSlider();
                    });
                });

                updateSlider();
            });
        });
    </script>
    @endpush
</x-layouts.app>
