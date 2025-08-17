<x-admin-layout>
    <div class=" bg-gray-900 text-gray-100 overflow-auto scrollbar-hide">
        <!-- Header -->
        <header class="sticky top-0 z-20 bg-gradient-to-r from-gray-800 to-gray-900">
            <div class="container mx-auto p-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-rose-600/20 rounded-xl">
                            <i class="fas fa-hospital text-rose-400 text-2xl"></i>
                        </div>
                        <h1 class="text-2xl font-bold">{{ $bloodBank->name }}</h1>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-gray-900 p-6 rounded-2xl shadow-lg">
                        <h2 class="text-xl font-bold text-white mb-4">Set Blood Bank Availability</h2>

                        <form method="POST" action="/availability/save" class="space-y-4">
                            <!-- Weekly table -->
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-300 border border-gray-700 rounded-lg">
                                    <thead class="bg-gray-800 text-gray-400">
                                        <tr>
                                            <th class="px-4 py-2">Day</th>
                                            <th class="px-4 py-2">Closed</th>
                                            <th class="px-4 py-2">Open Time</th>
                                            <th class="px-4 py-2">Close Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Loop over all days -->
                                        @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                            <tr class="border-t border-gray-700 hover:bg-gray-800/60">
                                                <td class="px-4 py-2 font-medium text-white capitalize">
                                                    {{ $day }}</td>
                                                <td class="px-4 py-2">
                                                    <input type="checkbox" name="days[{{ $day }}][closed]"
                                                        class="h-4 w-4 text-rose-500" onchange="toggleTimeInputs(this)">
                                                </td>
                                                <td class="px-4 py-2">
                                                    <input type="time" name="days[{{ $day }}][open_time]"
                                                        class="p-2 rounded bg-gray-700 text-white w-full">
                                                </td>
                                                <td class="px-4 py-2">
                                                    <input type="time" name="days[{{ $day }}][close_time]"
                                                        class="p-2 rounded bg-gray-700 text-white w-full">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Save button -->
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="px-6 py-2 bg-rose-600 hover:bg-rose-700 text-white font-semibold rounded-xl shadow-md">
                                    Save Availability
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- Blood Inventory -->
                    <section class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold flex items-center">
                                <i class="fas fa-flask text-rose-400 mr-2"></i> Blood Inventory
                            </h2>
                            <span class="text-xs bg-gray-700 px-2 py-1 rounded">Updated 2 hours ago</span>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <!-- Blood Type Card -->
                            <div
                                class="bg-gray-700/50 p-4 rounded-lg border border-gray-600 hover:border-rose-500/50 transition">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-rose-400">A+</div>
                                    <div class="text-green-400 font-medium mt-1">Good</div>
                                    <div class="text-xs text-gray-400 mt-2">42 Units</div>
                                </div>
                            </div>

                            <div
                                class="bg-gray-700/50 p-4 rounded-lg border border-gray-600 hover:border-rose-500/50 transition">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-rose-400">B+</div>
                                    <div class="text-yellow-400 font-medium mt-1">Low</div>
                                    <div class="text-xs text-gray-400 mt-2">12 Units</div>
                                </div>
                            </div>

                            <div
                                class="bg-gray-700/50 p-4 rounded-lg border border-gray-600 hover:border-rose-500/50 transition">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-rose-400">O-</div>
                                    <div class="text-red-400 font-medium mt-1">Critical</div>
                                    <div class="text-xs text-gray-400 mt-2">5 Units</div>
                                </div>
                            </div>

                            <div
                                class="bg-gray-700/50 p-4 rounded-lg border border-gray-600 hover:border-rose-500/50 transition">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-rose-400">AB+</div>
                                    <div class="text-green-400 font-medium mt-1">Good</div>
                                    <div class="text-xs text-gray-400 mt-2">28 Units</div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Contact Card -->
                    <div x-data="{ showForm: false }" class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                        <!-- Header -->
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold flex items-center text-white">
                                <i class="fas fa-map-marker-alt text-rose-400 mr-2"></i> Contact Info
                            </h2>
                            <button @click="showForm = !showForm"
                                class="text-sm px-3 py-1 bg-rose-600 hover:bg-rose-700 text-white rounded-lg shadow">
                                <span x-show="!showForm">Edit</span>
                                <span x-show="showForm">Cancel</span>
                            </button>
                        </div>

                        <!-- Display Info -->
                        <div class="space-y-3" x-show="!showForm" x-transition>
                            <div class="flex items-start">
                                <i class="fas fa-map-pin text-rose-400 mt-1 mr-3"></i>
                                <p class="text-gray-300">{{ $bloodBank->address }}</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone-alt text-rose-400 mr-3"></i>
                                <p class="text-gray-300">{{ $bloodBank->phone ?? '(555) 123-4567' }}</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-rose-400 mr-3"></i>
                                <p class="text-gray-300">{{ $bloodBank->user->email }}</p>
                            </div>
                        </div>

                        <!-- Edit Form -->
                        <form x-show="showForm" x-transition method="POST" action="}}" class="space-y-3 mt-3">
                            @csrf
                            @method('PUT')

                            <div>
                                <label class="block text-gray-400 mb-1">Address</label>
                                <textarea name="address" rows="3"
                                    class="w-full p-2 rounded bg-gray-700 text-white focus:ring-2 focus:ring-rose-500 resize-none">{{ $bloodBank->address }}</textarea>
                            </div>


                            <div>
                                <label class="block text-gray-400 mb-1">Phone</label>
                                <input type="text" name="phone" value="{{ $bloodBank->phone ?? '' }}"
                                    class="w-full p-2 rounded bg-gray-700 text-white focus:ring-2 focus:ring-rose-500">
                            </div>

                            <div>
                                <label class="block text-gray-400 mb-1">Email</label>
                                <input type="email" name="email" value="{{ $bloodBank->user->email }}"
                                    class="w-full p-2 rounded bg-gray-700 text-white focus:ring-2 focus:ring-rose-500">
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-lg shadow">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- Operating Hours Card (existing) -->
                    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                        <h2 class="text-xl font-bold mb-4 flex items-center">
                            <i class="fas fa-clock text-rose-400 mr-2"></i> Operating Hours
                        </h2>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-300">Monday - Friday</span>
                                <span class="font-medium">8:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-300">Saturday</span>
                                <span class="font-medium">9:00 AM - 4:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-300">Sunday</span>
                                <span class="font-medium">9:00 AM - 2:00 PM</span>
                            </div>
                        </div>
                    </div>

                    <!-- Update Password Card (new) -->
                    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 mt-6" x-data="{ showPasswordForm: false }">
                        <button @click="showPasswordForm = !showPasswordForm"
                            class="w-full py-2 px-4 bg-rose-600 hover:bg-rose-700 text-white font-semibold rounded-lg shadow transition flex items-center justify-center gap-2">
                            <i class="fas fa-key"></i> Update Password
                        </button>

                        <!-- Password Form -->
                        <div x-show="showPasswordForm" x-transition class="mt-4 space-y-3">
                            <form method="POST" action="">
                                @csrf
                                @method('PUT')

                                <input type="password" name="current_password" placeholder="Current Password"
                                    class="w-full px-3 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-rose-500 focus:ring focus:ring-rose-500/30 mb-3">

                                <input type="password" name="new_password" placeholder="New Password"
                                    class="w-full px-3 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-rose-500 focus:ring focus:ring-rose-500/30 mb-3">

                                <input type="password" name="new_password_confirmation"
                                    placeholder="Confirm New Password"
                                    class="w-full px-3 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-rose-500 focus:ring focus:ring-rose-500/30 mb-3">

                                <div class="flex gap-2 mt-2">
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
            </div>
        </main>
    </div>
</x-admin-layout>
