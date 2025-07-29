<div x-show="showEditDonation" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div x-show="showEditDonation" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" @click="showEditDonation = false">
        </div>

        <!-- Modal panel -->
        <div x-show="showEditDonation" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">

            <!-- Header -->
            <div
                class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:items-center sm:justify-between border-b border-gray-700">
                <h3 class="text-lg leading-6 font-medium text-white" id="modal-title">
                    Edit Donation Record: <span x-text="selectedDonation.id" class="font-mono"></span>
                </h3>
                <button @click="showEditDonation = false" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Body -->
            <div class="px-4 pt-5 pb-4 sm:p-6">
                <form @submit.prevent="updateDonation">
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Donation Details -->
                        <div class="col-span-1">
                            <div class="bg-gray-700 rounded-lg p-4">
                                <h4 class="text-lg font-medium text-white mb-4 border-b border-gray-600 pb-2">
                                    <i class="fas fa-tint mr-2 text-red-400"></i>Edit
                                    Donation Details
                                </h4>
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-gray-400 mb-1">Blood
                                            Type</label>
                                        <select x-model="selectedDonation.donation.bloodType"
                                            class="w-full bg-gray-800 border border-gray-600 rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-gray-400 mb-1">Amount
                                            (ml)</label>
                                        <input type="number" x-model="selectedDonation.donation.amount"
                                            class="w-full bg-gray-800 border border-gray-600 rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                    </div>

                                    <div>
                                        <label class="block text-gray-400 mb-1">Status</label>
                                        <select x-model="selectedDonation.donation.status"
                                            class="w-full bg-gray-800 border border-gray-600 rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                            <option value="Processed">Processed
                                            </option>
                                            <option value="In Testing">In
                                                Testing</option>
                                            <option value="Rejected">Rejected
                                            </option>
                                        </select>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-gray-400 mb-1">Donation
                                                Date</label>
                                            <input type="date" x-model="selectedDonation.donation.date"
                                                class="w-full bg-gray-800 border border-gray-600 rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                        </div>
                                        <div>
                                            <label class="block text-gray-400 mb-1">Donation
                                                Time</label>
                                            <input type="time" x-model="selectedDonation.donation.time"
                                                class="w-full bg-gray-800 border border-gray-600 rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-gray-400 mb-1">Processed
                                                Date</label>
                                            <input type="date" x-model="selectedDonation.donation.processedDate"
                                                class="w-full bg-gray-800 border border-gray-600 rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                        </div>
                                        <div>
                                            <label class="block text-gray-400 mb-1">Expiration
                                                Date</label>
                                            <input type="date" x-model="selectedDonation.donation.expirationDate"
                                                class="w-full bg-gray-800 border border-gray-600 rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notes Section -->
                        <div class="col-span-1">
                            <div class="bg-gray-700 rounded-lg p-4">
                                <h4 class="text-lg font-medium text-white mb-2 border-b border-gray-600 pb-2">
                                    <i class="fas fa-notes-medical mr-2 text-emerald-400"></i>Edit
                                    Notes
                                </h4>
                                <textarea x-model="selectedDonation.donation.notes" rows="4"
                                    class="w-full bg-gray-800 border border-gray-600 rounded-md px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-cyan-500"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-700">
                <button type="button" @click="updateDonation"
                    class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-cyan-600 text-base font-medium text-white hover:bg-cyan-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                    <i class="fas fa-save mr-2"></i> Save Changes
                </button>
                <button type="button" @click="showEditDonation = false"
                    class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-600 shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-white hover:bg-gray-700 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
