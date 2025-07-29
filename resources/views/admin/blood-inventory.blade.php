<x-admin-layout>
    <x-search-bar></x-search-bar>
    <div class="p-5 bg-gray-900 text-gray-100 min-h-screen overflow-auto scrollbar-none">
        <!-- Dashboard Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gray-800 p-6 rounded-xl border-l-4 border-red-600">
                <h3 class="text-gray-400 mb-2">Total Units</h3>
                <p class="text-3xl font-bold">1,248</p>
                <p class="text-green-400 text-sm mt-2">+12% from last month</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-xl border-l-4 border-yellow-500">
                <h3 class="text-gray-400 mb-2">Critical Levels</h3>
                <p class="text-3xl font-bold">4</p>
                <p class="text-yellow-400 text-sm mt-2">Needs attention</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-xl border-l-4 border-blue-500">
                <h3 class="text-gray-400 mb-2">Expiring Soon</h3>
                <p class="text-3xl font-bold">23</p>
                <p class="text-blue-400 text-sm mt-2">Within 7 days</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-xl border-l-4 border-purple-500">
                <h3 class="text-gray-400 mb-2">Recent Donations</h3>
                <p class="text-3xl font-bold">56</p>
                <p class="text-purple-400 text-sm mt-2">This week</p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Blood Type Inventory -->
            <div class="lg:w-2/3 bg-gray-800 rounded-xl p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Blood Type Inventory</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 bg-gray-700 hover:bg-gray-600 rounded-md text-sm">
                            Filter
                        </button>
                        <button class="px-3 py-1 bg-gray-700 hover:bg-gray-600 rounded-md text-sm">
                            Export
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left border-b border-gray-700 text-gray-400">
                                <th class="pb-3">Blood Type</th>
                                <th class="pb-3 text-right">Units</th>
                                <th class="pb-3 text-right">Status</th>
                                <th class="pb-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <tr>
                                <td class="py-4 font-medium">O+</td>
                                <td class="py-4 text-right">342</td>
                                <td class="py-4 text-right">
                                    <span class="px-2 py-1 bg-green-900/50 text-green-400 rounded-full text-xs">Safe</span>
                                </td>
                                <td class="py-4 text-right">
                                    <button class="text-red-600 hover:text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 font-medium">A-</td>
                                <td class="py-4 text-right">28</td>
                                <td class="py-4 text-right">
                                    <span class="px-2 py-1 bg-red-900/50 text-red-400 rounded-full text-xs">Critical</span>
                                </td>
                                <td class="py-4 text-right">
                                    <button class="text-red-600 hover:text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 font-medium">B+</td>
                                <td class="py-4 text-right">156</td>
                                <td class="py-4 text-right">
                                    <span class="px-2 py-1 bg-green-900/50 text-green-400 rounded-full text-xs">Safe</span>
                                </td>
                                <td class="py-4 text-right">
                                    <button class="text-red-600 hover:text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 font-medium">AB-</td>
                                <td class="py-4 text-right">15</td>
                                <td class="py-4 text-right">
                                    <span class="px-2 py-1 bg-yellow-900/50 text-yellow-400 rounded-full text-xs">Low</span>
                                </td>
                                <td class="py-4 text-right">
                                    <button class="text-red-600 hover:text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 font-medium">O-</td>
                                <td class="py-4 text-right">89</td>
                                <td class="py-4 text-right">
                                    <span class="px-2 py-1 bg-green-900/50 text-green-400 rounded-full text-xs">Safe</span>
                                </td>
                                <td class="py-4 text-right">
                                    <button class="text-red-600 hover:text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="lg:w-1/3 space-y-6">
                <!-- Expiring Soon -->
                <div class="bg-gray-800 rounded-xl p-6">
                    <h2 class="text-xl font-bold mb-4">Expiring Soon</h2>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-3 bg-gray-700/50 rounded-lg">
                            <div>
                                <p class="font-medium">O+</p>
                                <p class="text-sm text-gray-400">Expires in 2 days</p>
                            </div>
                            <span class="text-red-600">5 units</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-gray-700/50 rounded-lg">
                            <div>
                                <p class="font-medium">A+</p>
                                <p class="text-sm text-gray-400">Expires in 3 days</p>
                            </div>
                            <span class="text-red-600">3 units</span>
                        </div>
                        <div class="flex justify-between items-center p-3 bg-gray-700/50 rounded-lg">
                            <div>
                                <p class="font-medium">B-</p>
                                <p class="text-sm text-gray-400">Expires in 5 days</p>
                            </div>
                            <span class="text-red-600">2 units</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-gray-800 rounded-xl p-6">
                    <h2 class="text-xl font-bold mb-4">Quick Actions</h2>
                    <div class="grid grid-cols-2 gap-3">
                        <button class="p-3 bg-gray-700 hover:bg-gray-600 rounded-lg flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span class="mt-1 text-sm">New Donation</span>
                        </button>
                        <button class="p-3 bg-gray-700 hover:bg-gray-600 rounded-lg flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="mt-1 text-sm">Schedule</span>
                        </button>
                        <button class="p-3 bg-gray-700 hover:bg-gray-600 rounded-lg flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <span class="mt-1 text-sm">Reports</span>
                        </button>
                        <button class="p-3 bg-gray-700 hover:bg-gray-600 rounded-lg flex flex-col items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="mt-1 text-sm">Donors</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>