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
                            Donation Records
                        </h1>
                        <p class="text-gray-400 mt-1">Track and manage all blood donation activities</p>
                    </div>
                </div>
            </div>


            <!-- Stats Summary -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
                {{-- <div class="bg-gray-800 p-4 rounded-lg border border-gray-700">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Approved Appointments</p>
                            <h3 class="text-2xl font-bold text-white mt-1">1,842</h3>
                        </div>
                        <div class="bg-cyan-900/30 p-2 rounded-lg">
                            <i class="fas fa-calendar-check text-cyan-400"></i>
                        </div>
                    </div>
                 
                </div>

                <div class="bg-gray-800 p-4 rounded-lg border border-gray-700">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Appointments In Progress</p>
                            <h3 class="text-2xl font-bold text-white mt-1">147</h3>
                        </div>
                        <div class="bg-amber-900/30 p-2 rounded-lg">
                            <i class="far fa-clock text-amber-400"></i>
                        </div>
                    </div>
               
                </div> --}}

                <div class="bg-gray-800 p-4 rounded-lg border border-gray-700">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Total Records</p>
                            <h3 class="text-2xl font-bold text-white mt-1">{{ $countOfDonations }}</h3>
                        </div>
                        <div class="bg-blue-900/30 p-2 rounded-lg">
                            <i class="fa-solid fa-file-medical text-blue-400"></i>
                        </div>
                    </div>
        
                </div>
            </div>
            <!-- Records Table Section -->
            <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden">
                <!-- Table Header -->
                <div class="flex justify-between items-center p-4 border-b border-gray-700">
                    <div class="flex items-center gap-3">
                        <i class="fa-regular fa-clock text-2xl text-rose-400"></i>
                        <h3 class="text-lg font-semibold">Recent Donations</h3>
                    </div>
                    <form method="GET" action="" class="flex flex-col md:flex-row items-center gap-3">
                        <!-- Search Input -->
                        <div class="relative">
                            <input type="text" name="search_donation" value="{{ request('search_donation') }}"
                                placeholder="Search donors... (id or name or appointment id)"
                                class="bg-gray-700 border border-gray-600 text-white px-4 py-2 rounded-lg pl-10 focus:outline-none focus:ring-1 focus:ring-cyan-500 w-72">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>

                        <!-- Date Filter -->
                        <div>
                            <input type="date" name="donation_date" value="{{ request('donation_date') }}"
                                class="bg-gray-700 border border-gray-600 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-1 focus:ring-cyan-500">
                        </div>
                        <div>
                            <select name="blood_type_donation" onchange="this.form.submit()"
                                class="bg-gray-700 border border-gray-600 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-1 focus:ring-cyan-500">
                                <option value="">All Blood Types</option>
                                <option value="A+" {{ request('blood_type_donation') == 'A+' ? 'selected' : '' }}>
                                    A+
                                </option>
                                <option value="A-" {{ request('blood_type_donation') == 'A-' ? 'selected' : '' }}>
                                    A-
                                </option>
                                <option value="B+" {{ request('blood_type_donation') == 'B+' ? 'selected' : '' }}>
                                    B+
                                </option>
                                <option value="B-" {{ request('blood_type_donation') == 'B-' ? 'selected' : '' }}>
                                    B-
                                </option>
                                <option value="AB+"
                                    {{ request('blood_type_donation') == 'AB+' ? 'selected' : '' }}>AB+
                                </option>
                                <option value="AB-"
                                    {{ request('blood_type_donation') == 'AB-' ? 'selected' : '' }}>AB-
                                </option>
                                <option value="O+" {{ request('blood_type_donation') == 'O+' ? 'selected' : '' }}>
                                    O+
                                </option>
                                <option value="O-" {{ request('blood_type_donation') == 'O-' ? 'selected' : '' }}>
                                    O-
                                </option>
                            </select>
                        </div>

                        <!-- Search Button -->
                        <button type="submit"
                            class="bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded-lg transition-colors font-semibold">
                            Search
                        </button>

                        <!-- Clear Button -->
                        <a href="{{ route('bba.donation-record') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors font-semibold">
                            Clear
                        </a>
                    </form>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto max-h-[500px]"> <!-- Added max-height and overflow -->
                    <table class="w-full">
                        <thead class="bg-gray-700 text-gray-300 sticky top-0"> <!-- Made header sticky -->
                            <tr>
                                <th class="py-3 px-4 text-left font-medium w-[20%]">Donor</th>
                                <th class="py-3 px-4 text-center font-medium w-[20%]">Donation ID</th>
                                <th class="py-3 px-4 text-center font-medium w-[10%]">Blood Type</th>
                                <th class="py-3 px-4 text-center font-medium w-[10%]">Unit(s)</th>
                                <th class="py-3 px-4 text-center font-medium w-[30%]">Date</th>
                                <th class="py-3 px-4 text-center font-medium w-[10%]">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <!-- Record 1 -->
                            @forelse($donations as $donation)
                                <tr class="hover:bg-gray-750 transition">
                                    <td class="py-4 px-4">
                                        <div class="flex items-center gap-3">
                                            <img src="/donor-files/{{ $donation->donor->profile_img }}"
                                                alt="Donor"
                                                class="w-10 h-10 rounded-full border border-gray-600 object-cover">
                                            <div>
                                                <p class="font-medium text-white">{{ $donation->donor->user->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div x-data="{ text: '{{ $donation->donation_id }}', copied: false }" class="flex items-center justify-center gap-2">
                                            @if ($donation->donation_id)
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
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <span
                                            class="bg-red-900/30 text-red-400 px-3 py-1 rounded-full text-sm font-medium">{{ $donation->donor->blood_type }}</span>
                                    </td>
                                    <td class="py-4 px-4 text-center text-white font-medium">{{ $donation->units }}
                                    </td>
                                    <td class="py-4 px-4 text-center text-gray-400">
                                        {{ \Carbon\Carbon::parse($donation->donation_date)->format('F j, Y g:i A') }}
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <div class="flex justify-center gap-4">
                                            <div x-data="{ showDonationDetail: false, selectedDonation: null }">
                                                <!-- View Button -->
                                                <button @click="showDonationDetail = true"
                                                    class="relative text-cyan-400 hover:text-cyan-300 transition-all group"
                                                    title="View">
                                                    <i class="fas fa-eye"></i>
                                                    <span
                                                        class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all group-hover:w-full"></span>

                                                </button>
                                                <!-- Donation Detail Dialog -->
                                                <x-donation-record-dialog-box :donation="$donation" />
                                            </div>

                                            <!-- Print Button -->
                                            <div x-data="{ showPrintDonation: false, selectedDonation: null }">
                                                <a href="{{ route('downloadCertificate', $donation->donation_id) }}"><button
                                                        class="relative text-amber-400 hover:text-amber-300 transition-all group"
                                                        title="Download">
                                                        <i class="fas fa-download"></i>
                                                        <span
                                                            class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#fbbf24] transition-all group-hover:w-full"></span>
                                                    </button></a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-gray-400 py-4">No Donation Record
                                        found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination (outside the scroll) -->
                <div class="m-3 px-5">
                    {{ $donations->links() }}
                </div>
            </div>
        </div>

    </x-admin-layout>

