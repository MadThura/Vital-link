@props(['type', 'id', 'placeholder', 'name', 'label'])

<x-layout backgroundImage='/images/bg-blood.jpg' title="Information">
    <div class="min-h-screen flex items-center justify-center w-full h-full">
        <div
            class="w-full max-w-xl h-[90vh] overflow-y-auto scrollbar-none p-6 rounded-2xl bg-white/5 backdrop-blur-md shadow-lg hover:bg-white/15 transition-colors">

            <form action="" method="GET" enctype="multipart/form-data" class="flex flex-col space-y-4">
                @csrf
                {{-- Full Name --}}
                <x-label label="Full Name"/>
                <x-input-field type="text" id="fullname" placeholder="Enter Your Full Name" />
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
                </div>
                {{-- Blood Type --}}
                <x-label label="Blood Type"/>
                <select id="blood_type" name="blood_type" required
                    class="bg-white/90 text-black rounded-xl px-4 py-3 mb-6 outline-none w-full focus:ring-2 focus:ring-red-400">
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
                {{-- DOB --}}
                <x-label label="Date of Birth"/>
                <x-input-field type="date" id="dob" placeholder=""/>
                {{-- Health Certificate --}}
                <x-label label="Health Certificate"/>
                <x-input-field type="file" id="certificate" placeholder=""></x-input-field>
                {{-- NRC Number --}}
                <x-label label="NRC Number"></x-label>
                <div class="flex flex-wrap gap-2 mb-6" id="nrc-number">
                    <!-- State/Region Number -->
                    <select id="nrc-state" name="nrc-state" required
                        class="flex-1 min-w-[20px] bg-white/90 text-black rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400">
                        <option value="" disabled selected>State No.</option>
                        @for ($i = 1; $i <= 14; $i++)
                            <option value="{{ $i < 10 ? '0' . $i : $i }}">{{ $i < 10 ? '0' . $i : $i }}</option>
                        @endfor
                    </select>

                    <!-- Township Abbreviation -->
                    <select id="nrc-township" name="nrc-township" required
                        class="flex-1 min-w-[60px] bg-white/90 text-black rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400">
                        <option value="" disabled selected>Township</option>
                        <option value="BA">BA</option>
                        <option value="MA">MA</option>
                        <option value="TH">TH</option>
                        <option value="YGN">YGN</option>
                        <!-- Add more as needed -->
                    </select>

                    <!-- NRC Type -->
                    <select id="nrc-type" name="nrc-type" required
                        class="flex-1 min-w-[60px] bg-white/90 text-black rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400">
                        <option value="" disabled selected>Type</option>
                        <option value="N">N</option>
                        <option value="NA">NA</option>
                        <option value="P">P</option>
                        <option value="T">T</option>
                    </select>

                    <!-- NRC Number -->
                    <input type="text" id="nrc-number-input" name="nrc-number" maxlength="6" placeholder="123456"
                        pattern="[0-9]{6}" title="Enter 6 digit NRC number" required
                        class="flex-1 min-w-[80px] bg-white/90 text-black placeholder:text-gray-500 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400" />
                </div>
                <x-label label="NRC Front"/>
                <x-input-field type="file" id="nrc_front" placeholder=""></x-input-field>
                <x-label label="NRC Back"/>
                <x-input-field type="file" id="nrc_back" placeholder=""></x-input-field>
                {{-- Ph Number --}}
                <x-label label="Phone Number"></x-label>
                <x-input-field type="tel" id="ph_number" placeholder="Enter your phone number"></x-input-field>
                {{-- Address --}}
                <x-label label="Address"/>
                <textarea id="address" name="address" placeholder="Enter your address" required rows="3"
                    class="bg-white/90 text-black placeholder:text-gray-500 rounded-xl px-4 py-3 mb-6 outline-none focus:ring-2 focus:ring-red-400 resize-none"></textarea>
                {{-- Submit --}}
                <x-submit-button name="Confirm" />
            </form>
        </div>

    </div>
</x-layout>
