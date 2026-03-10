<x-layouts.app title="{{ $unit->name }} - GolfHill">
    <div class="bg-white">
        
        {{-- Image Gallery --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @php
                $galleryImages = $unit->getMedia('gallery');
                $heroImage = $galleryImages->first();
                $thumbImages = $galleryImages->skip(1)->take(4);
            @endphp

            @if($heroImage)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="rounded-lg overflow-hidden" style="height: 384px;">
                    <img src="{{ $heroImage->hasGeneratedConversion('thumb') ? $heroImage->getUrl('thumb') : $heroImage->getUrl() }}"
                         alt="{{ $unit->name }}"
                         style="width: 100%; height: 100%; object-fit: cover;"
                         loading="eager">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    @foreach($thumbImages as $img)
                    <div class="rounded-lg overflow-hidden" style="height: 184px;">
                        <img src="{{ $img->hasGeneratedConversion('thumb') ? $img->getUrl('thumb') : $img->getUrl() }}"
                             alt="{{ $unit->name }}"
                             style="width: 100%; height: 100%; object-fit: cover;"
                             loading="lazy">
                    </div>
                    @endforeach
                    @for($i = $thumbImages->count(); $i < 4; $i++)
                    <div class="bg-gray-100 rounded-lg" style="height: 184px;"></div>
                    @endfor
                </div>
            </div>

            {{-- All photos link if more than 5 --}}
            @if($galleryImages->count() > 5)
            <div class="mt-3 text-right">
                <span style="color: #009ED1; font-size: 14px; font-family: 'Plus Jakarta Sans', sans-serif;">+ {{ $galleryImages->count() - 5 }} more photos</span>
            </div>
            @endif
            @else
            {{-- Placeholder when no photos uploaded --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-100 rounded-lg flex items-center justify-center" style="height: 384px;">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    @foreach(range(1, 4) as $i)
                    <div class="bg-gray-100 rounded-lg" style="height: 184px;"></div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        {{-- Unit Details --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Main Content --}}
                <div class="lg:col-span-2">
                    <div class="mb-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-gray-100 px-3 py-1 rounded text-sm">{{ $unit->unitType->name }}</span>
                            <span class="px-3 py-1 rounded text-sm font-medium
                                {{ $unit->status == 'available' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $unit->status == 'reserved' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $unit->status == 'sold' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ ucfirst($unit->status) }}
                            </span>
                        </div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $unit->name }}</h1>
                        @if($unit->location)
                        <p class="text-gray-600">📍 {{ $unit->location }}</p>
                        @endif
                    </div>

                    <div class="grid grid-cols-4 gap-4 mb-8 pb-8 border-b">
                        @if($unit->bedrooms)
                        <div>
                            <div class="text-gray-500 text-sm mb-1">Bedrooms</div>
                            <div class="text-xl font-semibold">{{ $unit->bedrooms }}</div>
                        </div>
                        @endif
                        @if($unit->bathrooms)
                        <div>
                            <div class="text-gray-500 text-sm mb-1">Bathrooms</div>
                            <div class="text-xl font-semibold">{{ $unit->bathrooms }}</div>
                        </div>
                        @endif
                        @if($unit->size)
                        <div>
                            <div class="text-gray-500 text-sm mb-1">Size</div>
                            <div class="text-xl font-semibold">{{ $unit->size }}m²</div>
                        </div>
                        @endif
                        <div>
                            <div class="text-gray-500 text-sm mb-1">Type</div>
                            <div class="text-xl font-semibold">{{ $unit->unitType->name }}</div>
                        </div>
                    </div>

                    @if($unit->description)
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold mb-4">Description</h2>
                        <div class="text-gray-600 prose max-w-none">
                            {!! nl2br(e($unit->description)) !!}
                        </div>
                    </div>
                    @endif

                    <div>
                        <h2 class="text-2xl font-bold mb-4">Features & Amenities</h2>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach(['Swimming Pool', 'Fitness Center', 'Security 24/7', 'Parking', 'Garden', 'Playground', 'Meeting Room', 'WiFi'] as $feature)
                            <div class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                {{ $feature }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Sidebar - Contact Card --}}
                <div class="lg:col-span-1">
                    @if($unit->contactPerson)
                    <div class="bg-gray-50 rounded-lg p-6 sticky top-24">
                        <h3 class="text-xl font-bold mb-4">Interested? Contact Us</h3>
                        
                        <div class="mb-6">
                            <div class="font-semibold text-gray-900 mb-1">{{ $unit->contactPerson->name }}</div>
                            <div class="text-sm text-gray-600 mb-4">Sales Agent</div>
                            
                            <div class="space-y-3">
                                @if($unit->contactPerson->phone)
                                <a href="tel:{{ $unit->contactPerson->phone }}" 
                                   class="flex items-center justify-center w-full bg-gray-900 text-white px-4 py-3 rounded-lg hover:bg-gray-800 transition">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    Call Now
                                </a>
                                @endif
                                
                                @if($unit->contactPerson->whatsapp)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $unit->contactPerson->whatsapp) }}" 
                                   target="_blank"
                                   class="flex items-center justify-center w-full bg-green-500 text-white px-4 py-3 rounded-lg hover:bg-green-600 transition">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                    </svg>
                                    WhatsApp
                                </a>
                                @endif
                                
                                @if($unit->contactPerson->email)
                                <a href="mailto:{{ $unit->contactPerson->email }}" 
                                   class="flex items-center justify-center w-full border-2 border-gray-300 text-gray-700 px-4 py-3 rounded-lg hover:border-gray-400 transition">
                                    Email Us
                                </a>
                                @endif
                            </div>
                        </div>

                        <div class="text-xs text-gray-500 text-center">
                            Response within 24 hours
                        </div>
                    </div>
                    @else
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                        <p class="text-gray-600 mb-4">Interested in this property? Get in touch with us today!</p>
                        <a href="{{ route('contact') }}" class="block w-full bg-gray-900 text-white text-center px-4 py-3 rounded-lg hover:bg-gray-800 transition">
                            Contact Us
                        </a>
                    </div>
                    @endif
                </div>

            </div>
        </div>

    </div>
</x-layouts.app>
