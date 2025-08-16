<x-layout backgroundImage='/images/bg-blood.jpg' title="Register">

    <div class="h-full overflow-y-auto flex items-center justify-center scrollbar-none p-4">
        <div
            class="bg-gray-900/90 rounded-xl px-10 py-5 w-full max-w-md border border-gray-800 shadow-2xl backdrop-blur-sm">
            <div><a href="/"><i class="fa-solid fa-home text-gray-400 hover:text-gray-600"></i></a></div>

            <!-- Logo Section -->
            <div class="flex justify-center mb-10">
                <div
                    class="w-16 h-16 rounded-lg bg-gradient-to-br from-purple-900/30 to-red-900/30 flex items-center justify-center border border-gray-800 shadow-inner">
                    <i class="fas fa-user-astronaut text-purple-400/80 text-2xl"></i>
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-2xl font-playfair font-medium text-center mb-2 text-gray-100 tracking-wider">Vital Link</h1>
            <div class="text-center">
                <span class="text-sm">HELLO Donors, </span>
                <span class="text-gray-500 text-center text-xs mb-8 tracking-widest font-light">PLEASE
                    REGISTER</span>
            </div>

            <!-- Login Form -->
            <form class="space-y-6" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div>
                    <label class="block text-xs text-gray-400 mb-2 tracking-widest">FULL NAME</label>
                    <div class="relative">
                        <input type="text" name="name" value="{{ old('name', '') }}"
                            class="bg-gray-800/70 border border-gray-800 text-gray-200 text-sm w-full py-3 px-4 focus:outline-none focus:ring-1 focus:ring-purple-500/30 focus:border-purple-500/50 placeholder-gray-600 transition-all duration-300 rounded"
                            required placeholder="Enter your name">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="fas fa-user text-gray-600 text-sm"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-xs text-gray-400 mb-2 tracking-widest">EMAIL</label>
                    <div class="relative">
                        <input type="email" name="email" value="{{ old('email', '') }}"
                            class="bg-gray-800/70 border border-gray-800 text-gray-200 text-sm w-full py-3 px-4 focus:outline-none focus:ring-1 focus:ring-purple-500/30 focus:border-purple-500/50 placeholder-gray-600 transition-all duration-300 rounded"
                            required placeholder="user@domain.com">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="fas fa-envelope text-gray-600 text-sm"></i>
                        </div>
                    </div>
                    @error('email')
                        <p class="text-xs text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div>
                    <label class="block text-xs text-gray-400 mb-2 tracking-widest">PASSWORD</label>
                    <div class="relative password-field">
                        <input type="password" name="password"
                            class="bg-gray-800/70 border border-gray-800 text-gray-200 text-sm w-full py-3 px-4 focus:outline-none focus:ring-1 focus:ring-red-500/30 focus:border-red-500/50 placeholder-gray-600 transition-all duration-300 rounded"
                            placeholder="Enter Password" required>
                        <button type="button"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer toggle-password"
                            aria-label="Toggle password visibility">
                            <i class="fas fa-eye-slash text-gray-600 text-sm"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-xs text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- CONFIRM PASSWORD --}}
                <div>
                    <label class="block text-xs text-gray-400 mb-2 tracking-widest">CONFIRM PASSWORD</label>
                    <div class="relative password-field">
                        <input type="password" name="password_confirmation" {{-- correct Laravel name --}}
                            class="bg-gray-800/70 border border-gray-800 text-gray-200 text-sm w-full py-3 px-4 focus:outline-none focus:ring-1 focus:ring-red-500/30 focus:border-red-500/50 placeholder-gray-600 transition-all duration-300 rounded"
                            placeholder="Re-enter Password" required>
                        <button type="button"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer toggle-password"
                            aria-label="Toggle password visibility">
                            <i class="fas fa-eye-slash text-gray-600 text-sm"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="text-xs text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>



                <button type="submit"
                    class="w-full py-3 px-4 bg-gradient-to-r from-purple-900/40 to-red-900/40 text-gray-100 font-light rounded border border-gray-800 tracking-widest text-sm hover:from-purple-900/50 hover:to-red-900/50 hover:border-purple-500/30 hover:shadow-lg hover:shadow-purple-500/10 transition-all duration-300 group">
                    <span class="group-hover:tracking-wider transition-all duration-300 text-center">SUBMIT</span>
                    <i
                        class="fas fa-arrow-right-long ml-2 text-xs opacity-0 group-hover:opacity-100 group-hover:ml-3 transition-all duration-300"></i>
                </button>

                <div class="text-center text-xs text-gray-500 tracking-wider pt-4 font-light">
                    Already have an account? <a href="{{ route('login') }}"
                        class="text-gray-400 hover:text-red-400/80 transition-colors">LOG IN</a>
                </div>
            </form>
        </div>
    </div>

</x-layout>
<!-- Right Pane -->
<div class="w-[35%] flex items-center justify-center p-6">
    <div
        class="bg-white/10 backdrop-blur-md rounded-2xl p-8 w-full max-w-md shadow-lg hover:bg-white/15 transition-colors">
        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
            @method('POST')
            @csrf
            <x-input-field type="text" id="name" name="name" placeholder="Enter your name" />

            <x-input-field type="text" id="email" name="email" placeholder="Enter your email" />

            <x-input-field type="password" id="password" name="password" placeholder="Enter new password" />

            <x-input-field type="password" id="password_confirmation" name="password_confirmation"
                placeholder="Confirm password" />
            <x-submit-button name="Submit" />

            <p class="text-center text-sm mt-4 text-gray-400">Already have an account?
                <a href="{{ route('login') }}"
                    class="text-gray-400 hover:text-red-400 transition-colors underline">Login</a>
            </p>
        </form>
    </div>
</div> --}}
