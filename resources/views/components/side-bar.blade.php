<aside
    class="w-[16%] bg-gray-50 dark:bg-gray-900 flex flex-col justify-between border-r border-gray-300 dark:border-gray-800">
    <div>
        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="/">
                <img src="/images/logo.png" alt="RedLink Logo"
                    class="w-[100px] h-[100px] object-contain rounded-lg mx-auto">
                <h2
                    class="text-xl mt-2 font-bold bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">
                    Vital Link
                </h2>
            </a>
        </div>

        <!-- Navigation -->
        <nav aria-label="Main navigation" class="flex flex-col gap-2 mt-5">
            @auth
                @if (auth()->user()->role === 'blood_bank_admin')
                    <!-- Profile (Emerald) -->
                    <a href="{{ route('bba.profile') }}"
                        class="no-underline text-sm py-3 px-4 rounded-lg flex items-center gap-3 transition-all group border-l-4 {{ request()->routeIs('bba.profile') ? 'border-emerald-400 bg-gray-100 dark:bg-gray-700/50 text-emerald-400' : 'border-transparent text-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-emerald-400' }}">
                        <i
                            class="fa-solid fa-user-gear text-base transition-colors {{ request()->routeIs('bba.profile') ? 'text-emerald-400' : 'text-gray-600 dark:text-gray-400 group-hover:text-emerald-400' }}"></i>
                        <span
                            class="transition-transform {{ request()->routeIs('bba.profile') ? 'translate-x-1' : 'group-hover:translate-x-1' }}">
                            Profile
                        </span>
                    </a>

                    <!-- Dashboard (Cyan) -->
                    <a href="{{ route('bba.dashboard') }}"
                        class="no-underline text-sm py-3 px-4 rounded-lg flex items-center gap-3 transition-all group border-l-4 {{ request()->routeIs('bba.dashboard') ? 'border-cyan-400 bg-gray-100 dark:bg-gray-700/50 text-cyan-400' : 'border-transparent text-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-cyan-400' }}">
                        <i
                            class="fa-solid fa-house text-base transition-colors {{ request()->routeIs('bba.dashboard') ? 'text-cyan-400' : 'text-gray-600 dark:text-gray-400 group-hover:text-cyan-400' }}"></i>
                        <span
                            class="transition-transform {{ request()->routeIs('bba.dashboard') ? 'translate-x-1' : 'group-hover:translate-x-1' }}">
                            Dashboard
                        </span>
                    </a>

                    <!-- Donor Management (Purple) -->
                    <a href="{{ route('bba.donors.index') }}"
                        class="no-underline text-sm py-3 px-4 rounded-lg flex items-center gap-3 transition-all group border-l-4 {{ request()->routeIs('bba.donors.index') ? 'border-purple-400 bg-gray-100 dark:bg-gray-700/50 text-purple-400' : 'border-transparent text-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-purple-400' }}">
                        <i
                            class="fa-solid fa-user-check text-base transition-colors {{ request()->routeIs('bba.donors.index') ? 'text-purple-400' : 'text-gray-600 dark:text-gray-400 group-hover:text-purple-400' }}"></i>
                        <div class="flex items-center gap-4">
                            <span
                                class="transition-transform {{ request()->routeIs('bba.donors.index') ? 'translate-x-1' : 'group-hover:translate-x-1' }}">
                                Donor Management
                            </span>
                            @if ($newDonorsCount > 0)
                                <span class="ml-2 relative inline-flex items-center justify-center">
                                    <span
                                        class="absolute inline-flex w-full h-full rounded-full bg-purple-400 opacity-75 animate-ping"></span>
                                    <span
                                        class="relative bg-gradient-to-r from-purple-500 to-indigo-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-md">
                                        {{ $newDonorsCount }}
                                    </span>
                                </span>
                            @endif
                        </div>

                    </a>

                    <!-- Donation Requests (Rose) -->
                    <a href="{{ route('bba.donation-requests.index') }}"
                        class="no-underline text-sm py-3 px-4 rounded-lg flex items-center gap-3 transition-all group border-l-4 {{ request()->routeIs('bba.donation-requests.index') ? 'border-rose-400 bg-gray-100 dark:bg-gray-700/50 text-rose-400' : 'border-transparent text-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-rose-400' }}">
                        <i
                            class="fa-solid fa-file-medical text-base transition-colors {{ request()->routeIs('bba.donation-requests.index') ? 'text-rose-400' : 'text-gray-600 dark:text-gray-400 group-hover:text-rose-400' }}"></i>
                        <div class="flex items-center gap-8">
                            <span
                            class="transition-transform {{ request()->routeIs('bba.donation-requests.index') ? 'translate-x-1' : 'group-hover:translate-x-1' }}">
                            Donation Requests
                        </span>
                        @if ($newDonationRequestsCount > 0)
                            <span class="ml-2 relative inline-flex items-center justify-center">
                                <span
                                    class="absolute inline-flex w-full h-full rounded-full bg-rose-400 opacity-75 animate-ping"></span>
                                <span
                                    class="relative bg-gradient-to-r from-rose-500 to-pink-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-md">
                                    {{ $newDonationRequestsCount }}
                                </span>
                            </span>
                        @endif
                        </div>
                    </a>

                    <!-- Donation Records (Emerald) -->
                    <a href="{{ route('bba.donation-record') }}"
                        class="no-underline text-sm py-3 px-4 rounded-lg flex items-center gap-3 transition-all group border-l-4 {{ request()->routeIs('bba.donation-record') ? 'border-emerald-400 bg-gray-100 dark:bg-gray-700/50 text-emerald-400' : 'border-transparent text-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-emerald-400' }}">
                        <i
                            class="fa-solid fa-file-medical text-base transition-colors {{ request()->routeIs('bba.donation-record') ? 'text-emerald-400' : 'text-gray-600 dark:text-gray-400 group-hover:text-emerald-400' }}"></i>
                        <span
                            class="transition-transform {{ request()->routeIs('bba.donation-record') ? 'translate-x-1' : 'group-hover:translate-x-1' }}">
                            Donation Records
                        </span>
                    </a>

                    <!-- Blood Inventory (Amber) -->
                    <a href="{{ route('bba.blood-inventory') }}"
                        class="no-underline text-sm py-3 px-4 rounded-lg flex items-center gap-3 transition-all group border-l-4 {{ request()->routeIs('bba.blood-inventory') ? 'border-amber-400 bg-gray-100 dark:bg-gray-700/50 text-amber-400' : 'border-transparent text-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-amber-400' }}">
                        <i
                            class="fa-solid fa-file-export text-base transition-colors {{ request()->routeIs('bba.blood-inventory') ? 'text-amber-400' : 'text-gray-600 dark:text-gray-400 group-hover:text-amber-400' }}"></i>
                        <span
                            class="transition-transform {{ request()->routeIs('bba.blood-inventory') ? 'translate-x-1' : 'group-hover:translate-x-1' }}">
                            Blood Inventory
                        </span>
                    </a>
                @elseif(auth()->user()->role === 'super_admin')
                    <!-- Super Admin Links -->
                    <a href="{{ route('superAdmin.profile') }}"
                        class="no-underline text-sm py-3 px-4 rounded-lg flex items-center gap-3 transition-all group border-l-4 {{ request()->routeIs('superAdmin.profile') ? 'border-emerald-400 bg-gray-100 dark:bg-gray-700/50 text-emerald-400' : 'border-transparent text-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-emerald-400' }}">
                        <i
                            class="fa-solid fa-house text-base transition-colors {{ request()->routeIs('superAdmin.profile') ? 'text-emerald-400' : 'text-gray-600 dark:text-gray-400 group-hover:text-emerald-400' }}"></i>
                        <span
                            class="transition-transform {{ request()->routeIs('superAdmin.profile') ? 'translate-x-1' : 'group-hover:translate-x-1' }}">
                            Profile
                        </span>
                    </a>

                    <a href="{{ route('superAdmin.dashboard') }}"
                        class="no-underline text-sm py-3 px-4 rounded-lg flex items-center gap-3 transition-all group border-l-4 {{ request()->routeIs('superAdmin.dashboard') ? 'border-cyan-400 bg-gray-100 dark:bg-gray-700/50 text-cyan-400' : 'border-transparent text-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-cyan-400' }}">
                        <i
                            class="fa-solid fa-house text-base transition-colors {{ request()->routeIs('superAdmin.dashboard') ? 'text-cyan-400' : 'text-gray-600 dark:text-gray-400 group-hover:text-cyan-400' }}"></i>
                        <span
                            class="transition-transform {{ request()->routeIs('superAdmin.dashboard') ? 'translate-x-1' : 'group-hover:translate-x-1' }}">
                            Dashboard
                        </span>
                    </a>

                    <a href="{{ route('superAdmin.blog-board') }}"
                        class="no-underline text-sm py-3 px-4 rounded-lg flex items-center gap-3 transition-all group border-l-4 {{ request()->routeIs('superAdmin.blog-board') ? 'border-emerald-400 bg-gray-100 dark:bg-gray-700/50 text-emerald-400' : 'border-transparent text-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-emerald-400' }}">
                        <i
                            class="fa-solid fa-blog text-base transition-colors {{ request()->routeIs('superAdmin.blog-board') ? 'text-emerald-400' : 'text-gray-600 dark:text-gray-400 group-hover:text-emerald-400' }}"></i>
                        <span
                            class="transition-transform {{ request()->routeIs('superAdmin.blog-board') ? 'translate-x-1' : 'group-hover:translate-x-1' }}">
                            Blog Board
                        </span>
                    </a>

                    <a href="{{ route('superAdmin.user-management') }}"
                        class="no-underline text-sm py-3 px-4 rounded-lg flex items-center gap-3 transition-all group border-l-4 {{ request()->routeIs('superAdmin.user-management') ? 'border-amber-400 bg-gray-100 dark:bg-gray-700/50 text-amber-400' : 'border-transparent text-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-amber-400' }}">
                        <i
                            class="fa-solid fa-square-poll-horizontal text-base transition-colors {{ request()->routeIs('superAdmin.user-management') ? 'text-amber-400' : 'text-gray-600 dark:text-gray-400 group-hover:text-amber-400' }}"></i>
                        <span
                            class="transition-transform {{ request()->routeIs('superAdmin.user-management') ? 'translate-x-1' : 'group-hover:translate-x-1' }}">
                            User Management
                        </span>
                    </a>
                @endif
            @endauth

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="no-underline text-gray-800 dark:text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 
                               hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-rose-600 dark:hover:text-rose-500 transition-all group border-l-4 border-transparent mt-4 w-full text-left">
                    <i
                        class="fa-solid fa-arrow-right-from-bracket text-gray-600 dark:text-gray-400 group-hover:text-rose-500 dark:group-hover:text-rose-500 text-base transition-colors"></i>
                    <span class="group-hover:translate-x-1 transition-transform">Logout</span>
                </button>
            </form>
        </nav>
    </div>

    <!-- Footer -->
    <footer
        class="text-sm text-center text-gray-700 dark:text-gray-400 border-t border-gray-300 dark:border-gray-700 pt-5 mt-5">
        <p>Role: <strong
                class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">{{ auth()->user()->role }}</strong>
        </p>
        <p class="text-xs mt-1 text-gray-500">v1.0.1</p>
    </footer>
</aside>
