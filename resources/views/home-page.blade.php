<x-home-layout :donor="$donor">

    <!-- Main Content -->
    <main class="">
        <!-- Hero Section -->
        <section class="relative overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-b from-dark-950 to-dark-900 opacity-90"></div>
                <div
                    class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1579684453423-f84349ef60b0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1800&q=80')] bg-cover bg-center opacity-20">
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-dark-950 to-transparent"></div>
            </div>
            <div class="container mx-auto px-4 py-16 relative z-10">
                <div class="max-w-3xl mx-auto text-center">
                    <div
                        class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-blood to-pink-600 flex items-center justify-center mb-6 drop-shadow-[0_0_8px_rgba(225,29,72,0.6)]">
                        <i class="fas fa-tint text-white text-2xl"></i>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-ice-400 to-ice-500 bg-clip-text text-transparent">Donate
                            Blood</span>
                        <br>Save Lives Today
                    </h1>
                    <p class="text-xl text-gray-400 mb-8">Your <span
                            class="font-bold text-blood">{{ $donor->blood_type }}</span> blood type
                        is currently in critical demand. Join our network of lifesavers.</p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <button
                            class="bg-blood hover:bg-blood-700 text-white px-8 py-4 rounded-lg font-bold transition flex items-center drop-shadow-[0_0_8px_rgba(225,29,72,0.6)]">
                            <i class="fas fa-heartbeat mr-3"></i> Make Donation
                        </button>
                    </div>
                </div>
            </div>
            <!-- Stats Section -->
            <section class="container mx-auto px-4 py-12">
                <div class="flex flex-wrap justify-center gap-20">
                    <!-- Total Donations -->
                    <div
                        class="flex-1 min-w-[150px] max-w-[250px] p-6 rounded-xl border border-dark-800 text-center transition-all duration-300 ease-in-out hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)] backdrop-blur-[16px] bg-[rgba(38,38,38,0.7)]">
                        <p class="text-3xl font-bold text-blood mb-2">12</p>
                        <p class="text-sm text-gray-400">Total Donations</p>
                    </div>

                    <!-- Last Donation -->
                    <div
                        class="flex-1 min-w-[150px] max-w-[250px] p-6 rounded-xl border border-dark-800 text-center transition-all duration-300 ease-in-out hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)] backdrop-blur-[16px] bg-[rgba(38,38,38,0.7)]">
                        <p class="text-3xl font-bold text-blue-400 mb-2">2 mo</p>
                        <p class="text-sm text-gray-400">Last Donation</p>
                    </div>

                    <!-- Next Eligible -->
                    <div
                        class="flex-1 min-w-[150px] max-w-[250px] p-6 rounded-xl border border-dark-800 text-center transition-all duration-300 ease-in-out hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)] backdrop-blur-[16px] bg-[rgba(38,38,38,0.7)]">
                        <p class="text-3xl font-bold text-amber-400 mb-2">Ready</p>
                        <p class="text-sm text-gray-400">Next Eligible</p>
                    </div>
                </div>
            </section>
        </section>



        <!-- Events Section -->
        <section class="container mx-auto px-4 py-12">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold flex items-center">
                    <i class="fas fa-calendar-star text-ice-400 mr-3"></i>
                    Upcoming Events
                </h2>
                <a href="#" class="text-ice-400 hover:text-white transition flex items-center">
                    View All <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Event 1 -->
                <div
                    class="bg-dark-900 rounded-xl border border-dark-800 overflow-hidden transition-all duration-300 ease-in-out hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)]">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80"
                            alt="Blood drive"
                            class="w-full h-full object-cover transition duration-500 hover:scale-105">
                        <div class="absolute top-4 left-4 bg-blood text-white px-3 py-1 rounded-full text-xs font-bold">
                            URGENT NEED
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold">Summer Blood Drive</h3>
                            <div class="bg-dark-800 text-xs px-2 py-1 rounded-lg flex items-center">
                                <i class="fas fa-calendar-day mr-1"></i> Jun 15
                            </div>
                        </div>
                        <p class="text-gray-400 mb-4">Central Yangon • 10AM - 4PM</p>
                        <p class="text-sm mb-5">Our largest annual blood donation event with free health screenings
                            for
                            all participants.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500"><i class="fas fa-users mr-1"></i> 48 donors</span>
                            <button class="text-blood hover:text-blood-400 text-sm font-bold transition">
                                Register <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event 2 -->
                <div
                    class="bg-dark-900 rounded-xl border border-dark-800 overflow-hidden transition-all duration-300 ease-in-out hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)]">
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
                            <div class="bg-dark-800 text-xs px-2 py-1 rounded-lg flex items-center">
                                <i class="fas fa-calendar-day mr-1"></i> Jun 22
                            </div>
                        </div>
                        <p class="text-gray-400 mb-4">VitalLink HQ • 2PM - 5PM</p>
                        <p class="text-sm mb-5">Learn how to organize blood drives and recruit donors in your
                            community.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500"><i class="fas fa-users mr-1"></i> 12 spots
                                left</span>
                            <button class="text-blue-400 hover:text-blue-300 text-sm font-bold transition">
                                Learn More <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event 3 -->
                <div
                    class="bg-dark-900 rounded-xl border border-dark-800 overflow-hidden transition-all duration-300 ease-in-out hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)]">
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
                            <div class="bg-dark-800 text-xs px-2 py-1 rounded-lg flex items-center">
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

        <!-- Testimonials -->
        <section class="container mx-auto px-4 py-12">
            <h2 class="text-2xl md:text-3xl font-bold mb-12 text-center">
                <i class="fas fa-quote-left text-ice-400 mr-3"></i>
                Stories From Our Donors
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Testimonial 1 -->
                <div
                    class="p-6 rounded-xl border border-dark-800 transition-all duration-300 ease-in-out hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)] backdrop-blur-[16px] bg-[rgba(38,38,38,0.7)]">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Sarah K."
                            class="w-12 h-12 rounded-full border-2 border-blood mr-3">
                        <div>
                            <h4 class="font-bold">Sarah K.</h4>
                            <p class="text-sm text-gray-500">Regular Donor (A+)</p>
                        </div>
                    </div>
                    <p class="italic mb-4">"I've donated 15 times through VitalLink. The app makes it so easy to
                        find
                        drives and track my impact. Knowing I've helped save lives is the best feeling."</p>
                    <div class="flex">
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div
                    class="p-6 rounded-xl border border-dark-800 transition-all duration-300 ease-in-out hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)] backdrop-blur-[16px] bg-[rgba(38,38,38,0.7)]">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="David L."
                            class="w-12 h-12 rounded-full border-2 border-blue-400 mr-3">
                        <div>
                            <h4 class="font-bold">David L.</h4>
                            <p class="text-sm text-gray-500">First-time Donor (B-)</p>
                        </div>
                    </div>
                    <p class="italic mb-4">"The staff made my first donation so comfortable. When I got the
                        notification that my blood was used, I immediately scheduled my next appointment!"</p>
                    <div class="flex">
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star-half-alt text-amber-400"></i>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div
                    class="p-6 rounded-xl border border-dark-800 transition-all duration-300 ease-in-out hover:translate-y-[-5px] hover:shadow-[0_10px_25px_-5px_rgba(225,29,72,0.3)] backdrop-blur-[16px] bg-[rgba(38,38,38,0.7)]">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Maria G."
                            class="w-12 h-12 rounded-full border-2 border-purple-400 mr-3">
                        <div>
                            <h4 class="font-bold">Maria G.</h4>
                            <p class="text-sm text-gray-500">Plasma Donor (AB+)</p>
                        </div>
                    </div>
                    <p class="italic mb-4">"As a plasma donor, I appreciate how VitalLink tracks my specific
                        donation
                        type. The urgent request notifications help me donate when I'm needed most."</p>
                    <div class="flex">
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-home-layout>
