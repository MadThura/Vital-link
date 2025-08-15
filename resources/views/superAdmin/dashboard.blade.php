<x-admin-layout title="SuperAdmin Dashboard">
    <div class="space-y-6 p-6 bg-gray-900 font-sans text-gray-100 overflow-y-auto scrollbar-none">
        <x-alert-box />

        <!-- System Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            <!-- Total Blood Bank Admins -->
            <div class="bg-gray-800 p-5 rounded-lg border border-gray-700 hover:border-blue-900 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs text-gray-400">BLOOD BANK ADMINS</p>
                        <h3 class="text-2xl font-bold mt-1">47</h3>
                    </div>
                    <div class="p-2 rounded-lg bg-gray-700 group-hover:bg-blue-900/20 transition-all">
                        <i class="fa-solid fa-user-shield text-blue-400 text-lg"></i>
                    </div>
                </div>
                <div class="mt-3 h-px bg-gray-700"></div>
                <p class="mt-2 text-xs flex items-center">
                    <span class="text-green-400">+5</span>
                    <span class="text-gray-500 ml-1">new this month</span>
                </p>
            </div>

            <!-- Active Ward Operators -->
            <div class="bg-gray-800 p-5 rounded-lg border border-gray-700 hover:border-purple-900 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs text-gray-400">WARD OPERATORS</p>
                        <h3 class="text-2xl font-bold mt-1">128</h3>
                    </div>
                    <div class="p-2 rounded-lg bg-gray-700 group-hover:bg-purple-900/20 transition-all">
                        <i class="fa-solid fa-user-nurse text-purple-400 text-lg"></i>
                    </div>
                </div>
                <div class="mt-3 h-px bg-gray-700"></div>
                <p class="mt-2 text-xs flex items-center">
                    <span class="text-green-400">+12</span>
                    <span class="text-gray-500 ml-1">active today</span>
                </p>
            </div>

            <!-- Total Blog Posts -->
            <div class="bg-gray-800 p-5 rounded-lg border border-gray-700 hover:border-emerald-900 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs text-gray-400">TOTAL BLOG POSTS</p>
                        <h3 class="text-2xl font-bold mt-1">89</h3>
                    </div>
                    <div class="p-2 rounded-lg bg-gray-700 group-hover:bg-emerald-900/20 transition-all">
                        <i class="fa-solid fa-blog text-emerald-400 text-lg"></i>
                    </div>
                </div>
                <div class="mt-3 h-px bg-gray-700"></div>
                <p class="mt-2 text-xs flex items-center">
                    <span class="text-green-400">+7</span>
                    <span class="text-gray-500 ml-1">this week</span>
                </p>
            </div>

            <!-- Inactive Blood Bank Admins -->
            <div class="bg-gray-800 p-5 rounded-lg border border-gray-700 hover:border-blue-900 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs text-gray-400">INACTIVE ADMINS</p>
                        <h3 class="text-2xl font-bold mt-1">5</h3>
                    </div>
                    <div class="p-2 rounded-lg bg-gray-700 group-hover:bg-blue-900/20 transition-all">
                        <i class="fa-solid fa-user-shield text-gray-400 text-lg"></i>
                    </div>
                </div>
                <div class="mt-3 h-px bg-gray-700"></div>
                <p class="mt-2 text-xs flex items-center">
                    <span class="text-amber-400">+1</span>
                    <span class="text-gray-500 ml-1">this month</span>
                </p>
            </div>

            <!-- Inactive Ward Operators -->
            <div class="bg-gray-800 p-5 rounded-lg border border-gray-700 hover:border-purple-900 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs text-gray-400">INACTIVE OPERATORS</p>
                        <h3 class="text-2xl font-bold mt-1">18</h3>
                    </div>
                    <div class="p-2 rounded-lg bg-gray-700 group-hover:bg-purple-900/20 transition-all">
                        <i class="fa-solid fa-user-nurse text-gray-400 text-lg"></i>
                    </div>
                </div>
                <div class="mt-3 h-px bg-gray-700"></div>
                <p class="mt-2 text-xs flex items-center">
                    <span class="text-amber-400">+3</span>
                    <span class="text-gray-500 ml-1">this month</span>
                </p>
            </div>

            <!-- Deleted Blog Posts -->
            <div class="bg-gray-800 p-5 rounded-lg border border-gray-700 hover:border-emerald-900 transition-all group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs text-gray-400">DELETED BLOG POSTS</p>
                        <h3 class="text-2xl font-bold mt-1">14</h3>
                    </div>
                    <div class="p-2 rounded-lg bg-gray-700 group-hover:bg-emerald-900/20 transition-all">
                        <i class="fa-solid fa-blog text-gray-400 text-lg"></i>
                    </div>
                </div>
                <div class="mt-3 h-px bg-gray-700"></div>
                <p class="mt-2 text-xs flex items-center">
                    <span class="text-rose-400">+2</span>
                    <span class="text-gray-500 ml-1">this month</span>
                </p>
            </div>
        </div>

        <!-- Create User Account -->
        <div class="bg-slate-900/40 rounded-xl border border-slate-700/50 p-5 shadow-lg shadow-slate-900/20 max-w-2xl mx-auto mt-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-cyan-400">CREATE USER ACCOUNT</h2>
                <i class="fa-solid fa-user-plus text-cyan-400"></i>
            </div>

            <form class="space-y-4" action="{{ route('superAdmin.users.store') }}" method="POST">
                @csrf

                <!-- Role Selector -->
                <div>
                    <label class="block text-xs text-cyan-300 mb-1">Role</label>
                    <select id="role" name="role" required
                        class="w-full bg-slate-800 border border-slate-600 rounded-lg px-3 py-2 text-sm text-cyan-100 focus:outline-none focus:ring-1 focus:ring-cyan-400">
                        <option disabled selected value="">Select Role</option>
                        <option value="blood_bank_admin">Blood Bank Admin</option>
                        <option value="ward_operator">Ward Operator</option>
                    </select>
                </div>

                <!-- Blood Bank / Hospital Selector -->
                <div class="mt-3" id="bankWrapper" style="display: none;">
                    <label class="block text-xs text-cyan-300 mb-1" id="bankLabel">Blood Bank / Hospital</label>
                    <select id="bankSelect" name="name" required
                        class="w-full bg-slate-800 border border-slate-600 rounded-lg px-3 py-2 text-sm text-cyan-100 focus:outline-none focus:ring-1 focus:ring-cyan-400">
                        <option disabled selected value="">Select Blood Bank or Hospital</option>
                    </select>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs text-cyan-300 mb-1">Email</label>
                    <input type="email" name="email" required
                        class="w-full bg-slate-800 border border-slate-600 rounded-lg px-3 py-2 text-sm text-cyan-100 placeholder-cyan-400/70 focus:outline-none focus:ring-1 focus:ring-cyan-400"
                        placeholder="Enter email">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs text-cyan-300 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full bg-slate-800 border border-slate-600 rounded-lg px-3 py-2 text-sm text-cyan-100 placeholder-cyan-400/70 focus:outline-none focus:ring-1 focus:ring-cyan-400"
                        placeholder="Enter password">
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-xs text-cyan-300 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full bg-slate-800 border border-slate-600 rounded-lg px-3 py-2 text-sm text-cyan-100 placeholder-cyan-400/70 focus:outline-none focus:ring-1 focus:ring-cyan-400"
                        placeholder="Confirm password">
                </div>

                <!-- Address -->
                <div class="mt-4">
                    <label for="address" class="block text-xs text-cyan-300 mb-1">Address</label>
                    <textarea id="address" name="address" rows="3" required
                        class="w-full bg-slate-800 border border-slate-600 rounded-lg px-3 py-2 text-sm text-cyan-100 placeholder-cyan-400/70 focus:outline-none focus:ring-1 focus:ring-cyan-400 resize-none"></textarea>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-cyan-600 hover:bg-cyan-700 text-white py-2 px-4 rounded-lg text-sm transition-colors font-medium shadow-md shadow-cyan-900/30">
                    Create Account
                </button>
            </form>
        </div>
    </div>

    <!-- Script for dynamic Blood Bank / Hospital selector -->
    <script>
        const banks = {
            blood_bank_admin: [
                "National Blood Centre - Yangon General Hospital",
                "National Blood Bank - Mandalay General Hospital",
                "Yangon General Hospital Blood Bank",
                "Yangon Central Women’s Hospital Blood Bank",
                "North Okkalapa General Hospital Blood Bank",
                "Thingangyun Sanpya Hospital",
                "Thanlyin Blood Network",
                "Mandalay General Hospital Blood Bank",
                "Mawlamyine General Hospital Blood Bank",
                "Sittwe General Hospital Blood Bank"
            ],
            ward_operator: [
                "500-bed Specialty Hospital, Yangon",
                "Defence Services General Hospital (1000-bed)",
                "Defence Services Orthopaedic Hospital (500-Bed)",
                "Defence Services Obstetric, Gynaecological and Paediatric Hospital",
                "East Yangon General Hospital",
                "Insein General Hospital",
                "New Yangon General Hospital",
                "New Yangon Specialist Hospital",
                "No.2 Military Hospital (500-bed)",
                "North Okkalapa General Hospital",
                "South Okkalapa Women and Children Hospital",
                "Thingangyun Sanpya Hospital",
                "Universities Hospital",
                "Waibargi Hospital",
                "West Yangon General Hospital",
                "Yangon Central Women’s Hospital",
                "Yangon Children’s Hospital",
                "Yangon ENT Hospital",
                "Yangon General Hospital",
                "Yangon Orthopaedic Hospital",
                "Yangon Workers’ Hospital",
                "Yangon Mental Health Hospital",
                "Yankin Children’s Hospital"
            ]
        };

        const roleSelect = document.getElementById('role');
        const bankWrapper = document.getElementById('bankWrapper');
        const bankSelect = document.getElementById('bankSelect');
        const bankLabel = document.getElementById('bankLabel');

        roleSelect.addEventListener('change', function() {
            const role = this.value;

            // Clear previous options
            bankSelect.innerHTML =
                `<option disabled selected value="">Select ${role === 'blood_bank_admin' ? 'Blood Bank' : 'Hospital'}</option>`;

            // Populate new options
            banks[role].forEach(bank => {
                const option = document.createElement('option');
                option.value = bank;
                option.textContent = bank;
                bankSelect.appendChild(option);
            });

            // Update label and show
            bankLabel.textContent = role === 'blood_bank_admin' ? 'Blood Bank' : 'Hospital';
            bankWrapper.style.display = 'block';
        });
    </script>
</x-admin-layout>
