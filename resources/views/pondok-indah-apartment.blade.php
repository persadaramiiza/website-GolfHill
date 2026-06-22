<x-layouts.app
    title="Pondok Indah Apartment - GolfHill Terraces South Jakarta"
    description="Discover GolfHill Terraces, a Pondok Indah apartment with golf course facing residences, premium facilities, spacious layouts, and direct inquiries in South Jakarta."
    canonical="{{ route('pondok-indah-apartment') }}"
>
    @push('head')
    @php
        $apartmentSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'ApartmentComplex',
            'name' => 'GolfHill Terraces',
            'description' => 'A Pondok Indah apartment with 198 golf course facing residences, premium facilities, and convenient access to South Jakarta destinations.',
            'url' => route('pondok-indah-apartment'),
            'telephone' => '+62 818-0373-0325',
            'email' => 'golfhill@brasali.com',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Jalan Metro Kencana IV Kav. 7',
                'addressLocality' => 'Pondok Indah, Jakarta Selatan',
                'addressRegion' => 'DKI Jakarta',
                'postalCode' => '12310',
                'addressCountry' => 'ID',
            ],
            'amenityFeature' => [
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Golf course facing residences', 'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Swimming pool', 'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Fitness center', 'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Tennis court', 'value' => true],
                ['@type' => 'LocationFeatureSpecification', 'name' => 'Children playground', 'value' => true],
            ],
            'sameAs' => [
                'https://maps.app.goo.gl/tKQobfJam5JCghNK8',
            ],
        ];

        $locationFaqs = [
            [
                'question' => 'Where is GolfHill Terraces located?',
                'answer' => 'GolfHill Terraces is located at Jalan Metro Kencana IV Kav. 7, Pondok Indah, South Jakarta.',
            ],
            [
                'question' => 'Is GolfHill Terraces near Pondok Indah Mall, JIS, and RS Pondok Indah?',
                'answer' => 'The Pondok Indah address provides convenient access to Pondok Indah Mall, Jakarta Intercultural School (JIS), RS Pondok Indah, and other South Jakarta destinations.',
            ],
            [
                'question' => 'Is GolfHill Terraces suitable for families and expatriates?',
                'answer' => 'GolfHill Terraces offers spacious residences, family-oriented facilities, and a calm golf-facing environment for families and expatriates seeking a South Jakarta home.',
            ],
            [
                'question' => 'How can I find an apartment for lease at GolfHill Terraces?',
                'answer' => 'Review the available unit types online, then contact the GolfHill Terraces team to confirm current availability, lease terms, and viewing schedules.',
            ],
        ];

        $locationFaqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn ($faq) => [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer'],
                ],
            ], $locationFaqs),
        ];
    @endphp
    <script type="application/ld+json">{!! json_encode($apartmentSchema, JSON_UNESCAPED_SLASHES) !!}</script>
    <script type="application/ld+json">{!! json_encode($locationFaqSchema, JSON_UNESCAPED_SLASHES) !!}</script>
    @endpush

    <section class="bg-white py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="gradient-bar mb-8"></div>
                    <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-6" style="color: #00377D;">
                        Pondok Indah Apartment at GolfHill Terraces
                    </h1>
                    <p class="text-lg leading-8 mb-6" style="color: #4A5565;">
                        GolfHill Terraces is a Pondok Indah apartment address designed for residents who want calm golf course facing living with direct access to South Jakarta's malls, schools, offices, and daily conveniences.
                    </p>
                    <p class="text-base leading-7 mb-8" style="color: #4A5565;">
                        Located at Jalan Metro Kencana IV Kav. 7, Pondok Indah, the residence offers 198 apartment residences with spacious layouts, premium facilities, and direct inquiry support for current unit availability.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('units.index') }}"
                           class="inline-flex items-center justify-center px-8 py-4 rounded-xl font-semibold text-white"
                           style="background-color: #00377D;">
                            View Units
                        </a>
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center justify-center px-8 py-4 rounded-xl font-semibold text-white"
                           style="background-color: #22AE6C;">
                            Contact Us
                        </a>
                    </div>
                </div>

                <picture>
                    <source srcset="{{ asset('images/HomePageBackground-new.webp') }}" type="image/webp">
                    <img src="{{ asset('images/HomePageBackground-new.jpeg') }}"
                         alt="GolfHill Terraces Pondok Indah apartment exterior"
                         class="w-full h-[520px] object-cover rounded-2xl shadow-xl"
                         loading="eager"
                         decoding="async">
                </picture>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <article class="bg-white p-6 rounded-xl border border-gray-100">
                    <h2 class="text-xl font-bold mb-3" style="color: #00377D;">Prime Pondok Indah Location</h2>
                    <p class="text-gray-600 leading-7">Convenient access to Pondok Indah Mall, Jakarta Intercultural School (JIS), RS Pondok Indah, and South Jakarta business districts.</p>
                </article>
                <article class="bg-white p-6 rounded-xl border border-gray-100">
                    <h2 class="text-xl font-bold mb-3" style="color: #00377D;">Golf Course Facing Living</h2>
                    <p class="text-gray-600 leading-7">Golf view residences offer green outlooks and a calmer private sanctuary apartment setting in the heart of Jakarta.</p>
                </article>
                <article class="bg-white p-6 rounded-xl border border-gray-100">
                    <h2 class="text-xl font-bold mb-3" style="color: #00377D;">Complete Facilities</h2>
                    <p class="text-gray-600 leading-7">Facilities include swimming pool, tennis court, fitness center, playground, restaurant, and jogging track.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mb-12">
                <div class="gradient-bar mb-6"></div>
                <h2 class="text-3xl sm:text-4xl font-bold mb-5" style="color: #00377D;">
                    Luxury Living Near Pondok Indah's Key Destinations
                </h2>
                <p class="text-lg leading-8 text-gray-600">
                    This boutique apartment in Pondok Indah combines an exclusive residential setting with access to everyday destinations. Residents can reach Pondok Indah Mall, Jakarta Intercultural School (JIS), RS Pondok Indah, and the wider South Jakarta business area from a well-connected home base.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                    <h3 class="text-2xl font-bold mb-4" style="color: #00377D;">Family and Expat Living</h3>
                    <p class="text-gray-600 leading-7">
                        Spacious layouts and family-oriented facilities make GolfHill Terraces suitable for households seeking an apartment for family life and for expatriates who want premium housing in South Jakarta near schools, malls, healthcare, and business districts.
                    </p>
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-4" style="color: #00377D;">Golf-Facing Residential Calm</h3>
                    <p class="text-gray-600 leading-7">
                        GolfHill Terraces offers golf course facing residences for residents who value green views, privacy, and resort-style apartment facilities close to Pondok Indah Golf Course.
                    </p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 mt-10">
                <a href="{{ route('units.index') }}" class="inline-flex items-center justify-center px-7 py-3 font-semibold text-white rounded-lg" style="background-color: #00377D;">Explore Rental Units</a>
                <a href="{{ route('facilities.index') }}" class="inline-flex items-center justify-center px-7 py-3 font-semibold rounded-lg border" style="color: #00377D; border-color: #00377D;">View Facilities</a>
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-7 py-3 font-semibold text-white rounded-lg" style="background-color: #22AE6C;">Ask About Availability</a>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl sm:text-4xl font-bold text-center mb-10" style="color: #00377D;">Frequently Asked Questions</h2>
            <div class="divide-y divide-gray-200 border-y border-gray-200">
                @foreach($locationFaqs as $faq)
                    <article class="py-6">
                        <h3 class="text-lg font-bold mb-2" style="color: #00377D;">{{ $faq['question'] }}</h3>
                        <p class="text-gray-600 leading-7">{{ $faq['answer'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.app>
