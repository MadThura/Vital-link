<x-layout>
    <!-- Left Pane -->
    <div id="leftPane"
        class="w-[65%] h-screen flex items-center backdrop-blur-xl bg-white/10 border-r border-white/20 rounded-r-[60%] shadow-[inset_0_0_30px_rgba(255,255,255,0.1),0_8px_30px_rgba(0,0,0,0.4)] transform transition-all">
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
                <input type="text" id="username" name="username" placeholder="Enter your email address" required
                    class="bg-white/90 text-black placeholder:text-gray-500 rounded-xl px-4 py-3 mb-6 outline-none focus:ring-2 focus:ring-red-400" />

                <!-- Password -->
                <input type="password" id="password" name="password" placeholder="Enter your password" required
                    class="bg-white/90 text-black placeholder:text-gray-500 rounded-xl px-4 py-3 mb-6 outline-none focus:ring-2 focus:ring-red-400" />
                <!-- Address -->
                <textarea id="address" name="address" placeholder="Enter your address" required rows="2"
                    class="bg-white/90 text-black placeholder:text-gray-500 rounded-xl px-4 py-3 mb-6 outline-none focus:ring-2 focus:ring-red-400 resize-none"></textarea>
                <!-- Blood Type -->
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

                <!-- Donor Fields -->
                <div class="donor-fields hidden mb-6" id="donorFields">
                    <input type="file" id="photo" name="photo" accept="image/*"
                        class="bg-white/90 text-black rounded-xl px-4 py-3 w-full outline-none focus:ring-2 focus:ring-red-400" />
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="bg-black text-red-500 font-bold text-lg py-3 rounded-xl hover:scale-95 transition-transform">
                    Submit
                </button>

                <!-- Already have account -->
                <p class="text-center text-sm mt-4 text-gray-400">Already have an account?
                    <a href="{{route('login')}}" class="text-gray-400 hover:text-red-400 transition-colors underline">Login</a>
                </p>
            </form>
        </div>
    </div>
</x-layout>