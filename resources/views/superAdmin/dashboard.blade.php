<x-layout title="sp">
    <div class="flex w-full h-screen text-black overflow-hidden">
        <!-- Sidebar (fixed height, scroll-independent) -->
        <aside
            class="w-[15%] bg-gradient-to-b from-gray-900 to-gray-800 border-r border-gray-700 flex flex-col justify-between">
            <div>
                <div class="text-center mb-8">
                    <img src="/images/logo.png" alt="RedLink Logo"
                        class="w-[100px] h-[100px] object-contain rounded-lg mx-auto">
                    <h2
                        class="text-xl mt-2 font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">
                        Vital Link</h2>
                </div>

                <nav aria-label="Main navigation" class="flex flex-col gap-2">
                    <a href="/profile">
                        <div class="flex items-center justify-center h-full w-full">
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-300 hover:text-cyan-400 transition-colors">
                                    name
                                </p>
                                <p class="text-xs text-gray-500 hover:text-gray-400 transition-colors">
                                    role
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('sp') }}"
                        class="no-underline text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 hover:bg-gray-700/50 hover:text-cyan-400 transition-all group border-l-4 {{ request()->routeIs('sp') ? 'border-cyan-400 bg-gray-700/50 text-cyan-400' : 'border-transparent' }}">
                        <i
                            class="fa-solid fa-house text-gray-400 {{ request()->routeIs('sp') ? 'text-cyan-400' : 'group-hover:text-cyan-400' }} text-base transition-colors"></i>
                        <span class="group-hover:translate-x-1 transition-transform">Dashboard</span>
                    </a>

                    <a href="{{ route('blog') }}"
                        class="no-underline text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 hover:bg-gray-700/50 hover:text-cyan-400 transition-all group border-l-4 {{ request()->routeIs('blog') ? 'border-cyan-400 bg-gray-700/50 text-cyan-400' : 'border-transparent' }}">

                        <i
                            class="fa-solid fa-blog text-gray-400 {{ request()->routeIs('sp') ? 'text-cyan-400' : 'group-hover:text-cyan-400' }} text-base transition-colors"></i>
                        <span class="group-hover:translate-x-1 transition-transform">Blog Board</span>
                    </a>
                    <a href="{{ route('show') }}"
                        class="no-underline text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 hover:bg-gray-700/50 hover:text-cyan-400 transition-all group border-l-4 {{ request()->routeIs('show') ? 'border-cyan-400 bg-gray-700/50 text-cyan-400' : 'border-transparent' }}">
                        <i
                            class="fa-solid fa-square-poll-horizontal text-gray-400 {{ request()->routeIs('show') ? 'text-cyan-400' : 'group-hover:text-cyan-400' }} text-base transition-colors"></i>
                        <span class="group-hover:translate-x-1 transition-transform">User Management</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="no-underline text-gray-300 text-sm py-3 px-4 rounded-lg flex items-center gap-3 hover:bg-gray-700/50 hover:text-rose-500 transition-all group border-l-4 border-transparent hover:border-rose-500 mt-4 w-full text-left">
                            <i
                                class="fa-solid fa-arrow-right-from-bracket text-gray-400 group-hover:text-rose-500 text-base transition-colors"></i>
                            <span class="group-hover:translate-x-1 transition-transform">Logout</span>
                        </button>
                    </form>
                </nav>
            </div>


            <footer class="text-sm text-center text-gray-400 border-t border-gray-700 pt-5 mt-5">
                <p>Role: <strong
                        class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">role</strong>
                </p>
                <p class="text-xs mt-1 text-gray-500">v1.0.1</p>
            </footer>
        </aside>

        <div class="flex flex-col w-[85%]">
            <!-- Dark Theme Header -->
            <header class="flex items-center justify-between bg-gray-900 shadow-lg p-4">
                <!-- Back to Home Button -->
                <div class="flex items-center">
                    <a href="/"
                        class="flex items-center text-gray-300 hover:text-blue-400 transition-colors duration-200">
                        <i class="fa-solid fa-home mr-3 hover:scale-110 transition-transform"></i>
                        <span class="hover:drop-shadow-[0_0_8px_rgba(96,165,250,0.6)]">Home</span>
                    </a>
                </div>

                <!-- Notification and Profile Section -->
                <div class="flex items-center space-x-4">
                    <!-- Notification Icon -->
                    <div x-data="{
                        open: false,
                        notifications: [{
                                id: 1,
                                name: 'Dr. Marcus Wright',
                                email: 'm.wright@neonmed.org',
                                hospital: 'Neon Medical Center',
                                ward: 'Neuro Ward 7X',
                                position: 'Lead Neuro Operator',
                                requestTime: 'Today, 22:47',
                                avatar: 'MW'
                            },
                            {
                                id: 2,
                                name: 'Dr. Elena Kurosawa',
                                email: 'e.kurosawa@neonmed.org',
                                hospital: 'Neon Surgical Unit',
                                ward: 'OR 5 - Robotics',
                                position: 'Senior Surgical Operator',
                                requestTime: 'Today, 20:15',
                                avatar: 'EK'
                            }
                        ],
                        unreadCount: 2,
                        togglePane() {
                            this.open = !this.open;
                            if (this.open) this.unreadCount = 0;
                        }
                    }" class="relative inline-block">
                        <!-- Notification Bell -->
                        <button @click="togglePane()"
                            class="relative p-2 text-gray-300 hover:text-cyan-400 focus:outline-none transition-colors duration-200 group">
                            <div class="text-xl transform group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-bell"></i>
                            </div>
                            <span x-show="unreadCount > 0" x-text="unreadCount"
                                class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-black bg-cyan-400 rounded-full transform translate-x-1/2 -translate-y-1/2 ring-2 ring-gray-900">
                            </span>
                        </button>

                        <x-superadmin-noti />
                    </div>
                    <!-- Profile Information -->
                    <div class="flex items-center space-x-3 group cursor-pointer">
                        <div class="relative h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 p-0.5">
                            <div class="h-full w-full rounded-full bg-gray-800 overflow-hidden border border-gray-700">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile"
                                    class="h-full w-full object-cover">
                            </div>
                        </div>
                        <div class="text-right hidden md:block">
                            <p class="font-medium text-white group-hover:text-blue-400 transition-colors">John Doe</p>
                            <p class="text-xs text-gray-400 group-hover:text-blue-300 transition-colors">Administrator
                            </p>
                        </div>

                    </div>
                </div>
            </header>
            <div class="space-y-6 p-6 bg-gray-900 font-sans text-gray-100 overflow-y-auto scrollbar-none">
                <!-- System Overview Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Row 1 -->

                    <!-- Total Blood Bank Admins -->
                    <div
                        class="bg-gray-800 p-5 rounded-lg border border-gray-700 hover:border-blue-900 transition-all group">
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
                    <div
                        class="bg-gray-800 p-5 rounded-lg border border-gray-700 hover:border-purple-900 transition-all group">
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
                    <div
                        class="bg-gray-800 p-5 rounded-lg border border-gray-700 hover:border-blue-900 transition-all group">
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
                    <div
                        class="bg-gray-800 p-5 rounded-lg border border-gray-700 hover:border-purple-900 transition-all group">
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
                    <div
                        class="bg-purple-900/20 rounded-xl border border-purple-700/50 p-5 shadow-lg shadow-purple-900/10">
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
        </div>
    </div>
</x-layout>
