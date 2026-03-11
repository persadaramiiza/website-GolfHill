<footer class="pt-16 pb-0" style="background: linear-gradient(135deg, #FFF 0%, #F1F2F3 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Main Footer Content --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20 lg:gap-24 mb-12">
            
            {{-- Contact Us --}}
            <div>
                <h3 class="text-3xl sm:text-4xl font-bold text-black mb-6">Contact Us</h3>
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center justify-center w-8 h-8 rounded" style="background-color: #00377D;">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <a href="tel:0818-0373-0325" class="text-lg sm:text-xl font-bold text-black hover:opacity-80 transition break-all sm:break-normal">
                            0818-0373-0325
                        </a>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center justify-center w-8 h-8 rounded" style="background-color: #00377D;">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <a href="mailto:golfhill@brasali.com" class="text-lg sm:text-xl font-bold text-black hover:opacity-80 transition break-all sm:break-normal">
                            golfhill@brasali.com
                        </a>
                    </div>
                </div>
            </div>

            {{-- Alamat (Address) --}}
            <div class="mt-2 md:mt-0 md:justify-self-end md:ml-auto md:w-full md:max-w-2xl">
                <h3 class="text-3xl sm:text-4xl font-bold text-black mb-6 text-left md:text-right">Alamat</h3>
                <div class="flex justify-start gap-2 md:justify-end">
                    <svg class="w-5 h-5 mt-1 flex-shrink-0" style="stroke: #00377D;" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <div class="text-base sm:text-xl text-black leading-relaxed text-left md:text-right">
                        <p>Jl Metro Kencana IV Kav. 7 Pondok Indah</p>
                        <p>Pondok Pinang, Kebayoran Lama, Jakarta Selatan</p>
                        <p>DKI Jakarta 12310</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Visit Our Article Link --}}
        <div class="text-center mb-12">
            <div class="gradient-bar rounded-full mx-auto mb-6"></div>
            <a href="{{ route('articles.index') }}" class="text-3xl sm:text-4xl font-bold hover:opacity-80 transition" style="color: #00377D;">
                Visit Our Article
            </a>
        </div>

        {{-- Copyright Bar --}}
        <div class="border-t pt-6 pb-6" style="border-color: #D1D5DC;">
            <div class="text-center space-y-3">
                <p class="text-sm sm:text-base" style="color: #4A5565;">
                    © 2026 Golfhill Terraces Apartment • Managed by PT Brasali Realty
                </p>
                <a href="https://golfhillterraces.com" class="text-sm sm:text-base hover:opacity-80 transition" style="color: #009ED1;">
                    golfhillterraces.com
                </a>
            </div>
        </div>
    </div>
</footer>
