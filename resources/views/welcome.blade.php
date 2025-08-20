<?php
$featureBlog = $blogs->isNotEmpty() ? $blogs->last() : null;
?>
<x-home-layout :donor="$donor ?? null">

    <!-- Blood droplet background elements -->
    <div class="fixed -z-10 inset-0 overflow-hidden opacity-20 dark:opacity-30">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-red-700 dark:bg-red-800 rounded-full filter blur-3xl opacity-70"></div>
        <div class="absolute top-1/3 right-1/4 w-96 h-96 bg-red-800 dark:bg-red-900 rounded-full filter blur-3xl opacity-70"></div>
        <div class="absolute bottom-1/4 right-1/3 w-80 h-80 bg-red-600 dark:bg-red-700 rounded-full filter blur-3xl opacity-70"></div>
    </div>

    <!-- Hero Section -->
    <main class="pt-20 mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white sm:text-5xl md:text-6xl">
                <span class="block">Donate Blood,</span>
                <span class="block bg-gradient-to-r from-red-500 to-red-700 bg-clip-text text-transparent">Save Lives</span>
            </h1>
            <p class="mt-3 text-base text-gray-700 dark:text-gray-300 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                Join our network of heroes. Every donation can save up to 3 lives. Become a life-saver today.
            </p>

            @if (!auth()->user())
                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start space-y-3 sm:space-y-0 sm:space-x-4">
                    <div class="rounded-md shadow-lg shadow-red-900/30 dark:shadow-red-900/50">
                        <a href="/register"
                           class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-red-500 to-red-700 hover:from-red-600 hover:to-red-800 md:py-4 md:text-lg md:px-10 transition duration-300">
                           <i class="fas fa-heart mr-2"></i> Become a Donor
                        </a>
                    </div>
                </div>
            @endif

            <!-- Stats -->
            <div class="mt-12 grid grid-cols-2 gap-8 sm:grid-cols-4">
                <div class="text-center">
                    <div class="text-4xl font-bold text-red-500 dark:text-red-400">10K+</div>
                    <div class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Donations</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-red-500 dark:text-red-400">3K+</div>
                    <div class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Lives Saved</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-red-500 dark:text-red-400">500+</div>
                    <div class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Partners</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-red-500 dark:text-red-400">24/7</div>
                    <div class="mt-2 text-sm font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Support</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Blood Types Section -->
    <section class="relative py-12 mt-20 rounded-lg overflow-hidden shadow-lg dark:shadow-gray-800/30">
        <!-- Background Layer -->
        <div class="absolute inset-0 bg-[#DFE3EE] dark:bg-gray-800 bg-opacity-70 dark:bg-opacity-70 backdrop-blur-sm -z-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-red-500 dark:text-red-400 font-semibold tracking-wide uppercase">Blood Types</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                    All Blood Types Are Needed
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-700 dark:text-gray-300 lg:mx-auto">
                    No matter your blood type, your donation is valuable. Here's how common each type is.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach (['O+' => 37, 'A+' => 36, 'B+' => 9, 'AB+' => 3] as $type => $percent)
                        <div class="bg-white/70 dark:bg-gray-700/70 p-6 rounded-lg border-l-4 border-red-500 dark:border-red-400 shadow-md dark:shadow-gray-800/30">
                            <div class="text-3xl font-bold text-red-500 dark:text-red-400">{{ $type }}</div>
                            <div class="mt-2 text-gray-700 dark:text-gray-300">{{ $percent }}% of population</div>
                            <div class="mt-4 h-2 bg-gray-300 dark:bg-gray-600 rounded-full">
                                <div class="h-2 bg-red-500 dark:bg-red-400 rounded-full" style="width: {{ $percent }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Blogs Section -->
    @if ($featureBlog)
        <section class="relative py-16 mt-20 rounded-lg overflow-hidden shadow-lg dark:shadow-gray-800/30">
            <!-- Background Layer -->
            <div class="absolute inset-0 bg-[#DFE3EE] dark:bg-gray-800 bg-opacity-70 dark:bg-opacity-70 backdrop-blur-sm -z-10"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">News & Events</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto"></div>
                </div>

                <div class="grid gap-10 md:grid-cols-2 lg:gap-12">
                    <!-- Featured Post -->
                    <div class="group relative overflow-hidden rounded-xl shadow-2xl">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/50 z-10"></div>
                        <img src="{{ asset('storage/' . $featureBlog?->image) }}" alt="event"
                             class="w-full h-96 object-cover transform group-hover:scale-105 transition duration-500">
                        <div class="absolute bottom-0 left-0 p-8 z-20 text-white">
                            <span class="inline-block px-3 py-1 text-xs font-semibold bg-red-500 rounded-full mb-3">Latest Event</span>
                            <h3 class="text-2xl font-bold mb-2">{{ $featureBlog?->title }}</h3>
                            <p class="text-gray-200 mb-4">{{ $featureBlog?->body }}</p>
                            <div class="flex items-center justify-between gap-72">
                                <div class="flex items-center text-sm text-gray-200">
                                    <i class="fa-solid fa-clock mr-3"></i>
                                    {{ $featureBlog?->created_at->diffForHumans() }}
                                </div>
                                <a href="{{ route('blogs.show', $featureBlog) }}"
                                   class="text-blue-400 hover:text-blue-300 font-medium text-sm inline-flex items-center">
                                   Read Article <i class="fa-solid fa-circle-arrow-right ml-3"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Posts -->
                    <div class="flex flex-col gap-6 max-h-[24rem] overflow-y-auto scrollbar-none">
                        @foreach ($blogs as $blog)
                            <div class="flex flex-col sm:flex-row gap-6 p-5 bg-white/70 dark:bg-gray-700/70 hover:bg-white/80 dark:hover:bg-gray-700/80 rounded-lg transition duration-300 border-l-4 border-blue-500 dark:border-blue-400 shadow-md dark:shadow-gray-800/30">
                                <div class="flex-shrink-0">
                                    <img class="w-32 h-24 object-cover rounded-lg" src="{{ asset('storage/' . $blog->image) }}" alt="Blood donation tips">
                                </div>
                                <div>
                                    <div>
                                        <span class="inline-block px-2 py-1 text-xs font-semibold text-blue-500 dark:text-blue-400 bg-blue-100 dark:bg-blue-900/30 rounded mb-2">Blog Post</span>
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">{{ $blog->title }}</h4>
                                        <p class="ml-3 text-gray-700 dark:text-gray-300">{{ Str::limit($blog->body, 20, '...') }}</p>
                                    </div>
                                    <div class="flex items-center gap-40">
                                        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                            <i class="fa-solid fa-clock mr-3"></i>
                                            {{ $blog->created_at->diffForHumans() }}
                                        </div>
                                        <a href="{{ route('blogs.show', $blog) }}"
                                           class="text-blue-500 dark:text-blue-400 hover:text-blue-400 dark:hover:text-blue-300 font-medium text-sm items-center">
                                           Read Article <i class="fa-solid fa-circle-arrow-right ml-3"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-16 text-center">
                    <a href="/blogs"
                       class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 shadow-lg transition-all duration-300">
                       View All Posts <i class="fa-solid fa-arrow-right ml-3"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

</x-home-layout>