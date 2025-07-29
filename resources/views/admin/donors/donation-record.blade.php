<x-admin-layout>
    <x-search-bar />
    
    <div class="h-full bg-gray-900 text-gray-200 p-6 overflow-auto">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-white flex items-center gap-3">
                    <i class="fas fa-tint text-cyan-400"></i>
                    Donation Records
                </h1>
                <p class="text-gray-400 mt-1">Track and manage all blood donation activities</p>
            </div>
            <div class="flex gap-3">
                
                <button
                    class="bg-gray-700 hover:bg-gray-600 border border-gray-600 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition">
                    <i class="fas fa-filter"></i> Filters
                </button>
            </div>
        </div>
        <!-- Stats Summary -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
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

        <!-- Records Table -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden">
            <!-- Table Header -->
            <div class="flex justify-between items-center p-4 border-b border-gray-700">
                <h3 class="text-lg font-semibold">Recent Donations</h3>
                <div class="flex gap-3">
                    <div class="relative">
                        <input type="text" placeholder="Search records..."
                            class="bg-gray-700 border border-gray-600 text-white px-4 py-2 rounded-lg pl-10 focus:outline-none focus:ring-1 focus:ring-cyan-500 w-64">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <button
                        class="bg-gray-700 hover:bg-gray-600 border border-gray-600 text-white px-3 py-2 rounded-lg transition">
                        <i class="fas fa-download"></i>
                    </button>
                </div>
            </div>

            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-700 text-gray-300">
                        <tr>
                            <th class="py-3 px-4 text-left font-medium">Donor</th>
                            <th class="py-3 px-4 text-center font-medium">Blood Type</th>
                            <th class="py-3 px-4 text-center font-medium">Amount</th>
                            <th class="py-3 px-4 text-center font-medium">Date</th>
                            <th class="py-3 px-4 text-center font-medium">Status</th>
                            <th class="py-3 px-4 text-center font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        <!-- Record 1 -->
                        <tr class="hover:bg-gray-750 transition">
                            <td class="py-4 px-4">
                                <div class="flex items-center gap-3">
                                    <img src="/images/profile-1.jpg" alt="Donor"
                                        class="w-10 h-10 rounded-full border border-gray-600 object-cover">
                                    <div>
                                        <p class="font-medium text-white">Sarah Johnson</p>
                                        <p class="text-sm text-gray-400">ID: DNR-2847</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span
                                    class="bg-red-900/30 text-red-400 px-3 py-1 rounded-full text-sm font-medium">O+</span>
                            </td>
                            <td class="py-4 px-4 text-center text-white font-medium">450ml</td>
                            <td class="py-4 px-4 text-center text-gray-400">2025-07-15</td>
                            <td class="py-4 px-4 text-center">
                                <span
                                    class="status-badge completed">Complete</span>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <div class="flex justify-center gap-2">
                                    {{-- button --}}
                                    <div x-data="{ showDonationDetail: false, selectedDonation: null }">
                                        <!-- View Button -->
                                        <button
                                            @click="
                                                selectedDonation = {
                                                    id: 'DNR-2847',
                                                    donor: {
                                                        name: 'Sarah Johnson',
                                                        photo: '/images/donor1.jpg',
                                                        id: 'DNR-2847',
                                                        age: 32,
                                                        gender: 'Female',
                                                        contact: '+1 (555) 123-4567',
                                                        email: 'sarah.j@example.com',
                                                        address: '123 Main St, Anytown, USA'
                                                    },
                                                    donation: {
                                                        date: '2025-07-15',
                                                        time: '10:30 AM',
                                                        amount: '450ml',
                                                        bloodType: 'O+',
                                                        status: 'Processed',
                                                        processedDate: '2025-07-16',
                                                        expirationDate: '2025-08-29',
                                                        notes: 'Donor reported feeling well after donation. No adverse reactions.'
                                                    },
                                                    staff: {
                                                        name: 'Dr. Michael Chen',
                                                        id: 'EMP-4281',
                                                        role: 'Phlebotomist'
                                                    }
                                                };
                                                showDonationDetail = true;
                                            "
                                            class="text-cyan-400 hover:text-cyan-300 p-2 rounded-full hover:bg-gray-700 transition"
                                            title="View">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <!-- Donation Detail Dialog -->
                                        <x-donation-record-dialog-box />
                                    </div>

                                    <!-- Edit Button with Dialog -->
                                    <div x-data="{ showEditDonation: false, selectedDonation: null }">
                                        <button
                                            @click="
                                            selectedDonation = {
                                                id: 'DNR-2847',
                                                donor: {
                                                    name: 'Sarah Johnson',
                                                    photo: '/images/donor1.jpg',
                                                    id: 'DNR-2847',
                                                    age: 32,
                                                    gender: 'Female',
                                                    contact: '+1 (555) 123-4567',
                                                    email: 'sarah.j@example.com',
                                                    address: '123 Main St, Anytown, USA'
                                                },
                                                donation: {
                                                    date: '2025-07-15',
                                                    time: '10:30 AM',
                                                    amount: '450',
                                                    bloodType: 'O+',
                                                    status: 'Processed',
                                                    processedDate: '2025-07-16',
                                                    expirationDate: '2025-08-29',
                                                    notes: 'Donor reported feeling well after donation. No adverse reactions.'
                                                },
                                                staff: {
                                                    name: 'Dr. Michael Chen',
                                                    id: 'EMP-4281',
                                                    role: 'Phlebotomist'
                                                }
                                            };
                                            showEditDonation = true;
                                        "
                                            class="text-purple-400 hover:text-purple-300 p-2 rounded-full hover:bg-gray-700 transition"
                                            title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </button>

                                        <!-- Edit Donation Dialog Box -->
                                        <x-edit-dialog-box />
                                    </div>

                                    <!-- Print Button -->
                                    <div x-data="{ showPrintDonation: false, selectedDonation: null }">
                                        <button
                                            @click="
                                                selectedDonation = {
                                                    id: 'DNR-2847',
                                                    donor: {
                                                        name: 'Sarah Johnson',
                                                        photo: '/images/donor1.jpg',
                                                        id: 'DNR-2847',
                                                        age: 32,
                                                        gender: 'Female'
                                                    },
                                                    donation: {
                                                        date: '2025-07-15',
                                                        bloodType: 'O+',
                                                        amount: '450ml',
                                                        expirationDate: '2025-08-29'
                                                    },
                                                    staff: {
                                                        name: 'Dr. Michael Chen',
                                                        title: 'Chief Phlebotomist'
                                                    },
                                                    center: {
                                                        name: 'LifeStream Blood Center',
                                                        address: '123 Healthcare Blvd, Anytown, USA',
                                                        phone: '(555) 123-4567'
                                                    }
                                                };
                                                showPrintDonation = true;
                                            "
                                            class="text-amber-400 hover:text-amber-300 p-2 rounded-full hover:bg-gray-700 transition"
                                            title="Print">
                                            <i class="fas fa-print"></i>
                                        </button>

                                        <!-- Print Certificate Dialog -->
                                        <x-print-dialog-box />
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
