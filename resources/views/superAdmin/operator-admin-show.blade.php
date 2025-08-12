<x-layout title="sp">
    <div class="flex w-full h-screen text-black overflow-hidden">
        <!-- Sidebar (fixed height, scroll-independent) -->
        <aside
            class="w-[15%] bg-gradient-to-b from-gray-900 to-gray-800 border-r border-gray-700 flex flex-col justify-between">
            <div>
                <div class="text-center mb-8">
                    <img src="/images/logo.png" alt="RedLink Logo"
                        class="w-[100px] h-[100px] object-contain rounded-lg mx-auto">
                    <h2
                        class="text-xl mt-2 font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">
                        Vital Link</h2>
                </div>

                <nav aria-label="Main navigation" class="flex flex-col gap-2">
                    <a href="/profile">
                        <div class="flex items-center justify-center h-full w-full">
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-300 hover:text-cyan-400 transition-colors">
                                    name
                                </p>
                                <p class="text-xs text-gray-500 hover:text-gray-400 transition-colors">
                                    role
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('sp') }}"
                        class="no-underline text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 hover:bg-gray-700/50 hover:text-cyan-400 transition-all group border-l-4 {{ request()->routeIs('sp') ? 'border-cyan-400 bg-gray-700/50 text-cyan-400' : 'border-transparent' }}">
                        <i
                            class="fa-solid fa-house text-gray-400 {{ request()->routeIs('sp') ? 'text-cyan-400' : 'group-hover:text-cyan-400' }} text-base transition-colors"></i>
                        <span class="group-hover:translate-x-1 transition-transform">Dashboard</span>
                    </a>

                    <a href="{{ route('blog') }}"
                        class="no-underline text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 hover:bg-gray-700/50 hover:text-cyan-400 transition-all group border-l-4 {{ request()->routeIs('blog') ? 'border-cyan-400 bg-gray-700/50 text-cyan-400' : 'border-transparent' }}">

                        <i
                            class="fa-solid fa-blog text-gray-400 {{ request()->routeIs('sp') ? 'text-cyan-400' : 'group-hover:text-cyan-400' }} text-base transition-colors"></i>
                        <span class="group-hover:translate-x-1 transition-transform">Blog Board</span>
                    </a>
                    <a href="{{ route('show') }}"
                        class="no-underline text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 hover:bg-gray-700/50 hover:text-cyan-400 transition-all group border-l-4 {{ request()->routeIs('show') ? 'border-cyan-400 bg-gray-700/50 text-cyan-400' : 'border-transparent' }}">
                        <i
                            class="fa-solid fa-square-poll-horizontal text-gray-400 {{ request()->routeIs('show') ? 'text-cyan-400' : 'group-hover:text-cyan-400' }} text-base transition-colors"></i>
                        <span class="group-hover:translate-x-1 transition-transform">User Management</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="no-underline text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 hover:bg-gray-700/50 hover:text-rose-500 transition-all group border-l-4 border-transparent hover:border-rose-500 mt-4 w-full text-left">
                            <i
                                class="fa-solid fa-arrow-right-from-bracket text-gray-400 group-hover:text-rose-500 text-base transition-colors"></i>
                            <span class="group-hover:translate-x-1 transition-transform">Logout</span>
                        </button>
                    </form>
                </nav>
            </div>


            <footer class="text-sm text-center text-gray-400 border-t border-gray-700 pt-5 mt-5">
                <p>Role: <strong
                        class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">role</strong>
                </p>
                <p class="text-xs mt-1 text-gray-500">v1.0.1</p>
            </footer>
        </aside>
        <!-- Main Content -->
        <div class="flex flex-col w-[85%] ">
            <!-- Dark Theme Header -->
            <header class="flex items-center justify-between bg-gray-900 shadow-lg p-4">
                <!-- Back to Home Button -->
                <div class="flex items-center">
                    <a href="/"
                        class="flex items-center text-gray-300 hover:text-blue-400 transition-colors duration-200">
                        <i class="fa-solid fa-home mr-3 hover:scale-110 transition-transform"></i>
                        <span class="hover:drop-shadow-[0_0_8px_rgba(96,165,250,0.6)]">Home</span>
                    </a>
                </div>

                <!-- Notification and Profile Section -->
                <div class="flex items-center space-x-4">
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
                    <div class="flex items-center space-x-3 group cursor-pointer">
                        <div class="relative h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 p-0.5">
                            <div class="h-full w-full rounded-full bg-gray-800 overflow-hidden border border-gray-700">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile"
                                    class="h-full w-full object-cover">
                            </div>
                        </div>
                        <div class="text-right hidden md:block">
                            <p class="font-medium text-white group-hover:text-blue-400 transition-colors">John Doe</p>
                            <p class="text-xs text-gray-400 group-hover:text-blue-300 transition-colors">Administrator
                            </p>
                        </div>

                    </div>
                </div>
            </header>
            <div class="h-full bg-gray-900 p-6 font-sans text-gray-100 overflow-y-auto scrollbar-none">
                <!-- Header -->
                <div class="flex justify-between items-center mb-6 text-cyan-400">

                    <h1 class="text-2xl font-bold">
                        <i class="fa-solid fa-user-tie mr-2"></i>
                        User Management
                    </h1>
                </div>

                <!-- Users Table -->
                <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden mb-8">
                    <div class="p-4 border-b border-gray-700 flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-200 flex items-center gap-2">
                            <i class="fa-solid fa-users-gear text-blue-400"></i>
                            <span>All Users</span>
                        </h3>

                    </div>

                    <div class="overflow-y-auto max-h-[500px] relative scrollbar-none">
                        <table class="w-full ">
                            <thead class="bg-gray-800 sticky top-0 z-10"> <!-- Added z-10 here -->
                                <tr class="border-b border-gray-700">
                                    <th class="py-3 px-4 text-left text-gray-300 font-semibold">User</th>
                                    <th class="py-3 px-4 text-left text-gray-300 font-semibold">Role</th>
                                    <th class="py-3 px-4 text-center text-gray-300 font-semibold">Status</th>
                                    <th class="py-3 px-4 text-center text-gray-300 font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                <!-- Blood Bank Admin -->
                                <tr class="hover:bg-gray-700/50 transition-colors group">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="relative">
                                                <div
                                                    class="w-9 h-9 rounded-full bg-blue-900/20 border-2 border-blue-800 flex items-center justify-center group-hover:border-blue-400 transition-colors">
                                                    <i class="fa-solid fa-user-shield text-blue-400"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="group-hover:text-blue-400 transition-colors">Dr. Sarah Johnson
                                                </p>
                                                <p class="text-xs text-gray-400">sarah.johnson@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 bg-blue-900/20 text-blue-400 rounded-full text-xs">Blood Bank Admin</span>
                                    </td>

                                    <td class="py-3 px-4 text-center">
                                        <span
                                            class="px-2 py-1 bg-green-900/20 text-green-400 rounded-full text-xs">Active</span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex justify-center gap-3">
                                            <button class="text-amber-400 hover:text-amber-300 transition-colors"
                                                title="Permissions">
                                                <i class="fa-solid fa-ban"></i>
                                            </button>
                                            <button class="text-red-400 hover:text-red-300 transition-colors"
                                                title="Delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Ward Operator -->
                                @for ($i = 0; $i <= 100; $i++)
                                    <tr class="hover:bg-gray-700/50 transition-colors group">
                                        <td class="py-3 px-4">
                                            <div class="flex items-center gap-3">
                                                <div class="relative">
                                                    <div
                                                        class="w-9 h-9 rounded-full bg-purple-900/20 border-2 border-purple-800 flex items-center justify-center group-hover:border-purple-400 transition-colors">
                                                        <i class="fa-solid fa-user-nurse text-purple-400"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="group-hover:text-purple-400 transition-colors">Maria
                                                        Rodriguez</p>
                                                    <p class="text-xs text-gray-400">maria.r@example.com</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4">
                                            <span
                                                class="px-2 py-1 bg-purple-900/20 text-purple-400 rounded-full text-xs">Ward
                                                Operator</span>
                                        </td>

                                        <td class="py-3 px-4 text-center">
                                            <span
                                                class="px-2 py-1 bg-green-900/20 text-green-400 rounded-full text-xs">Active</span>
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            <div class="flex justify-center gap-3">
                                                <button class="text-amber-400 hover:text-amber-300 transition-colors"
                                                    title="Permissions">
                                                    <i class="fa-solid fa-ban"></i>
                                                </button>
                                                <button class="text-red-400 hover:text-red-300 transition-colors"
                                                    title="Delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endfor
                                <!-- Inactive Admin -->
                                <tr class="hover:bg-gray-700/50 transition-colors group">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="relative">
                                                <div
                                                    class="w-9 h-9 rounded-full bg-gray-700 border-2 border-gray-600 flex items-center justify-center group-hover:border-gray-400 transition-colors">
                                                    <span class="text-gray-300 font-medium">TJ</span>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="group-hover:text-gray-300 transition-colors">Thomas Jefferson
                                                </p>
                                                <p class="text-xs text-gray-500">t.jefferson@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="px-2 py-1 bg-gray-700 text-gray-400 rounded-full text-xs">Blood
                                            Bank
                                            Admin</span>
                                    </td>

                                    <td class="py-3 px-4 text-center">
                                        <span
                                            class="px-2 py-1 bg-gray-700 text-gray-400 rounded-full text-xs">Inactive</span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex justify-center gap-3">
                                            <button class="text-blue-400 hover:text-blue-300 transition-colors"
                                                title="Reactivate">
                                                <i class="fa-solid fa-rotate-right"></i>
                                            </button>
                                            <button class="text-red-400 hover:text-red-300 transition-colors"
                                                title="Delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>
