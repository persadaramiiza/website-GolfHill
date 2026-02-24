<x-layouts.app title="Browse Units - GolfHill">
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Page Header --}}
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Browse Available Units</h1>
                <p class="text-gray-600">Find your perfect property from our curated selection</p>
            </div>

            {{-- Filters --}}
            <form method="GET" action="{{ route('units.index') }}" class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Unit Type</label>
                        <select name="type" class="w-full border-gray-300 rounded-lg" onchange="this.form.submit()">
                            <option value="">All Types</option>
                            @foreach($unitTypes as $type)
                            <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" class="w-full border-gray-300 rounded-lg" onchange="this.form.submit()">
                            <option value="">All Status</option>
                            <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="reserved" {{ request('status') == 'reserved' ? 'selected' : '' }}>Reserved</option>
                            <option value="sold" {{ request('status') == 'sold' ? 'selected' : '' }}>Sold</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Min Price</label>
                        <input type="number" name="price_min" value="{{ request('price_min') }}" 
                               placeholder="$0" class="w-full border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Max Price</label>
                        <input type="number" name="price_max" value="{{ request('price_max') }}" 
                               placeholder="Any" class="w-full border-gray-300 rounded-lg">
                    </div>
                </div>
                <div class="mt-4 flex gap-3">
                    <button type="submit" class="bg-gray-900 text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition">
                        Apply Filters
                    </button>
                    <a href="{{ route('units.index') }}" class="border border-gray-300 px-6 py-2 rounded-lg hover:bg-gray-50 transition">
                        Clear Filters
                    </a>
                </div>
            </form>

            {{-- Units Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($units as $unit)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="relative">
                        <div class="bg-gray-200 h-64 flex items-center justify-center text-gray-400">
                            <span class="text-sm">{{ $unit->name }}</span>
                        </div>
                        <span class="absolute top-4 right-4 px-3 py-1 rounded-full text-sm font-medium
                            {{ $unit->status == 'available' ? 'bg-green-500 text-white' : '' }}
                            {{ $unit->status == 'reserved' ? 'bg-yellow-500 text-white' : '' }}
                            {{ $unit->status == 'sold' ? 'bg-red-500 text-white' : '' }}">
                            {{ ucfirst($unit->status) }}
                        </span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span class="bg-gray-100 px-3 py-1 rounded">{{ $unit->unitType->name }}</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $unit->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($unit->description, 50) }}</p>
                        <div class="flex items-center text-sm text-gray-600 mb-4 space-x-4">
                            @if($unit->bedrooms)<span>🛏️ {{ $unit->bedrooms }} Beds</span>@endif
                            @if($unit->bathrooms)<span>🚿 {{ $unit->bathrooms }} Baths</span>@endif
                            @if($unit->size)<span>📐 {{ $unit->size }}m²</span>@endif
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-2xl font-bold text-gray-900">${{ number_format($unit->price) }}</span>
                            <a href="{{ route('units.show', $unit->slug) }}" 
                               class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 mb-4">No units found matching your criteria.</p>
                    <a href="{{ route('units.index') }}" class="text-gray-900 underline">Clear filters</a>
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
    </div>
</x-layouts.app>
