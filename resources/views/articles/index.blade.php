<x-layouts.app title="Lifestyle Articles - GolfHill">
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Page Header --}}
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Lifestyle & Insights</h1>
                <p class="text-gray-600">Property trends, design inspiration, and community stories</p>
            </div>

            {{-- Category Filter --}}
            <div class="mb-8">
                <div class="flex flex-wrap gap-3">
                    <button class="px-4 py-2 bg-gray-900 text-white rounded-lg font-medium">All</button>
                    <button class="px-4 py-2 bg-white text-gray-700 rounded-lg font-medium hover:bg-gray-100">Lifestyle</button>
                    <button class="px-4 py-2 bg-white text-gray-700 rounded-lg font-medium hover:bg-gray-100">Property Tips</button>
                    <button class="px-4 py-2 bg-white text-gray-700 rounded-lg font-medium hover:bg-gray-100">Community</button>
                    <button class="px-4 py-2 bg-white text-gray-700 rounded-lg font-medium hover:bg-gray-100">Design</button>
                </div>
            </div>

            {{-- Articles Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach(range(1, 9) as $i)
                <article class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition">
                    <div class="bg-gray-200 h-48"></div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="text-xs bg-gray-100 px-3 py-1 rounded">Lifestyle</span>
                            <span class="text-xs text-gray-500">{{ date('M d, Y') }}</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2 hover:text-gray-600">
                            <a href="{{ route('articles.show', 'sample-article') }}">
                                5 Tips for Modern Home Interior Design
                            </a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            Discover the latest trends in home interior design and how to create a modern, comfortable living space...
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-300 rounded-full mr-2"></div>
                                <span class="text-sm text-gray-600">John Doe</span>
                            </div>
                            <a href="{{ route('articles.show', 'sample-article') }}" 
                               class="text-gray-900 font-medium hover:underline">
                                Read More →
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-12 flex justify-center">
                <nav class="flex space-x-2">
                    <button class="px-4 py-2 border rounded-lg hover:bg-white">Previous</button>
                    <button class="px-4 py-2 bg-gray-900 text-white rounded-lg">1</button>
                    <button class="px-4 py-2 border rounded-lg hover:bg-white">2</button>
                    <button class="px-4 py-2 border rounded-lg hover:bg-white">3</button>
                    <button class="px-4 py-2 border rounded-lg hover:bg-white">Next</button>
                </nav>
            </div>

        </div>
    </div>
</x-layouts.app>
