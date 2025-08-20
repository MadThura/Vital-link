@props(['donor' => null])
@php
    $nrc = $donor->nrc ?? '';
    $nrc_state = $nrc_township = $nrc_type = $nrc_number = null;

    if (preg_match('/^(\d{1,2})\/([A-Z][a-zA-Z]+)\(([A-Z])\)(\d{6})$/', $nrc, $matches)) {
        $nrc_state = str_pad($matches[1], 2, '0', STR_PAD_LEFT); // e.g., "10"
        $nrc_township = $matches[2]; // e.g., "MaDaNa"
        $nrc_type = $matches[3]; // e.g., "E"
        $nrc_number = $matches[4]; // e.g., "575777"
    }
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }

        .form-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(233, 24, 21, 0.2);
        }

        .preview-container {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 0.5rem;
        }

        .profile-preview {
            width: 120px;
            height: 120px;
            background-size: cover;
            background-position: center;
            border-radius: 50%;
        }

        .existing-file {
            position: relative;
        }

        .existing-file::after {
            content: "Existing File";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(105, 13, 11, 0.9);
            color: white;
            text-align: center;
            padding: 2px 0;
            font-size: 0.75rem;
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 bg-[#F3F0F0]">
    <div class="w-full max-w-2xl">
        @if (isset($errorMsg) && !$errorMsg->isEmpty())
            <div class="w-full space-y-2 bg-red-100 border border-red-400 rounded-md p-3 mb-5">
                @if (!empty($errorMsg['profile_img']))
                    <p class="flex items-center text-[#E91815] text-sm">
                        <svg class="w-4 h-4 mr-1.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"></path>
                        </svg>
                        Your Profile Image is not valid.
                    </p>
                @endif

                @if (!empty($errorMsg['health_certificate']))
                    <p class="flex items-center text-[#E91815] text-sm">
                        <svg class="w-4 h-4 mr-1.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"></path>
                        </svg>
                        Your Health Certificate is not valid.
                    </p>
                @endif

                @if (!empty($errorMsg['nrc']))
                    <p class="flex items-center text-[#E91815] text-sm">
                        <svg class="w-4 h-4 mr-1.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z"></path>
                        </svg>
                        Your NRC credential is not valid.
                    </p>
                @endif
                @if (!empty($errorMsg['note']))
                    <p
                        class="flex items-center text-yellow-600 text-sm bg-yellow-100 rounded-md px-3 py-1.5 border border-yellow-400 shadow-sm">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.681-1.36 3.446 0l5.451 9.68c.75 1.332-.213 2.98-1.723 2.98H4.529c-1.51 0-2.473-1.648-1.723-2.98l5.451-9.68zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-.25-4.75a.75.75 0 00-1.5 0v3.5a.75.75 0 001.5 0v-3.5z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-semibold">Note:</span>{{ $errorMsg['note'] }}
                    </p>
                @endif
            </div>
        @endif
        <div class="bg-white rounded-xl form-shadow overflow-hidden border border-[#DAD0D0]">
            <!-- Header -->
            <div class="bg-gradient-to-r from-[#E91815] to-[#690D0B] p-8 text-white">
                <div class="flex items-center justify-center space-x-4">
                    <div class="bg-[#690D0B] p-3 rounded-full">
                        <i class="fas fa-tint text-xl text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-semibold tracking-tight">
                            @if (isset($donor))
                                Edit and Resubmit Donor Information
                            @else
                                Blood Donor Registration
                            @endif
                        </h1>
                        <p class="text-[#F3F0F0] mt-1">Your generosity saves lives</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form class="p-8 space-y-8"
                action="{{ $donor ? route('donor.updateComplete') : route('donor.storeComplete') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @if ($donor)
                    @method('PUT')
                @else
                    @method('POST')
                @endif
                <!-- Profile Picture Section -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center space-x-6">
                        @if (isset($donor->profile_img))
                            <div class="relative">
                                <div class="profile-preview"
                                    style="background-image: url('/donor-files/{{ $donor->profile_img }}')"></div>
                                <div
                                    class="absolute bottom-0 right-0 bg-[#690D0B] text-white text-xs px-2 py-1 rounded-full">
                                    Existing</div>
                            </div>
                        @endif
                        <div class="relative">
                            <div id="profile-preview"
                                class="profile-preview bg-[#F3F0F0] flex items-center justify-center border border-[#DAD0D0]">
                                <i class="fas fa-user text-4xl text-[#690D0B]"></i>
                            </div>
                            <label for="profile_img"
                                class="absolute bottom-0 right-0 bg-[#690D0B] text-white p-2 rounded-full cursor-pointer hover:bg-[#E91815] transition">
                                <i class="fas fa-camera"></i>
                                <input id="profile_img" type="file" name="profile_img" class="hidden"
                                    accept="image/png, image/jpeg" />
                            </label>
                        </div>
                    </div>
                    @if (isset($donor->profile_img))
                        <p class="text-sm text-[#690D0B]/80 mt-4">Left: Existing profile | Right: New upload</p>
                    @endif
                    @error('profile_img')
                        <p class="text-[#E91815] text-sm">{{ $message }}</p>
                    @enderror
                    @if ($errorMsg['profile_img'] ?? null)
                        <p class="text-[#E91815] text-sm">{{ $errorMsg['profile_img'] }}</p>
                    @endif
                </div>

                <!-- Personal Information Section -->
                <div class="space-y-6">
                    <h2 class="text-xl font-medium text-[#180705] border-b border-[#DAD0D0] pb-2">
                        <i class="fas fa-user-circle mr-2 text-[#E91815]"></i>Personal Information
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name Input -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-[#690D0B]" for="name">
                                Full Name
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-[#690D0B]">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input id="name" type="text" name="fullname"
                                    class="w-full pl-10 pr-3 py-3 border border-[#DAD0D0] rounded-lg outline-none bg-[#F3F0F0] text-[#180705]"
                                    value="{{ auth()->user()->name }}" disabled>
                            </div>
                        </div>
                        @error('fullname')
                            <p class="text-[#E91815] text-sm">{{ $message }}</p>
                        @enderror

                        <!-- Phone Number -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-[#690D0B]" for="phone">
                                Phone Number
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-[#690D0B]">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input id="phone" type="tel" name="phone" placeholder="09XXXXXXXX"
                                    class="w-full pl-10 pr-3 py-3 border border-[#DAD0D0] rounded-lg input-focus focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] outline-none bg-[#F3F0F0] text-[#180705]"
                                    value="{{ $donor ? $donor->phone : old('phone') }}">
                                @error('phone')
                                    <p class="text-[#E91815] text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <!-- Date of Birth -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-[#690D0B]" for="dob">
                                Date of Birth
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-[#690D0B]">
                                    <i class="fas fa-calendar-alt"></i>
                                </span>
                                <input id="dob" type="date" name="dob"
                                    class="w-full pl-10 pr-3 py-3 border border-[#DAD0D0] rounded-lg input-focus focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] outline-none bg-[#F3F0F0] text-[#180705] appearance-none"
                                    value="{{ $donor ? $donor->dob : old('dob') }}">
                                @error('dob')
                                    <p class="text-[#E91815] text-sm">Must be over 18</p>
                                @enderror
                            </div>
                        </div>


                        <!-- Gender -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-[#690D0B]">
                                Gender
                            </label>
                            <div class="flex space-x-6 pt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Male"
                                        class="h-4 w-4 text-[#E91815] focus:ring-[#E91815]"
                                        {{ old('gender', optional($donor)->gender) === 'Male' ? 'checked' : '' }}>
                                    <span class="ml-2 text-[#180705]">Male</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Female"
                                        class="h-4 w-4 text-[#E91815] focus:ring-[#E91815]"
                                        {{ old('gender', optional($donor)->gender) === 'Female' ? 'checked' : '' }}>
                                    <span class="ml-2 text-[#180705]">Female</span>
                                </label>
                            </div>
                            @error('gender')
                                <p class="text-[#E91815] text-sm">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- Blood Type -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-[#690D0B]" for="blood_type">
                                Blood Type
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-[#E91815]">
                                    <i class="fas fa-tint"></i>
                                </span>
                                <select id="blood_type" name="blood_type"
                                    class="w-full pl-10 pr-3 py-3 border border-[#DAD0D0] rounded-lg input-focus focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] outline-none bg-[#F3F0F0] text-[#180705] appearance-none">

                                    <option value="" disabled
                                        {{ old('blood_type', $donor->blood_type ?? '') == '' ? 'selected' : '' }}>
                                        Select your blood type
                                    </option>

                                    @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $type)
                                        <option value="{{ $type }}"
                                            {{ old('blood_type', $donor->blood_type ?? '') == $type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            @error('blood_type')
                                <p class="text-[#E91815] text-sm">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- Address -->
                        <div class="md:col-span-2 space-y-2">
                            <label class="block text-sm font-medium text-[#690D0B]" for="address">
                                Address
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-[#690D0B] pt-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <textarea id="address" rows="3" name ="address" placeholder="Your full address"
                                    class="w-full pl-10 pr-3 py-3 border border-[#DAD0D0] rounded-lg input-focus focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] outline-none bg-[#F3F0F0] text-[#180705]">{{ $donor ? $donor->address : old('address') }}</textarea>
                            </div>
                            @error('address')
                                <p class="text-[#E91815] text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
                <!-- NRC Information Section -->
                <div class="space-y-6">
                    <h2 class="text-xl font-medium text-[#180705] border-b border-[#DAD0D0] pb-2">
                        <i class="fas fa-id-card mr-2 text-[#E91815]"></i>NRC Information
                    </h2>

                    <!-- NRC Number with Select Boxes -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- State/Region -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-[#690D0B]" for="nrc-state">
                                State/Region
                            </label>
                            <select id="nrc-state" name="nrc-state"
                                class="w-full px-3 py-3 border border-[#DAD0D0] rounded-lg input-focus focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] outline-none bg-[#F3F0F0] text-[#180705]">
                                <option value="" disabled
                                    {{ old('nrc-state', $nrc_state ?? '') == '' ? 'selected' : '' }}>Select</option>

                                @for ($i = 1; $i <= 14; $i++)
                                    @php $val = str_pad($i, 2, '0', STR_PAD_LEFT); @endphp
                                    <option value="{{ $val }}"
                                        {{ old('nrc-state', $nrc_state ?? '') == $val ? 'selected' : '' }}>
                                        {{ $val }}
                                    </option>
                                @endfor
                            </select>
                            @error('nrc-state')
                                <p class="text-[#E91815] text-[10px]">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- Township -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-[#690D0B]" for="nrc-township">
                                Township
                            </label>
                            <select id="nrc-township" name="nrc-township"
                                class="w-full px-3 py-3 border border-[#DAD0D0] rounded-lg input-focus focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] outline-none bg-[#F3F0F0] text-[#180705]">
                                <option value="" disabled>Select</option>
                            </select>
                            @error('nrc-township')
                                <p class="text-[#E91815] text-[10px]">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NRC Type -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-[#690D0B]" for="nrc-type">
                                Type
                            </label>
                            <select id="nrc-type" name="nrc-type"
                                class="w-full px-3 py-3 border border-[#DAD0D0] rounded-lg input-focus focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] outline-none bg-[#F3F0F0] text-[#180705]">
                                <option value="" disabled
                                    {{ empty(old('nrc-type', $nrc_type ?? '')) ? 'selected' : '' }}>Select</option>
                                <option value="N"
                                    {{ old('nrc-type', $nrc_type ?? '') === 'N' ? 'selected' : '' }}>N</option>
                                <option value="P"
                                    {{ old('nrc-type', $nrc_type ?? '') === 'P' ? 'selected' : '' }}>P</option>
                                <option value="E"
                                    {{ old('nrc-type', $nrc_type ?? '') === 'E' ? 'selected' : '' }}>E</option>
                                <option value="A"
                                    {{ old('nrc-type', $nrc_type ?? '') === 'A' ? 'selected' : '' }}>A</option>
                                <option value="F"
                                    {{ old('nrc-type', $nrc_type ?? '') === 'F' ? 'selected' : '' }}>F</option>
                            </select>
                            @error('nrc-type')
                                <p class="text-[#E91815] text-[10px]">{{ $message }}</p>
                            @enderror

                        </div>

                        <!-- NRC Number -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-[#690D0B]" for="nrc-number">
                                Number
                            </label>
                            <input id="nrc-number" name="nrc-number" type="text" placeholder="123456"
                                class="w-full px-3 py-3 border border-[#DAD0D0] rounded-lg input-focus focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] outline-none bg-[#F3F0F0] text-[#180705]"
                                maxlength="6" minlength="6" value="{{ old('nrc-number', $nrc_number ?? '') }}">
                            @error('nrc-number')
                                <p class="text-[#E91815] text-[10px]">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- NRC Photos -->
                    <div class="space-y-6">
                        <!-- Existing NRC Photos (side by side) -->
                        @if (isset($donor->nrc_front) || isset($donor->nrc_back))
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if (isset($donor->nrc_front))
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-[#690D0B]">NRC Front</label>
                                        <div class="h-40 border border-[#DAD0D0] rounded-lg overflow-hidden existing-file"
                                            style="background: url('/donor-files/{{ $donor->nrc_front }}') center/cover no-repeat;">
                                        </div>
                                    </div>
                                @endif
                                @if (isset($donor->nrc_back))
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-[#690D0B]">NRC Back</label>
                                        <div class="h-40 border border-[#DAD0D0] rounded-lg overflow-hidden existing-file"
                                            style="background: url('/donor-files/{{ $donor->nrc_back }}') center/cover no-repeat;">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <!-- New NRC Photos Upload (side by side) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-[#690D0B]" for="nrc-front">
                                    @if (isset($donor->nrc_front))
                                        New NRC Front
                                    @else
                                        NRC Front
                                    @endif
                                </label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="nrc-front"
                                        class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-[#DAD0D0] rounded-xl cursor-pointer bg-[#F3F0F0] hover:border-[#E91815] transition-all duration-300 overflow-hidden">
                                        <div id="nrc-front-preview" class="preview-container hidden"></div>
                                        <div id="nrc-front-placeholder"
                                            class="flex flex-col items-center justify-center pt-8 pb-6 px-4 text-center w-full h-full">
                                            <i class="fas fa-camera text-3xl text-[#690D0B] mb-3"></i>
                                            <p class="mb-1 text-sm font-medium text-[#690D0B]/70">
                                                @if (isset($donor->nrc_front))
                                                    Upload new front
                                                @else
                                                    Upload front
                                                @endif
                                            </p>
                                            <p class="text-xs text-[#690D0B]/70">JPG or PNG (MAX. 2MB)</p>
                                        </div>
                                        <input id="nrc-front" type="file" name="nrc_front" class="hidden" />
                                    </label>
                                </div>
                                @error('nrc_front')
                                    <p class="text-[#E91815] text-sm">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-[#690D0B]" for="nrc-back">
                                    @if (isset($donor->nrc_back))
                                        New NRC Back
                                    @else
                                        NRC Back
                                    @endif
                                </label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="nrc-back"
                                        class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-[#DAD0D0] rounded-xl cursor-pointer bg-[#F3F0F0] hover:border-[#E91815] transition-all duration-300 overflow-hidden">
                                        <div id="nrc-back-preview" class="preview-container hidden"></div>
                                        <div id="nrc-back-placeholder"
                                            class="flex flex-col items-center justify-center pt-8 pb-6 px-4 text-center w-full h-full">
                                            <i class="fas fa-camera text-3xl text-[#690D0B] mb-3"></i>
                                            <p class="mb-1 text-sm font-medium text-[#690D0B]/70">
                                                @if (isset($donor->nrc_back))
                                                    Upload new back
                                                @else
                                                    Upload back
                                                @endif
                                            </p>
                                            <p class="text-xs text-[#690D0B]/70">JPG or PNG (MAX. 2MB)</p>
                                        </div>

                                    </label>
                                </div>
                                <input id="nrc-back" type="file" name="nrc_back" class="hidden" />
                                @error('nrc_back')
                                    <p class="text-[#E91815] text-sm">{{ $message }}</p>
                                @enderror
                                @if ($errorMsg['nrc'] ?? null)
                                    <p class="text-[#E91815] text-sm">{{ $errorMsg['nrc'] }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Health Certificate Section -->
                <div class="space-y-6">
                    <h2 class="text-xl font-medium text-[#180705] border-b border-[#DAD0D0] pb-2">
                        <i class="fas fa-file-medical mr-2 text-[#E91815]"></i>Health Information
                    </h2>

                    <div class="space-y-4">
                        @if (isset($donor->health_certificate))
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-[#690D0B]">Health Certificate</label>
                                <div class="h-40 border border-[#DAD0D0] rounded-lg overflow-hidden existing-file"
                                    style="background: url('/donor-files/{{ $donor->health_certificate }}') center/cover no-repeat;">
                                </div>
                            </div>
                        @endif

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-[#690D0B]" for="health-certificate">
                                @if (isset($donor->health_certificate))
                                    New Health Certificate
                                @else
                                    Health Certificate
                                @endif
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label for="health-certificate"
                                    class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-[#DAD0D0] rounded-xl cursor-pointer bg-[#F3F0F0] hover:border-[#E91815] transition-all duration-300 overflow-hidden">
                                    <div id="health-cert-preview" class="preview-container hidden"></div>
                                    <div id="health-cert-placeholder"
                                        class="flex flex-col items-center justify-center pt-8 pb-6 px-4 text-center w-full h-full">
                                        <i class="fas fa-file-medical text-3xl text-[#690D0B] mb-3"></i>
                                        <p class="mb-1 text-sm font-medium text-[#690D0B]/70">
                                            @if (isset($donor->health_certificate))
                                                Upload new certificate
                                            @else
                                                Upload certificate
                                            @endif
                                        </p>
                                        <p class="text-xs text-[#690D0B]/70">PDF, JPG or PNG (MAX. 2MB)</p>
                                    </div>
                                    <input id="health-certificate" name="health_certificate" type="file"
                                        class="hidden" />

                                </label>
                            </div>
                            @error('health_certificate')
                                <p class="text-[#E91815] text-sm">{{ $message }}</p>
                            @enderror
                            @if ($errorMsg['health_certificate'] ?? null)
                                <p class="text-[#E91815] text-sm">{{ $errorMsg['health_certificate'] }}</p>
                            @endif
                        </div>
                        <p class="text-xs text-[#690D0B]/70 mt-2">Upload your official health certificate issued within
                            the last 6 months</p>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-[#690D0B] to-[#E91815] hover:from-[#E91815] hover:to-[#690D0B] text-white font-medium py-4 px-6 rounded-lg transition-all duration-300 transform hover:scale-[1.02] shadow-md hover:shadow-[#E91815]/30">
                    <i class="fas fa-heartbeat mr-2"></i>
                    @if (isset($donor))
                        Resubmit Donor Information
                    @else
                        Complete Registration
                    @endif
                </button>
            </form>
        </div>
    </div>
    
</body>

</html>