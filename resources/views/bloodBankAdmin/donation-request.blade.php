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
            <div class="p-4 border-b border-gray-700 flex flex-col md:flex-row justify-between items-center gap-3">
                <h3 class="text-lg font-medium text-gray-200 flex items-center gap-2">
                    <i class="far fa-calendar-plus text-rose-400"></i>
                    <span>Request Appointments</span>
                </h3>

                <!-- Form for Search and Filter -->
                <form class="flex flex-col md:flex-row items-center gap-3 w-full md:w-auto" action=""
                    method="GET">
                    <!-- Search Input -->
                    <div class="relative w-full md:w-72">
                        <input type="text" name="search" value="{{ request('search') }}" {{-- keep old search --}}
                            placeholder="Search requests... (name, donor code or appointment ID)"
                            class="bg-gray-700 border border-gray-600 text-white px-4 py-2 rounded-lg pl-10 focus:outline-none focus:ring-1 focus:ring-rose-500 w-full">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>

                    <!-- Filter Select Box -->
                    <select name="status" onchange="this.form.submit()"
                        class="bg-gray-700 border border-gray-600 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-1 focus:ring-rose-500">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved
                        </option>
                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected
                        </option>
                    </select>

                    <!-- Search Button -->
                    <button type="submit"
                        class="bg-rose-500 hover:bg-rose-600 text-white px-4 py-2 rounded-lg transition-colors font-semibold">
                        Search
                    </button>

                    <!-- Clear Button -->
                    <a href="{{ route('bba.donation-requests.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors font-semibold">
                        Clear
                    </a>
                </form>

            </div>



            <!-- Scrollable Table Wrapper -->
            <div class="overflow-x-auto max-h-[400px] relative rounded-lg">
                <table class="w-full">
                    <thead class="bg-gray-800 sticky top-0 z-10">
                        <tr>
                            <th class="py-3 px-4 text-left text-gray-300 font-semibold w-[30%]">Donor</th>
                            <th class="py-3 px-4 text-center text-gray-300 font-semibold w-[20%]">Appointment</th>
                            <th class="py-3 px-4 text-center text-gray-300 font-semibold w-[20%]">Status</th>
                            <th class="py-3 px-4 text-center text-gray-300 font-semibold w-[20%]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        <!-- Example row, repeat dynamically -->
                        @forelse ($donationRequests as $request)
                            <tr class="hover:bg-gray-700/50 transition-colors group">
                                <!-- Donor / Request Column -->
                                <td class="py-4 px-4">
                                    <div class="flex items-center gap-3">
                                        <img src="/donor-files/{{ $request->donor->profile_img }}" alt="Donor"
                                            class="w-10 h-10 rounded-full border border-gray-600 object-cover">
                                        <div>
                                            <p class="font-medium text-white">{{ $request->donor->user->name }}</p>
                                            <div x-data="{ text: '{{ $request->donor->donor_code }}', copied: false }" class="flex items-center justify-center gap-2">
                                                @if ($request->donor->donor_code)
                                                    <p class="font-bold text-cyan-200 text-sm" x-text="text"></p>
                                                    <button
                                                        @click="navigator.clipboard.writeText(text).then(() => { copied = true; setTimeout(() => copied = false, 1000) })"
                                                        class="hover:text-cyan-400">
                                                        <i class="fa-solid fa-copy text-cyan-200 text-sm"></i>
                                                    </button>
                                                    <span x-show="copied" x-transition
                                                        class="text-green-400 text-xs">Copied!</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Appointment Column -->
                                <td class="py-3 px-4 text-center">
                                    <span class="text-gray-400 text-sm">{{ $request->appointment_date }}</span>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <span
                                        class="status-badge {{ $request->status === 'pending' ? 'pending' : ($request->status === 'approved' ? 'approved' : 'rejected') }}">
                                        {{ $request->status }}
                                    </span>
                                </td>


                                <!-- Actions Column -->
                                <td class="py-3 px-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        @if ($request->status === 'pending')
                                            {{-- Approve Form --}}
                                            <form
                                                action="{{ route('bba.donation-requests.updateStatus', ['donationRequest' => $request, 'action' => 'approve']) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit"
                                                    class="text-gray-400 hover:text-gray-300 transition-colors"
                                                    title="Approve">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>

                                            {{-- Reject Form --}}
                                            <form
                                                action="{{ route('bba.donation-requests.updateStatus', ['donationRequest' => $request, 'action' => 'reject']) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit"
                                                    class="text-rose-400 hover:text-rose-300 transition-colors"
                                                    title="Reject">
                                                    <i class="fas fa-xmark"></i>
                                                </button>
                                            </form>
                                        @elseif($request->status === 'approved')
                                            <span
                                                class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium rounded-md bg-green-100 text-green-700 dark:bg-green-800/30 dark:text-green-400">
                                                <i class="fas fa-check-circle"></i>
                                                Approved
                                            </span>
                                        @elseif($request->status === 'rejected')
                                            <span
                                                class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium rounded-md bg-rose-100 text-rose-700 dark:bg-rose-800/30 dark:text-rose-400">
                                                <i class="fas fa-times-circle"></i>
                                                Rejected
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <!-- Show only if no data -->
                            <tr>
                                <td colspan="5" class="text-center text-gray-400 py-4">No appointment requests found
                                </td>
                            </tr>
                        @endforelse


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
