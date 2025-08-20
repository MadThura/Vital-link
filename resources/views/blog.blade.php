<x-home-layout>
    <!-- Article Header with Transparent Background Image -->
    <header class="w-full py-20 px-4 sm:px-8 bg-white/90 relative dark:bg-gray-900/70">
        <div class="absolute inset-0 bg-cover bg-center opacity-20 dark:opacity-20"
            style="background-image: url('{{ asset('storage/' . $blog->image) }}');">
        </div>

        <div class="max-w-4xl mx-auto text-center relative z-10">
            <span
                class="inline-block px-4 py-1 text-sm font-medium bg-blue-100 text-blue-600 rounded-full mb-6 dark:bg-blue-900/50 dark:text-blue-400">Event</span>
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-gray-900 dark:text-white">{{ $blog->title }}</h1>
            <div class="flex items-center justify-center space-x-6">
                <div class="text-sm text-gray-600 dark:text-gray-400 mt-2 mb-3">
                    <i class="fa-solid fa-clock mr-3"></i>
                    <span>{{ $blog->created_at->format('M d, Y H:i') }} •
                        {{ $blog->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    </header>

    <div class="bg-white dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800">
        <!-- Article Content -->
        <article class="max-w-7xl mx-auto px-4 sm:px-8 py-16">
            <div class="flex flex-col md:flex-row gap-40">
                <!-- Image on left (on larger screens) -->
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Blood donation technology"
                        class="w-full h-auto rounded-lg shadow-lg">
                </div>

                <!-- Article content on right (on larger screens) -->
                <div
                    class="md:w-1/2 [&>p]:mb-6 [&>p]:leading-[1.8] [&>p]:text-gray-700 dark:[&>p]:text-gray-400 [&>h2]:text-[1.75rem] [&>h2]:font-bold [&>h2]:my-10 [&>h2]:bg-gradient-to-r [&>h2]:from-blue-600 [&>h2]:to-blue-400 dark:[&>h2]:from-[#ff4d4d] dark:[&>h2]:to-[#f9cb28] [&>h2]:bg-clip-text [&>h2]:text-transparent [&>img]:rounded-xl [&>img]:my-8 [&>img]:shadow-lg">
                    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">{{ $blog->title }}</h1>
                    <p class="text-xl text-gray-700 dark:text-gray-400">{{ $blog->body }}</p>
                </div>
            </div>
        </article>

        <!-- Related Articles -->
        <section class="max-w-7xl mx-auto px-4 sm:px-8 py-20">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-10">Other Articles</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Related 1 -->
                @foreach ($randomBlogs as $rdm)
                    <article
                        class="bg-white rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-200 dark:bg-gray-800/50 dark:border-gray-700">
                        <img src="{{ asset('storage/' . $rdm->image) }}" alt="Blockchain blood"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <span
                                class="text-xs font-semibold px-3 py-1 bg-blue-100 text-blue-600 rounded-full dark:bg-blue-900/50 dark:text-blue-400">Event</span>
                            <h4 class="text-xl font-bold text-gray-900 dark:text-white mt-4 mb-3">{{ $rdm->title }}</h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">{{ Str::limit($rdm->body, 100, '...') }}</p>
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-500 dark:text-gray-600 mt-2 mb-3">
                                    <i class="fa-solid fa-clock mr-3"></i>
                                    <span>{{ $rdm->created_at->diffForHumans() }}</span>
                                </div>
                                <a href="{{ route('blogs.show', $rdm) }}"
                                    class="inline-flex items-center text-blue-600 hover:text-blue-500 font-medium dark:text-blue-400 dark:hover:text-blue-300">
                                    Read More
                                    <i class="fa-solid fa-circle-arrow-right ml-3"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </div>
</x-home-layout>