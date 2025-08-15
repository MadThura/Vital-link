@props(['donor'])
<div x-show="showRejectModal" x-transition
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-70" style="display: none">
    <!-- Modal box -->
    <div @click.away="showRejectModal = false"
        class="bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md border border-gray-700">

        <!-- Modal Header -->
        <h2 class="text-lg font-semibold text-gray-100 mb-4">Confirm
            Rejection</h2>
        <p class="mb-4 text-gray-300">Are you sure you want to reject {{ $donor->user->name }}</p>

        <!-- Form inside Modal -->
        <form action="{{ route('donors.updateStatus', ['donor' => $donor, 'action' => 'reject']) }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Rejection Reasons -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-2">Rejection
                    Reasons</label>

                <div class="space-y-2">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="reasons[health_certificate]" value="Invalid health certificate"
                            class="text-rose-500">
                        <span class="text-gray-200">Invalid health
                            certificate</span>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="reasons[nrc]" value="Incorrect personal information"
                            class="text-rose-500">
                        <span class="text-gray-200">Invalid NRC Photos</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="reasons[profile_img]" value="Incorrect personal information"
                            class="text-rose-500">
                        <span class="text-gray-200">Invalid Profile Picture</span>
                    </label>
                    <textarea name="reasons[note]" rows="3" placeholder="Additional notes..."
                        class="w-full bg-gray-800 text-gray-200 rounded-md border border-gray-700 px-3 py-2 resize-y focus:outline-none focus:ring-2 focus:ring-rose-500 focus:border-rose-500 transition" required></textarea>

                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-4">
                <button type="button"
                    class="px-4 py-2 rounded-md bg-gray-600 hover:bg-gray-500 text-gray-100 transition-colors"
                    @click="showRejectModal = false">
                    Cancel
                </button>

                <button type="submit"
                    class="px-4 py-2 rounded-md bg-rose-600 hover:bg-rose-500 text-white transition-colors">
                    Confirm Reject
                </button>
            </div>
        </form>

    </div>
</div>
