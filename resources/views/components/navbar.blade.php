<nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center">
                <span class="text-2xl font-bold text-gray-900">GolfHill</span>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" 
                   class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium transition">
                    Home
                </a>
                <a href="{{ route('units.index') }}" 
                   class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium transition">
                    Units
                </a>
                <a href="{{ route('articles.index') }}" 
                   class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium transition">
                    Lifestyle
                </a>
                <a href="{{ route('about') }}" 
                   class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium transition">
                    About
                </a>
                <a href="{{ route('contact') }}" 
                   class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium transition">
                    Contact
                </a>
            </div>

            <!-- CTA Button -->
            <div class="hidden md:flex">
                <a href="{{ route('units.index') }}" 
                   class="bg-gray-900 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition">
                    Explore Units
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button type="button" 
                    class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100"
                    x-data="{ open: false }"
                    @click="open = !open">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div class="md:hidden hidden" x-show="open" x-cloak>
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">Home</a>
            <a href="{{ route('units.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">Units</a>
            <a href="{{ route('articles.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">Lifestyle</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">About</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">Contact</a>
        </div>
    </div>
</nav>
