<x-home-layout :donor="$donor ?? null">
    <x-alert-box></x-alert-box>
    <!-- Main Content -->
    <main
        class="pt-20 pb-12 bg-gradient-to-br from-gray-200 to-gray-300 dark:from-gray-900 dark:to-gray-800 transition-colors duration-300">

        <!-- Hero Section -->
        <section class="relative overflow-hidden">
            <div class="absolute inset-0 z-0">
                <!-- Light/Dark overlay -->
                <div class="absolute inset-0 bg-white/30 backdrop-blur-md dark:bg-[#0a0a0a]/90"></div>

                <!-- Hero image -->
                <div
                    class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1579684453423-f84349ef60b0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1800&q=80')] bg-cover bg-center opacity-40 dark:opacity-20">
                </div>

                <!-- Gradient overlay -->
                <div
                    class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-200 to-transparent dark:from-[#0a0a0a] dark:to-transparent">
                </div>
            </div>

            <div class="container mx-auto px-4 py-16 relative z-10">
                <div class="max-w-3xl mx-auto text-center">
                    <div
                        class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-red-600 to-pink-600 flex items-center justify-center mb-6 shadow-lg shadow-red-400/40 backdrop-blur">
                        <i class="fas fa-tint text-white text-2xl"></i>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">
                        <span
                            class="bg-gradient-to-r from-cyan-700 to-blue-700 dark:from-[#a5f3fc] dark:to-[#67e8f9] bg-clip-text text-transparent">
                            Donate Blood
                        </span>
                        <br>Save Lives Today
                    </h1>
                    <p class="text-xl text-gray-800 dark:text-gray-400 mb-8">
                        Your <span class="font-bold text-red-600 dark:text-[#e11d48]">{{ $donor->blood_type }}</span>
                        blood
                        type is currently in critical demand. Join our network of lifesavers.
                    </p>

                    @if ($donor->cooldown_until)
                        @php
                            $cooldownUntil = \Carbon\Carbon::parse($donor->cooldown_until);
                        @endphp
                        @if ($cooldownUntil->isFuture())
                            <!-- Still in cooldown -->
                            <div
                                class="bg-yellow-100/60 backdrop-blur-md dark:bg-yellow-900/30 border border-yellow-300/60 dark:border-yellow-700 rounded-xl p-4 text-center shadow-md w-full max-w-md mx-auto">
                                <p class="text-yellow-700 dark:text-yellow-400 font-semibold text-lg mb-2">
                                    ⏳ You recently donated!
                                </p>
                                <p class="text-gray-800 dark:text-gray-300 text-sm">
                                    Please wait until
                                    <span class="font-medium">{{ $cooldownUntil->toFormattedDateString() }}</span>
                                    ({{ $cooldownUntil->diffForHumans() }}) before donating again.
                                </p>
                            </div>
                        @else
                            @if (!$donor->donationRequest?->status || $donor->donationRequest?->status === 'rejected')
                                <div
                                    class="bg-green-100/60 backdrop-blur-md dark:bg-green-900/30 border border-green-300/60 dark:border-green-700 rounded-xl p-2 text-center shadow-md w-full max-w-md mx-auto mb-2">
                                    <p class="text-green-700 dark:text-green-400 font-semibold text-lg mb-2">
                                        🎉 You’re eligible to donate again!
                                    </p>

                                </div>
                                <div class="flex flex-wrap justify-center gap-4">
                                    <div x-data="{ showRequests: false }">
                                        <!-- Donation Button -->
                                        <button @click="showRequests = true"
                                            class="bg-red-600 hover:bg-red-700 dark:bg-[#e11d48] dark:hover:bg-[#e11d48]/80 text-white px-8 py-4 rounded-lg font-bold transition flex items-center shadow-lg shadow-red-400/50 backdrop-blur">
                                            <i class="fas fa-heartbeat mr-3"></i> Make Donation
                                        </button>
                                        <x-make-donation-dialog :bloodBanks="$bloodBanks ?? null" />
                                    </div>
                                </div>
                            @else
                                <div class="flex justify-center mt-6">
                                    <div
                                        class="bg-white/50 backdrop-blur-md dark:bg-green-900/20 border border-green-300/60 dark:border-green-700 rounded-xl p-4 text-center shadow-md w-full max-w-md">
                                        <p class="text-green-700 dark:text-green-400 font-semibold text-lg mb-2">
                                            @if ($donor->donationRequest?->status === 'pending')
                                                ✅ You have already requested an appointment!
                                            @else
                                                ✅ Your appointment has been approved
                                            @endif
                                        </p>
                                        <p class="text-gray-800 dark:text-gray-300 text-sm">
                                            Your appointment is on
                                            <span
                                                class="font-medium">{{ $donor->donationRequest->appointment_date }}</span>.
                                            Thank you for your generosity!
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @elseif (!$donor->donationRequest?->status || $donor->donationRequest?->status === 'rejected')
                        <div class="flex flex-wrap justify-center gap-4">
                            <div x-data="{ showRequests: false }">
                                <!-- Donation Button -->
                                <button @click="showRequests = true"
                                    class="bg-red-600 hover:bg-red-700 dark:bg-[#e11d48] dark:hover:bg-[#e11d48]/80 text-white px-8 py-4 rounded-lg font-bold transition flex items-center shadow-lg shadow-red-400/50 backdrop-blur">
                                    <i class="fas fa-heartbeat mr-3"></i> Make Donation
                                </button>
                                <x-make-donation-dialog :bloodBanks="$bloodBanks ?? null" />
                            </div>
                        </div>
                    @else
                        <div class="flex justify-center mt-6">
                            <div
                                class="bg-white/50 backdrop-blur-md dark:bg-green-900/20 border border-green-300/60 dark:border-green-700 rounded-xl p-4 text-center shadow-md w-full max-w-md">
                                <p class="text-green-700 dark:text-green-400 font-semibold text-lg mb-2">
                                    @if ($donor->donationRequest?->status === 'pending')
                                        ✅ You have already requested an appointment!
                                    @else
                                        ✅ Your appointment has been approved
                                    @endif
                                </p>
                                <p class="text-gray-800 dark:text-gray-300 text-sm">
                                    Your appointment is on
                                    <span class="font-medium">{{ $donor->donationRequest->appointment_date }}</span>.
                                    Thank you for your generosity!
                                </p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="container mx-auto px-4 py-12">
            <div class="flex flex-wrap gap-4 justify-between">
                <div
                    class="flex-1 min-w-[150px] md:basis-1/4 bg-white/40 backdrop-blur-md dark:bg-[#262626]/70 p-6 rounded-2xl border border-gray-300/60 dark:border-[#262626] text-center transition-all duration-300 hover:translate-y-[-5px] hover:shadow-xl">
                    <p class="text-3xl font-bold text-red-600 dark:text-[#e11d48] mb-2">{{ $donor->donation_count }}</p>
                    <p class="text-sm text-gray-800 dark:text-gray-400">Total Donations</p>
                </div>

                <div
                    class="flex-1 min-w-[150px] md:basis-1/4 bg-white/40 backdrop-blur-md dark:bg-[#262626]/70 p-6 rounded-2xl border border-gray-300/60 dark:border-[#262626] text-center transition-all duration-300 hover:translate-y-[-5px] hover:shadow-xl">
                    <p class="text-3xl font-bold text-blue-700 dark:text-blue-400 mb-2">
                        {{ $donor->last_donation_at ? \Carbon\Carbon::parse($donor->last_donation_at)->diffForHumans() : 'Never' }}
                    </p>
                    <p class="text-sm text-gray-800 dark:text-gray-400">Last Donation</p>
                </div>

                <div
                    class="flex-1 min-w-[150px] md:basis-1/4 bg-white/40 backdrop-blur-md dark:bg-[#262626]/70 p-6 rounded-2xl border border-gray-300/60 dark:border-[#262626] text-center transition-all duration-300 hover:translate-y-[-5px] hover:shadow-xl">
                    <p class="text-3xl font-bold text-amber-700 dark:text-amber-400 mb-2">
                        {{ $donor?->cooldown_until > now() ? 'Not Ready' : 'Ready' }}</p>
                    <p class="text-sm text-gray-800 dark:text-gray-400">Next Eligible</p>
                </div>
            </div>
        </section>

        <!-- Events Section -->
        <section class="max-w-7xl mx-auto px-4 sm:px-8 py-20">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-10">Events</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($randomBlogs as $rdm)
                    <article
                        class="bg-white/40 backdrop-blur-md dark:bg-gray-800/50 rounded-2xl overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-300/60 dark:border-gray-700">
                        <img src="{{ asset('storage/' . $rdm->image) }}" alt="Event image"
                            class="w-full h-48 object-cover">
                        <div class="p-6">
                            <span
                                class="text-xs font-semibold px-3 py-1 bg-blue-200/70 text-blue-700 dark:bg-blue-900/50 dark:text-blue-400 rounded-full">Event</span>
                            <h4 class="text-xl font-bold text-gray-900 dark:text-white mt-4 mb-3">{{ $rdm->title }}
                            </h4>
                            <p class="text-gray-800 dark:text-gray-400 mb-4">{{ Str::limit($rdm->body, 100, '...') }}
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-700 dark:text-gray-500 mt-2 mb-3">
                                    <i class="fa-solid fa-clock mr-3"></i>
                                    <span>{{ $rdm->created_at->diffForHumans() }}</span>
                                </div>
                                <a href="{{ route('blogs.show', $rdm) }}"
                                    class="inline-flex items-center text-blue-700 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-300 font-medium">
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
                class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-gradient-to-r from-blue-600 to-purple-700 hover:from-blue-700 hover:to-purple-800 shadow-lg backdrop-blur transition-all duration-300">
                View All Posts
                <i class="fa-solid fa-arrow-right ml-3"></i>
            </a>
        </div>
    </main>
</x-home-layout>
