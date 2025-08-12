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
            <form class="p-8 space-y-8">
                <!-- Profile Picture Section -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center space-x-6">
                        @if (isset($donor['profile_img']))
                            <div class="relative">
                                <div class="profile-preview"
                                    style="background-image: url('{{ $donor['profile_img'] }}')"></div>
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
                    @if (isset($donor['profile_img']))
                        <p class="text-sm text-primary mt-4">Left: Existing profile | Right: New upload</p>
                    @endif
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
                                <input id="name" type="text" name="fullname"  placeholder="John Doe"
                                    class="w-full pl-10 pr-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background">
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="ph_number">
                                Phone Number
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-secondary">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input id="ph_number" type="tel" name="ph_number" placeholder="09XXXXXXXX"
                                    class="w-full pl-10 pr-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background">
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
                                    class="w-full pl-10 pr-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background appearance-none">
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
                                        class="h-4 w-4 text-accent focus:ring-accent" checked>
                                    <span class="ml-2 text-primary">Male</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="gender" value="Female"
                                        class="h-4 w-4 text-accent focus:ring-accent">
                                    <span class="ml-2 text-primary">Female</span>
                                </label>

                            </div>
                        </div>

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
                                    <option value="" disabled selected>Select your blood type</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
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
                                    class="w-full pl-10 pr-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background"></textarea>
                            </div>
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
                            <select id="nrc-state" name="nrc_state"
                                class="w-full px-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background">
                                <option value="" disabled selected>Select</option>
                                @for ($i = 1; $i <= 14; $i++)
                                    @php $val = $i < 10 ? '0' . $i : (string) $i; @endphp
                                    <option value="{{ $val }}"
                                        {{ old('nrc-state') == $val ? 'selected' : '' }}>
                                        {{ $val }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <!-- Township -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="nrc-township">
                                Township
                            </label>
                            <select id="nrc-township" name="nrc_township"
                                class="w-full px-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background">
                                <option value="" disabled selected>Select</option>
                                <option value="ABC">ABC</option>
                                <option value="DEF">DEF</option>
                                <option value="GHI">GHI</option>
                                <option value="JKL">JKL</option>
                                <option value="MNO">MNO</option>
                                <option value="PQR">PQR</option>
                                <option value="STU">STU</option>
                                <option value="VWX">VWX</option>
                                <option value="YZ">YZ</option>
                            </select>
                        </div>

                        <!-- NRC Type -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="nrc-type">
                                Type
                            </label>
                            <select id="nrc-type" name="nrc_type"
                                class="w-full px-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background">
                                <option value="" disabled selected>Select</option>
                                <option value="N">N</option>
                                <option value="P">P</option>
                                <option value="E">E</option>
                                <option value="A">A</option>
                                <option value="F">F</option>
                            </select>
                        </div>

                        <!-- NRC Number -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="nrc-number">
                                Number
                            </label>
                            <input id="nrc-number" name="nrc-number" type="text" placeholder="123456"
                                class="w-full px-3 py-3 border border-secondary-light rounded-lg input-focus focus:ring-2 focus:ring-accent focus:border-accent outline-none bg-background">
                        </div>
                    </div>

                    <!-- NRC Photos -->
                    <div class="space-y-6">
                        <!-- Existing NRC Photos (side by side) -->
                        @if (isset($donor['nrc_front']) || isset($donor['nrc_back']))
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if (isset($donor['nrc_front']))
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-primary">NRC Front</label>
                                        <div class="h-40 border border-secondary-light rounded-lg overflow-hidden existing-file"
                                            style="background: url('{{ $donor['nrc_front'] }}') center/cover no-repeat;">
                                        </div>
                                    </div>
                                @endif
                                @if (isset($donor['nrc_back']))
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-primary">NRC Back</label>
                                        <div class="h-40 border border-secondary-light rounded-lg overflow-hidden existing-file"
                                            style="background: url('{{ $donor['nrc_back'] }}') center/cover no-repeat;">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <!-- New NRC Photos Upload (side by side) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-primary" for="nrc-front">
                                    @if (isset($donor['nrc_front']))
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
                                                @if (isset($donor['nrc_front']))
                                                    Upload new front
                                                @else
                                                    Upload front
                                                @endif
                                            </p>
                                            <p class="text-xs text-secondary">JPG or PNG (MAX. 5MB)</p>
                                        </div>
                                        <input id="nrc-front" type="file" name="nrc_front" class="hidden"
                                            accept="image/png, image/jpeg" />
                                    </label>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-primary" for="nrc-back">
                                    @if (isset($donor['nrc_back']))
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
                                                @if (isset($donor['nrc_back']))
                                                    Upload new back
                                                @else
                                                    Upload back
                                                @endif
                                            </p>
                                            <p class="text-xs text-secondary">JPG or PNG (MAX. 5MB)</p>
                                        </div>
                                        <input id="nrc-back" type="file" name="nrc_back" class="hidden"
                                            accept="image/png, image/jpeg" />
                                    </label>
                                </div>
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
                        @if (isset($donor['health_certificate']))
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-primary">Health Certificate</label>
                                <div class="h-40 border border-secondary-light rounded-lg overflow-hidden existing-file"
                                    style="background: url('{{ $donor['health_certificate'] }}') center/cover no-repeat;">
                                </div>
                            </div>
                        @endif

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-primary" for="health-certificate">
                                @if (isset($donor['health_certificate']))
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
                                            @if (isset($donor['health_certificate']))
                                                Upload new certificate
                                            @else
                                                Upload certificate
                                            @endif
                                        </p>
                                        <p class="text-xs text-secondary">PDF, JPG or PNG (MAX. 10MB)</p>
                                    </div>
                                    <input id="health-certificate" name="health_certificate" type="file" class="hidden"
                                        accept=".pdf, image/png, image/jpeg" />
                                </label>
                            </div>
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
        // Profile picture preview functionality
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
