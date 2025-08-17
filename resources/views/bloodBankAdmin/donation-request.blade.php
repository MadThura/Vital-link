<x-admin-layout>
    <!-- Main Content -->
    <div class="h-full bg-gray-900 text-gray-200 p-6 overflow-auto scrollbar-none">
        <!-- Page Header -->
        <div class="flex flex-col mb-8 gap-4">
            <!-- Page Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-white flex items-center gap-3">
                        <i class="fas fa-tint text-cyan-400"></i>
                        Donation Requests
                    </h1>
                    <p class="text-gray-400 mt-1">Track and manage all blood donation activities</p>
                </div>
            </div>
        </div>
        <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden mb-8">
            <!-- Header with Search -->
            <div class="p-4 border-b border-gray-700 flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-200 flex items-center gap-2">
                    <i class="far fa-calendar-plus text-rose-400"></i>
                    <span>Request Appointments</span>
                </h3>
                <div class="flex gap-3">
                    <div class="relative">
                        <input type="text" placeholder="Search requests... (name or blood bank)"
                            class="bg-gray-700 border border-gray-600 text-white px-4 py-2 rounded-lg pl-10 focus:outline-none focus:ring-1 focus:ring-rose-500 w-72">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
            </div>

            <!-- Scrollable Table Wrapper -->
            <div class="overflow-x-auto max-h-[400px] relative rounded-lg">
                <table class="w-full">
                    <thead class="bg-gray-800 sticky top-0 z-10">
                        <tr>
                            <th class="py-3 px-4 text-left text-gray-300 font-semibold w-[60%]">Donor</th>
                            <th class="py-3 px-4 text-center text-gray-300 font-semibold w-[20%]">Appointment</th>
                            <th class="py-3 px-4 text-center text-gray-300 font-semibold w-[20%]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        <!-- Example row, repeat dynamically -->
                        <tr class="hover:bg-gray-700/50 transition-colors group">
                            <!-- Donor / Request Column -->
                            <td class="py-3 px-3 text-gray-300">
                                <div class="flex items-center gap-3">
                                    <span class="font-medium group-hover:text-rose-400 transition-colors">
                                        Donor Name
                                    </span>
                                </div>
                            </td>

                            <!-- Appointment Column -->
                            <td class="py-3 px-4 text-center">
                                <span class="text-gray-400 text-sm">2025-08-18</span>
                            </td>

                            <!-- Actions Column -->
                            <td class="py-3 px-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <!-- Approve Icon -->
                                    <button type="button" class="text-gray-400 hover:text-gray-300 transition-colors">
                                        <i class="fas fa-check"></i>
                                    </button>

                                    <!-- Reject Icon -->
                                    <button type="button" class="text-rose-400 hover:text-rose-300 transition-colors">
                                        <i class="fas fa-xmark"></i>
                                    </button>

                                </div>
                            </td>
                        </tr>

                        <!-- Show only if no data -->
                        <tr>
                            <td colspan="3" class="text-center text-gray-400 py-4">No appointment requests found
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="m-3 px-5">

            </div>
        </div>

    </div>

    <!-- JS: disable time inputs if "Closed" is checked -->
    <script>
        function toggleTimeInputs(checkbox) {
            const row = checkbox.closest("tr");
            const inputs = row.querySelectorAll("input[type='time']");
            inputs.forEach(input => {
                input.disabled = checkbox.checked;
                if (checkbox.checked) {
                    input.value = "";
                }
            });
        }
    </script>
</x-admin-layout>
