<x-admin-layout>
    <div class="overflow-auto scrollbar-hide bg-gray-900 text-gray-100">
        <div class="flex">
            <!-- Main Panel -->
            <main class="flex-1 p-6">
                <div class="sticky top-0 z-20 bg-gray-900 flex justify-between items-center mb-8 p-3">
                    <div class="flex items-center gap-5">
                        <div
                            class="w-9 h-9 rounded-full bg-gray-800 group-hover:bg-gray-700 border border-gray-700 group-hover:border-indigo-400 transition-all flex items-center justify-center shadow-[0_1px_2px_rgba(255,255,255,0.05)]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="w-5 h-5 fill-indigo-400 group-hover:fill-indigo-300">
                                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" />
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold flex items-center">{{ $user->name }}</h1>
                    </div>
                </div>
                <!-- Profile Card -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Left Column -->
                    <div class="lg:col-span-1" x-data="{ showPasswordForm: false }">
                        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                            <div class="flex flex-col items-center">
                                <div class="relative mb-4">
                                    <div
                                        class="w-32 h-32 rounded-full bg-gray-700 flex items-center justify-center border-2 border-rose-500/50">
                                        <i class="fas fa-user-cog text-5xl text-rose-400"></i>
                                    </div>
                                    <button
                                        class="absolute bottom-0 right-0 bg-gray-700 p-2 rounded-full border border-gray-600 hover:bg-gray-600">
                                        <i class="fas fa-camera text-sm"></i>
                                    </button>
                                </div>
                                <h2 class="text-xl font-bold">{{ $user->name }}</h2>
                                <p class="text-rose-400 text-sm mt-1">{{ $user->role }}</p>
                            </div>

                            <div class="mt-6 space-y-4">
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-rose-400 mr-3"></i>
                                    <span>{{ $user->email }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-phone text-rose-400 mr-3"></i>
                                    <span>ph number</span>
                                </div>
                            </div>

                            <!-- 🔘 Button to show password form -->
                            <div class="mt-8">
                                <button @click="showPasswordForm = !showPasswordForm"
                                    class="w-full py-2 px-4 bg-rose-600 hover:bg-rose-700 text-white font-semibold rounded-lg shadow transition">
                                    <i class="fas fa-key mr-2"></i> Update Password
                                </button>
                            </div>

                            <!-- 🔑 Update Password Form (hidden until clicked) -->
                            <div x-show="showPasswordForm" x-transition class="mt-6 border-t border-gray-700 pt-6">
                                <h3 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                                    <i class="fas fa-lock text-rose-400"></i> Change Your Password
                                </h3>
                                <form method="POST" action="" class="space-y-3">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <input type="password" name="current_password" placeholder="Current Password"
                                            class="w-full px-3 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-rose-500 focus:ring focus:ring-rose-500/30">
                                    </div>
                                    <div>
                                        <input type="password" name="new_password" placeholder="New Password"
                                            class="w-full px-3 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-rose-500 focus:ring focus:ring-rose-500/30">
                                    </div>
                                    <div>
                                        <input type="password" name="new_password_confirmation"
                                            placeholder="Confirm New Password"
                                            class="w-full px-3 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-rose-500 focus:ring focus:ring-rose-500/30">
                                    </div>

                                    <div class="flex gap-2">
                                        <button type="submit"
                                            class="flex-1 py-2 px-4 bg-rose-600 hover:bg-rose-700 text-white font-semibold rounded-lg shadow">
                                            Save
                                        </button>
                                        <button type="button" @click="showPasswordForm = false"
                                            class="flex-1 py-2 px-4 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="lg:col-span-2">
                        <!-- Account Settings -->
                        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 ">
                            <h3 class="font-bold mb-4 flex items-center">
                                <i class="fas fa-cog text-rose-400 mr-2"></i> Account Settings
                            </h3>
                            <form class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-300 mb-1">First Name</label>
                                        <input type="text" value="Admin"
                                            class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-300 mb-1">Last Name</label>
                                        <input type="text" value="Master"
                                            class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                                    <input type="email" value="admin@bloodsystem.com"
                                        class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-1">Phone Number</label>
                                    <input type="tel" value="+1 (555) 123-4567"
                                        class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-1">Timezone</label>
                                    <select
                                        class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                                        <option>(UTC-05:00) Eastern Time</option>
                                        <option>(UTC-08:00) Pacific Time</option>
                                        <option>(UTC+00:00) London</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <!-- Admin Privileges -->
                        <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 mt-6">
                            <h3 class="font-bold mb-4 flex items-center">
                                <i class="fas fa-user-crown text-rose-400 mr-2"></i> Admin Privileges
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div
                                    class="bg-gray-700/50 p-4 rounded-lg border border-gray-600 hover:border-rose-500/50 transition">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-rose-600/20 rounded-lg mr-3">
                                            <i class="fas fa-user-plus text-rose-400"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium">Create Admins</h4>
                                            <p class="text-xs text-gray-400">Full privilege to create new admin
                                                accounts</p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-700/50 p-4 rounded-lg border border-gray-600 hover:border-rose-500/50 transition">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-rose-600/20 rounded-lg mr-3">
                                            <i class="fas fa-database text-rose-400"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium">Database Access</h4>
                                            <p class="text-xs text-gray-400">Direct access to system databases</p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-700/50 p-4 rounded-lg border border-gray-600 hover:border-rose-500/50 transition">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-rose-600/20 rounded-lg mr-3">
                                            <i class="fas fa-server text-rose-400"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium">Server Configuration</h4>
                                            <p class="text-xs text-gray-400">Manage server settings and configurations
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="bg-gray-700/50 p-4 rounded-lg border border-gray-600 hover:border-rose-500/50 transition">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-rose-600/20 rounded-lg mr-3">
                                            <i class="fas fa-ban text-rose-400"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-medium">Global Bans</h4>
                                            <p class="text-xs text-gray-400">Ban users/system-wide restrictions</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-admin-layout>
