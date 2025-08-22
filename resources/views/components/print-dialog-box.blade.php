
<div x-show="showPrintDonation" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div x-show="showPrintDonation" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" @click="showPrintDonation = false">
        </div>

        <!-- Modal panel -->
        <div x-show="showPrintDonation" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block align-bottom bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">

            <!-- Header -->
            <div
                class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:items-center sm:justify-between border-b border-gray-700">
                <h3 class="text-lg leading-6 font-medium text-white" id="modal-title">
                    Print Donation Certificate
                </h3>
                <button @click="showPrintDonation = false" class="text-gray-400 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Certificate Body -->
            <div class="px-4 pt-5 pb-4 sm:p-6">
                <div id="donation-certificate"
                    class="bg-white p-8 rounded-lg shadow-lg max-w-3xl mx-auto border-8 border-red-600">
                    <!-- Certificate Border Design -->
                    <div class="absolute top-0 left-0 w-full h-2 bg-red-600">
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-2 bg-red-600">
                    </div>

                    <!-- Certificate Content -->
                    <div class="text-center mb-8">
                        <div class="flex justify-center mb-4">
                            <img src="/images/blood-drop-logo.png" alt="Blood Drop Logo" class="h-20">
                        </div>
                        <h1 class="text-4xl font-bold text-red-700 mb-2">
                            CERTIFICATE OF APPRECIATION</h1>
                        <p class="text-gray-600 italic">For the noble act of
                            blood donation</p>
                    </div>

                    <div class="text-center mb-10">
                        <p class="text-lg mb-6">This certificate is proudly
                            presented to</p>
                        <h2 x-text="selectedDonation.donor.name"
                            class="text-3xl font-bold text-red-700 mb-2 border-b-2 border-red-200 pb-2 inline-block px-8">
                        </h2>
                        <p class="text-gray-600 mt-4">in recognition of your
                            life-saving blood donation</p>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mb-8 text-center">
                        <div class="border-r border-gray-200 pr-4">
                            <p class="text-sm text-gray-500">Donation Date</p>
                            <p x-text="selectedDonation.donation.date" class="font-bold"></p>
                        </div>
                        <div class="border-r border-gray-200 pr-4">
                            <p class="text-sm text-gray-500">Blood Type</p>
                            <p x-text="selectedDonation.donation.bloodType" class="font-bold text-red-600"></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Amount Donated</p>
                            <p x-text="selectedDonation.donation.amount" class="font-bold"></p>
                        </div>
                    </div>

                    <div class="text-center mb-8">
                        <p class="italic text-gray-700 mb-6">
                            "Your donation could save up to three lives. Thank
                            you for being a hero!"
                        </p>
                        <div class="h-24 flex items-center justify-center">
                            <!-- Signature area -->
                            <div class="border-t-2 border-gray-400 w-48 mx-auto pt-2">
                                <p x-text="selectedDonation.staff.name" class="font-bold"></p>
                                <p x-text="selectedDonation.staff.title" class="text-sm text-gray-600"></p>
                                <p class="text-xs text-gray-500">LifeStream
                                    Blood Center</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center text-xs text-gray-500 mt-6">
                        <p>Certificate ID: <span x-text="selectedDonation.id" class="font-mono"></span></p>
                        <p x-text="selectedDonation.center.name + ' | ' + selectedDonation.center.address">
                        </p>
                        <p x-text="'Contact: ' + selectedDonation.center.phone">
                        </p>
                    </div>
                </div>
            </div>

            <!-- Footer with Print Button -->

            <div class="bg-gray-900 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t border-gray-700">
                <button type="button" @click="sendCertificate"
                    class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                    <i class="fas fa-paper-plane mr-2"></i> Send Certificate
                </button>
                <button type="button" @click="printCertificate"
                    class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-amber-600 text-base font-medium text-white hover:bg-amber-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                    <i class="fas fa-print mr-2"></i> Print Certificate
                </button>
                
                <button type="button" @click="showPrintDonation = false"
                    class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-600 shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-white hover:bg-gray-700 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
