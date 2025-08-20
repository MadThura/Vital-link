<header class="flex items-center bg-gray-900 shadow-lg py-2">
    <!-- Notification and Profile Section -->
    <div class="flex-grow"></div>
    <div class="flex items-center space-x-6 mr-5">
        <form method="GET" action="{{ route('bba.profile') }}">
            @csrf
            <button type="submit">
                <div
                    class="flex items-center gap-3 px-4 py-3 hover:bg-gray-700/50 transition-all group   ">
                    <!-- Shield Icon (Authority) -->
                    <div
                        class="w-9 h-9 rounded-full bg-gray-800 group-hover:bg-gray-700 border border-gray-700 group-hover:border-indigo-400 transition-all flex items-center justify-center shadow-[0_1px_2px_rgba(255,255,255,0.05)]">
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
                    <div>
                        <p class="text-sm font-medium text-gray-300 group-hover:text-cyan-400 transition-colors">
                            {{ auth()->user()->name }}
                        </p>
                        <p class="text-xs text-gray-500 group-hover:text-gray-400 transition-colors">
                            {{ auth()->user()->role }}
                        </p>
                    </div>
                </div>
            </button>
        </form>
    </div>
</header>
