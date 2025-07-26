<x-admin-layout>
    <div class="h-[93%] bg-gray-100">
        <!-- Stats Cards - Updated to match sidebar colors -->
        <div class="w-full h-[18%] flex items-center justify-around flex-nowrap px-6">
            <!-- Total Donors Card -->
            <div class="flex items-center bg-white rounded-xl p-5 shadow-sm w-[250px] mx-2 hover:-translate-y-0.5 transition-transform border border-gray-200">
                <div class="text-2xl mr-4">
                    <i class="fa-solid fa-hand-holding-heart p-2 rounded-full text-cyan-500 bg-cyan-100"></i>
                </div>
                <div class="ml-7">
                    <h2 class="m-0 text-gray-800 text-3xl font-bold">1,234</h2>
                    <p class="mt-1 text-gray-600 text-sm">Total Donors</p>
                </div>
            </div>
            
            <!-- Pending Approval Card -->
            <div class="flex items-center bg-white rounded-xl p-5 shadow-sm w-[250px] mx-2 hover:-translate-y-0.5 transition-transform border border-gray-200">
                <div class="text-2xl mr-4">
                    <i class="fa-regular fa-clock p-2 rounded-full text-purple-500 bg-purple-100"></i>
                </div>
                <div class="ml-7">
                    <h2 class="m-0 text-gray-800 text-3xl font-bold">125</h2>
                    <p class="mt-1 text-gray-600 text-sm">Pending Approval</p>
                </div>
            </div>
            
            <!-- Available Donors Card -->
            <div class="flex items-center bg-white rounded-xl p-5 shadow-sm w-[250px] mx-2 hover:-translate-y-0.5 transition-transform border border-gray-200">
                <div class="text-2xl mr-4">
                    <i class="fa-solid fa-person-circle-check p-2 rounded-full text-emerald-500 bg-emerald-100"></i>
                </div>
                <div class="ml-7">
                    <h2 class="m-0 text-gray-800 text-3xl font-bold">985</h2>
                    <p class="mt-1 text-gray-600 text-sm">Available Donors</p>
                </div>
            </div>
            
            <!-- Deferred Donors Card -->
            <div class="flex items-center bg-white rounded-xl p-5 shadow-sm w-[250px] mx-2 hover:-translate-y-0.5 transition-transform border border-gray-200">
                <div class="text-2xl mr-4">
                    <i class="fa-solid fa-person-circle-xmark p-2 rounded-full text-amber-500 bg-amber-100"></i>
                </div>
                <div class="ml-7">
                    <h2 class="m-0 text-gray-800 text-3xl font-bold">871</h2>
                    <p class="mt-1 text-gray-600 text-sm">Deferred Donors</p>
                </div>
            </div>
        </div>

        <!-- Two Column Layout -->
        <div class="flex h-[82%] gap-5 p-5">
            <!-- First Column -->
            <div class="flex-1">
                <!-- Graph Container -->
                <div class="bg-white rounded-lg shadow-sm p-6 w-full h-[300px] border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Donation Trends</h3>
                        <select class="bg-gray-100 border border-gray-300 text-gray-700 py-1 px-3 rounded-lg text-sm">
                            <option>Last 7 Days</option>
                            <option>Last 30 Days</option>
                            <option>Last 6 Months</option>
                        </select>
                    </div>
                    <!-- Placeholder for chart -->
                    <div class="h-[220px] bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                        <i class="fas fa-chart-line text-3xl"></i>
                        <span class="ml-2">Donation Chart</span>
                    </div>
                </div>
                
                <!-- Quick Access Buttons -->
                <h2 class="text-xl mt-5 mb-3 text-gray-800">Quick Access</h2>
                <div class="flex items-center justify-start gap-4">
                    <a href="#">
                        <button class="text-gray-700 text-sm outline-none border-none py-2.5 px-5 rounded-lg bg-white shadow hover:shadow-md transition-all border border-gray-200 flex items-center">
                            <i class="fa-regular fa-pen-to-square text-blue-500 bg-blue-50 p-1.5 rounded-full mr-2.5"></i>
                            Update Status
                        </button>
                    </a>
                    <a href="#">
                        <button class="text-gray-700 text-sm outline-none border-none py-2.5 px-5 rounded-lg bg-white shadow hover:shadow-md transition-all border border-gray-200 flex items-center">
                            <i class="fa-solid fa-file-invoice text-emerald-500 bg-emerald-50 p-1.5 rounded-full mr-2.5"></i>
                            Donation Record
                        </button>
                    </a>
                    <a href="#">
                        <button class="text-gray-700 text-sm outline-none border-none py-2.5 px-5 rounded-lg bg-white shadow hover:shadow-md transition-all border border-gray-200 flex items-center">
                            <i class="fa-solid fa-file-export text-amber-500 bg-amber-50 p-1.5 rounded-full mr-2.5"></i>
                            Export Certificate
                        </button>
                    </a>
                </div>
            </div>

            <!-- Second Column - Top Donors Table -->
            <div class="w-[45%] flex flex-col p-5 bg-white rounded-lg shadow-sm overflow-y-auto border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Top Donors</h3>
                    <button class="text-sm text-cyan-500 hover:text-cyan-600 flex items-center">
                        <i class="fas fa-sync-alt mr-1"></i> Refresh
                    </button>
                </div>
                
                <div class="top-donor-table overflow-y-auto">
                    <table class="w-full border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="py-3 px-3 border-b border-gray-200 text-gray-700 font-semibold text-left">Name</th>
                                <th class="py-3 px-3 border-b border-gray-200 text-gray-700 font-semibold text-center">Count</th>
                                <th class="py-3 px-3 border-b border-gray-200 text-gray-700 font-semibold text-center">Last Donation</th>
                                <th class="py-3 px-3 border-b border-gray-200 text-gray-700 font-semibold text-center">Amount (ml)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <!-- Donor Row 1 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-3 px-3 text-left">
                                    <div class="flex items-center gap-3">
                                        <img src="images/gojo.jpg" alt="user" class="w-8 h-8 rounded-full border border-gray-200 object-cover">
                                        <span class="font-medium text-gray-800">Violin</span>
                                    </div>
                                </td>
                                <td class="py-3 px-3 text-center text-gray-600">5</td>
                                <td class="py-3 px-3 text-center text-gray-600">2025-07-01</td>
                                <td class="py-3 px-3 text-center text-cyan-500 font-medium">2500</td>
                            </tr>
                            
                            <!-- Donor Row 2 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-3 px-3 text-left">
                                    <div class="flex items-center gap-3">
                                        <img src="images/gojo-2.jpeg" alt="user" class="w-8 h-8 rounded-full border border-gray-200 object-cover">
                                        <span class="font-medium text-gray-800">Lynx</span>
                                    </div>
                                </td>
                                <td class="py-3 px-3 text-center text-gray-600">4</td>
                                <td class="py-3 px-3 text-center text-gray-600">2025-06-20</td>
                                <td class="py-3 px-3 text-center text-cyan-500 font-medium">2000</td>
                            </tr>
                            
                            <!-- Additional rows would follow the same pattern -->
                            <!-- I've included 2 sample rows, the rest would be similar -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>