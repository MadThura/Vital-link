
<!-- Overlay and Centered Modal -->
<div x-show="showRequests" x-transition.opacity
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50">
    <!-- Requests Pane -->
    <div x-show="showRequests" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" @click.away="showRequests = false"
        class="relative w-full max-w-4xl max-h-[90vh] bg-[#1e1e1e] rounded-lg shadow-xl overflow-hidden flex flex-col">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4  bg-[#171717]">
            <h3 class="text-xl font-bold text-[#f3f4f6]">Blood Donation Requests</h3>
            <button @click="showRequests = false"
                class="p-2 text-[#9ca3af] hover:text-[#e11d48] rounded-full hover:bg-[#262626] transition">
                <i class="fas fa-times"></i>
            </button>
        </div>
        {{-- blood bank --}}
        <div class="overflow-y-auto bg-gray-900">
            <!-- Blood Banks Section -->
            <div class="space-y-4 w-full">
                <!-- Section Header -->
                <div class="px-6 py-4 bg-gray-800 border-l-4 border-rose-600 shadow-lg">
                    <h4 class="text-xl font-bold text-rose-500 flex items-center gap-3">
                        <i class="fas fa-hospital text-2xl"></i>
                        <span>Blood Banks Near You</span>
                    </h4>
                    <p class="text-sm text-gray-400 mt-1">Find and schedule appointments with local blood banks</p>
                </div>

                <!-- Blood Banks List -->
                <div class="grid md:grid-cols-2 gap-4 px-4 pb-6 auto-rows-min">
                    @foreach ($bloodBanks as $bloodBank)
                        <div
                            class="bg-gray-800 rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-700 hover:border-rose-500/30">
                            <!-- Blood Bank Header -->
                            <div class="bg-gray-700 px-5 py-3 flex items-center gap-3">
                                <div class="bg-rose-600/20 p-2 rounded-lg">
                                    <i class="fas fa-hospital text-rose-400 text-xl"></i>
                                </div>
                                <h3 class="text-lg font-bold text-white">{{ $bloodBank->name }}</h3>
                            </div>

                            <!-- Blood Bank Details -->
                            <div class="p-5 space-y-4">
                                <div class="flex items-start gap-3">
                                    <i class="fas fa-map-marker-alt text-rose-500 mt-1"></i>
                                    <p class="text-gray-300">{{ $bloodBank->address }}</p>
                                </div>

                                <div class="flex items-start gap-3">
                                    <i class="fas fa-phone-alt text-rose-500 mt-1"></i>
                                    <p class="text-gray-300">{{$bloodBank->user->email}}</p>
                                </div>

                                <div class="flex items-start gap-3">
                                    <i class="fas fa-clock text-rose-500 mt-1"></i>
                                    <p class="text-gray-300">Mon-Fri: 8AM - 6PM<br>Sat-Sun: 9AM - 4PM</p>
                                </div>
                            </div>

                            <!-- Appointment Section -->
                            <div x-data="{ showForm: false }" class="px-5 pb-5">
                                <button @click="showForm = !showForm"
                                    class="w-full bg-gradient-to-r from-rose-600 to-rose-700 hover:from-rose-700 hover:to-rose-800 text-white font-medium py-2 px-4 rounded-lg transition-all duration-300 flex items-center justify-center gap-2">
                                    <i class="far fa-calendar-plus"></i>
                                    <span>Request Appointment</span>
                                </button>

                                <!-- Appointment Form -->
                                <form x-show="showForm" x-transition action="#" method="POST"
                                    class="mt-4 space-y-3 bg-gray-700/50 p-4 rounded-lg">
                                    @csrf
                                    <div>
                                        <label class="block text-sm font-medium text-gray-300 mb-1">Date</label>
                                        <input type="date" name="appointment_date"
                                            class="w-full bg-gray-700 border border-gray-600 text-white rounded-lg px-3 py-2 focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                                    </div>
                                    <button type="submit"
                                        class="w-full bg-rose-600 hover:bg-rose-700 text-white font-medium py-2 px-4 rounded-lg transition-colors flex items-center justify-center gap-2">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Confirm Booking</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
