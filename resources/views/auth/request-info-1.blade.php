@props(['type', 'id', 'placeholder', 'name', 'label'])

<x-layout backgroundImage='/images/bg-blood.jpg' title="Information">
    <div class="min-h-screen flex items-center justify-center w-full h-full">
        <div
            class="w-full max-w-xl h-full overflow-y-auto scrollbar-none p-6  bg-white/5 backdrop-blur-md shadow-lg hover:bg-white/15 transition-colors">

            <form action="" method="GET" enctype="multipart/form-data" class="flex flex-col space-y-4">
                @csrf
                {{-- Profile Picture --}}
                <div class="flex gap-4 items-center mb-4">
                    {{-- Existing image --}}
                    @if (!empty($donor['profile_img']))
                        <div>
                            <img src="{{ $donor['profile_img'] }}" alt="Existing Profile Image"
                                class="w-32 h-32 rounded-full object-cover " />
                        </div>
                    @endif

                    {{-- New image preview --}}
                    <div>
                        <img id="preview" src="#" alt="New Image Preview"
                            class="w-32 h-32 object-cover rounded-full  hidden" />
                    </div>
                </div>
                <x-label label="Profile picture" />
                <x-upload-file filename="profile_img" />

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
                                class="form-radio text-red-500 focus:ring-red-400"
                                {{ old('gender') == 'Female' ? 'checked' : '' }} />
                            <span class="ml-2 text-white">Female</span>
                        </label>
                    </div>
                </div>
                {{-- Blood Type --}}
                <x-label label="Blood Type" />
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
                <x-label label="Date of Birth" />
                <x-input-field type="date" id="dob" name='dob' placeholder="" />
                {{-- Certificate --}}
                <x-label label="Health Certificate" />
                <div class="flex gap-4 items-center mb-4">
                    @if (!empty($donor['health_certificate']))
                        <div class="text-center">

                            <img src="{{ $donor['health_certificate'] }}" alt="Existing Certificate"
                                class="w-[220px] h-60 object-fit rounded" />
                        </div>
                    @endif

                    <div class="text-center">
                        <img id="preview_certificate" class="hidden w-[220px] h-60 object-fit rounded" />
                    </div>
                </div>
                <x-upload-file filename="certificate" />

                {{-- NRC Number --}}
                <x-label label="NRC Number"></x-label>
                <div class="flex flex-wrap gap-2 mb-6" id="nrc-number">
                    <!-- State/Region Number -->
                    <select id="nrc-state" name="nrc-state" required
                        class="flex-1 min-w-[20px] bg-white/90 text-black rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400">
                        <option value="" disabled selected>State No.</option>
                        @for ($i = 1; $i <= 14; $i++)
                            @php $val = $i < 10 ? '0' . $i : (string) $i; @endphp
                            <option value="{{ $val }}" {{ old('nrc-state') == $val ? 'selected' : '' }}>
                                {{ $val }}
                            </option>
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
                        value="{{ old('nrc-number') }}" pattern="[0-9]{6}" title="Enter 6 digit NRC number" required
                        class="flex-1 min-w-[80px] bg-white/90 text-black placeholder:text-gray-500 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-red-400" />
                </div>
                {{-- NRC Front --}}
                <x-label label="NRC Front" />
                <div class="flex gap-4 items-center mb-4">
                    @if (!empty($donor['nrc_front']))
                        <div class="text-center">
                            <img src="{{ $donor['nrc_front'] }}" alt="Existing NRC Front"
                                class="w-60 h-40 object-fit rounded" />
                        </div>
                    @endif
                    <div class="text-center">
                        <img id="preview_nrc_front" class="hidden w-60 h-40 object-fit rounded" />
                    </div>
                </div>
                <x-upload-file filename="nrc_front" />

                {{-- NRC Back --}}
                <x-label label="NRC Back" />
                <div class="flex gap-4 items-center mb-4">
                    @if (!empty($donor['nrc_back']))
                        <div class="text-center">
                            <img src="{{ $donor['nrc_back'] }}" alt="Existing NRC Back"
                                class="w-60 h-40 object-fit rounded" />
                        </div>
                    @endif

                    <div class="text-center">
                        <img id="preview_nrc_back" class="hidden w-60 h-40 object-fit rounded" />
                    </div>
                </div>
                <x-upload-file filename="nrc_back" />
                {{-- Ph Number --}}
                <x-label label="Phone Number"></x-label>
                <x-input-field type="tel" id="ph_number" name='ph_number' placeholder="Enter your phone number" value="{{old('ph_number')}}"/>
                {{-- Address --}}
                <x-label label="Address" />
                <textarea id="address" name="address" placeholder="Enter your address" required rows="3"
                    class="bg-white/90 text-black placeholder:text-gray-500 rounded-xl px-4 py-3 mb-6 outline-none focus:ring-2 focus:ring-red-400 resize-none">{{ old('address') }}</textarea>
                {{-- Submit --}}
                <x-submit-button name="Confirm" />
            </form>
        </div>

    </div>


</x-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const previewMap = {
            profile_img: 'preview',
            nrc_front: 'preview_nrc_front',
            nrc_back: 'preview_nrc_back',
            certificate: 'preview_certificate'
        };

        for (const [inputName, previewId] of Object.entries(previewMap)) {
            const inputEl = document.querySelector(`input[name="${inputName}"]`);
            const previewEl = document.getElementById(previewId);

            if (!inputEl || !previewEl) continue;

            inputEl.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        previewEl.src = event.target.result;
                        previewEl.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewEl.src = '#';
                    previewEl.classList.add('hidden');
                }
            });
        }
    });
</script>
