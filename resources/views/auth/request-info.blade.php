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
        }

        .form-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .input-focus {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2);
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
            background: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            padding: 2px 0;
            font-size: 0.75rem;
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }
    </style>
</head>

<body class="bg-background min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-xl form-shadow overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-primary-dark to-primary p-8 text-white">
                <div class="flex items-center justify-center space-x-4">
                    <div class="bg-accent p-3 rounded-full">
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
                        <p class="text-primary-light mt-1">Your generosity saves lives</p>
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
                                    class="absolute bottom-0 right-0 bg-primary text-white text-xs px-2 py-1 rounded-full">
                                    Existing</div>
                            </div>
                        @endif
                        <div class="relative">
                            <div id="profile-preview"
                                class="profile-preview bg-secondary-light flex items-center justify-center">
                                <i class="fas fa-user text-4xl text-white"></i>
                            </div>
                            <label for="profile_img"
                                class="absolute bottom-0 right-0 bg-accent text-white p-2 rounded-full cursor-pointer hover:bg-accent-dark transition">
                                <i class="fas fa-camera"></i>
                                <input id="profile_img" type="file" name="profile_img" class="hidden"
                                    accept="image/png, image/jpeg" />
                            </label>
                        </div>
                    </div>
                    @if (isset($donor->profile_img))
                        <p class="text-sm text-primary mt-4">Left: Existing profile | Right: New upload</p>
                    @endif
                    @error('profile_img')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                </div>

                <!-- Personal Information Section -->
                <div class="space-y-6">
                    <h2 class="text-xl font-medium text-primary-dark border-b border-secondary-light pb-2">
                        <i class="fas fa-user-circle mr-2 text-accent"></i>Personal Information
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name Input -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="name">
                                Full Name
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-secondary">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input id="name" type="text" name="fullname"
                                    class="w-full pl-10 pr-3 py-3 border border-secondary-light rounded-lg outline-none bg-background "
                                    value="{{ auth()->user()->name }}" disabled>
                            </div>
                        </div>
                        @error('fullname')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror

                        <!-- Phone Number -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="phone">
                                Phone Number
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-secondary">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input id="phone" type="tel" name="phone" placeholder="09XXXXXXXX"
                                    class="w-full pl-10 pr-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background"
                                    value="{{ $donor ? $donor->phone : old('phone') }}">
                                @error('phone')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <!-- Date of Birth -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="dob">
                                Date of Birth
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-secondary">
                                    <i class="fas fa-calendar-alt"></i>
                                </span>
                                <input id="dob" type="date" name="dob"
                                    class="w-full pl-10 pr-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background appearance-none"
                                    value="{{ $donor ? $donor->dob : old('dob') }}">


                                @error('dob')
                                    <p class="text-red-500 text-sm">Must be over 18</p>
                                @enderror
                            </div>
                        </div>


                        <!-- Gender -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary">
                                Gender
                            </label>
                            <div class="flex space-x-6 pt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Male"
                                        class="h-4 w-4 text-accent focus:ring-accent"
<<<<<<< HEAD
                                        {{ optional($donor)->gender === 'Male' ? 'checked' : '' }}>
=======
                                        {{ old('gender', optional($donor)->gender) === 'Male' ? 'checked' : '' }}>
>>>>>>> 707570c022e7380119d6de39260c017badf31646
                                    <span class="ml-2 text-primary">Male</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Female"
                                        class="h-4 w-4 text-accent focus:ring-accent"
<<<<<<< HEAD
                                        {{ optional($donor)->gender === 'Female' ? 'checked' : '' }}>
=======
                                        {{ old('gender', optional($donor)->gender) === 'Female' ? 'checked' : '' }}>
>>>>>>> 707570c022e7380119d6de39260c017badf31646
                                    <span class="ml-2 text-primary">Female</span>
                                </label>
                            </div>
                            @error('gender')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

<<<<<<< HEAD
                        @error('gender')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
=======

>>>>>>> 707570c022e7380119d6de39260c017badf31646

                        <!-- Blood Type -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="blood_type">
                                Blood Type
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-accent">
                                    <i class="fas fa-tint"></i>
                                </span>
                                <select id="blood_type" name="blood_type"
                                    class="w-full pl-10 pr-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background appearance-none">

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
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>


                        <!-- Address -->
                        <div class="md:col-span-2 space-y-2">
                            <label class="block text-sm font-medium text-primary" for="address">
                                Address
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-secondary pt-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <textarea id="address" rows="3" name ="address" placeholder="Your full address"
                                    class="w-full pl-10 pr-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background">{{ $donor ? $donor->address : old('address') }}</textarea>
                            </div>
                            @error('address')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
                <!-- NRC Information Section -->
                <div class="space-y-6">
                    <h2 class="text-xl font-medium text-primary-dark border-b border-secondary-light pb-2">
                        <i class="fas fa-id-card mr-2 text-accent"></i>NRC Information
                    </h2>

                    <!-- NRC Number with Select Boxes -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- State/Region -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="nrc-state">
                                State/Region
                            </label>
                            <select id="nrc-state" name="nrc-state"
                                class="w-full px-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background">
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
<<<<<<< HEAD

=======
                            @error('nrc-state')
                                <p class="text-red-500 text-[10px]">{{ $message }}</p>
                            @enderror
>>>>>>> 707570c022e7380119d6de39260c017badf31646
                        </div>
                        

                        <!-- Township -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="nrc-township">
                                Township
                            </label>
                            <select id="nrc-township" name="nrc-township"
                                class="w-full px-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background">
                                <option value="" disabled>Select</option>
                            </select>
                            @error('nrc-township')
                                <p class="text-red-500 text-[10px]">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NRC Type -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="nrc-type">
                                Type
                            </label>
                            <select id="nrc-type" name="nrc-type"
                                class="w-full px-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background">
<<<<<<< HEAD
                                <option value="" disabled {{ empty($nrc_type) ? 'selected' : '' }}>Select
                                </option>
                                <option value="N" {{ $nrc_type === 'N' ? 'selected' : '' }}>N</option>
                                <option value="P" {{ $nrc_type === 'P' ? 'selected' : '' }}>P</option>
                                <option value="E" {{ $nrc_type === 'E' ? 'selected' : '' }}>E</option>
                                <option value="A" {{ $nrc_type === 'A' ? 'selected' : '' }}>A</option>
                                <option value="F" {{ $nrc_type === 'F' ? 'selected' : '' }}>F</option>
                            </select>
=======
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
                                <p class="text-red-500 text-[10px]">{{ $message }}</p>
                            @enderror
>>>>>>> 707570c022e7380119d6de39260c017badf31646

                        </div>

                        <!-- NRC Number -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="nrc-number">
                                Number
                            </label>
                            <input id="nrc-number" name="nrc-number" type="text" placeholder="123456"
                                class="w-full px-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background"
                                value="{{ old('nrc-number', $nrc_number ?? '') }}">
<<<<<<< HEAD

=======
                            @error('nrc-number')
                                <p class="text-red-500 text-[10px]">{{ $message }}</p>
                            @enderror
>>>>>>> 707570c022e7380119d6de39260c017badf31646
                        </div>
                    </div>

                    <!-- NRC Photos -->
                    <div class="space-y-6">
                        <!-- Existing NRC Photos (side by side) -->
                        @if (isset($donor->nrc_front) || isset($donor->nrc_back))
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if (isset($donor->nrc_front))
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-primary">NRC Front</label>
                                        <div class="h-40 border border-secondary-light rounded-lg overflow-hidden existing-file"
                                            style="background: url('/donor-files/{{ $donor->nrc_front }}') center/cover no-repeat;">
                                        </div>
                                    </div>
                                @endif
                                @if (isset($donor->nrc_back))
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-primary">NRC Back</label>
                                        <div class="h-40 border border-secondary-light rounded-lg overflow-hidden existing-file"
                                            style="background: url('/donor-files/{{ $donor->nrc_back }}') center/cover no-repeat;">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <!-- New NRC Photos Upload (side by side) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-primary" for="nrc-front">
                                    @if (isset($donor->nrc_front))
                                        New NRC Front
                                    @else
                                        NRC Front
                                    @endif
                                </label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="nrc-front"
                                        class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-secondary-light rounded-xl cursor-pointer bg-background hover:border-accent transition-all duration-300 overflow-hidden">
                                        <div id="nrc-front-preview" class="preview-container hidden"></div>
                                        <div id="nrc-front-placeholder"
                                            class="flex flex-col items-center justify-center pt-8 pb-6 px-4 text-center w-full h-full">
                                            <i class="fas fa-camera text-3xl text-secondary mb-3"></i>
                                            <p class="mb-1 text-sm font-medium text-primary">
                                                @if (isset($donor->nrc_front))
                                                    Upload new front
                                                @else
                                                    Upload front
                                                @endif
                                            </p>
                                            <p class="text-xs text-secondary">JPG or PNG (MAX. 5MB)</p>
                                        </div>
                                        <input id="nrc-front" type="file" name="nrc_front" class="hidden" />
                                    </label>
                                </div>
                                @error('nrc_front')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-primary" for="nrc-back">
                                    @if (isset($donor->nrc_back))
                                        New NRC Back
                                    @else
                                        NRC Back
                                    @endif
                                </label>
                                <div class="flex items-center justify-center w-full">
                                    <label for="nrc-back"
                                        class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-secondary-light rounded-xl cursor-pointer bg-background hover:border-accent transition-all duration-300 overflow-hidden">
                                        <div id="nrc-back-preview" class="preview-container hidden"></div>
                                        <div id="nrc-back-placeholder"
                                            class="flex flex-col items-center justify-center pt-8 pb-6 px-4 text-center w-full h-full">
                                            <i class="fas fa-camera text-3xl text-secondary mb-3"></i>
                                            <p class="mb-1 text-sm font-medium text-primary">
                                                @if (isset($donor->nrc_back))
                                                    Upload new back
                                                @else
                                                    Upload back
                                                @endif
                                            </p>
                                            <p class="text-xs text-secondary">JPG or PNG (MAX. 5MB)</p>
                                        </div>

                                    </label>
                                </div>
                                <input id="nrc-back" type="file" name="nrc_back" class="hidden" />
                                @error('nrc_back')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Health Certificate Section -->
                <div class="space-y-6">
                    <h2 class="text-xl font-medium text-primary-dark border-b border-secondary-light pb-2">
                        <i class="fas fa-file-medical mr-2 text-accent"></i>Health Information
                    </h2>

                    <div class="space-y-4">
                        @if (isset($donor->health_certificate))
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-primary">Health Certificate</label>
                                <div class="h-40 border border-secondary-light rounded-lg overflow-hidden existing-file"
                                    style="background: url('/donor-files/{{ $donor->health_certificate }}') center/cover no-repeat;">
                                </div>
                            </div>
                        @endif

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="health-certificate">
                                @if (isset($donor->health_certificate))
                                    New Health Certificate
                                @else
                                    Health Certificate
                                @endif
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label for="health-certificate"
                                    class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-secondary-light rounded-xl cursor-pointer bg-background hover:border-accent transition-all duration-300 overflow-hidden">
                                    <div id="health-cert-preview" class="preview-container hidden"></div>
                                    <div id="health-cert-placeholder"
                                        class="flex flex-col items-center justify-center pt-8 pb-6 px-4 text-center w-full h-full">
                                        <i class="fas fa-file-medical text-3xl text-secondary mb-3"></i>
                                        <p class="mb-1 text-sm font-medium text-primary">
                                            @if (isset($donor->health_certificate))
                                                Upload new certificate
                                            @else
                                                Upload certificate
                                            @endif
                                        </p>
                                        <p class="text-xs text-secondary">PDF, JPG or PNG (MAX. 10MB)</p>
                                    </div>
                                    <input id="health-certificate" name="health_certificate" type="file"
                                        class="hidden" />

                                </label>
                            </div>
                            @error('health_certificate')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <p class="text-xs text-secondary mt-2">Upload your official health certificate issued within
                            the last 6 months</p>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-accent-dark to-accent hover:from-accent hover:to-accent-dark text-white font-medium py-4 px-6 rounded-lg transition-all duration-300 transform hover:scale-[1.02] shadow-md">
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
    <script>
        const stateToTownships = {
            "01": [
                "BaMaNa", // Bhamo
                "KhaHpaNa", // Chipwi
                "DaHpaYa", // Dawthponeyan
                "HaPaNa", // Hopin
                "HpaKaNa", // Hpakant
                "AhGaYa", // Injangyang
                "KaMaTa", // Kamaing
                "KaPaTa", // Kan Paik Ti
                "KhaLaHpa", // Khaunglanhpu
                "LaGaNa", // Lwegel
                "MaKhaBa", // Machanbaw
                "MaSaNa", // Mansi
                "MaKaTa", // Mogaung
                "MaNyaNa", // Mohnyin
                "MaMaNa", // Momauk
                "MaKaNa", // Myitkyina
                "MaLaNa", // Myo Hla
                "NaMaNa", // Nawngmun
                "PaWaNa", // Pang War
                "PaNaDa", // Pannandin
                "PaTaAh", // Puta-O
                "SaDaNa", // Sadung
                "YaBaYa", // Shin Bway Yang
                "YaKaNa", // Shwegu
                "SaBaNa", // Sinbo
                "SaPaYa", // Sumprabum
                "TaNaNa", // Tanai
                "TaSaLa", // Tsawlaw
                "WaMaNa" // Waingmaw
            ],
            "02": [
                "BaLaKha", // Bawlakhe
                "DaMaSa", // Demoso
                "HpaSaNa", // Hpasawng
                "HpaYaSa", // Hpruso
                "LaKaNa", // Loikaw
                "MaSaNa", // Mese
                "YaTaNa", // Shadaw
                "YaThaNa" // Ywarthit
            ],
            "03": [
                "BaGaLa", // Baw Ga Li
                "LaBaNa", // Hlaingbwe
                "BaAhNa", // Hpa-An
                "HpaPaNa", // Hpapun
                "BaThaSa", // Hpayarthonesu
                "KaMaMa", // Kamarmaung
                "KaKaYa", // Kawkareik
                "KaDaNa", // Kyaikdon
                "KaSaKa", // Kyainseikgyi
                "KaDaTa", // Kyondoe
                "LaThaNa", // Leik Tho
                "MaWaTa", // Myawaddy
                "PaKaNa", // Paingkyon
                "YaYaTha", // Shan Ywar Thit
                "SaKaLa", // Su Ka Li
                "ThaTaNa", // Thandaung
                "ThaTaKa", // Thandaunggyi
                "WaLaMa" // Lay Myaing (Waw Lay)
            ],
            "04": [
                "KaKhaNa", // Cikha
                "HpaLaNa", // Falam
                "HaKhaNa", // Hakha
                "KaPaLa", // Kanpetlet
                "MaTaPa", // Matupi
                "MaTaNa", // Mindat
                "PaLaWa", // Paletwa
                "YaZaNa", // Rezua
                "YaKhaDa", // Rihkhawdar
                "SaMaNa", // Samee
                "TaTaNa", // Tedim
                "HtaTaLa", // Thantlang
                "TaZaNa" // Tonzang
            ],
            "05": [
                "AhYaTa", // Ayadaw
                "BaMaNa", // Banmauk
                "BaTaLa", // Budalin
                "KhaOuTa", // Chaung-U
                "KhaTaNa", // Hkamti
                "HaMaLa", // Homalin
                "AhTaNa", // Indaw
                "KaLaHta", // Kale
                "KaLaWa", // Kalewa
                "KaBaLa", // Kanbalu
                "KaNaNa", // Kani
                "KaThaNa", // Katha
                "KaLaTa", // Kawlin
                "KhaOuNa", // Khin-U
                "KaLaNa", // Kyunhla
                "LaHaNa", // Lahe
                "LaYaNa", // Layshi
                "MaLaNa", // Mawlaik
                "MaKaNa", // Mingin
                "MaYaNa", // Monywa
                "MaMaNa", // Myaung
                "MaMaTa", // Myinmu
                "NaYaNa", // Nanyun
                "NgaZaNa", // Ngazun
                "PaLaNa", // Pale
                "HpaPaNa", // Paungbyin
                "PaLaBa", // Pinlebu
                "SaKaNa", // Sagaing
                "SaLaKa", // Salingyi
                "YaBaNa", // Shwebo
                "DaPaYa", // Tabayin
                "TaMaNa", // Tamu
                "TaSaNa", // Taze
                "HtaKhaNa", // Tigyaing
                "WaLaNa", // Wetleet
                "WaThaNa", // Wuntho
                "YaOuNa", // Ye-U
                "YaMaPa", // Yinmabin
                "KaMaNa", // Kyaukmyaung
                "KhaPaNa" // Khampat
            ],
            "06": [
                "BaPaNa", // Bokpyin
                "HtaWaNa", // Dawei
                "KaLaAh", // Kaleinaung
                "KaThaNa", // Kawthoung
                "KaSaNa", // Kyunsu
                "LaLaNa", // Launglon
                "MaMaNa", // Myeik
                "PaLaNa", // Palaw
                "TaThaYa", // Tanintharyi
                "ThaYaKha", // Thayetchaung
                "YaHpaNa", // Yepyu
                "KhaMaNa", // Khamaukgyi
                "MaTaNa", // Myittar
                "PaLaTa", // Palauk
                "KaYaYa" // Karathuri
            ],
            "07": [
                "DaOuNa", // Daik-U
                "KaPaKa", // Gyobingauk
                "KaWaNa", // Kawa
                "KaKaNa", // Kyaukkyi
                "KaTaKha", // Kyauktaga
                "LaPaTa", // Letpadan
                "MaLaNa", // Minhla
                "MaNyaNa", // Monyo
                "NaTaLa", // Nattalin
                "NyaLaPa", // Nyaunglebin
                "AhHpaNa", // Okpho
                "AhTaNa", // Oktwin
                "PaTaNa", // Padaung
                "PaKhaTa", // Pauk Kaung
                "PaKhaNa", // Bago
                "PaTaTa", // Paungde
                "PaNaKa", // Penwegone
                "HpaMaNa", // Phyu
                "PaMaNa", // Pyay
                "YaTaNa", // Shwedaung
                "YaKaNa", // Shwegyin
                "HtaTaPa", // Tantabin
                "TaNgaNa", // Taungoo
                "ThaNaPa", // Thanatpin
                "ThaWaTa", // Thayarwady
                "ThaKaNa", // Thegon
                "ThaSaNa", // Thonze
                "WaMaNa", // Waw
                "YaTaYa", // Yedashe
                "ZaKaNa", // Zigon
                "PaTaSa" // Pyontahsar
            ],
            "08": [
                "AhLaNa", // Aunglan
                "KhaMaNa", // Chauk
                "GaGaNa", // Gangaw
                "KaMaNa", // Kamma
                "MaKaNa", // Magwe
                "MaBaNa", // Minbu (Sagu)
                "MaTaNa", // Mindon
                "MaLaNa", // Minhla
                "MaMaNa", // Myaing
                "MaHtaNa", // Myayhtae
                "MaThaNa", // Myothit
                "NaMaNa", // Natmauk
                "NgaHpaNa", // Ngape
                "PaKhaKa", // Pakokku
                "PaMaNa", // Pauk
                "PaHpaNa", // Pwintbyu
                "SaLaNa", // Salin
                "SaMaNa", // Saw
                "SaHpaNa", // Seikphyu
                "SaTaYa", // Sidoktaya
                "SaPaWa", // Sinbaungwe
                "TaTaKa", // Taungdwingyi
                "ThaYaNa", // Thayet
                "HtaLaNa", // Tilin
                "YaNaKha", // Yenangyaung
                "YaSaKa", // Yesagyo
                "KaHtaNa" // Kyaukhtu
            ],
            "09": [
                "AhMaYa", // Amarapura
                "AhMaZa", // Aungmyaythazan
                "KhaAhZa", // Chanayethazan
                "KhaMaSa", // Chanmyathazi
                "KaPaTa", // Kyukpadaung
                "KaSaNa", // Kyaukse
                "MaTaYa", // Madaya
                "MaHaMa", // Mahaaungmyay
                "MaLaNa", // Mahlaing
                "MaHtaLa", // Meiktila
                "MaKaNa", // Mogoke
                "MaKhaNa", // Myingyan
                "MaThaNa", // Myittha
                "NaHtaKa", // Natogyi
                "NgaThaYa", // Ngathayouk
                "NgaZaNa", // Ngazun
                "NyaOuNa", // Nyaung-U
                "PaThaKa", // Patheingyi
                "PaBaNa", // Pyawbwe
                "PaKaKha", // Pyigyitagon
                "PaOuLa", // Pyinoolwin
                "SaKaNa", // Singu
                "SaKaTa", // Sintgaing
                "ThaPaKa", // Tabeikkyin
                "TaTaOu", // Tada-U
                "TaThaNa", // Taungtha
                "ThaSaNa", // Thazi
                "WaTaNa", // Wundwin
                "YaMaTha", // Yemathin
                "TaKaTa", // Tagaung
                "MaMaNa", // Maymyo
                "DaKhaTha", // Dekhinathiri
                "LaWaNa", // Lewe
                "OuTaTha", // Ottarathiri
                "PaBaTha", // Popathiri
                "PaMaNa", // Pyinmana
                "TaKaNa", // Tatkon
                "ZaBaTha", // Zabuthiri
                "ZaYaTha" // Zayarthiri
            ],
            "10": [
                "BaLaNa", // Billin
                "KhaSaNa", // Chaungzon
                "KhaZaNa", // Khawzar
                "KaMaYa", // Kyaikmaraw
                "KaHtaNa", // Kyaikto
                "LaMaNa", // Lamine
                "MaLaMa", // Mawlamyine
                "MaDaNa", // Mudon
                "PaMaNa", // Paung
                "ThaHpaYa", // Thanbyuzayat
                "ThaHtaNa", // Thaton
                "YaMaNa" // Ye
            ],
            "11": [
                "AhMaNa", // Ann
                "BaThaTa", // Buthidaung
                "GaMaNa", // Gwa
                "KaHpaNa", // Kyaukpyu
                "KaTaNa", // Kyauktaw
                "MaAhTa", // Maei
                "MaTaNa", // Maungdaw
                "MaPaNa", // Minbya
                "MaAhNa", // Munaung
                "MaOuNa", // Myauk-U
                "MaPaTa", // Myebon
                "PaTaNa", // Pauktaw
                "PaNaTa", // Ponnagyun
                "YaBaNa", // Ramree
                "YaThaTa", // Rathedaung
                "SaTaNa", // Sittwe
                "ThaTaNa", // Thandwe
                "TaKaNa", // Toungup
                "KaTaLa", // Kyeintali
                "TaPaWa" // Taungpyolatwae
            ],
            "12": [
                "AhLaNa", // Ahlone
                "BaHaNa", // Bahan
                "BaTaHta", // Botahtaung
                "KaKaKa", // Cocokyun
                "DaGaYa", // Dagon East
                "DaGaMa", // Dagon North
                "DaGaSa", // Dagon Seikkan
                "DaGaTa", // Dagon South
                "DaGaNa", // Dagon
                "DaLaNa", // Dala
                "DaPaNa", // Dawbon
                "LaThaYa", // Hlaingtharya
                "LaMaNa", // Hlaing
                "LaKaNa", // Hlegu
                "MaBaNa", // Hmawbi
                "HtaTaPa", // Htantabin
                "AhSaNa", // Insein
                "KaMaYa", // Kamayut
                "KaMaNa", // Kawhmu
                "KhaYaNa", // Kayan
                "KaKhaKa", // Kungyangon
                "KaTaTa", // KyauktaDa
                "KaTaNa", // Kyauktan
                "KaMaTa", // Kyimyindaing
                "LaMaTa", // Lanmadaw
                "LaThaNa", // Latha
                "MaYaKa", // Mayangone
                "MaGaDa", // Mingaladon
                "MaGaTa", // Mingalartaungnyunt
                "OuKaMa", // North Okkalapa
                "PaBaTa", // Pabedan
                "PaZaTa", // Pazundaung
                "SaKhaNa", // Sanchaung
                "SaKaKha", // Seikgyikanaungto
                "SaKaNa", // Seikkan
                "YaPaTha", // Shwepyithar
                "OuKaTa", // South Okkalapa
                "TaTaHta", // Tada
                "TaKaNa", // Taikkyi
                "TaMaNa", // Tamwe
                "ThaKaTa", // Thaketa
                "ThaLaNa", // Thanlyin
                "ThaGaKa", // Thingangkuun
                "ThaKhaNa", // Thongwa
                "TaTaNa", // Twantay
                "YaKaNa", // Yankin
                "OuKaNa" // Oakkan
            ],
            "13": [
                "AhMaNa", // Aikmu
                "AhLaNa", // Aungban
                "AhYaTa", // Ayethaya
                "BaHpaNa", // Bawlake
                "BaMaNa", // Bhamo (likely duplication, sometimes appears in border zones)
                "BaNaNa", // Banhin
                "BaThaNa", // Bawsaing
                "DaNaNa", // Danu Self-Administered Zone
                "HaMaNa", // Hopang
                "HaPaNa", // Hsihseng
                "HaTaNa", // Hseni
                "KaHaNa", // Kehsi
                "KaLaNa", // Kalaw
                "KaPaNa", // Kengtung
                "KaTaNa", // Kunhing
                "KaTaKa", // Kyaukme
                "KhaSaNa", // Khaunglanhpu (border overlap noted in some documents)
                "LaKaNa", // Langkho
                "LaYaNa", // Laukkaing
                "LaBaNa", // Lawksawk
                "MaAuNa", // Maingkaing
                "MaHpaNa", // Maingpyin
                "MaTaNa", // Matman
                "MaHtaNa", // Monghsat
                "MaYaNa", // Mongyai
                "MaKaNa", // Mongkhet
                "MaSaNa", // Mawkmai
                "MaLaNa", // Muse
                "MaNaNa", // Namhsan
                "MaTaPa", // Namkham
                "NaKaNa", // Namsang
                "NaTaNa", // Namtit
                "PaHpaNa", // Panglong
                "PaLaNa", // Pangsang
                "PaPaNa", // Pindaya
                "PaTaNa", // Pinlaung
                "SaKaNa", // Sakangyi
                "SaLaNa", // Salween
                "SaMaNa", // Shan Ywar Thit (may appear again as shared zone)
                "TaTaNa", // Taunggyi
                "TaKaNa", // Tachileik
                "TaLaNa", // Tangyan
                "ThaPaNa", // Thibaw
                "ThaTaNa", // Theinni
                "WaLaNa", // Wanmaw
                "YaKaNa", // Yaksawk
                "YaTaNa", // Ywangan
                "ZaYaNa" // Zayatkyi
            ],

            "14": [
                "DaBaYa", // Dedaye
                "AiMaNa", // Einme
                "HaKyaKa", // Haigyi Island
                "HtaTaNa", // Hinthada
                "AnGaPa", // Ingapu
                "KaKhaNa", // Kangyidaunt
                "KyaLaNa", // Kyaiklat
                "KyaNaNa", // Kyangin
                "KaKaNa", // Kyaunggon
                "KaPaNa", // Kyonpyaw
                "LaBaTa", // Labutta
                "LaMaNa", // Lemeyethna
                "MaAuNa", // Maubin
                "MaMaKa", // Mawlamyinegyun
                "MaAhNa", // Myanaung
                "MaMaNa", // Myaungmya
                "NgaPaTa", // Ngapudaw
                "NgaThaKa", // Ngathaingchaung
                "NyaBaNa", // Ngayokekaung
                "NgaSaNa", // Ngewsaung
                "NgaThaNa", // Ngwesaung
                "NyaTaNa", // Nyaungdon
                "PaTaNa", // Pantanaw
                "PaThaNa", // Pathein
                "PaPaNa", // Pyapon
                "PyiSaNa", // Pyinsalu
                "ThaYaNa", // Shwethaungyan
                "ThaBaNa", // Thabaung
                "WaKaNa", // Wakema
                "YaKaNa", // Yegyi
                "ZaLaNa" // Zalun
            ]
        };
        const existingTownship = "{{ old('nrc-township', $nrc_township ?? '') }}";

<<<<<<< HEAD
        const existingTownship = "{{ $nrc_township ?? '' }}";

=======
>>>>>>> 707570c022e7380119d6de39260c017badf31646
        function populateTownships(state) {
            const townshipSelect = document.getElementById("nrc-township");
            townshipSelect.innerHTML = '<option value="" disabled>Select township</option>';

            if (state && stateToTownships[state]) {
                stateToTownships[state].forEach(township => {
                    const option = document.createElement("option");
                    option.value = township;
                    option.textContent = township;
                    if (township === existingTownship) {
                        option.selected = true;
                    }
                    townshipSelect.appendChild(option);
                });
            }
        }

<<<<<<< HEAD
        // On state change
=======
>>>>>>> 707570c022e7380119d6de39260c017badf31646
        document.getElementById("nrc-state").addEventListener("change", function() {
            populateTownships(this.value);
        });

<<<<<<< HEAD
        // On page load, if state is pre-selected, populate townships and select the existing one
=======
>>>>>>> 707570c022e7380119d6de39260c017badf31646
        window.addEventListener('DOMContentLoaded', () => {
            const stateSelect = document.getElementById("nrc-state");
            if (stateSelect.value) {
                populateTownships(stateSelect.value);
            }
        });
<<<<<<< HEAD

=======
>>>>>>> 707570c022e7380119d6de39260c017badf31646
        // Function to handle file previews
        const profilePicInput = document.getElementById('profile_img');
        const profilePreview = document.getElementById('profile-preview');

        profilePicInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    profilePreview.style.backgroundImage = `url(${event.target.result})`;
                    profilePreview.innerHTML = '';
                }
                reader.readAsDataURL(file);
            }
        });

        // Function to handle file previews
        function setupFilePreview(inputId, previewId, placeholderId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const placeholder = document.getElementById(placeholderId);

            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Clear previous preview
                    preview.style.backgroundImage = 'none';
                    preview.innerHTML = '';

                    // Check if file is an image
                    if (file.type.match('image.*')) {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            preview.style.backgroundImage = `url(${event.target.result})`;
                            preview.classList.remove('hidden');
                            placeholder.classList.add('hidden');
                        }
                        reader.readAsDataURL(file);
                    } else if (file.type === 'application/pdf') {
                        // For PDF files, show a PDF icon
                        preview.innerHTML = `
                        <div class="flex flex-col items-center justify-center h-full">
                            <i class="fas fa-file-pdf text-5xl text-accent mb-2"></i>
                            <p class="text-sm font-medium text-primary">${file.name}</p>
                        </div>
                    `;
                        preview.classList.remove('hidden');
                        placeholder.classList.add('hidden');
                    } else {
                        // For other file types (shouldn't happen with accept attribute)
                        preview.innerHTML = `
                        <div class="flex flex-col items-center justify-center h-full">
                            <i class="fas fa-file text-5xl text-accent mb-2"></i>
                            <p class="text-sm font-medium text-primary">${file.name}</p>
                        </div>
                    `;
                        preview.classList.remove('hidden');
                        placeholder.classList.add('hidden');
                    }
                }
            });
        }

        // Set up previews for all file inputs
        setupFilePreview('nrc-front', 'nrc-front-preview', 'nrc-front-placeholder');
        setupFilePreview('nrc-back', 'nrc-back-preview', 'nrc-back-placeholder');
        setupFilePreview('health-certificate', 'health-cert-preview', 'health-cert-placeholder');
    </script>
</body>

</html>
