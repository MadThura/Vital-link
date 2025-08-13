<x-admin-layout title="SuperAdmin Dashboard">
    <div class="space-y-6 p-6 bg-gray-900 font-sans text-gray-100 overflow-y-auto scrollbar-none">
        <!-- System Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Row 1 -->

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
            <div
                class="bg-gray-800 p-5 rounded-lg border border-gray-700 hover:border-emerald-900 transition-all group">
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

            <!-- Row 2 -->



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
            <div
                class="bg-gray-800 p-5 rounded-lg border border-gray-700 hover:border-emerald-900 transition-all group">
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
        {{-- Create --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Create New Admin (Blood Bank Admin) -->
            <div class="bg-blue-900/20 rounded-xl border border-blue-700/50 p-5 shadow-lg shadow-blue-900/10">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-bold text-blue-400">CREATE BLOOD BANK ADMIN</h2>
                    <i class="fa-solid fa-user-shield text-blue-400"></i>
                </div>
                <form class="space-y-3">
                    <div>
                        <label class="block text-xs text-blue-300 mb-1">Blood Bank</label>
                        <select
                            class="w-full bg-blue-900/50 border rounded-lg px-3 py-2 text-sm text-blue-100 focus:outline-none focus:ring-1 focus:ring-blue-400 appearance-none ">
                            <option class="bg-blue-900 text-blue-100" disabled selected>Select Blood Bank
                            </option>

                            <!-- National Level -->
                            <optgroup label="National Centers" class="bg-blue-900 text-blue-100">
                                <option class="bg-blue-900 text-blue-100">National Blood Centre - Yangon
                                    General Hospital</option>
                                <option class="bg-blue-900 text-blue-100">National Blood Bank - Mandalay
                                    General Hospital</option>
                            </optgroup>

                            <!-- Yangon Region -->
                            <optgroup label="Yangon Region" class="bg-blue-900 text-blue-100">
                                <option class="bg-blue-900 text-blue-100">Yangon General Hospital Blood Bank
                                </option>

                                <option class="bg-blue-900 text-blue-100">Yangon Central Women’s Hospital Blood
                                    Bank</option>
                                <option class="bg-blue-900 text-blue-100">North Okkalapa General Hospital Blood
                                    Bank</option>
                                <option class="bg-blue-900 text-blue-100">Thingangyun Sanpya Hospital Blood
                                    Bank</option>
                                <option class="bg-blue-900 text-blue-100">သဘာဝအလင်းရောင် သွေးကွန်ယက်အသင်း
                                    (Thanlyin)</option>
                            </optgroup>

                            <!-- Mandalay Region -->
                            <optgroup label="Mandalay Region" class="bg-blue-900 text-blue-100">
                                <option class="bg-blue-900 text-blue-100">Mandalay General Hospital Blood Bank
                                </option>
                                <option class="bg-blue-900 text-blue-100">မနောကြာဖြူ သွေးလှူရှင်နှင့်ပရဟိတအသင်း
                                </option>
                                <option class="bg-blue-900 text-blue-100">တွဲလက်ညီသွေးလှူရှင်အဖွဲ့ (Yamethin)
                                </option>
                            </optgroup>

                            <!-- Mon State -->
                            <optgroup label="Mon State" class="bg-blue-900 text-blue-100">
                                <option class="bg-blue-900 text-blue-100">Mawlamyine General Hospital Blood
                                    Bank</option>
                            </optgroup>

                            <!-- Rakhine State -->
                            <optgroup label="Rakhine State" class="bg-blue-900 text-blue-100">
                                <option class="bg-blue-900 text-blue-100">Sittwe General Hospital Blood Bank
                                </option>
                                <option class="bg-blue-900 text-blue-100">မြရတနာ နာရေးကူညီမှုနှင့်
                                    သွေးလှူရှင်အသင်း</option>
                            </optgroup>

                            <!-- Sagaing Region -->
                            <optgroup label="Sagaing Region" class="bg-blue-900 text-blue-100">
                                <option class="bg-blue-900 text-blue-100">မေတ္တာရွှေစင်</option>
                            </optgroup>

                            <!-- Ayeyarwady Region -->
                            <optgroup label="Ayeyarwady Region" class="bg-blue-900 text-blue-100">
                                <option class="bg-blue-900 text-blue-100">ကရုဏာရှင်လူငယ်များအသင်း</option>
                            </optgroup>

                            <!-- Tanintharyi Region -->
                            <optgroup label="Tanintharyi Region" class="bg-blue-900 text-blue-100">
                                <option class="bg-blue-900 text-blue-100">ပုလဲ သွေးနှင့် ကျန်းမာရေး ပရဟိတအသင်း
                                    (Myeik)</option>
                            </optgroup>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs text-blue-300 mb-1">Email</label>
                        <input type="email"
                            class="w-full bg-blue-900/30 border border-blue-700/50 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-400 text-blue-100 placeholder-blue-400/70">
                    </div>

                    <label class="block text-xs text-blue-300 mb-1">Password</label>
                    <div x-data="{ show: false }" class="relative flex items-center">
                        <input :type="show ? 'text' : 'password'"
                            class="w-full bg-blue-900/30 border border-blue-700/50 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-400 text-blue-100 placeholder-blue-400/70 pr-10"
                            placeholder="Enter password" />
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-blue-400 hover:text-blue-200"
                            tabindex="-1" :aria-label="show ? 'Hide password' : 'Show password'">
                            <template x-if="!show">
                                <i class="fa-regular fa-eye"></i>
                            </template>
                            <template x-if="show">
                                <i class="fa-regular fa-eye-slash"></i>
                            </template>
                        </button>
                    </div>
                    <label class="block text-xs text-blue-300 mb-1">Comfirm Password</label>
                    <div x-data="{ show: false }" class="relative flex items-center">
                        <input :type="show ? 'text' : 'password'"
                            class="w-full bg-blue-900/30 border border-blue-700/50 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-400 text-blue-100 placeholder-blue-400/70 pr-10"
                            placeholder="Comfirm password" />
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-blue-400 hover:text-blue-200"
                            tabindex="-1" :aria-label="show ? 'Hide password' : 'Show password'">
                            <template x-if="!show">
                                <i class="fa-regular fa-eye"></i>
                            </template>
                            <template x-if="show">
                                <i class="fa-regular fa-eye-slash"></i>
                            </template>
                        </button>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-sm transition-colors font-medium shadow-md shadow-blue-900/30">
                        Create Admin Account
                    </button>
                </form>
            </div>

            <!-- Create Ward Operator -->
            <div class="bg-purple-900/20 rounded-xl border border-purple-700/50 p-5 shadow-lg shadow-purple-900/10">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-bold text-purple-400">CREATE WARD OPERATOR</h2>
                    <i class="fa-solid fa-user-nurse text-purple-400"></i>
                </div>
                <form class="space-y-3">
                    <div>
                        <label class="block text-xs text-purple-300 mb-1">Blood Bank</label>
                        <select
                            class="w-full bg-purple-900/80 border border-purple-700/50 rounded-lg px-3 py-2 text-sm text-purple-100 focus:outline-none focus:ring-1 focus:ring-purple-400 appearance-none">
                            <option class="bg-purple-900 text-purple-100" disabled selected>Select Hospital
                            </option>

                            <!-- Yangon Hospitals with Blood Bank Services -->
                            <option class="bg-purple-900 text-purple-100">500-bed Specialty Hospital, Yangon
                            </option>
                            <option class="bg-purple-900 text-purple-100">Defence Services General Hospital
                                (1000-bed)</option>
                            <option class="bg-purple-900 text-purple-100">Defence Services Orthopaedic Hospital
                                (500-Bed)</option>
                            <option class="bg-purple-900 text-purple-100">Defence Services Obstetric,
                                Gynaecological and Paediatric Hospital</option>
                            <option class="bg-purple-900 text-purple-100">East Yangon General Hospital</option>
                            <option class="bg-purple-900 text-purple-100">Insein General Hospital</option>
                            <option class="bg-purple-900 text-purple-100">New Yangon General Hospital</option>
                            <option class="bg-purple-900 text-purple-100">New Yangon Specialist Hospital
                            </option>
                            <option class="bg-purple-900 text-purple-100">No.2 Military Hospital (500-bed)
                            </option>
                            <option class="bg-purple-900 text-purple-100">North Okkalapa General Hospital
                            </option>
                            <option class="bg-purple-900 text-purple-100">South Okkalapa Women and Children
                                Hospital</option>
                            <option class="bg-purple-900 text-purple-100">Thingangyun Sanpya Hospital</option>
                            <option class="bg-purple-900 text-purple-100">Universities Hospital</option>
                            <option class="bg-purple-900 text-purple-100">Waibargi Hospital</option>
                            <option class="bg-purple-900 text-purple-100">West Yangon General Hospital</option>
                            <option class="bg-purple-900 text-purple-100">Yangon Central Women's Hospital
                            </option>
                            <option class="bg-purple-900 text-purple-100">Yangon Children's Hospital</option>
                            <option class="bg-purple-900 text-purple-100">Yangon ENT Hospital</option>
                            <option class="bg-purple-900 text-purple-100">Yangon General Hospital</option>
                            <option class="bg-purple-900 text-purple-100">Yangon Orthopaedic Hospital</option>
                            <option class="bg-purple-900 text-purple-100">Yangon Workers' Hospital</option>
                            <option class="bg-purple-900 text-purple-100">Yangon Mental Health Hospital
                            </option>
                            <option class="bg-purple-900 text-purple-100">Yankin Children's Hospital</option>
                        </select>

                    </div>
                    <div>
                        <label class="block text-xs text-purple-300 mb-1">Email</label>
                        <input type="email"
                            class="w-full bg-purple-900/30 border border-purple-700/50 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-purple-400 text-purple-100 placeholder-purple-400/70">
                    </div>
                    <label class="block text-xs text-purple-300 mb-1">Password</label>
                    <div x-data="{ show: false }" class="relative flex items-center">
                        <input :type="show ? 'text' : 'password'"
                            class="w-full bg-purple-900/30 border border-purple-700/50 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-purple-400 text-purple-100 placeholder-purple-400/70 pr-10"
                            placeholder="Enter password" />
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-purple-400 hover:text-purple-200"
                            tabindex="-1" :aria-label="show ? 'Hide password' : 'Show password'">
                            <template x-if="!show">
                                <i class="fa-regular fa-eye"></i>
                            </template>
                            <template x-if="show">
                                <i class="fa-regular fa-eye-slash"></i>
                            </template>
                        </button>
                    </div>

                    <label class="block text-xs text-purple-300 mb-1">Comfirm Password</label>
                    <div x-data="{ show: false }" class="relative flex items-center">
                        <input :type="show ? 'text' : 'password'"
                            class="w-full bg-purple-900/30 border border-purple-700/50 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-purple-400 text-purple-100 placeholder-purple-400/70 pr-10"
                            placeholder="Comfirm password" />
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-purple-400 hover:text-purple-200"
                            tabindex="-1" :aria-label="show ? 'Hide password' : 'Show password'">
                            <template x-if="!show">
                                <i class="fa-regular fa-eye"></i>
                            </template>
                            <template x-if="show">
                                <i class="fa-regular fa-eye-slash"></i>
                            </template>
                        </button>
                    </div>

                    <button type="submit"
                        class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg text-sm transition-colors font-medium shadow-md shadow-purple-900/30">
                        Create Operator Account
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
