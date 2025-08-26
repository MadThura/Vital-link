{{-- @dd($appointment) --}}
<div x-show="updateDialog" x-cloak x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-black bg-opacity-70 z-50 flex items-center justify-center p-4">

    <div @click.away="updateDialog = false" x-show="updateDialog" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="bg-gray-800 rounded-xl shadow-2xl w-full max-w-md border border-cyan-400/20 overflow-hidden">

        <!-- Header with profile -->
        <div class="p-6 pb-0">
            <div class="flex justify-between items-start">
                <button @click="updateDialog = false"
                    class="text-gray-400 hover:text-cyan-300 p-1 rounded-full hover:bg-gray-700/50 transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <!-- Content -->
        <form id="searchForm" action="{{ route('bba.donation-records.store', ['donor' => $appointment->donor->id, 'appointment' => $appointment->id]) }}" method="POST" class="p-6 space-y-6">

            @csrf
            @method('POST')
            <!-- Section: Donation Info -->
            <div class="space-y-4">
                <h3 class="text-base font-semibold text-cyan-400 flex items-center gap-2">
                    <i class="fas fa-tint"></i> Donation Information
                </h3>

                <!-- Units -->
                <div>
                    <label for="units" class="block text-sm font-medium text-cyan-300 mb-1">Units to Collect</label>
                    <input id="units" name="units" type="number" min="1" max="10"
                        class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2.5 text-white 
                       focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500 transition-all"
                        required>
                </div>

                <!-- Notes -->
                <div>
                    <label for="note" class="block text-sm font-medium text-cyan-300 mb-1">Notes</label>
                    <textarea id="note" name="note"  rows="3"
                        class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2.5 text-white 
                       focus:ring-1 focus:ring-cyan-500 focus:border-cyan-500 transition-all text-sm"
                        ></textarea>
                </div>
            </div>

            <!-- Section: Donor Stats -->
            <div class="grid grid-cols-2 gap-3">
                <div class="bg-gray-700/40 p-3 rounded-lg text-center">
                    <p class="text-gray-400 text-xs">Donations</p>
                    <p class="text-cyan-300 font-semibold">{{$appointment->donor->donation_count }}</p>
                </div>
                <div class="bg-gray-700/40 p-3 rounded-lg text-center">
                    <p class="text-gray-400 text-xs">Last Donation At</p>
                    <p class="text-cyan-300 font-semibold">{{ $appointment->donor->last_donation_at ? \Carbon\Carbon::parse($appointment->donor->last_donation_at)->format('F j, Y'): "Never"  }}</p>
                </div>
            </div>

            <!-- Section: Additional Info -->
            <div class="bg-gray-700/30 p-4 rounded-lg border border-gray-600/30">
                <h4 class="text-sm font-medium text-cyan-300 mb-2">Additional Information</h4>
                <ul class="text-xs text-gray-300 space-y-1">
                    <li class="flex items-center"><i class="fas fa-heartbeat text-gray-400 mr-2 w-4"></i>
                        {{ $appointment->donor->blood_type }}</li>
                    <li class="flex items-center"><i class="fas fa-venus-mars text-gray-400 mr-2 w-4"></i>
                        {{ $appointment->donor->gender }}</li>
                    <li class="flex items-center"><i class="fas fa-calendar text-gray-400 mr-2 w-4"></i>
                        {{ $appointment->donor->dob }}</li>
                    <li class="flex items-center"><i class="fas fa-id-card text-gray-400 mr-2 w-4"></i>
                        {{ $appointment->donor->nrc }}</li>

                </ul>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-3 pt-2">
                <button type="button" @click="updateDialog = false"
                    class="px-4 py-2 text-gray-300 hover:text-white text-sm font-medium transition-colors">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-cyan-600 hover:bg-cyan-700 text-white rounded-lg text-sm font-medium shadow-md hover:shadow-cyan-500/20 transition-all">
                    Confirm Donation
                </button>
            </div>
        </form>
        <x-loading-indicator></x-loading-indicator>
    </div>
</div>
