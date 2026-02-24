<x-layouts.app title="Article Title - GolfHill">
    <article class="bg-white">
        
        {{-- Article Header --}}
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="mb-6">
                <span class="bg-gray-100 px-3 py-1 rounded text-sm">Lifestyle</span>
            </div>
            
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                5 Tips for Modern Home Interior Design
            </h1>

            <div class="flex items-center mb-8">
                <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                <div>
                    <div class="font-semibold">John Doe</div>
                    <div class="text-sm text-gray-600">Published on {{ date('F d, Y') }} • 5 min read</div>
                </div>
            </div>

            {{-- Featured Image --}}
            <div class="bg-gray-200 h-96 rounded-lg mb-8"></div>
        </div>

        {{-- Article Content --}}
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
            <div class="prose prose-lg max-w-none">
                <p class="text-xl text-gray-600 mb-6">
                    Creating a modern, stylish home interior doesn't have to be complicated. Here are some essential tips to help you design a space that's both beautiful and functional.
                </p>

                <h2 class="text-2xl font-bold mt-8 mb-4">1. Embrace Minimalism</h2>
                <p class="text-gray-700 mb-6">
                    Less is more when it comes to modern design. Focus on clean lines, neutral colors, and functional furniture. Remove unnecessary clutter and keep only items that serve a purpose or bring you joy.
                </p>

                <h2 class="text-2xl font-bold mt-8 mb-4">2. Use Natural Materials</h2>
                <p class="text-gray-700 mb-6">
                    Incorporate wood, stone, and natural fibers to add warmth and texture to your space. These materials create a connection with nature and provide a calming atmosphere.
                </p>

                <h2 class="text-2xl font-bold mt-8 mb-4">3. Layer Your Lighting</h2>
                <p class="text-gray-700 mb-6">
                    Good lighting transforms a space. Combine ambient, task, and accent lighting to create depth and functionality. Consider pendant lights, floor lamps, and LED strips for a modern look.
                </p>

                <h2 class="text-2xl font-bold mt-8 mb-4">4. Add Personal Touches</h2>
                <p class="text-gray-700 mb-6">
                    While keeping it minimal, don't forget to add elements that reflect your personality. Artwork, plants, and carefully chosen decorative pieces make a house feel like home.
                </p>

                <h2 class="text-2xl font-bold mt-8 mb-4">5. Maximize Space</h2>
                <p class="text-gray-700 mb-6">
                    Use multi-functional furniture and smart storage solutions to make the most of your space. Built-in wardrobes, floating shelves, and furniture with hidden storage are great options.
                </p>

                <div class="bg-gray-50 border-l-4 border-gray-900 p-6 my-8">
                    <p class="text-gray-700 italic">
                        "Good design is making something intelligible and memorable. Great design is making something memorable and meaningful."
                    </p>
                </div>
            </div>

            {{-- Tags --}}
            <div class="mt-12 pt-8 border-t">
                <div class="flex flex-wrap gap-2">
                    <span class="text-sm text-gray-600 mr-2">Tags:</span>
                    @foreach(['Interior Design', 'Modern Living', 'Home Decor', 'Minimalism'] as $tag)
                    <span class="bg-gray-100 px-3 py-1 rounded text-sm text-gray-700">#{{ $tag }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Author Bio --}}
            <div class="mt-12 bg-gray-50 rounded-lg p-6">
                <div class="flex items-start">
                    <div class="w-16 h-16 bg-gray-300 rounded-full mr-4 flex-shrink-0"></div>
                    <div>
                        <h3 class="font-bold text-lg mb-2">About John Doe</h3>
                        <p class="text-gray-600 mb-3">
                            Interior design enthusiast with over 10 years of experience in creating beautiful living spaces. Passionate about modern design and sustainable living.
                        </p>
                        <div class="text-sm text-gray-500">5 Articles Published</div>
                    </div>
                </div>
            </div>

            {{-- Comments Section --}}
            <div class="mt-16">
                <h3 class="text-2xl font-bold mb-6">Comments (3)</h3>
                
                {{-- Comment Form --}}
                <div class="bg-gray-50 rounded-lg p-6 mb-8">
                    <h4 class="font-semibold mb-4">Leave a Comment</h4>
                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <input type="text" placeholder="Your Name" class="border-gray-300 rounded-lg">
                            <input type="email" placeholder="Your Email" class="border-gray-300 rounded-lg">
                        </div>
                        <textarea rows="4" placeholder="Your comment..." class="w-full border-gray-300 rounded-lg mb-4"></textarea>
                        <button type="submit" class="bg-gray-900 text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition">
                            Post Comment
                        </button>
                    </form>
                </div>

                {{-- Sample Comments --}}
                <div class="space-y-6">
                    @foreach(range(1, 3) as $i)
                    <div class="border-b pb-6">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-gray-300 rounded-full mr-3 flex-shrink-0"></div>
                            <div class="flex-1">
                                <div class="flex items-center mb-2">
                                    <span class="font-semibold mr-2">User {{ $i }}</span>
                                    <span class="text-sm text-gray-500">{{ date('M d, Y') }}</span>
                                </div>
                                <p class="text-gray-700">
                                    Great article! These tips are very helpful and practical. I'm definitely going to try implementing some of these ideas in my own home.
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

    </article>
</x-layouts.app>
