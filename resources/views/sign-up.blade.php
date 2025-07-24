<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign Up</title>
    <link rel="icon" type="image/png" href="/imgages/logo.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="m-0 text-gray-200 font-[Segoe_UI] min-h-screen flex overflow-hidden bg-cover bg-center"
    style="background-image: url('/images/bg-blood.jpg')">
    <!-- Left Pane -->
    <div
        class="w-[65%] h-screen flex items-center backdrop-blur-xl bg-white/10 border-r border-white/20 rounded-r-[60%] shadow-[inset_0_0_30px_rgba(255,255,255,0.1),0_8px_30px_rgba(0,0,0,0.4)]">
        <div class="ml-10 max-w-xl">
            <p class="text-white text-5xl font-medium leading-tight mb-4">Connect with donors and request blood with
                ease.</p>
            <p class="text-white text-2xl font-light">Every helping hand writes a new beginning.</p>
        </div>
    </div>

    <!-- Right Pane -->
    <div class="w-[35%] flex items-center justify-center p-6">
        <div
            class="bg-white/10 backdrop-blur-md rounded-2xl p-8 w-full max-w-md shadow-lg hover:bg-white/15 transition-colors">
            <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col">
                @csrf

                <!-- Username -->
                <label for="username" class="text-sm font-semibold mb-1 text-gray-300">Email</label>
                <input type="text" id="username" name="username" placeholder="Enter your email address" required
                    class="bg-white/90 text-black placeholder:text-gray-500 rounded-xl px-4 py-3 mb-6 outline-none focus:ring-2 focus:ring-red-400" />

                <!-- Password -->
                <label for="password" class="text-sm font-semibold mb-1 text-gray-300">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required
                    class="bg-white/90 text-black placeholder:text-gray-500 rounded-xl px-4 py-3 mb-6 outline-none focus:ring-2 focus:ring-red-400" />

                <!-- Blood Type -->
                <label for="blood_type" class="text-sm font-semibold mb-1 text-gray-300">Blood Type</label>
                <select name="blood_type" id="blood_type" required
                    class="bg-white/90 text-black rounded-xl px-4 py-3 mb-6 outline-none focus:ring-2 focus:ring-red-400">
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

                <!-- Role -->
                <label for="role" class="text-sm font-semibold mb-1 text-gray-300">Role</label>
                <select name="role" id="role" required
                    class="bg-white/90 text-black rounded-xl px-4 py-3 mb-4 outline-none focus:ring-2 focus:ring-red-400">
                    <option value="user">User</option>
                    <option value="donor">Donor</option>
                </select>

                <!-- Donor Fields -->
                <div class="donor-fields hidden mb-6" id="donorFields">
                    <label for="photo" class="text-sm font-semibold mb-2 text-gray-300">Upload Certificate</label>
                    <input type="file" id="photo" name="photo" accept="image/*"
                        class="bg-white/90 text-black rounded-xl px-4 py-2" />
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="bg-black text-red-500 font-bold text-lg py-3 rounded-xl hover:scale-95 transition-transform">
                    Submit
                </button>

                <!-- Already have account -->
                <p class="text-center text-sm mt-4 text-gray-400">Already have an account?
                    <a href="/" class="text-gray-400 hover:text-red-400 transition-colors underline">Log in</a>
                </p>
            </form>
        </div>
    </div>

    <!-- JS to show/hide donor fields -->
    <script>
        const roleSelect = document.getElementById('role');
        const donorFields = document.getElementById('donorFields');

        function toggleDonorFields() {
            donorFields.classList.toggle('hidden', roleSelect.value !== 'donor');
        }

        roleSelect.addEventListener('change', toggleDonorFields);
        window.addEventListener('DOMContentLoaded', toggleDonorFields);
    </script>
</body>

</html>
