<header class="flex items-center bg-gray-900 shadow-lg p-2">
    <!-- Notification and Profile Section -->
    <div class="flex-grow"></div>
    <div class="flex items-center space-x-6 mr-5">
        <!-- Notification Icon -->
        <div x-data="{
            open: false,
            notifications: [{
                    id: 1,
                    name: 'Dr. Marcus Wright',
                    email: 'm.wright@neonmed.org',
                    hospital: 'Neon Medical Center',
                    ward: 'Neuro Ward 7X',
                    position: 'Lead Neuro Operator',
                    requestTime: 'Today, 22:47',
                    avatar: 'MW'
                },
                {
                    id: 2,
                    name: 'Dr. Elena Kurosawa',
                    email: 'e.kurosawa@neonmed.org',
                    hospital: 'Neon Surgical Unit',
                    ward: 'OR 5 - Robotics',
                    position: 'Senior Surgical Operator',
                    requestTime: 'Today, 20:15',
                    avatar: 'EK'
                }
            ],
            unreadCount: 2,
            togglePane() {
                this.open = !this.open;
                if (this.open) this.unreadCount = 0;
            }
        }" class="relative inline-block">
            <!-- Notification Bell -->
            <button @click="togglePane()"
                class="relative p-2 text-gray-300 hover:text-cyan-400 focus:outline-none transition-colors duration-200 group">
                <div class="text-xl transform group-hover:scale-110 transition-transform">
                    <i class="fa-solid fa-bell"></i>
                </div>
                <span x-show="unreadCount > 0" x-text="unreadCount"
                    class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-black bg-cyan-400 rounded-full transform translate-x-1/2 -translate-y-1/2 ring-2 ring-gray-900">
                </span>
            </button>

            <x-superadmin-noti />
        </div>
        <!-- Profile Information -->
        <a href="/profile" class="flex items-center gap-3 px-4 py-3 hover:bg-gray-700/50 transition-all group   ">
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
        </a>
    </div>
</header>
