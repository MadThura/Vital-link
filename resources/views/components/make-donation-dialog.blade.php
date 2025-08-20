<!-- Overlay and Centered Modal -->
<div x-show="showRequests" x-transition.opacity
    class="fixed top-[8%] inset-0 z-50 flex items-center justify-center p-4 bg-black/70">
    <!-- Requests Pane -->
    <div x-show="showRequests" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" @click.away="showRequests = false"
        class="relative w-full max-w-4xl max-h-[90vh] bg-[#121212] rounded-lg shadow-2xl overflow-hidden flex flex-col border border-gray-800">
        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-4 bg-[#0a0a0a] border-b border-gray-800">
            <h3 class="text-xl font-semibold text-gray-200">Blood Donation Requests</h3>
            <button @click="showRequests = false"
                class="p-2 text-gray-400 hover:text-white rounded-full hover:bg-gray-800 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="pt-4 overflow-y-auto bg-[#0f0f0f]">
            <!-- Blood Banks Section -->
            <div class="space-y-4 w-full">
                <!-- Blood Banks List -->
                <div class="flex flex-col gap-4 px-4 pb-6 auto-rows-min">
                    @foreach ($bloodBanks as $bloodBank)
                        <div
                            class="py-3 bg-[#0a0a0a] rounded-lg overflow-hidden shadow border border-gray-800 hover:border-red-500/30 transition-colors">
                            <!-- Blood Bank Header -->
                            <div class="bg-[#111111] px-5 py-3 flex items-center gap-3 border-b border-gray-800">
                                <div class="bg-red-500/10 p-2 rounded-lg">
                                    <i class="fas fa-hospital text-red-400"></i>
                                </div>
                                <h3 class="text-md font-medium text-gray-200">{{ $bloodBank->name }}</h3>
                            </div>

                            <!-- Blood Bank Details -->
                            <div class="flex items-center justify-between py-5 gap-5">
                                <div class="w-[35%] px-5 space-y-4">
                                    <div class="flex items-start gap-3">
                                        <i class="fas fa-map-marker-alt text-red-500 mt-0.5 text-sm"></i>
                                        <p class="text-gray-400 text-sm text-left">{{ $bloodBank->address }}</p>
                                    </div>

                                    <div class="flex items-start gap-3">
                                        <i class="fas fa-phone-alt text-red-500 mt-0.5 text-sm"></i>
                                        <p class="text-gray-400 text-sm">{{ $bloodBank->user->email }}</p>
                                    </div>

                                    <div class="flex items-start gap-3">
                                        <i class="fas fa-clock text-red-500 mt-0.5 text-sm"></i>
                                        <p class="text-gray-400 text-sm">Mon-Fri: 8AM - 6PM<br>Sat-Sun: 9AM - 4PM</p>
                                    </div>
                                </div>
                                <!-- Appointment Section -->
                                <div x-data="{ showForm: false }" class="px-5 pb-5 relative">
                                    <button @click="showForm = !showForm"
                                        class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md transition-colors flex items-center justify-center gap-2 text-sm">
                                        <i class="far fa-calendar-plus"></i>
                                        <span>Request Appointment</span>
                                    </button>

                                    <!-- Appointment Form -->
                                    <form x-show="showForm" x-transition action="{{ route('donation-requests.store') }}"
                                        method="POST"
                                        class="mt-4 space-y-3 bg-[#111111] p-4 rounded-md border border-gray-800">
                                        @csrf
                                        @method('POST')
                                        <div x-data="datePicker({
                                            min: new Date(),
                                            disabledWeekdays: [],
                                            disabledDates: ['2025-08-22', '2025-08-30', '2025-08-29'],
                                            valueField: 'appointment_date'
                                        })" class="w-full max-w-md">


                                            <label class="block text-sm mb-1 text-gray-400">Appointment Date</label>

                                            <!-- Display/Input -->
                                            <div class="">
                                                <input type="text" x-model="display" readonly
                                                    class="w-full bg-[#0a0a0a] text-gray-300 border border-gray-700 rounded-md px-3 py-2 cursor-pointer text-sm"
                                                    @click="open = !open" placeholder="Select a date" />
                                                <input type="hidden" :name="valueField" :value="valueIso" />
                                                <input type="hidden" name="blood_bank_id" value="{{ $bloodBank->id }}">
                                                <!-- Calendar popover -->
                                                <div x-show="open" @click.outside="open=false" x-transition
                                                    class="absolute top-20 right-[50%] z-50 w-[100%] bg-[#0a0a0a] border border-gray-800 rounded-lg shadow-xl p-3 transform -translate-x-1/2 -translate-y-1/2">


                                                    <!-- Header -->
                                                    <div class="flex items-center justify-between mb-2">
                                                        <button type="button" @click="prevMonth"
                                                            class="px-2 py-1 rounded hover:bg-gray-800 text-gray-400">&laquo;</button>
                                                        <div class="text-gray-300 font-medium text-sm"
                                                            x-text="monthYear"></div>
                                                        <button type="button" @click="nextMonth"
                                                            class="px-2 py-1 rounded hover:bg-gray-800 text-gray-400">&raquo;</button>
                                                    </div>

                                                    <!-- Weekdays -->
                                                    <div class="grid grid-cols-7 gap-1 text-xs text-gray-500 mb-1">
                                                        <div class="text-center">Sun</div>
                                                        <div class="text-center">Mon</div>
                                                        <div class="text-center">Tue</div>
                                                        <div class="text-center">Wed</div>
                                                        <div class="text-center">Thu</div>
                                                        <div class="text-center">Fri</div>
                                                        <div class="text-center">Sat</div>
                                                    </div>

                                                    <!-- Days -->
                                                    <div class="grid grid-cols-7 gap-1">
                                                        <template x-for="n in leadingBlanks" :key="'b' + n">
                                                            <div class="h-8"></div>
                                                        </template>

                                                        <template x-for="d in daysInMonth" :key="'d' + d">
                                                            <button type="button" @click="pick(d)"
                                                                :disabled="isDisabled(d)"
                                                                class="h-8 rounded-md text-xs w-full transition":class="{
                                                                'bg-red-600 text-white': isSelected(d),
                                                                'hover:bg-gray-800 text-gray-300': !isSelected(d) && !
                                                                    isDisabled(d),
                                                                'text-gray-600 cursor-not-allowed line-through': isDisabled(
                                                                    d)
                                                            }" x-text="d">
                                                            </button>
                                                        </template>
                                                    </div>

                                                    <!-- Footer actions -->
                                                    <div class="flex justify-end gap-2 mt-3">
                                                        <button type="button" @click="today()"
                                                            class="px-3 py-1 text-xs rounded bg-gray-800 text-gray-300 hover:bg-gray-700">
                                                            Today
                                                        </button>
                                                        <button type="button" @click="open=false"
                                                            class="px-3 py-1 text-xs rounded bg-red-600 text-white hover:bg-red-500">
                                                            Done
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            @error('appointment_date')
                                                <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button type="submit"
                                            class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-md transition-colors flex items-center justify-center gap-2 text-sm">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Confirm Booking</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /* Alpine date picker */
    function datePicker({
        min = null,
        max = null,
        disabledWeekdays = [],
        disabledDates = [],
        valueField = 'date'
    } = {}) {
        return {
            open: false,
            valueField,
            cursor: new Date(),
            selected: null,
            disabledDates,

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
            get valueIso() {
                return this.selected ? this.selected.toLocaleDateString('en-CA', {
                    timeZone: 'Asia/Yangon'
                }) : '';
            },
            get display() {
                return this.selected ? this.selected.toLocaleDateString() : '';
            },
            set display(v) {},

            prevMonth() {
                this.cursor = new Date(this.year, this.month - 1, 1);
            },
            nextMonth() {
                this.cursor = new Date(this.year, this.month + 1, 1);
            },

            isDisabled(day) {
                const d = new Date(this.year, this.month, day);

                // Create local ISO date (no timezone shift)
                const iso = [
                    d.getFullYear(),
                    String(d.getMonth() + 1).padStart(2, '0'),
                    String(d.getDate()).padStart(2, '0')
                ].join('-');

                if (min && d < stripTime(min)) return true;
                if (max && d > stripTime(max)) return true;
                if (disabledWeekdays.includes(d.getDay())) return true;
                if (this.disabledDates.includes(iso)) return true; // ✅ now matches correctly
                return false;
            },

            isSelected(day) {
                if (!this.selected) return false;
                return sameDate(this.selected, new Date(this.year, this.month, day));
            },

            pick(day) {
                if (this.isDisabled(day)) return;
                this.selected = new Date(this.year, this.month, day);
            },

            today() {
                const t = new Date();
                this.cursor = new Date(t.getFullYear(), t.getMonth(), 1);
                if (!this.isDisabled(t.getDate())) this.selected = stripTime(t);
            }
        }
    }


    function stripTime(d) {
        return new Date(d.getFullYear(), d.getMonth(), d.getDate());
    }

    function sameDate(a, b) {
        return a.getFullYear() === b.getFullYear() &&
            a.getMonth() === b.getMonth() &&
            a.getDate() === b.getDate();
    }
</script>
