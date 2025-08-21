
<x-admin-layout>
    <div class="min-h-screen bg-gray-900 text-gray-200 overflow-auto scrollbar-none">

        <!-- Main Content -->
        <div class="p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div
                    class="bg-gray-800 rounded-xl p-5 border-l-4 border-red-500 shadow-lg hover:shadow-red-500/20 transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Total Donors</p>
                            <h3 class="text-2xl font-bold text-white">{{ $numOfDonors }}</h3>
                        </div>
                        <div class="p-3 rounded-full bg-gray-700 text-red-400">
                            <i class="fa-solid fa-hand-holding-medical"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-sm text-red-400">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>{{ $numOfDonorsThisWeek }} this week</span>
                    </div>
                </div>

                <div
                    class="bg-gray-800 rounded-xl p-5 border-l-4 border-yellow-500 shadow-lg hover:shadow-yellow-500/20 transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Total Donation</p>
                            <h3 class="text-2xl font-bold text-white">{{ $totalDonations }}</h3>
                        </div>
                        <div class="p-3 rounded-full bg-gray-700 text-yellow-400">
                            <i class="fas fa-exclamation-triangle text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-sm text-yellow-400">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>{{ $numOfDonationsThisWeek }} this week</span>
                    </div>
                </div>

                <div
                    class="bg-gray-800 rounded-xl p-5 border-l-4 border-blue-500 shadow-lg hover:shadow-blue-500/20 transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Active Donors</p>
                            <h3 class="text-2xl font-bold text-white">{{ $numOfAvailable }}</h3>
                        </div>
                        <div class="p-3 rounded-full bg-gray-700 text-blue-400">
                            <i class="fas fa-user-check text-xl"></i>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gray-800 rounded-xl p-5 border-l-4 border-purple-500 shadow-lg hover:shadow-purple-500/20 transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Deferred Donors</p>
                            <h3 class="text-2xl font-bold text-white">{{ $deferredDonors }}</h3>
                        </div>
                        <div class="p-3 rounded-full bg-gray-700 text-purple-400">
                            <i class="fa-solid fa-user-slash"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-sm text-purple-400">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>{{ $numOfDeferredThisWeek }} this week</span>
                    </div>
                </div>
            </div>

            <!-- Charts and Tables Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Donation Trends Chart -->
                <div class="lg:col-span-2 bg-gray-800 rounded-xl p-6 border border-gray-700">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-white">Donation Trends</h3>
                        <div class="flex space-x-2">
                            <select
                                class="bg-gray-700 border border-gray-600 text-gray-200 text-sm rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-red-500">
                                <option>Last 7 Days</option>
                                <option>Last 30 Days</option>
                                <option>Last 6 Months</option>
                            </select>
                            <button
                                class="bg-gray-700 hover:bg-gray-600 border border-gray-600 text-gray-200 px-3 py-1 rounded-lg text-sm flex items-center">
                                <i class="fas fa-download mr-1 text-sm"></i> Export
                            </button>
                        </div>
                    </div>
                    <div class="h-64 bg-gray-700/50 rounded-lg flex items-center justify-center">
                        <!-- Chart Placeholder -->
                        <div class="text-center text-gray-400">
                            <i class="fas fa-chart-line text-4xl mb-2"></i>
                            <p>Donation Trends Chart</p>
                        </div>
                    </div>
                </div>

                <!-- Blood Inventory Summary -->
                <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                    <h3 class="text-lg font-semibold text-white mb-4">Blood Inventory</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <span class="w-3 h-3 rounded-full bg-red-500 mr-2"></span>
                                <span class="text-sm">O+</span>
                            </div>
                            <div class="w-1/2 bg-gray-700 rounded-full h-2.5">
                                <div class="bg-red-500 h-2.5 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-sm font-medium">342 units</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <span class="w-3 h-3 rounded-full bg-blue-500 mr-2"></span>
                                <span class="text-sm">A+</span>
                            </div>
                            <div class="w-1/2 bg-gray-700 rounded-full h-2.5">
                                <div class="bg-blue-500 h-2.5 rounded-full" style="width: 45%"></div>
                            </div>
                            <span class="text-sm font-medium">156 units</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <span class="w-3 h-3 rounded-full bg-green-500 mr-2"></span>
                                <span class="text-sm">B+</span>
                            </div>
                            <div class="w-1/2 bg-gray-700 rounded-full h-2.5">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: 30%"></div>
                            </div>
                            <span class="text-sm font-medium">89 units</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <span class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></span>
                                <span class="text-sm">AB+</span>
                            </div>
                            <div class="w-1/2 bg-gray-700 rounded-full h-2.5">
                                <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 15%"></div>
                            </div>
                            <span class="text-sm font-medium">28 units</span>
                        </div>
                        <div class="pt-3 mt-3 border-t border-gray-700">
                            <button
                                class="w-full bg-gray-700 hover:bg-gray-600 text-gray-200 py-2 rounded-lg text-sm flex items-center justify-center">
                                <i class="fas fa-plus mr-2"></i> View Full Inventory
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Section - Tables -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                <!-- Recent Donations -->
                <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white">Recent Donations</h3>
                        <button class="text-sm text-blue-400 hover:text-blue-300 flex items-center">
                            <i class="fas fa-sync-alt mr-1"></i> Refresh
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Donor</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Blood Type</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Date</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                <tr class="hover:bg-gray-700/50">
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-8 w-8 rounded-full object-cover border border-gray-600"
                                                src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-white">John Doe</p>
                                                <p class="text-xs text-gray-400">ID: DNR-2456</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs font-medium bg-red-900/30 text-red-400 rounded-full">O+</span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-400">2025-07-15</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs font-medium bg-green-900/30 text-green-400 rounded-full">Completed</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-700/50">
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-8 w-8 rounded-full object-cover border border-gray-600"
                                                src="https://randomuser.me/api/portraits/women/44.jpg" alt="">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-white">Jane Smith</p>
                                                <p class="text-xs text-gray-400">ID: DNR-2457</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs font-medium bg-blue-900/30 text-blue-400 rounded-full">A-</span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-400">2025-07-14</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 text-xs font-medium bg-green-900/30 text-green-400 rounded-full">Completed</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-3 border-t border-gray-700 text-center">
                        <a href="#" class="text-sm text-blue-400 hover:text-blue-300">View all donations</a>
                    </div>
                </div>

                <!-- Upcoming Appointments -->
                <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white">Upcoming Appointments</h3>
                        <button class="text-sm text-blue-400 hover:text-blue-300 flex items-center">
                            <i class="fas fa-calendar-plus mr-1"></i> New
                        </button>
                    </div>
                    <div class="divide-y divide-gray-700">
                        <div class="p-4 hover:bg-gray-700/50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 rounded-full bg-purple-900/30 text-purple-400">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-white">Michael Johnson</p>
                                        <p class="text-xs text-gray-400">O+ • 10:00 AM</p>
                                    </div>
                                </div>
                                <span
                                    class="text-xs bg-blue-900/30 text-blue-400 px-2 py-1 rounded-full">Confirmed</span>
                            </div>
                        </div>
                        <div class="p-4 hover:bg-gray-700/50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 rounded-full bg-blue-900/30 text-blue-400">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-white">Sarah Williams</p>
                                        <p class="text-xs text-gray-400">AB- • 11:30 AM</p>
                                    </div>
                                </div>
                                <span
                                    class="text-xs bg-yellow-900/30 text-yellow-400 px-2 py-1 rounded-full">Pending</span>
                            </div>
                        </div>
                        <div class="p-4 hover:bg-gray-700/50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 rounded-full bg-green-900/30 text-green-400">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-white">Robert Brown</p>
                                        <p class="text-xs text-gray-400">B+ • 2:00 PM</p>
                                    </div>
                                </div>
                                <span
                                    class="text-xs bg-blue-900/30 text-blue-400 px-2 py-1 rounded-full">Confirmed</span>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-3 border-t border-gray-700 text-center">
                        <a href="#" class="text-sm text-blue-400 hover:text-blue-300">View all appointments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
