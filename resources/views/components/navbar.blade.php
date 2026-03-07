<nav class="bg-white/95 backdrop-blur-sm shadow-sm sticky top-0 z-50" style="box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center">
                <span class="text-2xl font-bold" style="color: #00377D;">GOLFHILL TERRACES</span>
            </a>

            <!-- Desktop Navigation - Aligned to Right -->
            <div class="hidden md:flex space-x-12">
                <a href="{{ route('articles.index') }}" 
                   class="text-base transition hover:opacity-80 {{ request()->routeIs('articles.*') ? 'font-bold underline underline-offset-4' : 'font-normal' }}"
                   style="color: #00377D;">
                    Articles
                </a>
                <a href="{{ route('units.index') }}" 
                   class="text-base transition hover:opacity-80 {{ request()->routeIs('units.*') ? 'font-bold underline underline-offset-4' : 'font-normal' }}"
                   style="color: #00377D;">
                    Our Units
                </a>
                <a href="{{ route('facilities.index') }}" 
                   class="text-base transition hover:opacity-80 {{ request()->routeIs('facilities.*') ? 'font-bold underline underline-offset-4' : 'font-normal' }}"
                   style="color: #00377D;">
                    Our Facilities
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button type="button" 
                    class="md:hidden inline-flex items-center justify-center p-2 rounded-md transition"
                    style="color: #00377D;"
                    @click="open = !open"
                    :class="{'bg-gray-100': open}">
                <!-- Hamburger Icon -->
                <svg class="h-6 w-6" :class="{'hidden': open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <!-- Close Icon -->
                <svg class="h-6 w-6" :class="{'hidden': !open}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden" x-show="open" x-transition:enter="transition duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t shadow-lg">
            <a href="{{ route('articles.index') }}" 
               class="block px-3 py-3 text-base font-medium transition rounded-md {{ request()->routeIs('articles.*') ? 'bg-blue-50 font-bold' : 'hover:bg-gray-50' }}"
               style="color: #00377D;"
               @click="open = false">
                Articles
            </a>
            <a href="{{ route('units.index') }}" 
               class="block px-3 py-3 text-base font-medium transition rounded-md {{ request()->routeIs('units.*') ? 'bg-blue-50 font-bold' : 'hover:bg-gray-50' }}"
               style="color: #00377D;"
               @click="open = false">
                Our Units
            </a>
            <a href="{{ route('facilities.index') }}" 
               class="block px-3 py-3 text-base font-medium transition rounded-md {{ request()->routeIs('facilities.*') ? 'bg-blue-50 font-bold' : 'hover:bg-gray-50' }}"
               style="color: #00377D;"
               @click="open = false">
                Our Facilities
            </a>
        </div>
    </div>
</nav>