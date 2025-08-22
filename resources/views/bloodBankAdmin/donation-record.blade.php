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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                <div class="bg-gray-800 p-4 rounded-lg border border-gray-700">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Total Donations</p>
                            <h3 class="text-2xl font-bold text-white mt-1">1,842</h3>
                        </div>
                        <div class="bg-cyan-900/30 p-2 rounded-lg">
                            <i class="fas fa-syringe text-cyan-400"></i>
                        </div>
                    </div>
                    <p class="text-green-400 text-sm mt-2 flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> 12% from last month
                    </p>
                </div>

                <div class="bg-gray-800 p-4 rounded-lg border border-gray-700">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">This Month</p>
                            <h3 class="text-2xl font-bold text-white mt-1">147</h3>
                        </div>
                        <div class="bg-purple-900/30 p-2 rounded-lg">
                            <i class="fas fa-calendar-alt text-purple-400"></i>
                        </div>
                    </div>
                    <p class="text-green-400 text-sm mt-2 flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> 8% from last month
                    </p>
                </div>

                <div class="bg-gray-800 p-4 rounded-lg border border-gray-700">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Avg. Donation</p>
                            <h3 class="text-2xl font-bold text-white mt-1">470ml</h3>
                        </div>
                        <div class="bg-emerald-900/30 p-2 rounded-lg">
                            <i class="fas fa-weight-scale text-emerald-400"></i>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm mt-2">±10ml variation</p>
                </div>

                <div class="bg-gray-800 p-4 rounded-lg border border-gray-700">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Most Common Type</p>
                            <h3 class="text-2xl font-bold text-white mt-1">O+</h3>
                        </div>
                        <div class="bg-amber-900/30 p-2 rounded-lg">
                            <i class="fas fa-droplet text-amber-400"></i>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm mt-2">38% of total</p>
                </div>
            </div>

            <!-- Donor List Section -->
            <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden mb-8">
                <div class="p-4 border-b border-gray-700 flex justify-between">
                    <h3 class="text-lg font-medium text-gray-200 flex items-center gap-2">
                        <i class="fa-regular fa-calendar-check text-emerald-400"></i>
                        <span>Appointments</span>
                    </h3>
                    <form method="GET" action="" class="flex flex-col md:flex-row items-center gap-3">
                        <!-- Search Input -->
                        <div class="relative">
                            <input type="text" name="search_appointment" value="{{ request('search_appointment') }}"
                                placeholder="Search donors... (id or name or appointment id)"
                                class="bg-gray-700 border border-gray-600 text-white px-4 py-2 rounded-lg pl-10 focus:outline-none focus:ring-1 focus:ring-cyan-500 w-72">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>

                        <!-- Date Filter -->
                        <div>
                            <input type="date" name="appointment_date" value="{{ request('appointment_date') }}"
                                class="bg-gray-700 border border-gray-600 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-1 focus:ring-cyan-500">
                        </div>
                        <div>
                            <select name="appointment_status" onchange="this.form.submit()"
                                class="bg-gray-700 border border-gray-600 text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-1 focus:ring-rose-500">
                                <option value="">All Status</option>
                                <option value="in_progress"
                                    {{ request('appointment_status') === 'in_progress' ? 'selected' : '' }}>
                                    In
                                    Progress</option>
                                <option value="completed"
                                    {{ request('appointment_status') === 'completed' ? 'selected' : '' }}>
                                    Completed</option>
                                <option value="cancled"
                                    {{ request('appointment_status') === 'cancled' ? 'selected' : '' }}>
                                    Cancelled
                                </option>
                                <option value="expired"
                                    {{ request('appointment_status') === 'expired' ? 'selected' : '' }}>Expired
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

                <!-- Scrollable table wrapper -->
                <div class="overflow-x-auto max-h-[400px] relative rounded-lg">
                    <table class="w-full">
                        <thead class="bg-gray-800 sticky top-0 z-10">
                            <tr>
                                <th class="py-3 px-4 text-left text-gray-300 font-semibold w-[20%]">Name</th>
                                <th class="py-3 px-4 text-center text-gray-300 font-semibold w-[30%]">Donor Code</th>
                                <th class="py-3 px-4 text-center text-gray-300 font-semibold w-[30%]">Appointment Id
                                </th>
                                <th class="py-3 px-4 text-center text-gray-300 font-semibold w-[10%]">Status
                                </th>
                                <th class="py-3 px-4 text-center text-gray-300 font-semibold w-[10%]">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @forelse ($approvedAppointments as $appointment)
                                <!-- Approved Donor -->
                                <tr class="hover:bg-gray-700/50 transition-colors group">
                                    <!-- Name Column -->
                                    <td class="py-3 px-3 text-gray-300">
                                        <div class="flex items-center gap-3">
                                            <div class="relative">
                                                <img src="/donor-files/{{ $appointment->donor->profile_img }}"
                                                    alt="user"
                                                    class="w-8 h-8 rounded-full group-hover:border-cyan-400 object-cover transition-colors" />
                                            </div>
                                            <span
                                                class="group-hover:text-cyan-400 transition-colors">{{ $appointment->donor->user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-3 text-gray-300 text-center">
                                        <div x-data="{ text: '{{ $appointment->donor->donor_code }}', copied: false }" class="flex items-center justify-center gap-2">
                                            @if ($appointment->donor->donor_code)
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
                                    <td class="py-3 px-3 text-gray-300 text-center">
                                        <div x-data="{ text: '{{ $appointment->appointment_id }}', copied: false }" class="flex items-center justify-center gap-2">
                                            @if ($appointment->appointment_id)
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
                                    <td class="py-3 px-3 text-center">
                                        @if ($appointment->status === 'in_progress')
                                            <span class="status-badge pending">{{ $appointment->status }}</span>
                                        @elseif ($appointment->status === 'completed')
                                            <span class="status-badge completed">{{ $appointment->status }}
                                            </span>
                                        @elseif($appointment->status === 'canceled')
                                            <span class="status-badge cancelled">{{ $appointment->status }}</span>
                                        @elseif($appointment->status === 'expired')
                                            <span class="status-badge suspended">{{ $appointment->status }}</span>
                                        @endif
                                    </td>

                                    <td class="py-3 px-4 text-center">

                                        <div class="flex justify-center gap-2">
                                            <div x-data="{ updateDialog: false }">
                                                <button @click="updateDialog = true"
                                                    class="relative 
        {{ $appointment->status === 'completed' ? 'text-gray-400 cursor-not-allowed' : 'text-cyan-400 hover:text-cyan-300' }} 
        transition-all group"
                                                    {{ $appointment->status === 'completed' ? 'disabled' : '' }}>
                                                    <i class="fa-solid fa-pen-nib"></i>
                                                    <span
                                                        class="absolute -bottom-1 left-0 w-0 h-0.5 bg-cyan-400 transition-all group-hover:w-full"></span>
                                                </button>
                                                <x-update-dialog :appointment="$appointment" />

                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-gray-400 py-4">No appointment found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination (outside the scroll) -->
                <div class="m-3 px-5">
                    {{ $approvedAppointments->links() }}
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
    <script>
        function printCertificate() {
            const certificateElement = document.getElementById('donation-certificate');
            const printWindow = window.open('', '', 'width=900,height=650');
            printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Donation Certificate</title>
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;500&display=swap');
                    body { 
                        font-family: 'Roboto', sans-serif; 
                        margin: 0;
                        padding: 20px;
                        background-color: #fff;
                        color: #333;
                    }
                    .certificate-container {
                        max-width: 800px;
                        margin: 0 auto;
                        border: 15px solid #c00;
                        padding: 40px;
                        position: relative;
                        background-color: #fff;
                    }
                    h1, h2 {
                        font-family: 'Playfair Display', serif;
                    }
                    .blood-drop {
                        color: #c00;
                    }
                    .signature-line {
                        border-top: 1px solid #333;
                        width: 200px;
                        margin: 40px auto 0;
                    }
                    @media print {
                        @page {
                            size: A4 landscape;
                            margin: 0;
                        }
                        body {
                            padding: 0;
                        }
                        .no-print {
                            display: none;
                        }
                    }
                </style>
            </head>
            <body>
                ${certificateElement.innerHTML}
                <script>
                    window.onload = function() {
                        window.print();
                        setTimeout(function() {
                            window.close();
                        }, 1000);
                    };
                <\/script>
            </body>
            </html>
        `);
            printWindow.document.close();
        }
    </script>
