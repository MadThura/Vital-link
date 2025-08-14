<nav class="fixed w-full top-0 left-0 z-50 backdrop-blur-lg bg-[#0a0a0a]/10">
    <div class="">
        <div class="flex items-center justify-between h-16 pl-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <i class="fas fa-heartbeat text-red-500 text-2xl mr-2"></i>
                    <span
                        class="text-2xl font-bold bg-gradient-to-r from-red-500 to-blue-500 bg-clip-text text-transparent">VitalLink</span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-4 gap-3">
                        <a href="/"
                            class="text-red-400 hover:text-red-300 rounded-md text-sm font-medium">Welcome</a>
                        <a href="#"
                            class="text-gray-300 hover:text-white rounded-md text-sm font-medium">About</a>
                        <button class="text-gray-300 hover:text-white rounded-md text-sm font-medium">
                            Contact
                        </button>

                    </div>
                </div>
            </div>
            @auth
                @php
                    $donor = auth()->user()->donor;
                    $user = auth()->user();
                @endphp
                <div class="flex items-center gap-5">
                    @if ($donor?->status === 'approved' || $user->role === 'blood_bank_admin')
                        <button id="openNotificationBtn"
                            class="relative p-2.5 rounded-full hover:bg-gray-800 transition-all duration-200 ease-in-out group bg-gray-900/20">
                            <!-- Bell Icon -->
                            <i
                                class="fa-solid fa-bell text-gray-300 group-hover:text-white transition-colors duration-200"></i>
                            <!-- Notification Badge -->
                            <span id="notificationCount"
                                class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-red-500 rounded-full transform translate-x-1/2 -translate-y-1/2 group-hover:bg-red-400 transition-colors duration-200 shadow-[0_0_0_1px_rgba(17,24,39,1)]">
                            </span>
                        </button>
                        <div id="notification-box" class="relative"></div>
                    @endif
                    {{-- Donor Home Link --}}
                    @if ($user->role === 'donor')
                        @if ($donor?->status === 'approved')
                            <a href="{{ route('home') }}"
                                class="text-red-400 hover:text-red-300 rounded-md text-sm font-medium">
                                Donor Home
                                <i class="ml-2 fa-solid fa-home text-red-400 hover:text-red-300"></i>
                            </a>
                        @elseif ($donor?->status === 'rejected')
                            <a href="{{ route('donor.complete') }}"
                                class="inline-flex items-center text-xs bg-[#e11d48] hover:bg-[#bf1a3e] text-white px-3 py-1.5 rounded-full transition">
                                <i class="fas fa-redo mr-1.5"></i> Edit and Resubmit
                            </a>
                        @endif
                    @elseif($user->role === 'blood_bank_admin')
                        <a href="{{ route('dashboard') }}"
                            class="text-red-400 hover:text-red-300 rounded-md text-sm font-medium">
                            Dashboard
                            <i class="ml-2 fa-solid fa-square-poll-horizontal text-red-400 hover:text-red-300"></i>
                        </a>
                    @elseif($user->role === 'super_admin')
                        <a href="{{ route('super-admin') }}"
                            class="text-red-400 hover:text-red-300 rounded-md text-sm font-medium">
                            Dashboard
                            <i class="ml-2 fa-solid fa-square-poll-horizontal text-red-400 hover:text-red-300"></i>
                        </a>
                    @endif
                    {{-- Profile Dropdown --}}
                    <div class="group relative">
                        <button
                            class="px-4 py-2 rounded-lg hover:bg-[#262626] transition flex text-sm items-center space-x-2 text-red-400 hover:text-white">
                            @php
                                $borderColor = match ($donor?->status) {
                                    'resubmitted' => 'border-amber-600',
                                    'pending' => 'border-amber-400',
                                    'rejected' => 'border-red-500',
                                    'approved' => 'border-green-400',
                                    default => 'border-ice-400',
                                };
                            @endphp
                            @isset($donor)
                                <img src="{{ asset('donor-files/' . $donor?->profile_img) }}" alt="Profile"
                                    class="w-9 h-9 p-1 rounded-full border-2 {{ $borderColor }}">
                                <span>{{ $donor?->user->name }}</span>
                            @else
                                <div
                                    class="w-9 h-9 rounded-full bg-gray-800 group-hover:bg-gray-700 border border-gray-700 group-hover:border-indigo-400 transition-all flex items-center justify-center shadow-[0_1px_2px_rgba(255,255,255,0.05)] mr-3">
                                    @if (auth()->user()->role === 'super_admin')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 fill-indigo-400 group-hover:fill-indigo-300">
                                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 fill-rose-500 group-hover:fill-rose-400">
                                            <path
                                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                        </svg>
                                    @endif
                                </div>
                                {{ $user->name }}
                            @endisset
                            <i class="fas fa-chevron-down text-xs transition transform group-hover:rotate-180"></i>
                        </button>

                        {{-- Dropdown Menu --}}
                        <div
                            class="absolute right-0 mt-2 w-56 bg-[#262626] rounded-lg shadow-xl border border-[#404040] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            @isset($donor)
                                <div class="px-4 py-3 border-b border-[#404040]">
                                    <p class="text-xs">Blood Type:
                                        <span class="font-bold text-[#e11d48]">{{ $donor?->blood_type }}</span>
                                    </p>
                                    @if ($donor?->status === 'approved')
                                        <p class="text-xs mt-1">Next eligible:
                                            <span
                                                class="font-bold {{ $donor?->cooldown_until > now() ? 'text-red-400' : 'text-green-400' }}">
                                                {{ $donor?->cooldown_until > now() ? 'Not Ready' : 'Ready' }}
                                            </span>
                                        </p>
                                    @endif
                                </div>
                                {{-- Profile Link with Status --}}
                                <a href="#"
                                    class="px-4 py-3 hover:bg-[#404040] transition border-b flex items-center justify-between">
                                    <div>
                                        <i class="fas {{ request()->routeIs('home') ? 'fa-user' : 'fa-s' }} mr-2"></i>
                                        {{ request()->routeIs('home') ? 'Profile' : 'Status' }}
                                    </div>
                                    @switch($donor?->status)
                                        @case('pending')
                                            <span
                                                class="text-xs bg-amber-500/20 text-amber-400 px-2 py-1 rounded-full flex items-center">
                                                <i class="fas fa-clock mr-1"></i> Pending
                                            </span>
                                        @break

                                        @case('rejected')
                                            <span class="text-xs bg-red-500/20 text-red-400 px-2 py-1 rounded-full flex items-center">
                                                <i class="fas fa-times-circle mr-1"></i> Rejected
                                            </span>
                                        @break

                                        @case('approved')
                                            <span
                                                class="text-xs bg-green-500/20 text-green-400 px-2 py-1 rounded-full flex items-center">
                                                <i class="fas fa-check-circle mr-1"></i> Approved
                                            </span>
                                        @break

                                        @case('resubmitted')
                                            <span
                                                class="text-xs bg-amber-500/20 text-amber-600 px-2 py-1 rounded-full flex items-center">
                                                <i class="fas fa-clock mr-1"></i> Resubmitted
                                            </span>
                                        @break
                                    @endswitch
                                </a>

                                {{-- History --}}
                                @if ($donor?->status === 'approved' && request()->routeIs('home'))
                                    <a href="#" class="block px-4 py-3 hover:bg-[#404040] transition border-b">
                                        <i class="fas fa-history mr-2"></i> History
                                    </a>
                                @endif
                            @endisset



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
                    <div class="mr-4 flex items-end md:ml-6 space-x-3">
                        <a href="{{ route('login') }}"
                            class="bg-gray-800 hover:bg-red-900 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300 border border-red-800">
                            Log In
                        </a>
                    </div>
                </div>
            @endauth

        </div>
    </div>
</nav>
