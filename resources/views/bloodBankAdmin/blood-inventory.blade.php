<x-admin-layout>
    <div class="p-5 bg-gray-900 text-gray-100 min-h-screen">
        <!-- Stats Cards - Flex Layout -->
        <div class="flex flex-wrap gap-6 mb-8">
            <!-- Total Units Card -->
            <div class="flex-1 min-w-[200px] bg-gray-800 p-6 rounded-xl border-l-4 border-red-600">
                <h3 class="text-gray-400 mb-2">Total Units</h3>
                <p class="text-3xl font-bold">1,248</p>
                <p class="text-green-400 text-sm mt-2">+12% from last month</p>
            </div>

            <!-- Critical Levels Card -->
            <div class="flex-1 min-w-[200px] bg-gray-800 p-6 rounded-xl border-l-4 border-yellow-500">
                <h3 class="text-gray-400 mb-2">Critical Levels</h3>
                <p class="text-3xl font-bold">4</p>
                <p class="text-yellow-400 text-sm mt-2">Needs attention</p>
            </div>

            <!-- Expiring Soon Card -->
            <div class="flex-1 min-w-[200px] bg-gray-800 p-6 rounded-xl border-l-4 border-blue-500">
                <h3 class="text-gray-400 mb-2">Expiring Soon</h3>
                <p class="text-3xl font-bold">23</p>
                <p class="text-blue-400 text-sm mt-2">Within 7 days</p>
            </div>

            <!-- Recent Donations Card -->
            <div class="flex-1 min-w-[200px] bg-gray-800 p-6 rounded-xl border-l-4 border-purple-500">
                <h3 class="text-gray-400 mb-2">Recent Donations</h3>
                <p class="text-3xl font-bold">56</p>
                <p class="text-purple-400 text-sm mt-2">This week</p>
            </div>
        </div>

        <!-- Blood Type Inventory Table -->
        <div class="bg-gray-800 rounded-xl p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold">Blood Type Inventory</h2>
                <div class="flex gap-2">
                    <button class="px-3 py-1 bg-gray-700 hover:bg-gray-600 rounded-md text-sm">
                        Filter
                    </button>
                    <button class="px-3 py-1 bg-gray-700 hover:bg-gray-600 rounded-md text-sm">
                        Export
                    </button>
                </div>
            </div>

            <!-- Table with flex layout -->
            <div class="flex flex-col">
                <!-- Table Header -->
                <div class="flex border-b border-gray-700 text-gray-400 pb-3">
                    <div class="flex-1 text-left">Blood Type</div>
                    <div class="flex-1 text-right">Units</div>
                    <div class="flex-1 text-right">Status</div>
                    <div class="flex-1 text-right">Actions</div>
                </div>

                <!-- Table Rows -->
                <div class="flex flex-col divide-y divide-gray-700">
                    <!-- Row 1 -->
                    @foreach ($bloods as $blood)
                        <div class="flex py-4 items-center">
                            <div class="flex-1 font-medium">{{ $blood->blood_type }}</div>
                            <div class="flex-1 text-right">{{ $blood->units }}</div>
                            <div class="flex-1 text-right">
                                <span class="px-2 py-1 bg-green-900/50 text-green-400 rounded-full text-xs">Safe</span>
                            </div>
                            <div class="flex-1 text-right">
                                <button class="text-red-600 hover:text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach

                    {{-- <!-- Row 2 -->
                    <div class="flex py-4 items-center">
                        <div class="flex-1 font-medium">A-</div>
                        <div class="flex-1 text-right">28</div>
                        <div class="flex-1 text-right">
                            <span class="px-2 py-1 bg-red-900/50 text-red-400 rounded-full text-xs">Critical</span>
                        </div>
                        <div class="flex-1 text-right">
                            <button class="text-red-600 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Row 3 -->
                    <div class="flex py-4 items-center">
                        <div class="flex-1 font-medium">B+</div>
                        <div class="flex-1 text-right">156</div>
                        <div class="flex-1 text-right">
                            <span class="px-2 py-1 bg-green-900/50 text-green-400 rounded-full text-xs">Safe</span>
                        </div>
                        <div class="flex-1 text-right">
                            <button class="text-red-600 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Row 4 -->
                    <div class="flex py-4 items-center">
                        <div class="flex-1 font-medium">AB-</div>
                        <div class="flex-1 text-right">15</div>
                        <div class="flex-1 text-right">
                            <span class="px-2 py-1 bg-yellow-900/50 text-yellow-400 rounded-full text-xs">Low</span>
                        </div>
                        <div class="flex-1 text-right">
                            <button class="text-red-600 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Row 5 -->
                    <div class="flex py-4 items-center">
                        <div class="flex-1 font-medium">O-</div>
                        <div class="flex-1 text-right">89</div>
                        <div class="flex-1 text-right">
                            <span class="px-2 py-1 bg-green-900/50 text-green-400 rounded-full text-xs">Safe</span>
                        </div>
                        <div class="flex-1 text-right">
                            <button class="text-red-600 hover:text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
