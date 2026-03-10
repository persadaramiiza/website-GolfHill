<x-layouts.app title="{{ $article->title }} - GolfHill Terraces">

    {{-- Main Content --}}
    <section class="bg-white pt-8 pb-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Back to Articles --}}
            <div class="pt-8 pb-10">
                <a href="{{ route('articles.index') }}"
                   class="inline-flex items-center gap-2 px-4 py-1 rounded font-semibold text-base transition hover:opacity-75"
                   style="background-color: #F9FAFB; color: #00377D;">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.0001 15.8334L4.16675 10L10.0001 4.16669" stroke="#00377D" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.8334 10H4.16675" stroke="#00377D" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Back to Articles
                </a>
            </div>

            {{-- Title & Meta --}}
            <div class="mb-10">
                <h1 class="font-bold mb-6 leading-none" style="font-size: 60px; color: #00377D; line-height: 60px;">
                    {{ $article->title }}
                </h1>

                @if($article->excerpt)
                <p class="mb-6" style="font-size: 24px; font-weight: 400; line-height: 32px; color: #4A5565;">
                    {{ $article->excerpt }}
                </p>
                @endif

                {{-- Meta row --}}
                <div class="flex flex-wrap items-center gap-6" style="color: #6A7282;">
                    {{-- Date --}}
                    <div class="flex items-center gap-2">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 1.5V4.5" stroke="#6A7282" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 1.5V4.5" stroke="#6A7282" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.25 3H3.75C2.92157 3 2.25 3.67157 2.25 4.5V15C2.25 15.8284 2.92157 16.5 3.75 16.5H14.25C15.0784 16.5 15.75 15.8284 15.75 15V4.5C15.75 3.67157 15.0784 3 14.25 3Z" stroke="#6A7282" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M2.25 7.5H15.75" stroke="#6A7282" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <time style="font-size: 16px; font-weight: 400; line-height: 24px;">
                            {{ $article->published_at->format('F d, Y') }}
                        </time>
                    </div>
                    {{-- Author --}}
                    <div class="flex items-center gap-2">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.25 15.75V14.25C14.25 13.4544 13.9339 12.6913 13.3713 12.1287C12.8087 11.5661 12.0456 11.25 11.25 11.25H6.75C5.95435 11.25 5.19129 11.5661 4.62868 12.1287C4.06607 12.6913 3.75 13.4544 3.75 14.25V15.75" stroke="#6A7282" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9 8.25C10.6569 8.25 12 6.90685 12 5.25C12 3.59315 10.6569 2.25 9 2.25C7.34315 2.25 6 3.59315 6 5.25C6 6.90685 7.34315 8.25 9 8.25Z" stroke="#6A7282" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span style="font-size: 16px; font-weight: 400; line-height: 24px;">
                            {{ $article->user->name }}
                        </span>
                    </div>
                    {{-- Category --}}
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold text-white" style="background-color: #00377D;">
                        {{ $article->category->name }}
                    </span>
                </div>
            </div>

            {{-- Featured Image --}}
            <div class="w-full overflow-hidden mb-10 bg-gradient-to-br from-blue-100 to-cyan-200 flex items-center justify-center"
                 style="height: 600px; border-radius: 24px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);">
                <svg class="w-20 h-20 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>

            {{-- Article Body --}}
            <div class="rounded-2xl p-8 mb-10" style="background-color: #F9FAFB;">
                <div style="font-size: 18px; font-weight: 400; line-height: 1.8; color: #000;">
                    {!! $article->content !!}
                </div>
            </div>

            {{-- Tags --}}
            @if($article->tags->count())
            <div class="flex flex-wrap items-center gap-3 mb-10 pt-4 border-t" style="border-color: #E5E7EB;">
                <span class="text-sm font-semibold" style="color: #4A5565;">Tags:</span>
                @foreach($article->tags as $tag)
                <span class="px-4 py-1.5 rounded-full text-sm font-medium border" style="color: #00377D; border-color: #00377D;">
                    #{{ $tag->name }}
                </span>
                @endforeach
            </div>
            @endif

            {{-- Author Bio --}}
            <div class="p-8 rounded-3xl border mb-2" style="background: linear-gradient(135deg, rgba(151, 231, 245, 0.15) 0%, #FFF 100%); border-color: rgba(0, 158, 209, 0.2);">
                <div class="flex items-start gap-6">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-white text-2xl font-bold flex-shrink-0" style="background-color: #00377D;">
                        {{ substr($article->user->name, 0, 1) }}
                    </div>
                    <div>
                        <div class="text-xs font-semibold uppercase tracking-wider mb-1" style="color: #009ED1;">Written by</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $article->user->name }}</h3>
                        <p class="text-base" style="color: #4A5565;">PT Brasali Realty — Golfhill Terraces editorial team</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- Comments Section --}}
    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold mb-10" style="color: #00377D;">
                Comments ({{ $article->comments->count() }})
            </h2>

            {{-- Comment Form --}}
            <div class="p-8 rounded-3xl mb-12" style="background: linear-gradient(135deg, rgba(151, 231, 245, 0.15) 0%, #FFF 100%); border: 1px solid rgba(0, 158, 209, 0.2);">
                <h3 class="text-lg font-bold mb-6" style="color: #00377D;">Leave a Comment</h3>

                {{-- Success message --}}
                @if(session('comment_success'))
                <div class="mb-6 px-5 py-4 rounded-xl text-sm font-medium" style="background: #DCFCE7; color: #166534; border: 1px solid #86EFAC;">
                    {{ session('comment_success') }}
                </div>
                @endif

                <form action="{{ route('articles.comments.store', $article->slug) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <input type="text" name="author_name" value="{{ old('author_name') }}"
                                   placeholder="Your Name"
                                   class="w-full px-4 py-3 rounded-xl border text-sm focus:outline-none focus:ring-2 {{ $errors->has('author_name') ? 'border-red-400' : '' }}"
                                   style="border-color: {{ $errors->has('author_name') ? '#f87171' : '#D1D5DC' }};">
                            @error('author_name')
                            <p class="text-xs mt-1" style="color: #dc2626;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input type="email" name="author_email" value="{{ old('author_email') }}"
                                   placeholder="Your Email"
                                   class="w-full px-4 py-3 rounded-xl border text-sm focus:outline-none focus:ring-2 {{ $errors->has('author_email') ? 'border-red-400' : '' }}"
                                   style="border-color: {{ $errors->has('author_email') ? '#f87171' : '#D1D5DC' }};">
                            @error('author_email')
                            <p class="text-xs mt-1" style="color: #dc2626;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <textarea rows="4" name="content" placeholder="Share your thoughts..."
                                  class="w-full px-4 py-3 rounded-xl border text-sm focus:outline-none focus:ring-2 {{ $errors->has('content') ? 'border-red-400' : '' }}"
                                  style="border-color: {{ $errors->has('content') ? '#f87171' : '#D1D5DC' }}">{{ old('content') }}</textarea>
                        @error('content')
                        <p class="text-xs mt-1" style="color: #dc2626;">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                            class="px-10 py-3 rounded-xl font-semibold text-white transition hover:opacity-90"
                            style="background-color: #00377D;">
                        Post Comment
                    </button>
                </form>
            </div>

            {{-- Comment List --}}
            @if($article->comments->count())
            <div class="space-y-8">
                @foreach($article->comments as $comment)
                <div class="pb-8 border-b" style="border-color: #E5E7EB;">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0" style="background-color: #009ED1;">
                            {{ substr($comment->author_name ?? 'A', 0, 1) }}
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="font-semibold text-gray-900">{{ $comment->author_name ?? 'Anonymous' }}</span>
                                <span class="text-sm" style="color: #4A5565;">{{ $comment->created_at->format('M d, Y') }}</span>
                            </div>
                            <p class="leading-relaxed" style="color: #364153;">{{ $comment->content }}</p>

                            {{-- Replies --}}
                            @if($comment->replies && $comment->replies->count())
                            <div class="mt-4 ml-4 space-y-4">
                                @foreach($comment->replies as $reply)
                                <div class="flex items-start gap-3 pl-4 border-l-2" style="border-color: #009ED1;">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-white font-bold text-xs flex-shrink-0" style="background-color: #22AE6C;">
                                        {{ substr($reply->author_name ?? 'A', 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="font-semibold text-sm text-gray-900">{{ $reply->author_name ?? 'Anonymous' }}</span>
                                            <span class="text-xs" style="color: #4A5565;">{{ $reply->created_at->format('M d, Y') }}</span>
                                        </div>
                                        <p class="text-sm" style="color: #364153;">{{ $reply->content }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-lg" style="color: #4A5565;">No comments yet. Be the first to share your thoughts!</p>
            </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <!-- <section class="py-20 text-center text-white" style="background: linear-gradient(131deg, #00377D 16.85%, #00377D 48.61%, #009ED1 80.36%);">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-5xl font-bold mb-4">Find Your Perfect Home</h2>
            <p class="text-xl text-white/90 mb-10">Experience the luxury lifestyle at Golfhill Terraces Apartment</p>
            <a href="{{ route('contact') }}"
               class="inline-flex items-center justify-center px-16 py-5 rounded-2xl font-semibold text-lg text-white transition"
               style="background-color: #22AE6C; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1);">
                Contact Us
            </a>
        </div>
    </section> -->

</x-layouts.app>
