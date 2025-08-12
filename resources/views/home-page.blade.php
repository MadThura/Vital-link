<x-home-layout :donor="$donor ?? null">
    <!-- Main Content -->
    <main class="pt-20 pb-12">
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
                            <x-show-requests/>
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
        <section class="container mx-auto px-4 py-12">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold flex items-center">
                    <i class="fas fa-calendar-star text-[#a5f3fc] mr-3"></i>
                    Upcoming Events
                </h2>
                <a href="#" class="text-[#a5f3fc] hover:text-white transition flex items-center">
                    View All <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Event 1 -->
                <div
                    class="bg-[#171717] rounded-xl border border-[#262626] overflow-hidden transition-all duration-300 hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)]">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
                            alt="Blood drive"
                            class="w-full h-full object-cover transition duration-500 hover:scale-105">
                        <div
                            class="absolute top-4 left-4 bg-[#e11d48] text-white px-3 py-1 rounded-full text-xs font-bold">
                            URGENT NEED
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold">Summer Blood Drive</h3>
                            <div class="bg-[#262626] text-xs px-2 py-1 rounded-lg flex items-center">
                                <i class="fas fa-calendar-day mr-1"></i> Jun 15
                            </div>
                        </div>
                        <p class="text-gray-400 mb-4">Central Yangon • 10AM - 4PM</p>
                        <p class="text-sm mb-5">Our largest annual blood donation event with free health screenings for
                            all participants.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500"><i class="fas fa-users mr-1"></i> 48 donors</span>
                            <button class="text-[#e11d48] hover:text-[#e11d48]/80 text-sm font-bold transition">
                                Register <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event 2 -->
                <div
                    class="bg-[#171717] rounded-xl border border-[#262626] overflow-hidden transition-all duration-300 hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)]">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
                            alt="Workshop" class="w-full h-full object-cover transition duration-500 hover:scale-105">
                        <div
                            class="absolute top-4 left-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            WORKSHOP
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold">Donor Ambassador Training</h3>
                            <div class="bg-[#262626] text-xs px-2 py-1 rounded-lg flex items-center">
                                <i class="fas fa-calendar-day mr-1"></i> Jun 22
                            </div>
                        </div>
                        <p class="text-gray-400 mb-4">VitalLink HQ • 2PM - 5PM</p>
                        <p class="text-sm mb-5">Learn how to organize blood drives and recruit donors in your
                            community.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500"><i class="fas fa-users mr-1"></i> 12 spots left</span>
                            <button class="text-blue-400 hover:text-blue-300 text-sm font-bold transition">
                                Learn More <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event 3 -->
                <div
                    class="bg-[#171717] rounded-xl border border-[#262626] overflow-hidden transition-all duration-300 hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)]">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
                            alt="Appreciation event"
                            class="w-full h-full object-cover transition duration-500 hover:scale-105">
                        <div
                            class="absolute top-4 left-4 bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            SOCIAL
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold">Donor Appreciation Night</h3>
                            <div class="bg-[#262626] text-xs px-2 py-1 rounded-lg flex items-center">
                                <i class="fas fa-calendar-day mr-1"></i> Jun 28
                            </div>
                        </div>
                        <p class="text-gray-400 mb-4">Grand Ballroom • 6PM - 9PM</p>
                        <p class="text-sm mb-5">Celebrating our most dedicated donors with awards, food, and live
                            music.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500">VIP Invitation</span>
                            <button class="text-purple-400 hover:text-purple-300 text-sm font-bold transition">
                                RSVP <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    </body>

    </html>
</x-home-layout>

{{-- <nav class="fixed w-full top-0 left-0 z-50 border-b border-[#262626] backdrop-blur-xl bg-[#0a0a0a]/85">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center space-x-1">
                 

                    

                    <a href="#"
                        class="px-4 py-2 rounded-lg hover:bg-[#262626] transition flex items-center space-x-2 text-[#a5f3fc] hover:text-white">
                        <i class="fas fa-calendar-star"></i>
                        <span>Events</span>
                    </a>

                    <a href="#"
                        class="px-4 py-2 rounded-lg hover:bg-[#262626] transition flex items-center space-x-2 text-[#a5f3fc] hover:text-white">
                        <i class="fas fa-newspaper"></i>
                        <span>Blog</span>
                    </a>

                    <div class="group relative">
                        <button
                            class="px-4 py-2 rounded-lg hover:bg-[#262626] transition flex items-center space-x-2 text-[#a5f3fc] hover:text-white">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile"
                                class="w-6 h-6 rounded-full border border-[#a5f3fc]">
                            <span>John</span>
                            <i class="fas fa-chevron-down text-xs transition transform group-hover:rotate-180"></i>
                        </button>
                        <div
                            class="absolute right-0 mt-2 w-56 bg-[#262626] rounded-lg shadow-xl border border-[#404040] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <div class="px-4 py-3 border-b border-[#404040]">
                                <p class="text-xs">Blood Type: <span class="font-bold text-[#e11d48]">O+</span></p>
                                <p class="text-xs mt-1">Next eligible: <span
                                        class="font-bold text-green-400">Ready</span></p>
                            </div>
                            <a href="#"
                                class="block px-4 py-3 hover:bg-[#404040] transition border-b border-[#404040]">
                                <i class="fas fa-user mr-2"></i> Profile
                            </a>
                            <a href="#"
                                class="block px-4 py-3 hover:bg-[#404040] transition border-b border-[#404040]">
                                <i class="fas fa-history mr-2"></i> History
                            </a>
                            <a href="#" class="block px-4 py-3 hover:bg-[#404040] transition">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </div>
                    </div>

                    
                    @if ($donor->status === 'rejected')
                        <a href="{{ route('donor.complete') }}"
                            class="inline-flex items-center text-xs bg-blood hover:bg-blood-700 text-white px-3 py-1.5 rounded-full transition">
                            <i class="fas fa-redo mr-1.5"></i>
                            Edit and Resubmit
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav> --}}
