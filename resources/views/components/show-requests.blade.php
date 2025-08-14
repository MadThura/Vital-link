<!-- Overlay and Centered Modal -->
<div x-show="showRequests" x-transition.opacity
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50">
    <!-- Requests Pane -->
    <div x-show="showRequests" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" @click.away="showRequests = false"
        class="relative w-full max-w-4xl max-h-[90vh] bg-[#1e1e1e] border border-[#333] rounded-lg shadow-xl overflow-hidden flex flex-col">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-[#333] bg-[#171717]">
            <h3 class="text-xl font-bold text-[#f3f4f6]">Blood Donation Requests</h3>
            <button @click="showRequests = false"
                class="p-2 text-[#9ca3af] hover:text-[#e11d48] rounded-full hover:bg-[#262626] transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Request List -->
        <div class="flex-1 overflow-y-auto">
            <!-- Urgent Requests Section -->
            <div class="border-b border-[#333]">
                <div class="px-6 py-3 bg-[#262626]">
                    <h4 class="text-lg font-semibold text-[#e11d48] flex items-center gap-2">
                        <i class="fas fa-exclamation-triangle"></i> Urgent Requests
                    </h4>
                </div>

                <!-- Urgent Request Item -->
                <div class="px-6 py-4 hover:bg-[#262626] border-b border-[#333]">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-14 h-14 bg-[#262626] rounded-full flex items-center justify-center text-[#e11d48]">
                            <i class="fas fa-hospital text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <p class="text-lg font-semibold text-[#f3f4f6]">City Central Blood Bank</p>
                                <span class="text-xs bg-[#e11d48]/20 text-[#e11d48] px-3 py-1 rounded-full">Type O-
                                    Needed</span>
                            </div>
                            <p class="text-sm text-[#9ca3af] mt-1">Critical shortage for emergency surgeries this week
                            </p>

                            <!-- Blood Bank Contact Details -->
                            <div class="mt-3 grid grid-cols-2 gap-2 text-sm">
                                <div class="flex items-start gap-2">
                                    <i class="fas fa-map-marker-alt mt-1 text-[#e11d48]"></i>
                                    <span class="text-[#f3f4f6]">123 Medical Center Dr, City</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i class="fas fa-phone-alt mt-1 text-[#e11d48]"></i>
                                    <span class="text-[#f3f4f6]">(555) 123-4567</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i class="fas fa-envelope mt-1 text-[#e11d48]"></i>
                                    <span class="text-[#f3f4f6]">contact@citybloodbank.org</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i class="fas fa-clock mt-1 text-[#e11d48]"></i>
                                    <span class="text-[#f3f4f6]">Open 24/7 for emergencies</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Scheduled Requests Section -->
            <div>
                <div class="px-6 py-3 bg-[#262626]">
                    <h4 class="text-lg font-semibold text-[#3b82f6] flex items-center gap-2">
                        <i class="fas fa-calendar-check"></i> Scheduled Blood Drives
                    </h4>
                </div>

                <!-- Scheduled Request Item -->
                <div class="px-6 py-4 hover:bg-[#262626] border-b border-[#333]">
                    <div class="flex items-start gap-4">
                        <div
                            class="flex-shrink-0 w-14 h-14 bg-[#262626] rounded-full flex items-center justify-center text-[#3b82f6]">
                            <i class="fas fa-clinic-medical text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <p class="text-lg font-semibold text-[#f3f4f6]">Community Blood Center</p>
                                <span class="text-xs bg-[#3b82f6]/20 text-[#3b82f6] px-3 py-1 rounded-full">All Blood
                                    Types</span>
                            </div>
                            <p class="text-sm text-[#9ca3af] mt-1">Monthly community blood drive - appointments
                                available</p>

                            <!-- Event Details -->
                            <div class="mt-3 grid grid-cols-2 gap-2 text-sm">
                                <div class="flex items-start gap-2">
                                    <i class="fas fa-calendar-day mt-1 text-[#3b82f6]"></i>
                                    <span class="text-[#f3f4f6]">June 15, 2023 • 9AM-5PM</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i class="fas fa-map-marker-alt mt-1 text-[#3b82f6]"></i>
                                    <span class="text-[#f3f4f6]">456 Community Ave, City</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i class="fas fa-phone-alt mt-1 text-[#3b82f6]"></i>
                                    <span class="text-[#f3f4f6]">(555) 987-6543</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <i class="fas fa-user-plus mt-1 text-[#3b82f6]"></i>
                                    <span class="text-[#f3f4f6]">25 slots available</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 py-3 border-t border-[#333] bg-[#171717] flex justify-between items-center">
            <button class="text-sm font-medium text-[#9ca3af] hover:text-[#e11d48] transition flex items-center gap-2">
                <i class="fas fa-question-circle"></i> Donation Eligibility
            </button>
            <button class="text-sm font-medium text-[#e11d48] hover:underline">
                View All Blood Banks
            </button>
        </div>
    </div>
</div>
