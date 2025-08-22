<x-admin-layout>
    <div class="p-5 bg-gray-900 text-gray-100 min-h-screen">
        <!-- Stats Cards - Top Overview -->
        <div class="flex flex-wrap gap-6 mb-8">
            <!-- Total Units Card -->
            <div class="flex-1 min-w-[200px] bg-gray-800 p-6 rounded-xl border-l-4 border-red-600">
                <h3 class="text-gray-400 mb-2">Total Units</h3>
                <p class="text-3xl font-bold">{{ $total_units }}</p>
                <p class="text-green-400 text-sm mt-2">+12% from last month</p>
            </div>

            <!-- Recent Donations Card -->
            <div class="flex-1 min-w-[200px] bg-gray-800 p-6 rounded-xl border-l-4 border-purple-500">
                <h3 class="text-gray-400 mb-2">Recent Donations</h3>
                <p class="text-3xl font-bold">56</p>
                <p class="text-purple-400 text-sm mt-2">This week</p>
            </div>
        </div>

        <!-- Blood Type Cards -->
        <div>
            <h2 class="text-xl font-bold mb-6">Blood Type Inventory</h2>

            @php
                $allTypes = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];
                $bloodMap = $bloods->keyBy('blood_type');
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($allTypes as $type)
                    @php
                        $units = $bloodMap->has($type) ? $bloodMap[$type]->units : 0;
                    @endphp

                    <div class="bg-gray-800 p-5 rounded-2xl shadow-lg border border-gray-700 relative hover:scale-105 transition-transform">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold">{{ $type }}</span>
                            <button class="text-red-500 hover:text-red-400 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>
                        </div>

                        <p class="text-3xl font-bold mt-3">{{ $units }}</p>
                        <p class="text-gray-400 text-sm">Units Available</p>

                        <!-- Status Badge -->
                        <div class="mt-4">
                            @if($units > 20)
                                <span class="px-3 py-1 text-xs rounded-full bg-green-900/50 text-green-400">Safe</span>
                            @elseif($units > 5)
                                <span class="px-3 py-1 text-xs rounded-full bg-yellow-900/50 text-yellow-400">Low</span>
                            @else
                                <span class="px-3 py-1 text-xs rounded-full bg-red-900/50 text-red-400">Critical</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-admin-layout>
