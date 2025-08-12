@props(['donor' => null])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitalLink | Blood Donation Network</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="bg-[#0a0a0a] text-gray-200 font-sans min-h-screen">
    <nav class="fixed w-full top-0 left-0 z-50 border-b border-[#262626] backdrop-blur-xl bg-[#0a0a0a]/85">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-heartbeat text-red-500 text-2xl mr-2"></i>
                        <span
                            class="text-2xl font-bold bg-gradient-to-r from-red-400 to-red-600 bg-clip-text text-transparent">VitalLink</span>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="#"
                                class="text-red-400 hover:text-red-300 px-3 py-2 rounded-md text-sm font-medium">Welcome</a>
                            <a href="#"
                                class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>
                            <button class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                Contact
                            </button>

                        </div>
                    </div>
                </div>
                @isset($donor)
                    <div class="flex items-center gap-10">
                        {{-- Donor Home Link --}}
                        @if ($donor->status === 'approved')
                            <a href="{{ route('home') }}"
                                class="text-red-400 hover:text-red-300 px-3 py-2 rounded-md text-sm font-medium">
                                Donor Home
                            </a>
                            <div x-data="{ showNotifications: false }" class="relative">
                                <!-- Notification Button -->
                                <button @click="showNotifications = !showNotifications"
                                    class="relative p-2 ml-2 rounded-full hover:bg-[#262626] transition text-[#a5f3fc] hover:text-white">
                                    <i class="fas fa-bell"></i>
                                    <span
                                        class="absolute top-0 right-0 w-2.5 h-2.5 bg-[#bf1a3e] rounded-full border border-[#171717]"></span>
                                </button>
                                <x-notification-pane />
                            </div>
                        @elseif($donor->status === 'rejected')
                            <a href="{{ route('donor.complete') }}"
                                class="inline-flex items-center text-xs bg-[#e11d48] hover:bg-[#bf1a3e] text-white px-3 py-1.5 rounded-full transition">
                                <i class="fas fa-redo mr-1.5"></i> Edit and Resubmit
                            </a>
                        @endif

                        {{-- Profile Dropdown --}}
                        <div class="group relative">
                            <button
                                class="px-4 py-2 rounded-lg hover:bg-[#262626] transition flex text-sm items-center space-x-2 text-red-400 hover:text-white">
                                <img src="{{ asset('donor-files/' . $donor->profile_img) }}" alt="Profile"
                                    class="w-9 h-9 p-1 rounded-full border-2
                                    @if ($donor->status === 'pending') border-amber-400
                                    @elseif ($donor->status === 'rejected') border-red-500
                                    @elseif ($donor->status === 'approved') border-green-400
                                    @else border-ice-400 @endif">
                                <span>{{ $donor->user->name }}</span>
                                <i class="fas fa-chevron-down text-xs transition transform group-hover:rotate-180"></i>
                            </button>

                            {{-- Dropdown Menu --}}
                            <div
                                class="absolute right-0 mt-2 w-56 bg-[#262626] rounded-lg shadow-xl border border-[#404040] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <div class="px-4 py-3 border-b border-[#404040]">
                                    <p class="text-xs">Blood Type:
                                        <span class="font-bold text-[#e11d48]">{{ $donor->blood_type }}</span>
                                    </p>
                                    @if ($donor->status === 'approved')
                                        <p class="text-xs mt-1">Next eligible:
                                            <span
                                                class="font-bold {{ $donor->cooldown_until > now() ? 'text-red-400' : 'text-green-400' }}">
                                                {{ $donor->cooldown_until > now() ? 'Not Ready' : 'Ready' }}
                                            </span>
                                        </p>
                                    @endif
                                </div>

                                {{-- Profile Link with Status --}}
                                <a href="#"
                                    class="px-4 py-3 hover:bg-[#404040] transition border-b flex items-center justify-between">
                                    <div><i class="fas fa-user mr-2"></i> Profile</div>
                                    @switch($donor->status)
                                        @case('pending')
                                            <span
                                                class="text-xs bg-amber-500/20 text-amber-400 px-2 py-1 rounded-full flex items-center">
                                                <i class="fas fa-clock mr-1"></i> Pending
                                            </span>
                                        @break

                                        @case('rejected')
                                            <span
                                                class="text-xs bg-red-500/20 text-red-400 px-2 py-1 rounded-full flex items-center">
                                                <i class="fas fa-times-circle mr-1"></i> Rejected
                                            </span>
                                        @break

                                        @case('approved')
                                            <span
                                                class="text-xs bg-green-500/20 text-green-400 px-2 py-1 rounded-full flex items-center">
                                                <i class="fas fa-check-circle mr-1"></i> Approved
                                            </span>
                                        @break
                                    @endswitch
                                </a>

                                {{-- History --}}
                                @if ($donor->status === 'approved')
                                    <a href="#" class="block px-4 py-3 hover:bg-[#404040] transition border-b">
                                        <i class="fas fa-history mr-2"></i> History
                                    </a>
                                @endif

                                {{-- Logout --}}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                                <a href="#" class="block px-4 py-3 hover:bg-[#404040] transition"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </a>
                            </div>
                        </div>

                    </div>
                @else
                    {{-- Not Logged In --}}
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-end md:ml-6 space-x-3">
                            <a href="{{ route('login') }}"
                                class="bg-gray-800 hover:bg-red-900 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300 border border-red-800">
                                Log In
                            </a>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </nav>
    {{ $slot }}

    <footer style="background-color: #0f172a; border-top: 1px solid #1e293b;" class="py-12">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex flex-row justify-around mb-8">
                <div class="flex-1">
                    <h3 class="text-lg font-bold mb-4 flex items-center">
                        <div style="width:1.5rem; height:1.5rem; border-radius:0.375rem; background: linear-gradient(to bottom right, #d32f2f, #ec4899);"
                            class="flex items-center justify-center mr-2">
                            <i class="fas fa-tint" style="color: white; font-size: 0.75rem;"></i>
                        </div>
                        VitalLink
                    </h3>
                    <p style="color: #9ca3af;" class="text-sm">Connecting blood donors with those in need since 2018.
                    </p>
                </div>
                <div class="flex-1">
                    <h3 class="text-lg font-bold mb-4">Connect</h3>
                    <div class="flex gap-4 mb-4">
                        <a href="#" style="background-color: #1e293b;"
                            class="w-8 h-8 rounded-full flex items-center justify-center transition"
                            onmouseover="this.style.backgroundColor='#d32f2f'"
                            onmouseout="this.style.backgroundColor='#1e293b'">
                            <i class="fab fa-facebook-f" style="color: white;"></i>
                        </a>
                        <a href="#" style="background-color: #1e293b;"
                            class="w-8 h-8 rounded-full flex items-center justify-center transition"
                            onmouseover="this.style.backgroundColor='#d32f2f'"
                            onmouseout="this.style.backgroundColor='#1e293b'">
                            <i class="fab fa-twitter" style="color: white;"></i>
                        </a>
                        <a href="#" style="background-color: #1e293b;"
                            class="w-8 h-8 rounded-full flex items-center justify-center transition"
                            onmouseover="this.style.backgroundColor='#d32f2f'"
                            onmouseout="this.style.backgroundColor='#1e293b'">
                            <i class="fab fa-instagram" style="color: white;"></i>
                        </a>
                        <a href="#" style="background-color: #1e293b;"
                            class="w-8 h-8 rounded-full flex items-center justify-center transition"
                            onmouseover="this.style.backgroundColor='#d32f2f'"
                            onmouseout="this.style.backgroundColor='#1e293b'">
                            <i class="fab fa-youtube" style="color: white;"></i>
                        </a>
                    </div>
                    <p style="color: #9ca3af;" class="text-sm">support@VitalLink.org</p>
                    <p style="color: #9ca3af;" class="text-sm">+95 9 757 500 076</p>
                </div>
            </div>

            <div style="border-top: 1px solid #1e293b; color: #6b7280;" class="pt-8 text-center text-sm">
                &copy; 2025 VitalLink. All rights reserved. |
                <a href="#" class="transition" onmouseover="this.style.color='#38bdf8'"
                    onmouseout="this.style.color='#6b7280'">Privacy Policy</a> |
                <a href="#" class="transition" onmouseover="this.style.color='#38bdf8'"
                    onmouseout="this.style.color='#6b7280'">Terms of Service</a>
            </div>
        </div>
    </footer>
</body>

</html>
