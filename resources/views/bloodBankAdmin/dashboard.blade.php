<x-admin-layout>
    <div class="min-h-screen bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 overflow-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200 dark:scrollbar-thumb-gray-600 dark:scrollbar-track-gray-800 transition-colors duration-300">

        <!-- Main Content -->
        <div class="p-6">

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div
                    class="bg-gray-100 dark:bg-gray-800 rounded-xl p-5 border-l-4 border-red-500 shadow-lg hover:shadow-red-500/20 transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Donors</p>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $numOfDonors }}</h3>
                        </div>
                        <div class="p-3 rounded-full bg-gray-200 dark:bg-gray-700 text-red-400">
                            <i class="fa-solid fa-hand-holding-medical"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-sm text-red-500 dark:text-red-400">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>{{ $numOfDonorsThisWeek }} this week</span>
                    </div>
                </div>

                <div
                    class="bg-gray-100 dark:bg-gray-800 rounded-xl p-5 border-l-4 border-yellow-500 shadow-lg hover:shadow-yellow-500/20 transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Total Donation</p>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalDonations }}</h3>
                        </div>
                        <div class="p-3 rounded-full bg-gray-200 dark:bg-gray-700 text-yellow-400">
                            <i class="fas fa-exclamation-triangle text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-sm text-yellow-500 dark:text-yellow-400">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>{{ $numOfDonationsThisWeek }} this week</span>
                    </div>
                </div>

                <div
                    class="bg-gray-100 dark:bg-gray-800 rounded-xl p-5 border-l-4 border-blue-500 shadow-lg hover:shadow-blue-500/20 transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Active Donors</p>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $numOfAvailable }}</h3>
                        </div>
                        <div class="p-3 rounded-full bg-gray-200 dark:bg-gray-700 text-blue-400">
                            <i class="fas fa-user-check text-xl"></i>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-gray-100 dark:bg-gray-800 rounded-xl p-5 border-l-4 border-purple-500 shadow-lg hover:shadow-purple-500/20 transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Deferred Donors</p>
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $deferredDonors }}</h3>
                        </div>
                        <div class="p-3 rounded-full bg-gray-200 dark:bg-gray-700 text-purple-400">
                            <i class="fa-solid fa-user-slash"></i>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center text-sm text-purple-500 dark:text-purple-400">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span>{{ $numOfDeferredThisWeek }} this week</span>
                    </div>
                </div>
            </div>

            <!-- Charts and Tables Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Donation Trends Chart -->
                <div class="lg:col-span-2 bg-gray-100 dark:bg-gray-800 rounded-xl p-6 border border-gray-300 dark:border-gray-700 transition-colors">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Donation Trends</h3>
                        <div class="flex space-x-2">
                            <select
                                class="bg-gray-200 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-200 text-sm rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-red-500">
                                <option>Last 7 Days</option>
                                <option>Last 30 Days</option>
                                <option>Last 6 Months</option>
                            </select>
                            <button
                                class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-200 px-3 py-1 rounded-lg text-sm flex items-center">
                                <i class="fas fa-download mr-1 text-sm"></i> Export
                            </button>
                        </div>
                    </div>
                    <div class="h-64 bg-gray-200/50 dark:bg-gray-700/50 rounded-lg flex items-center justify-center">
                        <div class="text-center text-gray-500 dark:text-gray-400">
                            <i class="fas fa-chart-line text-4xl mb-2"></i>
                            <p>Donation Trends Chart</p>
                        </div>
                    </div>
                </div>

                <!-- Blood Inventory Summary -->
                <div class="bg-gray-100 dark:bg-gray-800 rounded-xl p-6 border border-gray-300 dark:border-gray-700 transition-colors">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Blood Inventory</h3>

                    @php
                        $colors = [
                            'A+' => 'bg-red-500',
                            'A-' => 'bg-pink-500',
                            'B+' => 'bg-yellow-500',
                            'B-' => 'bg-orange-500',
                            'O+' => 'bg-green-500',
                            'O-' => 'bg-emerald-500',
                            'AB+' => 'bg-purple-500',
                            'AB-' => 'bg-blue-500',
                        ];
                        $maxUnits = $bloods->max('units') ?: 1;
                    @endphp

                    <div class="space-y-3">
                        @foreach ($bloods as $blood)
                            @php
                                $fillColor = $colors[$blood->blood_type] ?? 'bg-gray-500';
                                $percentage = ($blood->units / $maxUnits) * 100;
                            @endphp

                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $blood->blood_type }}</span>
                                </div>

                                <div class="w-1/2 bg-gray-200 dark:bg-gray-700 rounded-full h-2.5 mx-2">
                                    <div class="{{ $fillColor }} h-2.5 rounded-full"
                                        style="width: {{ $percentage }}%"></div>
                                </div>

                                <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $blood->units }} units</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Bottom Section - Tables -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                <!-- Recent Donations -->
                <div class="bg-gray-100 dark:bg-gray-800 rounded-xl border border-gray-300 dark:border-gray-700 overflow-hidden transition-colors">
                    <div class="px-6 py-4 border-b border-gray-300 dark:border-gray-700 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Donations</h3>
                        <button class="text-sm text-blue-500 dark:text-blue-400 hover:text-blue-400 dark:hover:text-blue-300 flex items-center">
                            <i class="fas fa-sync-alt mr-1"></i> Refresh
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-200">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Donor</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Blood Type</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Date</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
                                <tr class="hover:bg-gray-300/30 dark:hover:bg-gray-700/50">
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-8 w-8 rounded-full object-cover border border-gray-300 dark:border-gray-600"
                                                src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900 dark:text-white">John Doe</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">ID: DNR-2456</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-medium bg-red-100 dark:bg-red-900/30 text-red-500 dark:text-red-400 rounded-full">O+</span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">2025-07-15</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-500 dark:text-green-400 rounded-full">Completed</span>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-300/30 dark:hover:bg-gray-700/50">
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img class="h-8 w-8 rounded-full object-cover border border-gray-300 dark:border-gray-600"
                                                src="https://randomuser.me/api/portraits/women/44.jpg" alt="">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900 dark:text-white">Jane Smith</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">ID: DNR-2457</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-500 dark:text-blue-400 rounded-full">A-</span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">2025-07-14</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-500 dark:text-green-400 rounded-full">Completed</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-3 border-t border-gray-300 dark:border-gray-700 text-center">
                        <a href="#" class="text-sm text-blue-500 dark:text-blue-400 hover:text-blue-400 dark:hover:text-blue-300">View all donations</a>
                    </div>
                </div>

                <!-- Upcoming Appointments -->
                <div class="bg-gray-100 dark:bg-gray-800 rounded-xl border border-gray-300 dark:border-gray-700 overflow-hidden transition-colors">
                    <div class="px-6 py-4 border-b border-gray-300 dark:border-gray-700 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Upcoming Appointments</h3>
                        <button class="text-sm text-blue-500 dark:text-blue-400 hover:text-blue-400 dark:hover:text-blue-300 flex items-center">
                            <i class="fas fa-calendar-plus mr-1"></i> New
                        </button>
                    </div>
                    <div class="divide-y divide-gray-300 dark:divide-gray-700">
                        <div class="p-4 hover:bg-gray-300/30 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-500 dark:text-purple-400">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">Michael Johnson</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">O+ • 10:00 AM</p>
                                    </div>
                                </div>
                                <span class="text-xs bg-blue-100 dark:bg-blue-900/30 text-blue-500 dark:text-blue-400 px-2 py-1 rounded-full">Confirmed</span>
                            </div>
                        </div>
                        <div class="p-4 hover:bg-gray-300/30 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 rounded-full bg-yellow-100 dark:bg-yellow-900/30 text-yellow-500 dark:text-yellow-400">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">Sarah Williams</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">AB- • 11:30 AM</p>
                                    </div>
                                </div>
                                <span class="text-xs bg-yellow-100 dark:bg-yellow-900/30 text-yellow-500 dark:text-yellow-400 px-2 py-1 rounded-full">Pending</span>
                            </div>
                        </div>
                        <div class="p-4 hover:bg-gray-300/30 dark:hover:bg-gray-700/50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 rounded-full bg-green-100 dark:bg-green-900/30 text-green-500 dark:text-green-400">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">Robert Brown</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">B+ • 2:00 PM</p>
                                    </div>
                                </div>
                                <span class="text-xs bg-blue-100 dark:bg-blue-900/30 text-blue-500 dark:text-blue-400 px-2 py-1 rounded-full">Confirmed</span>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-3 border-t border-gray-300 dark:border-gray-700 text-center">
                        <a href="#" class="text-sm text-blue-500 dark:text-blue-400 hover:text-blue-400 dark:hover:text-blue-300">View all appointments</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
