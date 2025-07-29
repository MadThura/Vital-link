<x-layout backgroundImage='/images/bg-blood.jpg' title="Information">
    <div class="min-h-screen flex items-center justify-center w-full h-full">
        <div
            class="w-full max-w-xl h-[90vh] overflow-y-auto scrollbar-none p-6 rounded-2xl bg-white/5 backdrop-blur-md shadow-lg hover:bg-white/15 transition-colors">

            <form action="{{ route('auth.storeComplete') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col space-y-4">
                @method('POST')
                @csrf
                {{-- Full Name --}}
                <x-label label="Full Name" />
                <x-input-field type="text" name="fullname" placeholder="Enter Your Full Name" />
                @error('fullname')
                    <p class="text-white-400 text-sm mt-1">{{ $message }}</p>
                @enderror

                {{-- Gender --}}
                <div class="mb-6 p-3">
                    <label class="block mb-2 text-sm font-medium text-white">Gender</label>
                    <div class="flex gap-6">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" id="gender-male" name="gender" value="Male" required
                                class="form-radio text-red-500 focus:ring-red-400" />
                            <span class="ml-2 text-white">Male</span>
                        </label>

                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" id="gender-female" name="gender" value="Female" required
                                class="form-radio text-red-500 focus:ring-red-400" />
                            <span class="ml-2 text-white">Female</span>
                        </label>
                    </div>
                    @error('gender')
                        <p class="text-white-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Blood Type --}}
                <x-label label="Blood Type" />
                <select id="blood_type" name="blood_type" required
                    class="bg-white/90 text-black rounded-xl px-4 py-3 mb-1 outline-none w-full focus:ring-2 focus:ring-red-400">
                    <option value="" disabled selected>Select Blood Type</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                @error('blood_type')
                    <p class="text-white-400 text-sm mt-1">{{ $message }}</p>
                @enderror

                {{-- DOB --}}
                <x-label label="Date of Birth" />
                <x-input-field type="date" name="dob" placeholder="" />
                @error('dob')
                    <p class="text-white-400 text-sm mt-1">{{ $message }}</p>
                @enderror

                {{-- Health Certificate --}}
                <x-label label="Health Certificate" />
                <x-input-field type="file" name="health_certificate" placeholder=""></x-input-field>
                @error('certificate')
                    <p class="text-white-400 text-sm mt-1">{{ $message }}</p>
                @enderror

                {{-- NRC Number --}}
                <x-label label="NRC Number"></x-label>
                <div class="flex flex-wrap gap-2 mb-1" name="nrc-number">
                    <!-- State/Region Number -->
                    <select id="nrc-state" name="nrc-state" required
                        class="flex-1 min-w-[20px] bg-white/90 text-black rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400">
                        <option value="" disabled selected>State No.</option>
                        @for ($i = 1; $i <= 14; $i++)
                            <option value="{{ $i < 10 ? '0' . $i : $i }}">{{ $i < 10 ? '0' . $i : $i }}</option>
                        @endfor
                    </select>
                    @error('nrc-state')
                        <p class="text-white-400 text-sm mt-1 w-full">{{ $message }}</p>
                    @enderror

                    <!-- Township Abbreviation -->
                    <select id="nrc-township" name="nrc-township" required
                        class="flex-1 min-w-[60px] bg-white/90 text-black rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400">
                        <option value="" disabled selected>Township</option>
                        <option value="BA">BA</option>
                        <option value="MA">MA</option>
                        <option value="TH">TH</option>
                        <option value="YGN">YGN</option>
                    </select>
                    @error('nrc-township')
                        <p class="text-white-400 text-sm mt-1 w-full">{{ $message }}</p>
                    @enderror

                    <!-- NRC Type -->
                    <select id="nrc-type" name="nrc-type" required
                        class="flex-1 min-w-[60px] bg-white/90 text-black rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400">
                        <option value="" disabled selected>Type</option>
                        <option value="N">N</option>
                        <option value="NA">NA</option>
                        <option value="P">P</option>
                        <option value="T">T</option>
                    </select>
                    @error('nrc-type')
                        <p class="text-white-400 text-sm mt-1 w-full">{{ $message }}</p>
                    @enderror

                    <!-- NRC Number -->
                    <input type="text" id="nrc-number-input" name="nrc-number" maxlength="6" placeholder="123456"
                        pattern="[0-9]{6}" title="Enter 6 digit NRC number" required
                        class="flex-1 min-w-[80px] bg-white/90 text-black placeholder:text-gray-500 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400" />
                    @error('nrc-number')
                        <p class="text-white-400 text-sm mt-1 w-full">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone Number --}}
                <x-label label="Phone Number"></x-label>
                <x-input-field type="tel" name="phone" placeholder="Enter your phone number" />
                @error('phone')
                    <p class="text-white-400 text-sm mt-1">{{ $message }}</p>
                @enderror

                {{-- Address --}}
                <x-label label="Address" />
                <textarea id="address" name="address" placeholder="Enter your address" required rows="3"
                    class="bg-white/90 text-black placeholder:text-gray-500 rounded-xl px-4 py-3 mb-1 outline-none focus:ring-2 focus:ring-red-400 resize-none"></textarea>
                @error('address')
                    <p class="text-white-400 text-sm mt-1">{{ $message }}</p>
                @enderror

                {{-- Submit --}}
                <x-submit-button name="Confirm" />

            </form>
        </div>

    </div>
</x-layout>
