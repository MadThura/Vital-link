<div x-show="showDonationDetail" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div x-show="showDonationDetail" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gradient-to-br from-gray-900/90 to-indigo-900/40 backdrop-blur-sm transition-opacity"
            @click="showDonationDetail = false">
        </div>

        <!-- Modal panel -->
        <div x-show="showDonationDetail" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block align-bottom bg-gradient-to-b from-gray-800 to-gray-900 rounded-2xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full border border-gray-700/50">

            <!-- Header -->
            <div class="bg-gradient-to-r from-cyan-900/40 to-indigo-900/40 px-6 py-4 border-b border-cyan-500/30">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 rounded-lg bg-gradient-to-br from-cyan-500 to-indigo-500 shadow-lg">
                            <i class="fas fa-file-medical-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white" id="modal-title">
                                Donation Record <span>{{ $donation->donation_id }}</span>
                            </h3>
                            <p class="text-cyan-300 text-sm font-mono" x-text="'ID: ' + selectedDonation.id"></p>
                        </div>
                    </div>
                    <button @click="showDonationDetail = false"
                        class="text-gray-300 hover:text-white p-2 rounded-full hover:bg-red-500/20 transition-all duration-200">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
            </div>

            <!-- Body -->
            <div class="px-6 pt-6 pb-4 sm:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Donor Information -->
                    <div class="col-span-1">
                        <div
                            class="bg-gray-800/60 backdrop-blur-sm rounded-xl p-5 h-full shadow-lg border border-gray-700/50">
                            <div class="flex items-center justify-between mb-5">
                                <h4 class="text-lg font-semibold text-white flex items-center gap-2">
                                    <div class="p-1.5 rounded-md bg-cyan-500/20">
                                        <i class="fas fa-user-circle text-cyan-400"></i>
                                    </div>
                                    Donor Information
                                </h4>
                                <div x-data="{ text: '{{ $donation->donor->donor_code }}', copied: false }" class="flex items-center justify-center gap-2">
                                    @if ($donation->donor->donor_code)
                                        <p class="font-bold text-cyan-200 text-sm" x-text="text"></p>
                                        <button
                                            @click="navigator.clipboard.writeText(text).then(() => { copied = true; setTimeout(() => copied = false, 1000) })"
                                            class="hover:text-cyan-400">
                                            <i class="fa-solid fa-copy text-cyan-200 text-sm"></i>
                                        </button>
                                        <span x-show="copied" x-transition class="text-green-400 text-xs">Copied!</span>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-center gap-4 mb-5">
                                <div class="relative">
                                    <img src="/donor-files/{{ $donation->donor->profile_img }}"
                                        class="w-16 h-16 rounded-full border-2 border-cyan-500/50 object-cover mr-3 shadow-lg">
                                    <div
                                        class="absolute -bottom-1 -right-1 w-6 h-6 rounded-full bg-gradient-to-br from-cyan-500 to-indigo-500 border-2 border-gray-800 flex items-center justify-center">
                                        <i class="fas fa-check text-xs text-white"></i>
                                    </div>
                                </div>
                                <div class="">
                                    <p class="text-white-700 font-semibold text-lg">
                                        {{ $donation->donor->user->name }}
                                    </p>
                                </div>

                            </div>

                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-3 bg-gray-700/40 rounded-lg">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-pink-500/20 flex items-center justify-center mr-3">
                                            <i class="fas fa-birthday-cake text-pink-400 text-sm"></i>
                                        </div>
                                        <span class="text-gray-300">Date of Birth</span>
                                    </div>
                                    <span class="text-white font-medium">{{ $donation->donor->dob }}</span>
                                </div>

                                <div class="flex items-center justify-between p-3 bg-gray-700/40 rounded-lg">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center mr-3">
                                            <i class="fas fa-venus-mars text-indigo-400 text-sm"></i>
                                        </div>
                                        <span class="text-gray-300">Gender</span>
                                    </div>
                                    <span class="text-white font-medium">{{ $donation->donor->gender }}</span>
                                </div>

                                <div class="flex items-center justify-between p-3 bg-gray-700/40 rounded-lg">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center mr-3">
                                            <i class="fas fa-phone-alt text-green-400 text-sm"></i>
                                        </div>
                                        <span class="text-gray-300">Contact</span>
                                    </div>
                                    <span class="text-white font-medium">{{ $donation->donor->phone }}</span>
                                </div>

                                <div class="flex items-center justify-between p-3 bg-gray-700/40 rounded-lg">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-yellow-500/20 flex items-center justify-center mr-3">
                                            <i class="fas fa-envelope text-yellow-400 text-sm"></i>
                                        </div>
                                        <span class="text-gray-300">Email</span>
                                    </div>
                                    <span
                                        class="text-white font-medium truncate max-w-[160px]">{{ $donation->donor->user->email }}</span>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-gray-700/40 rounded-lg">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-rose-500/20 flex items-center justify-center mr-3">
                                            <i class="fas fa-location text-rose-400 text-sm"></i>
                                        </div>
                                        <span class="text-gray-300">Address</span>
                                    </div>
                                    <span class="text-white font-medium">{{ $donation->donor->address }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Donation Details -->
                    <div class="col-span-1">
                        <div
                            class="bg-gray-800/60 backdrop-blur-sm rounded-xl p-5 h-full shadow-lg border border-gray-700/50">
                            <h4 class="text-lg font-semibold text-white mb-5 flex items-center gap-2">
                                <div class="p-1.5 rounded-md bg-red-500/20">
                                    <i class="fas fa-tint text-red-400"></i>
                                </div>
                                Donation Details
                            </h4>

                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-3 bg-gray-700/40 rounded-lg">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-cyan-500/20 flex items-center justify-center mr-3">
                                            <i class="fas fa-calendar-day text-cyan-400 text-sm"></i>
                                        </div>
                                        <span class="text-gray-300">Date & Time</span>
                                    </div>
                                    <span
                                        class="text-white font-medium">{{ \Carbon\Carbon::parse($donation->donation_date)->format('F j, Y g:i A') }}</span>
                                </div>

                                <div class="flex items-center justify-between p-3 bg-gray-700/40 rounded-lg">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-pink-500/20 flex items-center justify-center mr-3">
                                            <i class="fas fa-vial text-pink-400 text-sm"></i>
                                        </div>
                                        <span class="text-gray-300">Blood Type</span>
                                    </div>
                                    <span
                                        class="text-white font-bold px-3 py-1 rounded-full bg-red-500/10 border border-red-500/20">
                                        {{ $donation->donor->blood_type }}
                                    </span>
                                </div>

                                <div class="flex items-center justify-between p-3 bg-gray-700/40 rounded-lg">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-green-500/20 flex items-center justify-center mr-3">
                                            <i class="fas fa-weight text-green-400 text-sm"></i>
                                        </div>
                                        <span class="text-gray-300">Unit(s) Donated</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-white font-bold text-xl mr-1">{{ $donation->units }}</span>
                                        <span class="text-gray-400 text-sm">units</span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between p-3 bg-gray-700/40 rounded-lg">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center mr-3">
                                            <i class="fas fa-hospital text-indigo-400 text-sm"></i>
                                        </div>
                                        <span class="text-gray-300">Blood Bank</span>
                                    </div>
                                    <span
                                        class="text-white font-medium text-right">{{ $donation->bloodBank->name }}</span>
                                </div>
                            </div>

                            <!-- Status indicator -->
                            <div
                                class="mt-6 p-3 bg-green-500/10 border border-green-500/20 rounded-lg flex items-center">
                                <div
                                    class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center mr-3">
                                    <i class="fas fa-check-circle text-green-400"></i>
                                </div>
                                <div>
                                    <p class="text-white font-medium">Donation Successful</p>
                                    <p class="text-green-300 text-sm">Screened and approved for transfusion</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes Section -->
                    <div class="col-span-2">
                        <div
                            class="bg-gray-800/60 backdrop-blur-sm rounded-xl p-5 shadow-lg border border-gray-700/50">
                            <h4 class="text-lg font-semibold text-white mb-4 flex items-center gap-2">
                                <div class="p-1.5 rounded-md bg-emerald-500/20">
                                    <i class="fas fa-notes-medical text-emerald-400"></i>
                                </div>
                                Medical Notes
                            </h4>
                            <div class="bg-gray-700/40 p-4 rounded-lg">
                                <p class="text-gray-200 italic">
                                    {{ $donation->note ?: 'No additional notes provided for this donation.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div
                class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-700/50">
                <a href="{{ route('downloadCertificate', $donation->donation_id) }}"><button
                        class="relative text-amber-400 hover:text-amber-300 transition-all group" title="Download">
                        <span>Download</span>
                        <i class="fas fa-download"></i>
                        <span
                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#fbbf24] transition-all group-hover:w-full">
                        </span>
                </a>
            </div>
        </div>
    </div>
</div>
