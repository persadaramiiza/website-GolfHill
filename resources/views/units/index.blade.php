<x-layouts.app title="Our Units - GolfHill Terraces">

    {{-- Page Header --}}
    <section style="background: linear-gradient(135deg, rgba(151, 231, 245, 0.30) 0%, #FFF 50%, #FFF 100%); padding-top: 85px;">
        <div class="max-w-5xl mx-auto px-8" style="padding-bottom: 0;">
            <div class="flex flex-col items-center">
                {{-- Gradient Bar --}}
                <div style="width: 80px; height: 6px; background: linear-gradient(180deg, #009ED1 0%, #4BD997 100%); border-radius: 3px; margin-bottom: 38px;"></div>
                {{-- Title --}}
                <h1 style="color: #00377D; font-size: 60px; font-weight: 700; line-height: 60px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif; margin-bottom: 24px;">
                    Our Units
                </h1>
                {{-- Subtitle --}}
                <p style="color: #4A5565; font-size: 20px; font-weight: 400; line-height: 28px; text-align: center; font-family: 'Plus Jakarta Sans', sans-serif; margin-bottom: 64px;">
                    Choose from our carefully designed residences, each offering spectacular views and premium amenities
                </p>
            </div>
        </div>
    </section>

    {{-- Units Grid --}}
    <section style="background: #FFF; padding: 64px 0 80px 0;">
        <div class="max-w-5xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                @forelse($units as $unit)
                <div style="border-radius: 24px; border: 1px solid #F3F4F6; background: #FFF; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10); overflow: hidden; display: flex; flex-direction: column;">

                    {{-- Image Slider --}}
                    @php
                        $galleryImages = $unit->getMedia('gallery');
                        $imageUrls = $galleryImages->map(function ($m) {
                            if ($m->hasGeneratedConversion('thumb')) return $m->getUrl('thumb');
                            return $m->getUrl();
                        })->values();
                        if ($imageUrls->isEmpty() && $unit->image_url) {
                            $imageUrls = collect([$unit->image_url]);
                        }
                    @endphp
                    <div style="aspect-ratio: 16/9; position: relative; overflow: hidden; flex-shrink: 0;"
                         x-data="{ active: 0, images: {{ $imageUrls->toJson() }} }"
                         @mouseenter="$el.querySelector('.slider-arrows')?.classList.remove('opacity-0')"
                         @mouseleave="$el.querySelector('.slider-arrows')?.classList.add('opacity-0')">

                        {{-- Slides --}}
                        @if($imageUrls->isNotEmpty())
                            <template x-for="(url, i) in images" :key="i">
                                <img :src="url" alt="{{ $unit->name }}"
                                     loading="lazy" decoding="async"
                                     x-show="active === i"
                                     style="width: 100%; height: 100%; object-fit: cover; object-position: center; position: absolute; inset: 0; transition: opacity 0.3s ease;"
                                     :style="active === i ? 'opacity:1' : 'opacity:0'">
                            </template>
                        @else
                            <div style="position: absolute; inset: 0; background: linear-gradient(135deg, #bfdbfe 0%, #a5f3fc 100%); display: flex; align-items: center; justify-content: center;">
                                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#93c5fd" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif

                        {{-- Dark gradient overlay --}}
                        <div style="position: absolute; inset: 0; background: linear-gradient(0deg, rgba(0,0,0,0.40) 0%, rgba(0,0,0,0.00) 100%); pointer-events: none;"></div>

                        {{-- Fully Furnished badge --}}
                        <div style="position: absolute; top: 24px; right: 24px; padding: 8px 20px; background: #22AE6C; border-radius: 999px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.10), 0 4px 6px -4px rgba(0,0,0,0.10); pointer-events: none;">
                            <span style="color: #FFF; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 600; line-height: 20px;">Fully Furnished</span>
                        </div>

                        {{-- Arrow buttons (only when >1 image) --}}
                        <template x-if="images.length > 1">
                            <div class="slider-arrows opacity-0" style="transition: opacity 0.2s;">
                                {{-- Left --}}
                                <button @click.prevent="active = (active - 1 + images.length) % images.length"
                                        style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); width: 38px; height: 38px; border-radius: 50%; background: rgba(0,0,0,0.45); border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(4px);">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M15 18l-6-6 6-6"/>
                                    </svg>
                                </button>
                                {{-- Right --}}
                                <button @click.prevent="active = (active + 1) % images.length"
                                        style="position: absolute; right: 14px; top: 50%; transform: translateY(-50%); width: 38px; height: 38px; border-radius: 50%; background: rgba(0,0,0,0.45); border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(4px);">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6"/>
                                    </svg>
                                </button>
                                {{-- Dot indicators --}}
                                <div style="position: absolute; bottom: 14px; left: 50%; transform: translateX(-50%); display: flex; gap: 6px;">
                                    <template x-for="(_, i) in images" :key="i">
                                        <button @click.prevent="active = i"
                                                :style="active === i ? 'background: white; width: 20px;' : 'background: rgba(255,255,255,0.5); width: 8px;'"
                                                style="height: 8px; border-radius: 4px; border: none; cursor: pointer; transition: all 0.2s;"></button>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>

                    {{-- Card Content --}}
                    <div style="padding: 32px 32px 0 32px; display: flex; flex-direction: column; gap: 24px; flex: 1;">

                        {{-- Unit Name --}}
                        <h3 style="color: #00377D; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 30px; font-weight: 700; line-height: 36px; margin: 0;">
                            {{ $unit->name }}
                        </h3>

                        {{-- Specs 2Ã—2 Grid --}}
                        <div class="grid grid-cols-2 gap-3">

                            {{-- Luas --}}
                            @if($unit->size)
                            <div style="display: flex; align-items: center; gap: 12px; padding-left: 12px; height: 64px; border-radius: 14px; background: #F9FAFB;">
                                <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(0,158,209,0.10); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.66667 2.5H4.16667C3.72464 2.5 3.30072 2.67559 2.98816 2.98816C2.67559 3.30072 2.5 3.72464 2.5 4.16667V6.66667" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.5 6.66667V4.16667C17.5 3.72464 17.3244 3.30072 17.0118 2.98816C16.6993 2.67559 16.2754 2.5 15.8333 2.5H13.3333" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2.5 13.3334V15.8334C2.5 16.2754 2.67559 16.6993 2.98816 17.0119C3.30072 17.3244 3.72464 17.5 4.16667 17.5H6.66667" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.3333 17.5H15.8333C16.2754 17.5 16.6993 17.3244 17.0118 17.0119C17.3244 16.6993 17.5 16.2754 17.5 15.8334V13.3334" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div style="color: #6A7282; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; font-weight: 400; line-height: 16px;">Luas</div>
                                    <div style="color: #00377D; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 700; line-height: 24px;">{{ number_format($unit->size) }} SQM</div>
                                </div>
                            </div>
                            @endif

                            {{-- Bedrooms --}}
                            @if($unit->bedrooms)
                            <div style="display: flex; align-items: center; gap: 12px; padding-left: 12px; height: 64px; border-radius: 14px; background: #F9FAFB;">
                                <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(0,158,209,0.10); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.66675 3.33337V16.6667" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1.66675 6.66663H16.6667C17.1088 6.66663 17.5327 6.84222 17.8453 7.15478C18.1578 7.46734 18.3334 7.89127 18.3334 8.33329V16.6666" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1.66675 14.1666H18.3334" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5 6.66663V14.1666" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div style="color: #6A7282; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; font-weight: 400; line-height: 16px;">Bedrooms</div>
                                    <div style="color: #00377D; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 700; line-height: 24px;">{{ $unit->bedrooms }}</div>
                                </div>
                            </div>
                            @endif

                            {{-- Bathrooms --}}
                            @if($unit->bathrooms)
                            <div style="display: flex; align-items: center; gap: 12px; padding-left: 12px; height: 64px; border-radius: 14px; background: #F9FAFB;">
                                <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(0,158,209,0.10); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.33341 3.33337L6.66675 5.00004" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.1667 15.8334V17.5" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1.66675 10H18.3334" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.83325 15.8334V17.5" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.49992 4.1667L6.35075 3.01754C6.10976 2.77543 5.80378 2.60834 5.46982 2.53649C5.13586 2.46464 4.78823 2.4911 4.469 2.61268C4.14976 2.73425 3.87259 2.94573 3.67103 3.22153C3.46947 3.49733 3.35214 3.82562 3.33325 4.1667V14.1667C3.33325 14.6087 3.50885 15.0327 3.82141 15.3452C4.13397 15.6578 4.55789 15.8334 4.99992 15.8334H14.9999C15.4419 15.8334 15.8659 15.6578 16.1784 15.3452C16.491 15.0327 16.6666 14.6087 16.6666 14.1667V10" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div style="color: #6A7282; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; font-weight: 400; line-height: 16px;">Bathrooms</div>
                                    <div style="color: #00377D; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 700; line-height: 24px;">{{ $unit->bathrooms }}</div>
                                </div>
                            </div>
                            @endif

                            {{-- Views --}}
                            <div style="display: flex; align-items: center; gap: 12px; padding-left: 12px; height: 64px; border-radius: 14px; background: #F9FAFB;">
                                <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(0,158,209,0.10); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.71835 10.2901C1.6489 10.103 1.6489 9.89715 1.71835 9.71006C2.39476 8.06993 3.54294 6.66759 5.01732 5.6808C6.4917 4.69402 8.22588 4.16724 10 4.16724C11.7741 4.16724 13.5083 4.69402 14.9827 5.6808C16.4571 6.66759 17.6053 8.06993 18.2817 9.71006C18.3511 9.89715 18.3511 10.103 18.2817 10.2901C17.6053 11.9302 16.4571 13.3325 14.9827 14.3193C13.5083 15.3061 11.7741 15.8329 10 15.8329C8.22588 15.8329 6.4917 15.3061 5.01732 14.3193C3.54294 13.3325 2.39476 11.9302 1.71835 10.2901Z" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 12.5C11.3807 12.5 12.5 11.3807 12.5 10C12.5 8.61929 11.3807 7.5 10 7.5C8.61929 7.5 7.5 8.61929 7.5 10C7.5 11.3807 8.61929 12.5 10 12.5Z" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div style="color: #6A7282; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 12px; font-weight: 400; line-height: 16px;">Views</div>
                                    <div style="color: #00377D; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 16px; font-weight: 700; line-height: 24px;">{{ $unit->location ?: 'Golf View' }}</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Bottom feature row --}}
                    <div style="margin: 24px 32px 32px 32px; padding-top: 25px; border-top: 1px solid #F3F4F6; display: flex; align-items: center; gap: 8px;">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" style="flex-shrink: 0;" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 4.5L6.75 12.75L3 9" stroke="#22AE6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="color: #4A5565; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 400; line-height: 20px;">
                            {{ $unit->description ? Str::limit($unit->description, 35) : 'Spacious Living Room' }}
                        </span>
                    </div>

                </div>
                @empty
                <div class="col-span-2 text-center py-20">
                    <p style="color: #4A5565; font-size: 18px; font-family: 'Plus Jakarta Sans', sans-serif;">No units available at the moment.</p>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($units->hasPages())
            <div class="mt-12">
                {{ $units->links() }}
            </div>
            @endif
        </div>
    </section>
<!-- 
    {{-- CTA Section --}}
    <section style="background: linear-gradient(131deg, #00377D 0%, #009ED1 100%); padding: 80px 0;">
        <div class="max-w-5xl mx-auto px-8 text-center">
            <h2 style="color: #FFF; font-size: 48px; font-weight: 700; line-height: 56px; font-family: 'Plus Jakarta Sans', sans-serif; margin-bottom: 16px;">
                Ready to Experience<br>GolfHill Terraces?
            </h2>
            <p style="color: rgba(255,255,255,0.80); font-size: 20px; font-weight: 400; line-height: 28px; font-family: 'Plus Jakarta Sans', sans-serif; margin-bottom: 40px;">
                Interested in a unit? Contact our team for pricing and availability
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://wa.me/6281803730325"
                   style="display: inline-block; padding: 16px 40px; background: #22AE6C; color: #FFF; font-size: 16px; font-weight: 700; border-radius: 12px; text-decoration: none; transition: opacity 0.2s;"
                   onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    Contact via WhatsApp
                </a>
                <a href="{{ route('facilities.index') }}"
                   style="display: inline-block; padding: 16px 40px; background: #FFF; color: #00377D; font-size: 16px; font-weight: 700; border-radius: 12px; text-decoration: none; transition: opacity 0.2s;"
                   onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                    Our Facilities
                </a>
            </div>
        </div>
    </section> -->

</x-layouts.app>
