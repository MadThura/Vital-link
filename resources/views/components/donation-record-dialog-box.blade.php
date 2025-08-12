<div x-show="showDonationDetail" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div x-show="showDonationDetail" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" @click="showDonationDetail = false">
        </div>

        <!-- Modal panel -->
        <div x-show="showDonationDetail" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">

            <!-- Header -->
            <div
                class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:items-center sm:justify-between border-b border-gray-700">
                <h3 class="text-lg leading-6 font-medium text-white" id="modal-title">
                    Donation Record: <span x-text="selectedDonation.id" class="font-mono"></span>
                </h3>
                <button @click="showDonationDetail = false" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Body -->
            <div class="px-4 pt-5 pb-4 sm:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Donor Information -->
                    <div class="col-span-1">
                        <div class="bg-gray-700 rounded-lg p-4 h-full">
                            <h4 class="text-lg font-medium text-white mb-4 border-b border-gray-600 pb-2">
                                <i class="fas fa-user-circle mr-2 text-cyan-400"></i>Donor
                                Information
                            </h4>
                            <div class="flex items-center mb-4">
                                <img x-bind:src="selectedDonation.donor.photo"
                                    class="w-16 h-16 rounded-full border-2 border-cyan-400 object-cover mr-3">
                                <div>
                                    <p x-text="selectedDonation.donor.name" class="text-xl font-bold text-white">
                                    </p>
                                    <p x-text="'ID: ' + selectedDonation.donor.id" class="text-sm text-gray-400"></p>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Age/Gender:</span>
                                    <span x-text="selectedDonation.donor.age + ' / ' + selectedDonation.donor.gender"
                                        class="text-white"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Contact:</span>
                                    <span x-text="selectedDonation.donor.contact" class="text-white"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Email:</span>
                                    <span x-text="selectedDonation.donor.email" class="text-white"></span>
                                </div>
                                <div>
                                    <span class="text-gray-400">Address:</span>
                                    <p x-text="selectedDonation.donor.address" class="text-white text-sm mt-1"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Donation Details -->
                    <div class="col-span-1">
                        <div class="bg-gray-700 rounded-lg p-4 h-full">
                            <h4 class="text-lg font-medium text-white mb-4 border-b border-gray-600 pb-2">
                                <i class="fas fa-tint mr-2 text-red-400"></i>Donation
                                Details
                            </h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Date/Time:</span>
                                    <span
                                        x-text="selectedDonation.donation.date + ' at ' + selectedDonation.donation.time"
                                        class="text-white"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Blood
                                        Type:</span>
                                    <span x-text="selectedDonation.donation.bloodType"
                                        class="text-white font-bold"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Amount:</span>
                                    <span x-text="selectedDonation.donation.amount" class="text-white font-bold"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Status:</span>
                                    <span x-text="selectedDonation.donation.status"
                                        :class="{
                                            'text-green-400': selectedDonation
                                                .donation
                                                .status === 'Processed',
                                            'text-yellow-400': selectedDonation
                                                .donation
                                                .status === 'In Testing',
                                            'text-red-400': selectedDonation
                                                .donation.status === 'Rejected'
                                        }"
                                        class="font-bold"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Processed
                                        Date:</span>
                                    <span x-text="selectedDonation.donation.processedDate" class="text-white"></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Expires:</span>
                                    <span x-text="selectedDonation.donation.expirationDate" class="text-white"></span>
                                </div>
                                <div class="mt-4">
                                    <h5 class="text-gray-400 mb-2">Staff:</h5>
                                    <div class="flex items-center">
                                        <i class="fas fa-user-md mr-2 text-amber-400"></i>
                                        <div>
                                            <p x-text="selectedDonation.staff.name" class="text-white font-medium">
                                            </p>
                                            <p x-text="selectedDonation.staff.role + ' (ID: ' + selectedDonation.staff.id + ')'"
                                                class="text-gray-400 text-sm">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes Section -->
                    <div class="col-span-2">
                        <div class="bg-gray-700 rounded-lg p-4">
                            <h4 class="text-lg font-medium text-white mb-2 border-b border-gray-600 pb-2">
                                <i class="fas fa-notes-medical mr-2 text-emerald-400"></i>Notes
                            </h4>
                            <p x-text="selectedDonation.donation.notes" class="text-white"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-700">
                <button type="button"
                    class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-cyan-600 text-base font-medium text-white hover:bg-cyan-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                    <i class="fas fa-print mr-2"></i> Print Record
                </button>
                <button type="button" @click="showDonationDetail = false"
                    class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-600 shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-white hover:bg-gray-700 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                    Close
                </button>
            </div>
        </div>

    </div>
</div>
