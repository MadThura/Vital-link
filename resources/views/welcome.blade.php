<!DOCTYPE html>
<html lang="en" x-data="{ showBloodDialog: false }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitalLink | Blood Donation Network</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Add Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        blood: {
                            50: '#fff5f5',
                            100: '#fed7d7',
                            200: '#feb2b2',
                            300: '#fc8181',
                            400: '#f56565',
                            500: '#e53e3e',
                            600: '#c53030',
                            700: '#9b2c2c',
                            800: '#822727',
                            900: '#63171b',
                        },
                        dark: {
                            800: '#1a1a1a',
                            900: '#0d0d0d',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 6s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'heartbeat': 'heartbeat 1.5s ease-in-out infinite',
                    },
                    keyframes: {
                        heartbeat: {
                            '0%, 100%': {
                                transform: 'scale(1)'
                            },
                            '50%': {
                                transform: 'scale(1.1)'
                            },
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-dark-900 text-gray-200 min-h-screen font-sans overflow-x-hidden">
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

    <!-- Navigation -->
    <nav class="border-b border-blood-900 bg-dark-900 bg-opacity-90 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-heartbeat text-blood-500 text-2xl mr-2 animate-heartbeat"></i>
                        <span
                            class="text-2xl font-bold bg-gradient-to-r from-blood-400 to-blood-600 bg-clip-text text-transparent">VitalLink</span>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="#"
                                class="text-blood-400 hover:text-blood-300 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                            <a href="#"
                                class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>
                            <a href="#"
                                class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-end md:ml-6 space-x-3">
                        <a href="/login"
                            class="bg-dark-800 hover:bg-blood-900 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300 border border-blood-800">
                            Log In
                        </a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit"
                                class="bg-dark-800 hover:bg-blood-900 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300 border border-blood-800">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-blood-900 focus:outline-none">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left">
            <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                <span class="block">Donate Blood,</span>
                <span class="block bg-gradient-to-r from-blood-400 to-blood-600 bg-clip-text text-transparent">Save
                    Lives</span>
            </h1>
            <p
                class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
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
                    <button @click="showBloodDialog = true"
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
    <!-- Find Blood Dialog -->
    <div x-show="showBloodDialog" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div x-show="showBloodDialog" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity"
                aria-hidden="true" @click="showBloodDialog = false">
            </div>

            <!-- Modal panel -->
            <div x-show="showBloodDialog" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block align-bottom bg-dark-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-dark-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blood-900 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-user-shield text-blood-400"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-white" id="modal-title">
                                Ward Operator Access Required
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-300">
                                    Only authorized ward operators can search for blood donors. If you need access,
                                    please submit a request below.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-col">
                    <form class="space-y-4" action="/hello">
                        <div>
                            <label for="full-name" class="block text-sm font-medium text-gray-300">Your Full
                                Name</label>
                            <input type="text" id="full-name"
                                class="mt-1 block w-full bg-dark-700 border border-gray-600 rounded-md shadow-sm focus:ring-blood-500 focus:border-blood-500 sm:text-sm text-black p-2 placeholder-gray-400 ">
                        </div>
                        <div>
                            <label for="hospital" class="block text-sm font-medium text-gray-300">Hospital/Clinic
                                Name</label>
                            <select id="hospital"
                                class="mt-1 block w-full bg-dark-700 border border-gray-600 rounded-md shadow-sm focus:ring-blood-500 focus:border-blood-500 sm:text-sm text-black p-2">
                                <option value="" class="text-gray-400">Select hospital</option>
                                <option value="1" class="text-black">General Hospital</option>
                                <option value="2" class="text-black">City Medical Center</option>
                            </select>
                        </div>

                        <div>
                            <label for="ward"
                                class="block text-sm font-medium text-gray-300">Department/Ward</label>
                            <select id="ward"
                                class="mt-1 block w-full bg-dark-700 border border-gray-600 rounded-md shadow-sm focus:ring-blood-500 focus:border-blood-500 sm:text-sm text-black p-2"
                                disabled>
                                <option value="" class="text-gray-400">Select ward</option>
                            </select>
                        </div>
                        <div>
                            <label for="position" class="block text-sm font-medium text-gray-300">Your
                                Position</label>
                            <input type="text" id="position"
                                class="mt-1 block w-full bg-dark-700 border border-gray-600 rounded-md shadow-sm focus:ring-blood-500 focus:border-blood-500 sm:text-sm text-black p-2 placeholder-gray-400">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300">Official
                                Email</label>
                            <input type="email" id="email"
                                class="mt-1 block w-full bg-dark-700 border border-gray-600 rounded-md shadow-sm focus:ring-blood-500 focus:border-blood-500 sm:text-sm text-black p-2 placeholder-gray-400">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-300">Phone Number</label>
                            <input type="tel" id="phone"
                                class="mt-1 block w-full bg-dark-700 border border-gray-600 rounded-md shadow-sm focus:ring-blood-500 focus:border-blood-500 sm:text-sm text-black p-2 placeholder-gray-400">
                        </div>
                        <div>
                            <label for="reason" class="block text-sm font-medium text-gray-300">Reason for
                                Access</label>
                            <textarea id="reason" rows="3"
                                class="mt-1 block w-full bg-dark-700 border border-gray-600 rounded-md shadow-sm focus:ring-blood-500 focus:border-blood-500 sm:text-sm text-black p-2 placeholder-gray-400"></textarea>
                        </div>

                    </form>
                </div>
                <div class="bg-dark-800 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blood-600 text-base font-medium text-white hover:bg-blood-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blood-500 sm:ml-3 sm:w-auto sm:text-sm transition duration-300">
                        Request Access
                    </button>
                    <button type="button" @click="showBloodDialog = false"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-700 shadow-sm px-4 py-2 bg-dark-700 text-base font-medium text-white hover:bg-dark-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blood-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition duration-300">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark-800 mt-20">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-8 xl:col-span-1">
                    <div class="flex items-center">
                        <i class="fas fa-heartbeat text-blood-500 text-2xl mr-2"></i>
                        <span
                            class="text-2xl font-bold bg-gradient-to-r from-blood-400 to-blood-600 bg-clip-text text-transparent">VitalLink</span>
                    </div>
                    <p class="text-gray-300 text-base">
                        Connecting blood donors with those in need since 2015. Every drop counts.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Donation</h3>
                            <ul class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Why Donate</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Who Can
                                        Donate</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Donation
                                        Process</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Blood Types</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Locations</h3>
                            <ul class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Find a
                                        Center</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Mobile
                                        Drives</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Hospital
                                        Partners</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Events</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">About</h3>
                            <ul class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Our Mission</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Team</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Partners</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Careers</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Support</h3>
                            <ul class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">FAQ</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Privacy</a>
                                </li>
                                <li>
                                    <a href="#" class="text-base text-gray-400 hover:text-white">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-8">
                <p class="text-base text-gray-400 text-center">
                    &copy; 2023 VitalLink Blood Donation Network. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    <script>
        // Hospital and wards data
        const hospitalData = {
            "500-bed Specialty Hospital, Yangon": [],
            "Defence Services General Hospital (1000-bed)": [],
            "Defence Services Orthopaedic Hospital (500-Bed)": [],
            "Defence Services Obstetric, Gynaecological and Paediatric Hospital": [],
            "East Yangon General Hospital": [],
            "Insein General Hospital": [
                "General Medical Ward",
                "General Surgical Ward",
                "Obstetrics & Gynaecology Ward",
                "Paediatric Ward",
                "Trauma & Orthopaedic Ward",
                "Ophthalmology Ward",
                "ENT Ward",
                "Oncology Ward",
                "Intensive Care Unit",
                "Sanga Ward",
                "Guard Ward"
            ],
            "New Yangon General Hospital": [],
            "New Yangon Specialist Hospital": [],
            "No.2 Military Hospital (500-bed)": [],
            "North Okkalapa General Hospital": [
                "Internal Medicine Ward",
                "General Surgical Ward",
                "Obstetrics & Gynaecology Ward",
                "Paediatric Ward",
                "Neonatal Unit",
                "Orthopaedic Ward",
                "Cardiology Ward",
                "Neurology / Neurosurgery Ward",
                "Gastroenterology Ward",
                "Haematology Ward",
                "Respiratory Medicine Ward",
                "Dermatology Ward",
                "Medical Oncology Ward",
                "Physical Rehabilitation Ward",
                "Emergency Ward",
                "ENT Ward",
                "Ophthalmology Ward",
                "Urology Ward",
                "Endocrinology Ward",
                "Psychiatric Ward"
            ],
            "South Okkalapa Women and Children Hospital": [
                "Maternity Ward",
                "Gynaecology Ward I",
                "Gynaecology Ward II",
                "Paediatric Ward",
                "Neonatal Unit",
                "Intensive Care Unit"
            ],
            "Thingangyun Sanpya Hospital": [
                "Medical Ward",
                "Surgical Ward",
                "Obstetrics & Gynaecology Ward",
                "Child Medical Ward",
                "Child Surgical Ward",
                "Orthopaedic Ward",
                "Urological Surgical Ward",
                "Urological Medical Ward",
                "Gastrointestinal Ward",
                "Chest Medical Ward",
                "Chest Surgical Ward",
                "Eye Ward",
                "Dental OPD",
                "ENT OPD",
                "Psychiatric OPD",
                "Nuclear Medicine OPD",
                "Physiotherapy OPD"
            ],
            "Universities Hospital[1]": [],
            "Waibargi Hospital": [],
            "West Yangon General Hospital": [],
            "Yangon Central Women's Hospital": [],
            "Yangon Children's Hospital": [],
            "Yangon ENT Hospital": [],
            "Yangon General Hospital": [
                "Medical Ward 1A",
                "Medical Ward 1B",
                "Medical Ward 2A",
                "Medical Ward 2B",
                "Medical Ward 3A",
                "Medical Ward 3B",
                "Medical Ward 4",
                "Surgical Ward 1",
                "Surgical Ward 2",
                "Surgical Ward 3",
                "Trauma & Orthopaedic Ward 1",
                "Trauma & Orthopaedic Ward 2"
            ],
            "Yangon Orthopaedic Hospital": [],
            "Yangon Workers' Hospital": [],
            "Yangon Mental Health Hospital": [],
            "Yankin Children's Hospital": [
                "General Paediatric Medicine",
                "General Paediatric Surgery",
                "Paediatric Cardiac Surgery",
                "Paediatric Cardiac Medicine",
                "Neonatal ICU",
                "General Paediatric ICU",
                "Paediatric Cardiac ICU",
                "Paediatric Cardiac Catheterization",
                "Physiotherapy Unit",
                "Laboratory & Blood Bank",
                "Imaging Department",
                "Emergency & OPD",
                "Reception Centre",
                "ART Center"
            ]
        };

        const hospitalSelect = document.getElementById("hospital");
        const wardSelect = document.getElementById("ward");

        // Populate hospital select options
        Object.keys(hospitalData).forEach(hospital => {
            const option = document.createElement("option");
            option.value = hospital;
            option.textContent = hospital;
            hospitalSelect.appendChild(option);
        });

        hospitalSelect.addEventListener("change", () => {
            const selectedHospital = hospitalSelect.value;
            wardSelect.innerHTML = ""; // Clear previous options

            if (selectedHospital && hospitalData[selectedHospital].length > 0) {
                wardSelect.disabled = false;
                // Add default option
                const defaultOption = document.createElement("option");
                defaultOption.value = "";
                defaultOption.textContent = "Select ward";
                wardSelect.appendChild(defaultOption);

                hospitalData[selectedHospital].forEach(ward => {
                    const option = document.createElement("option");
                    option.value = ward;
                    option.textContent = ward;
                    wardSelect.appendChild(option);
                });
            } else {
                wardSelect.disabled = true;
                const option = document.createElement("option");
                option.value = "";
                option.textContent = "No wards available";
                wardSelect.appendChild(option);
            }
        });
    </script>
</body>

</html>
