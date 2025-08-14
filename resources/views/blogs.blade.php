<x-home-layout>
    <!-- Main Content -->
    <main class="min-h-screen w-full">
        <!-- Hero Section -->
        <section class="w-full py-40 px-4 sm:px-8 bg-gradient-to-br from-gray-900 to-gray-800">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-4xl md:text-6xl font-bold mb-6">Our <span
                        class="bg-gradient-to-r from-red-500 to-blue-500 bg-clip-text text-transparent">Blog</span></h2>
                <p class="text-xl text-gray-400 max-w-3xl mx-auto">Latest news, stories, and updates from our blood
                    donation community</p>
            </div>
        </section>

        <!-- Blog Grid -->
        <section class="w-full py-16 px-4 sm:px-8 bg-gradient-to-br from-gray-900 to-gray-800">
            <div class="max-w-7xl mx-auto">
                <!-- Filters -->


                <!-- Blog Posts -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Blog Post 1 -->
                    @foreach ($blogs as $blog)
                        <article
                            class="bg-gray-800 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                            <div class="h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blood donation"
                                    class="w-full h-full object-cover hover:scale-105 transition duration-500">
                            </div>
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <span
                                        class="text-xs font-semibold px-3 py-1 bg-blue-900/50 text-blue-400 rounded-full">Event</span>
                                    <span class="text-xs text-gray-500 ml-4"></span>
                                </div>
                                <h3 class="text-xl font-bold text-white mb-3">{{ $blog->title }}</h3>
                                <p class="text-gray-400 mb-4">{{ Str::limit($blog->body, 100, '...') }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-600 mt-2 mb-3">
                                        <i class="fa-solid fa-clock mr-3"></i>
                                        <span>{{ $blog->created_at->diffForHumans() }}</span>
                                    </div>
                                    <a href="/blogs-show/{{ $blog->id }}"
                                        class="inline-flex items-center text-blue-400 hover:text-blue-300 font-medium">
                                        Read More
                                        <i class="fa-solid fa-circle-arrow-right ml-3"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="mt-5">
                    {{ $blogs->links() }}
                </div>
        </section>

    </main>
</x-home-layout>
