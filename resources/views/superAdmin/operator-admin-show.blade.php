<x-admin-layout title="SuperAdmin Dashboard">

            
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
   
</x-admin-layout>
