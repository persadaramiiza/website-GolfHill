<x-layouts.app title="Our Units - GolfHill Terraces">

    {{-- Page Header --}}
    <section class="pb-12" style="background: linear-gradient(135deg, rgba(151, 231, 245, 0.30) 0%, #FFF 50%, #FFF 100%);">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 text-center">
            {{-- Gradient bar --}}
            <div class="mx-auto mb-8" style="width:80px;height:6px;background:linear-gradient(180deg,#009ED1 0%,#4BD997 100%);border-radius:99px;"></div>
            <h1 class="font-bold mb-5" style="font-size:60px;line-height:60px;color:#00377D;">Our Units</h1>
            <p class="mx-auto max-w-2xl pb-10" style="font-size:20px;font-weight:400;line-height:28px;color:#4A5565;">
                Choose from our carefully designed residences, each offering spectacular views and premium amenities
            </p>
        </div>
    </section>

    {{-- Filters --}}
    <section class="bg-white pt-8 pb-4">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('units.index') }}"
                  class="flex flex-wrap items-center gap-3 p-5 rounded-2xl border"
                  style="background:#F9FAFB;border-color:#E5E7EB;">
                {{-- Unit Type --}}
                <div class="flex-1 min-w-[160px]">
                    <label class="block text-xs font-semibold mb-1" style="color:#6A7282;">Unit Type</label>
                    <select name="type"
                            class="w-full px-3 py-2 rounded-xl border text-sm font-medium focus:outline-none"
                            style="border-color:#D1D5DC;color:#00377D;"
                            onchange="this.form.submit()">
                        <option value="">All Types</option>
                        @foreach($unitTypes as $type)
                        <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                {{-- Status --}}
                <div class="flex-1 min-w-[140px]">
                    <label class="block text-xs font-semibold mb-1" style="color:#6A7282;">Status</label>
                    <select name="status"
                            class="w-full px-3 py-2 rounded-xl border text-sm font-medium focus:outline-none"
                            style="border-color:#D1D5DC;color:#00377D;"
                            onchange="this.form.submit()">
                        <option value="">All Status</option>
                        <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="reserved" {{ request('status') == 'reserved' ? 'selected' : '' }}>Reserved</option>
                        <option value="sold" {{ request('status') == 'sold' ? 'selected' : '' }}>Sold</option>
                    </select>
                </div>
                {{-- Min Price --}}
                <div class="flex-1 min-w-[140px]">
                    <label class="block text-xs font-semibold mb-1" style="color:#6A7282;">Min Price (IDR)</label>
                    <input type="number" name="price_min" value="{{ request('price_min') }}"
                           placeholder="0"
                           class="w-full px-3 py-2 rounded-xl border text-sm focus:outline-none"
                           style="border-color:#D1D5DC;">
                </div>
                {{-- Max Price --}}
                <div class="flex-1 min-w-[140px]">
                    <label class="block text-xs font-semibold mb-1" style="color:#6A7282;">Max Price (IDR)</label>
                    <input type="number" name="price_max" value="{{ request('price_max') }}"
                           placeholder="Any"
                           class="w-full px-3 py-2 rounded-xl border text-sm focus:outline-none"
                           style="border-color:#D1D5DC;">
                </div>
                {{-- Buttons --}}
                <div class="flex gap-2 pt-4">
                    <button type="submit"
                            class="px-6 py-2 rounded-xl text-sm font-semibold text-white transition hover:opacity-90"
                            style="background-color:#00377D;">
                        Apply
                    </button>
                    <a href="{{ route('units.index') }}"
                       class="px-6 py-2 rounded-xl text-sm font-semibold border transition hover:bg-gray-50"
                       style="border-color:#D1D5DC;color:#4A5565;">
                        Clear
                    </a>
                </div>
            </form>
        </div>
    </section>

    {{-- Units Grid --}}
    <section class="bg-white py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($units as $unit)
                <div class="flex flex-col overflow-hidden transition card-hover"
                     style="border-radius:24px;border:1px solid #F3F4F6;background:#FFF;box-shadow:0 10px 15px -3px rgba(0,0,0,0.10),0 4px 6px -4px rgba(0,0,0,0.10);">

                    {{-- Image --}}
                    <div class="relative overflow-hidden" style="height:350px;">
                        {{-- Placeholder image --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-cyan-200 flex items-center justify-center">
                            <svg class="w-16 h-16 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        {{-- Dark gradient overlay --}}
                        <div class="absolute inset-0" style="background:linear-gradient(0deg, rgba(0,0,0,0.40) 0%, rgba(0,0,0,0.00) 100%);"></div>
                        {{-- Status badge --}}
                        <div class="absolute top-6 right-6">
                            @if($unit->status === 'available')
                            <span class="px-5 py-2 rounded-full text-sm font-semibold text-white"
                                  style="background:#22AE6C;box-shadow:0 10px 15px -3px rgba(0,0,0,0.10),0 4px 6px -4px rgba(0,0,0,0.10);">
                                Available
                            </span>
                            @elseif($unit->status === 'reserved')
                            <span class="px-5 py-2 rounded-full text-sm font-semibold text-white"
                                  style="background:#F59E0B;box-shadow:0 10px 15px -3px rgba(0,0,0,0.10);">
                                Reserved
                            </span>
                            @else
                            <span class="px-5 py-2 rounded-full text-sm font-semibold text-white"
                                  style="background:#EF4444;box-shadow:0 10px 15px -3px rgba(0,0,0,0.10);">
                                Sold
                            </span>
                            @endif
                        </div>
                    </div>

                    {{-- Card Content --}}
                    <div class="flex flex-col flex-1 px-8 pt-8 pb-0 gap-6">
                        {{-- Name & Type --}}
                        <div class="flex items-start justify-between gap-4">
                            <h3 class="font-bold" style="font-size:30px;line-height:36px;color:#00377D;">
                                {{ $unit->name }}
                            </h3>
                            <span class="mt-1 shrink-0 px-3 py-1 rounded-full text-xs font-semibold text-white"
                                  style="background-color:#009ED1;">
                                {{ $unit->unitType->name }}
                            </span>
                        </div>

                        {{-- Specs chips 2×2 --}}
                        <div class="grid grid-cols-2 gap-3">
                            {{-- Luas --}}
                            @if($unit->size)
                            <div class="flex items-center gap-3 px-3 py-4 rounded-2xl" style="background:#F9FAFB;">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="background:rgba(0,158,209,0.10);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.66667 2.5H4.16667C3.72464 2.5 3.30072 2.67559 2.98816 2.98816C2.67559 3.30072 2.5 3.72464 2.5 4.16667V6.66667" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M17.5 6.66667V4.16667C17.5 3.72464 17.3244 3.30072 17.0118 2.98816C16.6993 2.67559 16.2754 2.5 15.8333 2.5H13.3333" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2.5 13.3334V15.8334C2.5 16.2754 2.67559 16.6993 2.98816 17.0119C3.30072 17.3244 3.72464 17.5 4.16667 17.5H6.66667" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.3333 17.5H15.8333C16.2754 17.5 16.6993 17.3244 17.0118 17.0119C17.3244 16.6993 17.5 16.2754 17.5 15.8334V13.3334" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs" style="color:#6A7282;">Luas</div>
                                    <div class="font-bold text-base" style="color:#00377D;">{{ number_format($unit->size) }} SQM</div>
                                </div>
                            </div>
                            @endif

                            {{-- Bedrooms --}}
                            @if($unit->bedrooms)
                            <div class="flex items-center gap-3 px-3 py-4 rounded-2xl" style="background:#F9FAFB;">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="background:rgba(0,158,209,0.10);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.66675 3.33337V16.6667" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1.66675 6.66663H16.6667C17.1088 6.66663 17.5327 6.84222 17.8453 7.15478C18.1578 7.46734 18.3334 7.89127 18.3334 8.33329V16.6666" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1.66675 14.1666H18.3334" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5 6.66663V14.1666" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs" style="color:#6A7282;">Bedrooms</div>
                                    <div class="font-bold text-base" style="color:#00377D;">{{ $unit->bedrooms }}</div>
                                </div>
                            </div>
                            @endif

                            {{-- Bathrooms --}}
                            @if($unit->bathrooms)
                            <div class="flex items-center gap-3 px-3 py-4 rounded-2xl" style="background:#F9FAFB;">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="background:rgba(0,158,209,0.10);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.33341 3.33337L6.66675 5.00004" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.1667 15.8334V17.5" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M1.66675 10H18.3334" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5.83325 15.8334V17.5" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M7.49992 4.1667L6.35075 3.01754C6.10976 2.77543 5.80378 2.60834 5.46982 2.53649C5.13586 2.46464 4.78823 2.4911 4.469 2.61268C4.14976 2.73425 3.87259 2.94573 3.67103 3.22153C3.46947 3.49733 3.35214 3.82562 3.33325 4.1667V14.1667C3.33325 14.6087 3.50885 15.0327 3.82141 15.3452C4.13397 15.6578 4.55789 15.8334 4.99992 15.8334H14.9999C15.4419 15.8334 15.8659 15.6578 16.1784 15.3452C16.491 15.0327 16.6666 14.6087 16.6666 14.1667V10" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs" style="color:#6A7282;">Bathrooms</div>
                                    <div class="font-bold text-base" style="color:#00377D;">{{ $unit->bathrooms }}</div>
                                </div>
                            </div>
                            @endif

                            {{-- Views / Location --}}
                            <div class="flex items-center gap-3 px-3 py-4 rounded-2xl" style="background:#F9FAFB;">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0" style="background:rgba(0,158,209,0.10);">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.71835 10.2901C1.6489 10.103 1.6489 9.89715 1.71835 9.71006C2.39476 8.06993 3.54294 6.66759 5.01732 5.6808C6.4917 4.69402 8.22588 4.16724 10 4.16724C11.7741 4.16724 13.5083 4.69402 14.9827 5.6808C16.4571 6.66759 17.6053 8.06993 18.2817 9.71006C18.3511 9.89715 18.3511 10.103 18.2817 10.2901C17.6053 11.9302 16.4571 13.3325 14.9827 14.3193C13.5083 15.3061 11.7741 15.8329 10 15.8329C8.22588 15.8329 6.4917 15.3061 5.01732 14.3193C3.54294 13.3325 2.39476 11.9302 1.71835 10.2901Z" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10 12.5C11.3807 12.5 12.5 11.3807 12.5 10C12.5 8.61929 11.3807 7.5 10 7.5C8.61929 7.5 7.5 8.61929 7.5 10C7.5 11.3807 8.61929 12.5 10 12.5Z" stroke="#009ED1" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs" style="color:#6A7282;">Views</div>
                                    <div class="font-bold text-base" style="color:#00377D;">{{ $unit->location ?? 'Golf View' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bottom feature + CTA --}}
                    <div class="mx-8 mt-6 mb-8 pt-5 border-t flex items-center justify-between" style="border-color:#F3F4F6;">
                        <div class="flex items-center gap-2">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 4.5L6.75 12.75L3 9" stroke="#22AE6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="text-sm" style="color:#4A5565;">{{ Str::limit($unit->description, 28) }}</span>
                        </div>
                        <a href="{{ route('units.show', $unit->slug) }}"
                           class="px-5 py-2 rounded-xl text-sm font-semibold text-white transition hover:opacity-90 shrink-0"
                           style="background-color:#00377D;">
                            Detail
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-2 text-center py-20">
                    <p class="text-lg mb-4" style="color:#4A5565;">No units found matching your criteria.</p>
                    <a href="{{ route('units.index') }}"
                       class="px-8 py-3 rounded-xl text-sm font-semibold text-white transition hover:opacity-90"
                       style="background-color:#00377D;">Clear Filters</a>
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

    {{-- CTA Section --}}
    <section class="py-20 text-center text-white" style="background: linear-gradient(131deg, #00377D 16.85%, #00377D 48.61%, #009ED1 80.36%);">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-5xl font-bold mb-4">Find Your Perfect Home</h2>
            <p class="text-xl text-white/90 mb-10">Experience the luxury lifestyle at Golfhill Terraces Apartment</p>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center justify-center px-16 py-5 rounded-2xl font-semibold text-lg text-white transition hover:opacity-90"
               style="background-color: #22AE6C;">
                Contact Us
            </a>
        </div>
    </section>

</x-layouts.app>
