<x-home-layout :donor="$donor ?? null">
    <!-- Main Content -->
    <main class="pt-20 pb-12 bg-gradient-to-br from-gray-900 to-gray-800">
        <!-- Hero Section -->
        <section class="relative overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-b from-[#0a0a0a] to-[#171717]/90"></div>
                <div
                    class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1579684453423-f84349ef60b0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1800&q=80')] bg-cover bg-center opacity-20">
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-[#0a0a0a] to-transparent"></div>
            </div>
            <div class="container mx-auto px-4 py-16 relative z-10">
                <div class="max-w-3xl mx-auto text-center">
                    <div
                        class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-[#e11d48] to-pink-600 flex items-center justify-center mb-6 drop-shadow-[0_0_8px_rgba(225,29,72,0.6)]">
                        <i class="fas fa-tint text-white text-2xl"></i>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-[#a5f3fc] to-[#67e8f9] bg-clip-text text-transparent">Donate
                            Blood</span>
                        <br>Save Lives Today
                    </h1>
                    <p class="text-xl text-gray-400 mb-8">Your <span
                            class="font-bold text-[#e11d48]">{{ $donor->blood_type }}</span> blood
                        type is currently in critical demand. Join our network of lifesavers.</p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <div x-data="{ showRequests: false }" class="relative">
                            <!-- Donation Button -->
                            <button @click="showRequests = true"
                                class="bg-[#e11d48] hover:bg-[#e11d48]/80 text-white px-8 py-4 rounded-lg font-bold transition flex items-center drop-shadow-[0_0_8px_rgba(225,29,72,0.6)]">
                                <i class="fas fa-heartbeat mr-3"></i> Make Donation
                            </button>
                            <x-show-requests :bloodBanks="$bloodBanks ?? null" />
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="container mx-auto px-4 py-12">
            <div class="flex flex-wrap gap-4 justify-between">
                <div
                    class="flex-1 min-w-[150px] md:basis-1/4 bg-[#262626]/70 backdrop-blur-xl p-6 rounded-xl border border-[#262626] text-center transition-all duration-300 hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)]">
                    <p class="text-3xl font-bold text-[#e11d48] mb-2">12</p>
                    <p class="text-sm text-gray-400">Total Donations</p>
                </div>

                <div
                    class="flex-1 min-w-[150px] md:basis-1/4 bg-[#262626]/70 backdrop-blur-xl p-6 rounded-xl border border-[#262626] text-center transition-all duration-300 hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)]">
                    <p class="text-3xl font-bold text-blue-400 mb-2">3 months ago</p>
                    <p class="text-sm text-gray-400">Last Donation</p>
                </div>

                <div
                    class="flex-1 min-w-[150px] md:basis-1/4 bg-[#262626]/70 backdrop-blur-xl p-6 rounded-xl border border-[#262626] text-center transition-all duration-300 hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)]">
                    <p class="text-3xl font-bold text-amber-400 mb-2">Ready</p>
                    <p class="text-sm text-gray-400">Next Eligible</p>
                </div>
            </div>
        </section>


        <!-- Events Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-8 py-20">
            <h3 class="text-2xl font-bold text-white mb-10">Events</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Related 1 -->
                @foreach ($randomBlogs as $rdm)
                    <article
                        class="bg-gray-800/50 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-700">
                        <img src="{{ asset('storage/' . $rdm->image) }}" alt="Blockchain blood"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <span
                                class="text-xs font-semibold px-3 py-1 bg-blue-900/50 text-blue-400 rounded-full">Event</span>
                            <h4 class="text-xl font-bold text-white mt-4 mb-3">{{ $rdm->title }}</h4>
                            <p class="text-gray-400 mb-4">{{ Str::limit($rdm->body, 100, '...') }}</p>
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-600 mt-2 mb-3">
                                    <i class="fa-solid fa-clock mr-3"></i>
                                    <span>{{ $rdm->created_at->diffForHumans() }}</span>
                                </div>
                                <a href="{{ route('blogs.show', $rdm) }}"
                                    class="inline-flex items-center text-blue-400 hover:text-blue-300 font-medium">
                                    Read More
                                    <i class="fa-solid fa-circle-arrow-right ml-3"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
        <div class="text-center">
            <a href="/blogs"
                class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 shadow-lg transition-all duration-300">
                View All Posts
                <i class="fa-solid fa-arrow-right ml-3"></i>
            </a>
        </div>
    </main>
    </body>

    </html>
</x-home-layout>
