@props(['donor'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitalLink | Blood Donation Network</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-dark-900 text-gray-200 min-h-screen font-sans">
    <!-- Navigation -->
    <nav class="border-b border-blood-900 bg-dark-900 bg-opacity-90 backdrop-blur-sm">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
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
                {{-- for donor home --}}
                @isset($donor)
                    <div class="hidden md:flex items-center space-x-1">
                        <div class="group relative">
                            <button
                                class="px-4 py-2 rounded-lg hover:bg-dark-800 transition flex items-center space-x-2 text-ice-400 hover:text-white">
                                <i class="fas fa-heart-pulse"></i>
                                <span>Donate</span>
                                <i class="fas fa-chevron-down text-xs transition transform group-hover:rotate-180"></i>
                            </button>
                            <div
                                class="absolute left-0 mt-2 w-56 bg-dark-800 rounded-lg shadow-xl border border-dark-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                <a href="#"
                                    class="px-4 py-3 hover:bg-dark-700 transition border-b border-dark-700 flex items-center">
                                    <i class="fas fa-bolt text-blood mr-2"></i>
                                    Urgent Requests
                                    <span class="ml-auto bg-blood text-xs px-2 py-0.5 rounded-full">3</span>
                                </a>
                                <a href="#" class="px-4 py-3 hover:bg-dark-700 transition flex items-center">
                                    <i class="fas fa-calendar-check text-green-400 mr-2"></i>
                                    Schedule
                                </a>
                            </div>
                        </div>
                        <a href="#"
                            class="px-4 py-2 rounded-lg hover:bg-dark-800 transition flex items-center space-x-2 text-ice-400 hover:text-white">
                            <i class="fas fa-calendar-star"></i>
                            <span>Events</span>
                        </a>
                        <div class="group relative">
                            <button
                                class="px-4 py-2 rounded-lg hover:bg-dark-800 transition flex items-center space-x-2 text-ice-400 hover:text-white">
                                <img src="donor-files/{{ $donor->profile_img }}" alt="Profile"
                                    class="w-9 h-9 p-1 rounded-full border-2 {{ $donor->status === 'pending'
                                        ? 'border-amber-400'
                                        : ($donor->status === 'rejected'
                                            ? 'border-red-500'
                                            : ($donor->status === 'approved'
                                                ? 'border-green-400'
                                                : 'border-ice-400')) }}">
                                <span>{{ $donor->user->name }}</span>
                                <i class="fas fa-chevron-down text-xs transition transform group-hover:rotate-180"></i>
                            </button>
                            <div
                                class="absolute right-0 mt-2 w-max bg-dark-800 rounded-lg shadow-xl border border-dark-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                <div class="px-4 py-3 border-b border-dark-700">
                                    <p class="text-xs">Blood Type:
                                        <span class="font-bold text-blood">
                                            {{ $donor->blood_type }}
                                        </span>
                                    </p>
                                    <p class="text-xs mt-1">Next eligible:
                                        <span
                                            class="font-bold {{ $donor->cooldown_until > now() ? 'text-red-400' : 'text-green-400' }}">
                                            {{ $donor->cooldown_until > now() ? 'Not Ready' : 'Ready' }}
                                        </span>
                                    </p>
                                </div>
                                <a href="#"
                                    class="block px-4 py-3 hover:bg-dark-700 transition border-b border-dark-700 flex items-center justify-between">
                                    <div>
                                        <i class="fas fa-user mr-2"></i> Profile
                                    </div>
                                    @if ($donor->status === 'pending')
                                        <span
                                            class="text-xs bg-amber-500/20 text-amber-400 px-2 py-1 rounded-full flex items-center">
                                            <i class="fas fa-clock mr-1"></i> Pending
                                        </span>
                                    @elseif($donor->status === 'rejected')
                                        <div class="flex items-center space-x-2">
                                            <span
                                                class="text-xs bg-red-500/20 text-red-400 px-2 py-1 rounded-full flex items-center mx-2">
                                                <i class="fas fa-times-circle mr-1"></i> Rejected
                                            </span>
                                        </div>
                                    @elseif($donor->status === 'approved')
                                        <span
                                            class="text-xs bg-green-500/20 text-green-400 px-2 py-1 rounded-full flex items-center mx-2">
                                            <i class="fas fa-check-circle mr-1"></i> Approved
                                        </span>
                                    @endif
                                </a>
                                <a href="#"
                                    class="block px-4 py-3 hover:bg-dark-700 transition border-b border-dark-700">
                                    <i class="fas fa-history mr-2"></i> History
                                </a>
                                <a href="#" class="block px-4 py-3 hover:bg-dark-700 transition">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </a>
                            </div>
                        </div>

                        <button
                            class="relative p-2 ml-2 rounded-full hover:bg-dark-800 transition text-ice-400 hover:text-white">
                            <i class="fas fa-bell"></i>
                            <span
                                class="absolute top-0 right-0 w-2.5 h-2.5 bg-blood rounded-full border border-dark-900"></span>
                        </button>

                        @if ($donor->status === 'rejected')
                            <a href="{{ route('donor.complete') }}"
                                class="inline-flex items-center text-xs bg-blood hover:bg-blood-700 text-white px-3 py-1.5 rounded-full transition">
                                <i class="fas fa-redo mr-1.5"></i>
                                Edit and Resubmit
                            </a>
                        @endif
                    </div>
                @else
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-end md:ml-6 space-x-3">
                            <form action="{{ route('login') }}" method="get">
                                @csrf
                                <button type="submit"
                                    class="bg-dark-800 hover:bg-blood-900 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300 border border-blood-800">
                                    Log In
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
                @endisset
            </div>
        </div>
    </nav>

    {{ $slot }}

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
    
</body>
</html>
