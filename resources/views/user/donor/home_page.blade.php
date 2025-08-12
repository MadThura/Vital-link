<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitalLink | Blood Donor Network</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        blood: '#e11d48',
                        dark: {
                            950: '#0a0a0a',
                            900: '#171717',
                            800: '#262626',
                            700: '#404040'
                        },
                        ice: {
                            400: '#a5f3fc',
                            500: '#67e8f9'
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite'
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .blood-glow {
            filter: drop-shadow(0 0 8px rgba(225, 29, 72, 0.6));
        }
        .nav-glass {
            backdrop-filter: blur(12px);
            background: rgba(10, 10, 10, 0.85);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(225, 29, 72, 0.3);
        }
        .frosted-glass {
            backdrop-filter: blur(16px);
            background: rgba(38, 38, 38, 0.7);
        }
    </style>
</head>
<body class="bg-dark-950 text-gray-200 font-sans min-h-screen">
    <!-- Navigation -->
    <nav class="nav-glass fixed w-full z-50 border-b border-dark-800">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blood to-pink-600 flex items-center justify-center">
                        <i class="fas fa-tint text-white text-sm"></i>
                    </div>
                    <span class="text-xl font-bold bg-gradient-to-r from-ice-400 to-ice-500 bg-clip-text text-transparent">VitalLink</span>
                </div>

                <!-- Desktop Nav -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#" class="px-4 py-2 rounded-lg hover:bg-dark-800 transition flex items-center space-x-2 text-ice-400 hover:text-white">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <div class="group relative">
                        <button class="px-4 py-2 rounded-lg hover:bg-dark-800 transition flex items-center space-x-2 text-ice-400 hover:text-white">
                            <i class="fas fa-heart-pulse"></i>
                            <span>Donate</span>
                            <i class="fas fa-chevron-down text-xs transition transform group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 bg-dark-800 rounded-lg shadow-xl border border-dark-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="#" class=" px-4 py-3 hover:bg-dark-700 transition border-b border-dark-700 flex items-center">
                                <i class="fas fa-bolt text-blood mr-2"></i>
                                Urgent Requests
                                <span class="ml-auto bg-blood text-xs px-2 py-0.5 rounded-full">3</span>
                            </a>
                            <a href="#" class="block px-4 py-3 hover:bg-dark-700 transition border-b border-dark-700 flex items-center">
                                <i class="fas fa-map-marker-alt text-blue-400 mr-2"></i>
                                Find Centers
                            </a>
                            <a href="#" class="block px-4 py-3 hover:bg-dark-700 transition flex items-center">
                                <i class="fas fa-calendar-check text-green-400 mr-2"></i>
                                Schedule
                            </a>
                        </div>
                    </div>
                    
                    <a href="#" class="px-4 py-2 rounded-lg hover:bg-dark-800 transition flex items-center space-x-2 text-ice-400 hover:text-white">
                        <i class="fas fa-calendar-star"></i>
                        <span>Events</span>
                    </a>
                    
                    <a href="#" class="px-4 py-2 rounded-lg hover:bg-dark-800 transition flex items-center space-x-2 text-ice-400 hover:text-white">
                        <i class="fas fa-newspaper"></i>
                        <span>Blog</span>
                    </a>
                    
                    <div class="group relative">
                        <button class="px-4 py-2 rounded-lg hover:bg-dark-800 transition flex items-center space-x-2 text-ice-400 hover:text-white">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile" class="w-6 h-6 rounded-full border border-ice-400">
                            <span>John</span>
                            <i class="fas fa-chevron-down text-xs transition transform group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-56 bg-dark-800 rounded-lg shadow-xl border border-dark-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <div class="px-4 py-3 border-b border-dark-700">
                                <p class="text-xs">Blood Type: <span class="font-bold text-blood">O+</span></p>
                                <p class="text-xs mt-1">Next eligible: <span class="font-bold text-green-400">Ready</span></p>
                            </div>
                            <a href="#" class="block px-4 py-3 hover:bg-dark-700 transition border-b border-dark-700">
                                <i class="fas fa-user mr-2"></i> Profile
                            </a>
                            <a href="#" class="block px-4 py-3 hover:bg-dark-700 transition border-b border-dark-700">
                                <i class="fas fa-history mr-2"></i> History
                            </a>
                            <a href="#" class="block px-4 py-3 hover:bg-dark-700 transition">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </a>
                        </div>
                    </div>
                    
                    <button class="relative p-2 ml-2 rounded-full hover:bg-dark-800 transition text-ice-400 hover:text-white">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-blood rounded-full border border-dark-900"></span>
                    </button>
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-dark-800 transition text-ice-400">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden fixed inset-0 z-40 bg-dark-950 bg-opacity-90 hidden">
        <div class="flex justify-end p-4">
            <button id="mobile-menu-close" class="p-2 rounded-lg hover:bg-dark-800 transition text-ice-400">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="px-6 py-4 space-y-4">
            <a href="#" class="block px-4 py-3 rounded-lg bg-dark-800 text-white">
                <i class="fas fa-home mr-3"></i> Dashboard
            </a>
            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-dark-800 transition">
                <i class="fas fa-heart-pulse mr-3"></i> Donate
            </a>
            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-dark-800 transition">
                <i class="fas fa-calendar-star mr-3"></i> Events
            </a>
            <a href="#" class="block px-4 py-3 rounded-lg hover:bg-dark-800 transition">
                <i class="fas fa-newspaper mr-3"></i> Blog
            </a>
            <div class="pt-4 mt-4 border-t border-dark-800">
                <div class="flex items-center px-4 py-3">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile" class="w-8 h-8 rounded-full border border-ice-400 mr-3">
                    <div>
                        <p class="font-medium">John Donor</p>
                        <p class="text-xs text-gray-400">O+ • Ready to donate</p>
                    </div>
                </div>
                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-dark-800 transition mt-2">
                    <i class="fas fa-cog mr-3"></i> Settings
                </a>
                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-dark-800 transition">
                    <i class="fas fa-sign-out-alt mr-3"></i> Logout
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="pt-20 pb-12">
        <!-- Hero Section -->
        <section class="relative overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-b from-dark-950 to-dark-900 opacity-90"></div>
                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1579684453423-f84349ef60b0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1800&q=80')] bg-cover bg-center opacity-20"></div>
                <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-dark-950 to-transparent"></div>
            </div>
            <div class="container mx-auto px-4 py-16 relative z-10">
                <div class="max-w-3xl mx-auto text-center">
                    <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-blood to-pink-600 flex items-center justify-center mb-6 blood-glow">
                        <i class="fas fa-tint text-white text-2xl"></i>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">
                        <span class="bg-gradient-to-r from-ice-400 to-ice-500 bg-clip-text text-transparent">Donate Blood</span>
                        <br>Save Lives Today
                    </h1>
                    <p class="text-xl text-gray-400 mb-8">Your <span class="font-bold text-blood">O+</span> blood type is currently in critical demand. Join our network of lifesavers.</p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <button class="bg-blood hover:bg-blood-700 text-white px-8 py-4 rounded-lg font-bold transition flex items-center blood-glow">
                            <i class="fas fa-heartbeat mr-3"></i> Find Urgent Requests
                        </button>
                        <button class="bg-dark-800 hover:bg-dark-700 border border-ice-400 border-opacity-30 hover:border-opacity-50 text-ice-400 px-8 py-4 rounded-lg font-bold transition flex items-center">
                            <i class="fas fa-calendar-alt mr-3"></i> Schedule Donation
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="frosted-glass p-6 rounded-xl border border-dark-800 text-center card-hover">
                    <p class="text-3xl font-bold text-blood mb-2">12</p>
                    <p class="text-sm text-gray-400">Total Donations</p>
                </div>
                <div class="frosted-glass p-6 rounded-xl border border-dark-800 text-center card-hover">
                    <p class="text-3xl font-bold text-green-400 mb-2">36+</p>
                    <p class="text-sm text-gray-400">Lives Saved</p>
                </div>
                <div class="frosted-glass p-6 rounded-xl border border-dark-800 text-center card-hover">
                    <p class="text-3xl font-bold text-blue-400 mb-2">2 mo</p>
                    <p class="text-sm text-gray-400">Last Donation</p>
                </div>
                <div class="frosted-glass p-6 rounded-xl border border-dark-800 text-center card-hover">
                    <p class="text-3xl font-bold text-amber-400 mb-2">Ready</p>
                    <p class="text-sm text-gray-400">Next Eligible</p>
                </div>
            </div>
        </section>

        <!-- Emergency Alert -->
        <section class="container mx-auto px-4 py-8">
            <div class="bg-gradient-to-r from-dark-800 to-dark-900 rounded-xl border border-blood border-opacity-30 p-6 md:p-8 relative overflow-hidden">
                <div class="absolute -top-20 -right-20 w-40 h-40 rounded-full bg-blood opacity-10"></div>
                <div class="absolute -bottom-20 -left-20 w-40 h-40 rounded-full bg-blood opacity-10"></div>
                <div class="relative z-10">
                    <div class="flex flex-col md:flex-row md:items-center">
                        <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                            <div class="w-16 h-16 rounded-full bg-blood bg-opacity-20 flex items-center justify-center text-blood blood-glow">
                                <i class="fas fa-exclamation-triangle text-2xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-2xl font-bold mb-2">Emergency Blood Shortage</h2>
                            <p class="text-gray-400 mb-4">Hospitals in your area are experiencing critical O+ blood shortages. Your donation is urgently needed to help patients in life-saving procedures.</p>
                            <div class="flex flex-wrap gap-3">
                                <button class="bg-blood hover:bg-blood-700 text-white px-6 py-3 rounded-lg font-bold transition flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2"></i> Nearest Center
                                </button>
                                <button class="bg-dark-800 hover:bg-dark-700 border border-dark-700 px-6 py-3 rounded-lg font-bold transition flex items-center">
                                    <i class="fas fa-phone-alt mr-2"></i> Call for Help
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                <div class="bg-dark-900 rounded-xl border border-dark-800 overflow-hidden card-hover">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                             alt="Blood drive" class="w-full h-full object-cover transition duration-500 hover:scale-105">
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
                        <p class="text-sm mb-5">Our largest annual blood donation event with free health screenings for all participants.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500"><i class="fas fa-users mr-1"></i> 48 donors</span>
                            <button class="text-blood hover:text-blood-400 text-sm font-bold transition">
                                Register <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event 2 -->
                <div class="bg-dark-900 rounded-xl border border-dark-800 overflow-hidden card-hover">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                             alt="Workshop" class="w-full h-full object-cover transition duration-500 hover:scale-105">
                        <div class="absolute top-4 left-4 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold">
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
                        <p class="text-sm mb-5">Learn how to organize blood drives and recruit donors in your community.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs text-gray-500"><i class="fas fa-users mr-1"></i> 12 spots left</span>
                            <button class="text-blue-400 hover:text-blue-300 text-sm font-bold transition">
                                Learn More <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Event 3 -->
                <div class="bg-dark-900 rounded-xl border border-dark-800 overflow-hidden card-hover">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                             alt="Appreciation event" class="w-full h-full object-cover transition duration-500 hover:scale-105">
                        <div class="absolute top-4 left-4 bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-bold">
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
                        <p class="text-sm mb-5">Celebrating our most dedicated donors with awards, food, and live music.</p>
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

        <!-- Blog Section -->
        <section class="container mx-auto px-4 py-12">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl md:text-3xl font-bold flex items-center">
                    <i class="fas fa-newspaper text-ice-400 mr-3"></i>
                    Latest Articles
                </h2>
                <a href="#" class="text-ice-400 hover:text-white transition flex items-center">
                    View All <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Featured Post -->
                <div class="bg-dark-900 rounded-xl border border-dark-800 overflow-hidden card-hover lg:col-span-2">
                    <div class="flex flex-col lg:flex-row">
                        <div class="lg:w-1/2 h-64 lg:h-auto overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1576091160399-112ba8a25d00?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                                 alt="Blood donation impact" class="w-full h-full object-cover transition duration-500 hover:scale-105">
                        </div>
                        <div class="lg:w-1/2 p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-amber-500 bg-opacity-20 text-amber-400 text-xs px-2 py-1 rounded">FEATURED</span>
                                <span class="text-xs text-gray-500 ml-3">June 5, 2025</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-3">How Your Blood Donation Saved Three Lives</h3>
                            <p class="text-gray-400 mb-4">An in-depth look at the journey of a single blood donation through the emergency trauma system and the patients it helped.</p>
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Author" class="w-8 h-8 rounded-full mr-2 border border-ice-400">
                                <span class="text-sm">Dr. Sarah Chen</span>
                                <button class="ml-auto text-ice-400 hover:text-white font-bold transition">
                                    Read Story <i class="fas fa-arrow-right ml-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Post 1 -->
                <div class="bg-dark-900 rounded-xl border border-dark-800 overflow-hidden card-hover">
                    <div class="h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1581595219315-a187dd40c322?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                             alt="Blood science" class="w-full h-full object-cover transition duration-500 hover:scale-105">
                    </div>
                    <div class="p-6">
                        <span class="text-xs text-gray-500">June 1, 2025</span>
                        <h3 class="text-xl font-bold my-3">The Science Behind Blood Regeneration</h3>
                        <p class="text-sm text-gray-400 mb-4">Discover how your body replenishes donated blood and why regular donations are completely safe.</p>
                        <button class="text-ice-400 hover:text-white text-sm font-bold transition">
                            Read More <i class="fas fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                </div>

                <!-- Post 2 -->
                <div class="bg-dark-900 rounded-xl border border-dark-800 overflow-hidden card-hover">
                    <div class="h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80" 
                             alt="Donor community" class="w-full h-full object-cover transition duration-500 hover:scale-105">
                    </div>
                    <div class="p-6">
                        <span class="text-xs text-gray-500">May 28, 2025</span>
                        <h3 class="text-xl font-bold my-3">Building a Donor Community</h3>
                        <p class="text-sm text-gray-400 mb-4">How local donor networks are revolutionizing blood supply chains and saving more lives.</p>
                        <button class="text-ice-400 hover:text-white text-sm font-bold transition">
                            Read More <i class="fas fa-arrow-right ml-1"></i>
                        </button>
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
                <div class="frosted-glass p-6 rounded-xl border border-dark-800 card-hover">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Sarah K." class="w-12 h-12 rounded-full border-2 border-blood mr-3">
                        <div>
                            <h4 class="font-bold">Sarah K.</h4>
                            <p class="text-sm text-gray-500">Regular Donor (A+)</p>
                        </div>
                    </div>
                    <p class="italic mb-4">"I've donated 15 times through VitalLink. The app makes it so easy to find drives and track my impact. Knowing I've helped save lives is the best feeling."</p>
                    <div class="flex">
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="frosted-glass p-6 rounded-xl border border-dark-800 card-hover">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="David L." class="w-12 h-12 rounded-full border-2 border-blue-400 mr-3">
                        <div>
                            <h4 class="font-bold">David L.</h4>
                            <p class="text-sm text-gray-500">First-time Donor (B-)</p>
                        </div>
                    </div>
                    <p class="italic mb-4">"The staff made my first donation so comfortable. When I got the notification that my blood was used, I immediately scheduled my next appointment!"</p>
                    <div class="flex">
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star text-amber-400"></i>
                        <i class="fas fa-star-half-alt text-amber-400"></i>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="frosted-glass p-6 rounded-xl border border-dark-800 card-hover">
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Maria G." class="w-12 h-12 rounded-full border-2 border-purple-400 mr-3">
                        <div>
                            <h4 class="font-bold">Maria G.</h4>
                            <p class="text-sm text-gray-500">Plasma Donor (AB+)</p>
                        </div>
                    </div>
                    <p class="italic mb-4">"As a plasma donor, I appreciate how VitalLink tracks my specific donation type. The urgent request notifications help me donate when I'm needed most."</p>
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

    <!-- Footer -->
    <footer class="bg-dark-900 border-t border-dark-800 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-bold mb-4 flex items-center">
                        <div class="w-6 h-6 rounded-lg bg-gradient-to-br from-blood to-pink-600 flex items-center justify-center mr-2">
                            <i class="fas fa-tint text-white text-xs"></i>
                        </div>
                        VitalLink
                    </h3>
                    <p class="text-sm text-gray-400">Connecting blood donors with those in need since 2018.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-ice-400 transition text-sm">Find a Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-ice-400 transition text-sm">Eligibility</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-ice-400 transition text-sm">Host a Drive</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-ice-400 transition text-sm">Donor Rewards</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-ice-400 transition text-sm">FAQs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-ice-400 transition text-sm">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-ice-400 transition text-sm">Research</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-ice-400 transition text-sm">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Connect</h3>
                    <div class="flex space-x-4 mb-4">
                        <a href="#" class="w-8 h-8 rounded-full bg-dark-800 flex items-center justify-center hover:bg-blood transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-dark-800 flex items-center justify-center hover:bg-blood transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-dark-800 flex items-center justify-center hover:bg-blood transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-dark-800 flex items-center justify-center hover:bg-blood transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                    <p class="text-sm text-gray-400">support@VitalLink.org</p>
                    <p class="text-sm text-gray-400">+95 9 757 500 076</p>
                </div>
            </div>
            <div class="pt-8 border-t border-dark-800 text-center text-sm text-gray-500">
                &copy; 2025 VitalLink. All rights reserved. | 
                <a href="#" class="hover:text-ice-400 transition">Privacy Policy</a> | 
                <a href="#" class="hover:text-ice-400 transition">Terms of Service</a>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
        });

        mobileMenuClose.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });

        // Dropdown menus
        document.addEventListener('click', function(e) {
            // Close dropdowns when clicking outside
            if (!e.target.matches('.dropdown *, .dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.add('hidden');
                });
            }
        });
    </script>
</body>
</html>