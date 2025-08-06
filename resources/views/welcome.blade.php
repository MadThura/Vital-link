<x-home-layout>
    <!-- Blood droplet background elements -->
    <div class="fixed -z-10 inset-0 overflow-hidden opacity-20">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blood-700 rounded-full filter blur-3xl animate-pulse-slow">
        </div>
        <div
            class="absolute top-1/3 right-1/4 w-96 h-96 bg-blood-800 rounded-full filter blur-3xl animate-pulse-slow animation-delay-2000">
        </div>
        <div
            class="absolute bottom-1/4 right-1/3 w-80 h-80 bg-blood-600 rounded-full filter blur-3xl animate-pulse-slow animation-delay-4000">
        </div>
    </div>
    <!-- Hero Section -->
    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left">
            <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                <span class="block">Donate Blood,</span>
                <span class="block bg-gradient-to-r from-blood-400 to-blood-600 bg-clip-text text-transparent">Save
                    Lives</span>
            </h1>
            <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                Join our network of heroes. Every donation can save up to 3 lives. Become a life-saver today.
            </p>
            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start space-y-3 sm:space-y-0 sm:space-x-4">
                <div class="rounded-md shadow-lg shadow-blood-900/30">
                    <a href="/register"
                        class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-blood-500 to-blood-700 hover:from-blood-600 hover:to-blood-800 md:py-4 md:text-lg md:px-10 transition duration-300">
                        <i class="fas fa-heart mr-2"></i> Become a Donor
                    </a>
                </div>
                <div class="rounded-md shadow">
                    <button
                        class="w-full flex items-center justify-center px-8 py-3 border border-blood-800 text-base font-medium rounded-md text-blood-300 bg-dark-800 hover:bg-blood-900 md:py-4 md:text-lg md:px-10 transition duration-300">
                        <i class="fas fa-droplet mr-2"></i> Find Blood
                    </button>
                </div>
            </div>

            <!-- Stats -->
            <div class="mt-12 grid grid-cols-2 gap-8 sm:grid-cols-4">
                <div class="text-center">
                    <div class="text-4xl font-bold text-blood-400">10K+</div>
                    <div class="mt-2 text-sm font-medium text-gray-400 uppercase tracking-wider">Donations</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blood-400">3K+</div>
                    <div class="mt-2 text-sm font-medium text-gray-400 uppercase tracking-wider">Lives Saved</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blood-400">500+</div>
                    <div class="mt-2 text-sm font-medium text-gray-400 uppercase tracking-wider">Partners</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blood-400">24/7</div>
                    <div class="mt-2 text-sm font-medium text-gray-400 uppercase tracking-wider">Support</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Blood Types Section -->
    <section class="py-12 bg-dark-800 bg-opacity-50 backdrop-blur-sm mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-blood-400 font-semibold tracking-wide uppercase">Blood Types</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl">
                    All Blood Types Are Needed
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-300 lg:mx-auto">
                    No matter your blood type, your donation is valuable. Here's how common each type is.
                </p>
            </div>

            <div class="mt-10">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <!-- O+ -->
                    <div class="bg-dark-800 p-6 rounded-lg border-l-4 border-blood-500">
                        <div class="text-3xl font-bold text-blood-400">O+</div>
                        <div class="mt-2 text-gray-300">37% of population</div>
                        <div class="mt-4 h-2 bg-dark-700 rounded-full">
                            <div class="h-2 bg-blood-500 rounded-full" style="width: 37%"></div>
                        </div>
                    </div>

                    <!-- A+ -->
                    <div class="bg-dark-800 p-6 rounded-lg border-l-4 border-blood-500">
                        <div class="text-3xl font-bold text-blood-400">A+</div>
                        <div class="mt-2 text-gray-300">36% of population</div>
                        <div class="mt-4 h-2 bg-dark-700 rounded-full">
                            <div class="h-2 bg-blood-500 rounded-full" style="width: 36%"></div>
                        </div>
                    </div>

                    <!-- B+ -->
                    <div class="bg-dark-800 p-6 rounded-lg border-l-4 border-blood-500">
                        <div class="text-3xl font-bold text-blood-400">B+</div>
                        <div class="mt-2 text-gray-300">9% of population</div>
                        <div class="mt-4 h-2 bg-dark-700 rounded-full">
                            <div class="h-2 bg-blood-500 rounded-full" style="width: 9%"></div>
                        </div>
                    </div>

                    <!-- AB+ -->
                    <div class="bg-dark-800 p-6 rounded-lg border-l-4 border-blood-500">
                        <div class="text-3xl font-bold text-blood-400">AB+</div>
                        <div class="mt-2 text-gray-300">3% of population</div>
                        <div class="mt-4 h-2 bg-dark-700 rounded-full">
                            <div class="h-2 bg-blood-500 rounded-full" style="width: 3%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-blood-400 font-semibold tracking-wide uppercase">Testimonials</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white sm:text-4xl">
                    Stories from Our Donors
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-dark-800 p-6 rounded-lg border-t-4 border-blood-500">
                    <div class="flex items-center">
                        <div
                            class="flex-shrink-0 h-12 w-12 rounded-full bg-blood-900 flex items-center justify-center text-blood-400">
                            <i class="fas fa-user text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <div class="text-lg font-medium text-white">Sarah Johnson</div>
                            <div class="text-blood-400">Regular Donor</div>
                        </div>
                    </div>
                    <div class="mt-4 text-gray-300">
                        "Donating blood is the easiest way to save lives. I've been donating every 3 months for 5 years
                        and it's become a rewarding habit."
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-dark-800 p-6 rounded-lg border-t-4 border-blood-500">
                    <div class="flex items-center">
                        <div
                            class="flex-shrink-0 h-12 w-12 rounded-full bg-blood-900 flex items-center justify-center text-blood-400">
                            <i class="fas fa-user text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <div class="text-lg font-medium text-white">Michael Chen</div>
                            <div class="text-blood-400">First-Time Donor</div>
                        </div>
                    </div>
                    <div class="mt-4 text-gray-300">
                        "I was nervous at first, but the staff made the process so comfortable. Knowing my blood helped
                        save a child's life made it all worthwhile."
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-dark-800 p-6 rounded-lg border-t-4 border-blood-500">
                    <div class="flex items-center">
                        <div
                            class="flex-shrink-0 h-12 w-12 rounded-full bg-blood-900 flex items-center justify-center text-blood-400">
                            <i class="fas fa-user text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <div class="text-lg font-medium text-white">David Wilson</div>
                            <div class="text-blood-400">Recipient's Father</div>
                        </div>
                    </div>
                    <div class="mt-4 text-gray-300">
                        "When my daughter needed emergency surgery, blood donors saved her life. I'll be forever
                        grateful to these anonymous heroes."
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-gradient-to-r from-blood-800 to-blood-900 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                <span class="block">Ready to make a difference?</span>
            </h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-blood-200 sm:mt-4">
                Your blood donation could be the gift of life for someone in need.
            </p>
            <div class="mt-8 flex justify-center">
                <div class="inline-flex rounded-md shadow">
                    <a href="/register"
                        class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blood-800 bg-white hover:bg-gray-100 md:py-4 md:text-lg md:px-10 transition duration-300">
                        <i class="fas fa-tint mr-2"></i> Donate Now
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-home-layout>
