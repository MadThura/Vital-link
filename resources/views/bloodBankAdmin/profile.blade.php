<x-admin-layout>
    <div class="bg-gray-900 text-gray-100 overflow-auto scrollbar-hide">
        <!-- Header -->
        <header class="sticky top-0 z-20 bg-gradient-to-r from-gray-800 to-gray-900">
            <div class="container mx-auto p-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-rose-600/20 rounded-xl">
                            <i class="fas fa-hospital text-rose-400 text-2xl"></i>
                        </div>
                        <h1 class="text-2xl font-bold">{{ $bloodBank->name }}</h1>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column -->
                <div class="lg:col-span-2 space-y-6">
                    {{-- Operating Hours --}}
                    <form action="{{ route('bba.updateOperatingHours') }}"
                        class="bg-gray-800/50 backdrop-blur-md border border-gray-700 p-6 rounded-2xl shadow-xl space-y-4"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <h2 class="text-lg font-semibold text-cyan-400 flex items-center gap-2">
                            <i class="fa-regular fa-clock text-cyan-300"></i>
                            Operating Hours
                        </h2>

                        <div class="flex flex-col md:flex-row items-center gap-6">
                            <!-- Start Time -->
                            <div class="w-full">
                                <label for="start_time" class="block text-sm text-gray-400 mb-2">Start Time</label>
                                <input type="time" name="start_time" id="start_time"
                                    value="{{ old('start_time', $hours->start_time ?? '') }}"
                                    class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-2 rounded-lg 
                    focus:outline-none focus:ring-2 focus:ring-cyan-500 transition shadow-sm">
                            </div>

                            <!-- End Time -->
                            <div class="w-full">
                                <label for="end_time" class="block text-sm text-gray-400 mb-2">End Time</label>
                                <input type="time" name="end_time" id="end_time"
                                    value="{{ old('end_time', $hours->end_time ?? '') }}"
                                    class="w-full bg-gray-900 border border-gray-700 text-white px-4 py-2 rounded-lg 
                    focus:outline-none focus:ring-2 focus:ring-cyan-500 transition shadow-sm">
                            </div>
                        </div>

                        <!-- Save Hours Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-6 py-2 rounded-lg font-semibold text-white shadow-md bg-gradient-to-r from-cyan-500 to-blue-500 
        hover:from-cyan-600 hover:to-blue-600 transition-transform transform hover:scale-105">
                                <i class="fa-solid fa-save mr-2"></i> Save Hours
                            </button>
                        </div>
                    </form>

                    {{-- Maximum Persons Per Day --}}
                    <form method="POST" action="{{ route('bba.updateMaxPPDay') }}"
                        class="bg-gray-800/50 backdrop-blur-md border border-gray-700 p-6 rounded-2xl shadow-xl space-y-4">
                        @method('PATCH')
                        @csrf
                        <h2 class="text-lg font-semibold text-blue-400 flex items-center gap-2">
                            <i class="fas fa-users text-blue-300"></i>
                            Maximum Persons Per Day
                        </h2>

                        <div class="relative">
                            <input type="number" id="maxPersonsPerDay" name="maxPersonsPerDay"
                                value="{{ old('maxPersonsPerDay', $settings->maxPersonsPerDay ?? '') }}"
                                class="w-full bg-gray-900/80 border border-gray-700 rounded-xl px-4 py-3 text-gray-100 
                placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-inner transition"
                                placeholder="Enter limit (e.g., 50)" min="1">
                            <span class="absolute right-10 top-1/2 -translate-y-1/2 text-gray-400">
                                <i class="fas fa-users"></i>
                            </span>
                        </div>
                        <p class="text-xs text-gray-500">Set the maximum number of donors allowed per day.</p>

                        <!-- Save Limit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-6 py-2 rounded-lg font-semibold text-white shadow-md bg-gradient-to-r from-pink-500 to-red-500 
        hover:from-pink-600 hover:to-red-600 transition-transform transform hover:scale-105">
                                <i class="fa-solid fa-save mr-2"></i> Save Limit
                            </button>
                        </div>
                    </form>


                    <!-- Calendar Section - Full Width and Height -->
                    <div x-data="multiDatePicker()" class="w-full bg-gray-800 rounded-xl p-6 border border-gray-700">
                        <form method="POST" action="{{ route('bba.setClosedDays') }}">
                            @csrf

                            <h2 class="text-xl font-bold text-white mb-4">Set Closed Dates</h2>

                            <!-- Hidden inputs for selected dates -->
                            <template x-for="(date, index) in selectedDates" :key="index">
                                <div>
                                    <input type="hidden" :name="'days[' + index + '][blood_bank_id]'"
                                        value="{{ $bloodBank->id }}" />
                                    <input type="hidden" :name="'days[' + index + '][date]'"
                                        :value="getLocalDateString(date)" />
                                    <input type="hidden" :name="'days[' + index + '][reason]'"
                                        :value="dateNotes[getLocalDateString(date)] || ''" />
                                </div>
                            </template>

                            <!-- Calendar -->
                            <div class="bg-gray-900 border border-gray-700 rounded-xl shadow-xl p-3">
                                <!-- Header -->
                                <div class="flex items-center justify-between mb-2">
                                    <button type="button" @click="prevMonth"
                                        class="px-2 py-1 rounded hover:bg-gray-800 text-gray-300">&laquo;</button>
                                    <div class="text-gray-100 font-semibold" x-text="monthYear"></div>
                                    <button type="button" @click="nextMonth"
                                        class="px-2 py-1 rounded hover:bg-gray-800 text-gray-300">&raquo;</button>
                                </div>

                                <!-- Weekdays -->
                                <div class="grid grid-cols-7 gap-1 text-xs text-gray-400 mb-1">
                                    <div class="text-center">Sun</div>
                                    <div class="text-center">Mon</div>
                                    <div class="text-center">Tue</div>
                                    <div class="text-center">Wed</div>
                                    <div class="text-center">Thu</div>
                                    <div class="text-center">Fri</div>
                                    <div class="text-center">Sat</div>
                                </div>

                                <!-- Days -->
                                <div class="grid grid-cols-7 gap-1 relative">
                                    <template x-for="n in leadingBlanks" :key="'b' + n">
                                        <div class="h-16"></div>
                                    </template>

                                    <template x-for="d in daysInMonth" :key="'d' + d">
                                        <div class="relative">
                                            <button type="button" @click="selectDate(d)"
                                                class="h-16 rounded-lg w-full transition flex flex-col items-center justify-center"
                                                :disabled="isPast(d) || isApmFull(d)"
                                                :class="{
                                                    // ✅ Selected valid day
                                                    'bg-cyan-600 text-white': isSelected(d) && activeDay !== d && !
                                                        isClosed(d),
                                                
                                                    // 🟢 Normal hoverable day
                                                    'hover:bg-gray-800 text-gray-100': !isSelected(d) && !isPast(d) && !
                                                        isClosed(d) && !isApmFull(d),
                                                
                                                    // ⬜ Past day (disabled)
                                                    'line-through text-gray-500 cursor-not-allowed': isPast(d),
                                                
                                                    // 🟧 Appointment full day (not editable)
                                                    'bg-orange-100 text-orange-600 cursor-not-allowed': isApmFull(d) &&
                                                        !isPast(d),
                                                
                                                    // 🔴 Closed day (editable by admin)
                                                    'bg-red-600 text-white cursor-pointer': isClosed(d) && !isPast(d),
                                                
                                                    // 🔵 Selected fallback (closed or normal)
                                                    'bg-gray-700 text-gray-300': isSelected(d) && (isClosed(d) || !
                                                        isPast(d))
                                                }">
                                                <!-- Date number -->
                                                <span x-text="d" class="text-sm font-medium"></span>

                                                <!-- Label for past -->
                                                <span x-show="isPast(d)"
                                                    class="text-xs text-gray-500 mt-0.5">Past</span>

                                                <!-- Label for appointment full -->
                                                <span x-show="isApmFull(d)"
                                                    class="text-xs text-orange-600 mt-0.5">Full</span>

                                                <!-- Label + reason for closed -->
                                                <template x-if="isClosed(d)">
                                                    <div class="flex flex-col items-center mt-0.5">
                                                        <span class="text-xs text-white">Closed</span>
                                                        <span
                                                            x-show="dateNotes[getLocalDateString(new Date(year, month, d))]"
                                                            class="text-xs text-white/80 truncate w-full px-1 text-center"
                                                            x-text="dateNotes[getLocalDateString(new Date(year, month, d))]">
                                                        </span>
                                                    </div>
                                                </template>

                                                <!-- Custom notes for normal days (only when selected) -->
                                                <span
                                                    x-show="!isClosed(d) && isSelected(d) && activeDay !== d && dateNotes[getLocalDateString(new Date(year, month, d))]"
                                                    class="text-xs text-white/80 mt-0.5 truncate w-full px-1"
                                                    x-text="dateNotes[getLocalDateString(new Date(year, month, d))]">
                                                </span>
                                            </button>


                                            <!-- Note box that appears to the left of the selected day -->
                                            <div x-show="activeDay === d && (isSelected(d) || !isClosed(d))"
                                                class="absolute z-10 right-full mr-2 top-0 w-48 bg-gray-800 border border-gray-700 rounded-lg p-2 shadow-lg">
                                                <input type="text"
                                                    x-model="dateNotes[getLocalDateString(new Date(year, month, d))]"
                                                    @click.stop
                                                    class="w-full bg-gray-700 text-white text-sm px-2 py-1 rounded border border-gray-600"
                                                    placeholder="Add note...">

                                                <div class="flex justify-end gap-2 mt-2">
                                                    <button type="button" @click="skipNote(d)"
                                                        class="text-xs px-2 py-1 bg-gray-600 rounded hover:bg-gray-500">
                                                        Skip
                                                    </button>
                                                    <button type="button" @click="saveNote(d)"
                                                        class="text-xs px-2 py-1 bg-cyan-600 rounded hover:bg-cyan-500">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- Selected dates list -->
                            <div class="mt-4 space-y-2" x-show="selectedDates.length > 0">
                                <h4 class="text-sm font-medium text-gray-300">Selected Dates:</h4>
                                <template x-for="(date, index) in selectedDates" :key="index">
                                    <div class="flex items-center justify-between bg-gray-800 p-2 rounded">
                                        <span x-text="formatDate(date)"></span>
                                        <span x-show="dateNotes[getLocalDateString(date)]"
                                            x-text="dateNotes[getLocalDateString(date)]"
                                            class="text-sm text-gray-400 ml-2"></span>

                                        <button type="button" @click="removeDate(index)"
                                            class="text-gray-400 hover:text-red-400 ml-2">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </template>
                            </div>

                            <!-- Closed Dates Buttons -->
                            <div class="flex justify-end gap-3 mt-4">
                                <button type="button" @click="clearSelection"
                                    class="px-5 py-2 rounded-lg font-medium text-gray-200 bg-gray-700 hover:bg-gray-600 transition">
                                    <i class="fa-solid fa-eraser mr-2"></i> Clear Selection
                                </button>
                                <button type="submit"
                                    class="px-5 py-2 rounded-lg font-semibold text-white shadow-md bg-gradient-to-r from-rose-500 to-red-500 
        hover:from-rose-600 hover:to-red-600 transition-transform transform hover:scale-105">
                                    <i class="fa-solid fa-save mr-2"></i> Save Closed Dates
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Blood Inventory -->
                    <section class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold flex items-center">
                                <i class="fas fa-flask text-rose-400 mr-2"></i> Blood Inventory
                            </h2>
                            <span class="text-xs bg-gray-700 px-2 py-1 rounded">Updated 2 hours ago</span>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <!-- Blood Type Card -->
                            <div
                                class="bg-gray-700/50 p-4 rounded-lg border border-gray-600 hover:border-rose-500/50 transition">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-rose-400">A+</div>
                                    <div class="text-green-400 font-medium mt-1">Good</div>
                                    <div class="text-xs text-gray-400 mt-2">42 Units</div>
                                </div>
                            </div>

                            <div
                                class="bg-gray-700/50 p-4 rounded-lg border border-gray-600 hover:border-rose-500/50 transition">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-rose-400">B+</div>
                                    <div class="text-yellow-400 font-medium mt-1">Low</div>
                                    <div class="text-xs text-gray-400 mt-2">12 Units</div>
                                </div>
                            </div>

                            <div
                                class="bg-gray-700/50 p-4 rounded-lg border border-gray-600 hover:border-rose-500/50 transition">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-rose-400">O-</div>
                                    <div class="text-red-400 font-medium mt-1">Critical</div>
                                    <div class="text-xs text-gray-400 mt-2">5 Units</div>
                                </div>
                            </div>

                            <div
                                class="bg-gray-700/50 p-4 rounded-lg border border-gray-600 hover:border-rose-500/50 transition">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-rose-400">AB+</div>
                                    <div class="text-green-400 font-medium mt-1">Good</div>
                                    <div class="text-xs text-gray-400 mt-2">28 Units</div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Contact Card -->
                    <div x-data="{ showForm: false }" class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                        <!-- Header -->
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold flex items-center text-white">
                                <i class="fas fa-map-marker-alt text-rose-400 mr-2"></i> Contact Info
                            </h2>
                            <button @click="showForm = !showForm"
                                class="text-sm px-3 py-1 bg-rose-600 hover:bg-rose-700 text-white rounded-lg shadow">
                                <span x-show="!showForm">Edit</span>
                                <span x-show="showForm">Cancel</span>
                            </button>
                        </div>

                        <!-- Display Info -->
                        <div class="space-y-3" x-show="!showForm" x-transition>
                            <div class="flex items-start">
                                <i class="fas fa-map-pin text-rose-400 mt-1 mr-3"></i>
                                <p class="text-gray-300">{{ $bloodBank->address }}</p>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone-alt text-rose-400 mr-3"></i>
                                <p class="text-gray-300">{{ $bloodBank->phone ?? '(555) 123-4567' }}</p>
                            </div>
                        </div>

                        <!-- Edit Form -->
                        <form x-show="showForm" x-transition method="POST" action="{{ route('bba.updateContactInfo') }}" class="space-y-3 mt-3">
                            @method('PATCH')
                            @csrf
                            <div>
                                <label class="block text-gray-400 mb-1">Address</label>
                                <textarea name="address" rows="3"
                                    class="w-full p-2 rounded bg-gray-700 text-white focus:ring-2 focus:ring-rose-500 resize-none">{{ $bloodBank->address }}</textarea>
                            </div>


                            <div>
                                <label class="block text-gray-400 mb-1">Phone</label>
                                <input type="text" name="phone" value="{{ $bloodBank->phone ?? '' }}"
                                    class="w-full p-2 rounded bg-gray-700 text-white focus:ring-2 focus:ring-rose-500">
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-lg shadow">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- Operating Hours Card (existing) -->
                    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700">
                        <h2 class="text-xl font-bold mb-4 flex items-center">
                            <i class="fas fa-clock text-rose-400 mr-2"></i> Operating Hours
                        </h2>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-300">Monday - Friday</span>
                                <span class="font-medium">8:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-300">Saturday</span>
                                <span class="font-medium">9:00 AM - 4:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-300">Sunday</span>
                                <span class="font-medium">9:00 AM - 2:00 PM</span>
                            </div>
                        </div>
                    </div>

                    <!-- Update Password Card (new) -->
                    <div class="bg-gray-800 rounded-xl p-6 border border-gray-700 mt-6" x-data="{ showPasswordForm: false }">
                        <button @click="showPasswordForm = !showPasswordForm"
                            class="w-full py-2 px-4 bg-rose-600 hover:bg-rose-700 text-white font-semibold rounded-lg shadow transition flex items-center justify-center gap-2">
                            <i class="fas fa-key"></i> Update Password
                        </button>

                        <!-- Password Form -->
                        <div x-show="showPasswordForm" x-transition class="mt-4 space-y-3">
                            <form method="POST" action="">
                                @csrf
                                @method('PUT')

                                <input type="password" name="current_password" placeholder="Current Password"
                                    class="w-full px-3 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-rose-500 focus:ring focus:ring-rose-500/30 mb-3">

                                <input type="password" name="new_password" placeholder="New Password"
                                    class="w-full px-3 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-rose-500 focus:ring focus:ring-rose-500/30 mb-3">

                                <input type="password" name="new_password_confirmation"
                                    placeholder="Confirm New Password"
                                    class="w-full px-3 py-2 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-rose-500 focus:ring focus:ring-rose-500/30 mb-3">

                                <div class="flex gap-2 mt-2">
                                    <button type="submit"
                                        class="flex-1 py-2 px-4 bg-rose-600 hover:bg-rose-700 text-white font-semibold rounded-lg shadow">
                                        Save
                                    </button>
                                    <button type="button" @click="showPasswordForm = false"
                                        class="flex-1 py-2 px-4 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function multiDatePicker() {
            return {
                open: true, // Calendar always open
                cursor: new Date(),
                selectedDates: [],
                dateNotes: @json($bloodBank->closedDays()->pluck('reason', 'date')),
                activeDay: null,
                // Backend-provided data
                closed_date: @json($bloodBank->closedDays()->where('type', 'closedDay')->pluck('date')),
                appointment_full_date: @json($bloodBank->closedDays()->where('type', 'apmFullDay')->pluck('date')),

                // Getter functions
                get year() {
                    return this.cursor.getFullYear();
                },
                get month() {
                    return this.cursor.getMonth();
                },
                get monthYear() {
                    return this.cursor.toLocaleDateString(undefined, {
                        month: 'long',
                        year: 'numeric'
                    });
                },
                get firstDayOfMonth() {
                    return new Date(this.year, this.month, 1);
                },
                get daysInMonth() {
                    return new Date(this.year, this.month + 1, 0).getDate();
                },
                get leadingBlanks() {
                    return this.firstDayOfMonth.getDay();
                },
                get displayDates() {
                    if (this.selectedDates.length === 0) return '';
                    return this.selectedDates.length + ' date(s) selected';
                },

                // Date manipulation
                prevMonth() {
                    this.cursor = new Date(this.year, this.month - 1, 1);
                    this.activeDay = null;
                },
                nextMonth() {
                    this.cursor = new Date(this.year, this.month + 1, 1);
                    this.activeDay = null;
                },

                // Date selection
                selectDate(day) {
                    if (this.isPast(day) || this.isApmFull(day)) return; // not editable

                    const date = new Date(this.year, this.month, day);
                    const dateStr = this.getLocalDateString(date);

                    if (this.isSelected(day)) {
                        this.activateNote(day);
                    } else {
                        this.selectedDates.push(date);
                        if (!this.dateNotes[dateStr]) {
                            this.dateNotes[dateStr] = ''; // make sure key exists
                        }
                        this.activeDay = day;
                    }
                },

                activateNote(day) {
                    this.activeDay = day;
                },

                saveNote(day) {
                    this.activeDay = null; // Close the note box after saving
                },

                skipNote(day) {
                    const date = new Date(this.year, this.month, day);
                    const dateStr = this.getLocalDateString(date);
                    this.dateNotes[dateStr] = ''; // Clear any existing note
                    this.activeDay = null; // Close the note box
                },

                removeDate(index) {
                    const dateStr = this.getLocalDateString(this.selectedDates[index]);
                    this.selectedDates.splice(index, 1);
                    delete this.dateNotes[dateStr];
                    if (this.activeDay === this.selectedDates[index]?.getDate()) {
                        this.activeDay = null;
                    }
                },

                clearSelection() {
                    this.selectedDates = [];
                    this.dateNotes = {};
                    this.activeDay = null;
                },

                // --- Helper functions ---
                isSelected(day) {
                    const date = new Date(this.year, this.month, day);
                    const dateStr = this.getLocalDateString(date);
                    return this.selectedDates.some(d =>
                        this.getLocalDateString(d) === dateStr
                    );
                },

                isPast(day) {
                    const date = new Date(this.year, this.month, day);
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);
                    return date < today;
                },

                isClosed(day) {
                    const date = new Date(this.year, this.month, day);
                    return this.closed_date.includes(this.getLocalDateString(date));
                },

                isApmFull(day) {
                    const date = new Date(this.year, this.month, day);
                    return this.appointment_full_date.includes(this.getLocalDateString(date));
                },

                getLocalDateString(date) {
                    return date.getFullYear() + '-' +
                        String(date.getMonth() + 1).padStart(2, '0') + '-' +
                        String(date.getDate()).padStart(2, '0');
                },

                formatDate(date) {
                    return date.toLocaleDateString(undefined, {
                        weekday: 'short',
                        month: 'short',
                        day: 'numeric',
                        year: 'numeric'
                    });
                }
            }
        }
    </script>

</x-admin-layout>
