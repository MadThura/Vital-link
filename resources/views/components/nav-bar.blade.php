@props(['donor' => null])
<nav class="fixed w-full top-0 left-0 z-50 backdrop-blur-lg bg-white/80 dark:bg-[#0a0a0a]/50 shadow-sm dark:shadow-gray-800/20">
    <div class="">
        <div class="flex items-center justify-between h-16 pl-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <i class="fas fa-heartbeat text-red-500 text-2xl mr-2"></i>
                    <span class="text-2xl font-bold bg-gradient-to-r from-red-500 to-blue-500 bg-clip-text text-transparent">VitalLink</span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-4 gap-3">
                        <a href="/" class="text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300 rounded-md text-sm font-medium">Welcome</a>
                        <a href="#" class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-md text-sm font-medium">About</a>
                        <button class="text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white rounded-md text-sm font-medium">
                            Contact
                        </button>
                        <x-theme-toggle />
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
                        <button id="openNotificationBtn" class="relative p-3 rounded-full transition-all duration-300 ease-out group  hover:bg-gray-200/70 dark:hover:bg-gray-700/70  hover:shadow-lg dark:shadow-gray-800/30">
                            <i class="fa-solid fa-bell text-gray-700 group-hover:text-gray-900 dark:text-gray-300 dark:group-hover:text-white transition-all duration-300 text-lg"></i>

                            <span id="notificationCount" style="display: none;" class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-medium text-white bg-gradient-to-br from-red-400 to-red-500 rounded-full transform translate-x-1 -translate-y-1">
                            </span>

                            <span class="absolute inset-0 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-gradient-to-br from-indigo-100/20 to-blue-200/20 dark:from-indigo-500/10 dark:to-blue-400/10"></span>
                        </button>
                        <div id="notification-box" class="relative"></div>
                    @endif

                    {{-- Donor Home Link --}}
                    @if ($donor?->status === 'approved')
                        <a href="{{ route('home') }}" class="text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300 rounded-md text-sm font-medium">
                            Donor Home
                            <i class="ml-2 fa-solid fa-home text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300"></i>
                        </a>
                    @elseif ($donor?->status === 'rejected')
                        <a href="{{ route('donor.complete') }}" class="inline-flex items-center text-xs bg-red-200 hover:bg-red-300 dark:bg-red-800/30 dark:hover:bg-red-700/40 text-red-800 dark:text-red-200 px-3 py-1.5 rounded-full transition">
                            <i class="fas fa-redo mr-1.5"></i> Edit and Resubmit
                        </a>
                    @endif

                    @if ($user->role === 'blood_bank_admin')
                        <a href="{{ route('bba.dashboard') }}" class="text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300 rounded-md text-sm font-medium">
                            Dashboard
                            <i class="ml-2 fa-solid fa-square-poll-horizontal text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300"></i>
                        </a>
                    @elseif($user->role === 'super_admin')
                        <a href="{{ route('superAdmin.dashboard') }}" class="text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300 rounded-md text-sm font-medium">
                            Dashboard
                            <i class="ml-2 fa-solid fa-square-poll-horizontal text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300"></i>
                        </a>
                    @endif

                    {{-- Profile Dropdown --}}
                    <div class="group relative">
                        <button class="px-4 py-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition flex text-sm items-center space-x-2 text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">
                            @php
                                $borderColor = match ($donor?->status) {
                                    'resubmitted' => 'border-amber-600 dark:border-amber-500',
                                    'pending' => 'border-amber-400 dark:border-amber-300',
                                    'rejected' => 'border-red-500 dark:border-red-400',
                                    'approved' => 'border-green-400 dark:border-green-300',
                                    default => 'border-gray-400 dark:border-gray-500',
                                };
                            @endphp
                            @isset($donor)
                                <img src="{{ asset('donor-files/' . $donor?->profile_img) }}" alt="Profile"
                                    class="w-9 h-9 p-1 rounded-full border-2 {{ $borderColor }}">
                                <span>{{ $donor?->user->name }}</span>
                            @else
                                <div class="w-9 h-9 rounded-full bg-gray-100 group-hover:bg-gray-200 dark:bg-gray-800 dark:group-hover:bg-gray-700 border border-gray-300 dark:border-gray-600 flex items-center justify-center shadow-sm mr-3">
                                    @if (auth()->user()->role === 'super_admin')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 fill-indigo-400 group-hover:fill-indigo-600 dark:fill-indigo-500 dark:group-hover:fill-indigo-400">
                                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 fill-rose-500 group-hover:fill-rose-600 dark:fill-rose-400 dark:group-hover:fill-rose-300">
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
                        <div class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-300 dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            @isset($donor)
                                <div class="px-4 py-3 border-b border-gray-300 dark:border-gray-700">
                                    <p class="text-xs dark:text-gray-300">Blood Type:
                                        <span class="font-bold text-red-600 dark:text-red-400">{{ $donor?->blood_type }}</span>
                                    </p>
                                    @if ($donor?->status === 'approved')
                                        <p class="text-xs mt-1 dark:text-gray-300">Next eligible:
                                            <span class="font-bold {{ $donor?->cooldown_until > now() ? 'text-red-400 dark:text-red-300' : 'text-green-600 dark:text-green-400' }}">
                                                {{ $donor?->cooldown_until > now() ? 'Not Ready' : 'Ready' }}
                                            </span>
                                        </p>
                                    @endif
                                </div>
                                {{-- Profile Link with Status --}}
                                <a href="#" class="px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 transition border-b border-gray-300 dark:border-gray-700 flex items-center justify-between">
                                    <div class="dark:text-gray-300">
                                        <i class="fas {{ request()->routeIs('home', 'blogs.show', 'blog-show') ? 'fa-user' : 'fa-s' }} mr-2"></i>
                                        {{ request()->routeIs('home', 'blogs.show', 'blog-show') ? 'Profile' : 'Status' }}
                                    </div>
                                    @switch($donor?->status)
                                        @case('pending')
                                            <span class="text-xs bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-300 px-2 py-1 rounded-full flex items-center">
                                                <i class="fas fa-clock mr-1"></i> Pending
                                            </span>
                                        @break

                                        @case('rejected')
                                            <span class="text-xs bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-300 px-2 py-1 rounded-full flex items-center">
                                                <i class="fas fa-times-circle mr-1"></i> Rejected
                                            </span>
                                        @break

                                        @case('approved')
                                            <span class="text-xs bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-300 px-2 py-1 rounded-full flex items-center">
                                                <i class="fas fa-check-circle mr-1"></i> Approved
                                            </span>
                                        @break

                                        @case('resubmitted')
                                            <span class="text-xs bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-300 px-2 py-1 rounded-full flex items-center">
                                                <i class="fas fa-clock mr-1"></i> Resubmitted
                                            </span>
                                        @break
                                    @endswitch
                                </a>

                                {{-- History --}}
                                @if ($donor?->status === 'approved' && request()->routeIs('home', 'blogs.show', 'blog-show'))
                                    <a href="#" class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 transition border-b border-gray-300 dark:border-gray-700 dark:text-gray-300">
                                        <i class="fas fa-history mr-2"></i> History
                                    </a>
                                @endif
                            @endisset

                            {{-- Logout --}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                            <a href="#" class="block px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700 transition dark:text-gray-300"
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
                        <a href="{{ route('login') }}" class="bg-white hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 text-red-600 dark:text-red-400 px-4 py-2 rounded-md text-sm font-medium transition duration-300 border border-red-400 dark:border-red-500">
                            Log In
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>