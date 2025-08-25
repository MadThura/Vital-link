@php
    $allTypes = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];
    $bloodMap = $bloods->keyBy('blood_type');

    // Assign fixed colors for each type
    $colors = [
        'A+' => 'border-red-500 text-red-400',
        'A-' => 'border-pink-500 text-pink-400',
        'B+' => 'border-yellow-500 text-yellow-400',
        'B-' => 'border-orange-500 text-orange-400',
        'O+' => 'border-green-500 text-green-400',
        'O-' => 'border-emerald-500 text-emerald-400',
        'AB+' => 'border-purple-500 text-purple-400',
        'AB-' => 'border-blue-500 text-blue-400',
    ];
@endphp
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
                        $color = $colors[$type];
                    @endphp

                    <div
                        class="bg-gray-800 p-5 rounded-2xl shadow-lg border {{ explode(' ', $color)[0] }} relative hover:scale-105 transition-transform">
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold {{ explode(' ', $color)[1] }}">{{ $type }}</span>
                            <button class="{{ explode(' ', $color)[1] }} hover:opacity-80 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>
                        </div>

                        <p class="text-3xl font-bold mt-3">{{ $units }}</p>
                        <p class="text-gray-400 text-sm">Units Available</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-admin-layout>
