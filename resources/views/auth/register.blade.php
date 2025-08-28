<x-layout title="Register">
    <div class="h-full overflow-y-auto flex items-center justify-center scrollbar-none">
        <div class="bg-white rounded-xl p-5 pt-3 w-full max-w-md shadow-xl">

            <!-- Home icon -->
            <div>
                <a href="/">
                    <i class="fa-solid fa-home text-[#690D0B] hover:text-[#E91815] transition-colors"></i>
                </a>
            </div>

            <!-- Logo Section -->
            <div class="flex justify-center mb-10">
                <div
                    class="w-16 h-16 rounded-lg bg-gradient-to-br from-[#E91815]/20 to-[#690D0B]/20 flex items-center justify-center shadow-inner">
                    <i class="fas fa-heart-pulse text-[#E91815] text-2xl"></i>
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-2xl font-playfair font-medium text-center mb-2 text-[#180705] tracking-wider">
                Vital Link
            </h1>
            <div class="text-center">
                <span class="text-sm text-[#180705]">HELLO DONORS, </span>
                <span class="text-[#690D0B]/80 text-center text-xs mb-8 tracking-widest font-light">
                    PLEASE REGISTER
                </span>
            </div>

            <!-- Register Form -->
            <form class="space-y-6" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <!-- Full Name -->
                <div>
                    <label class="block text-xs text-[#690D0B] mb-2 tracking-widest">FULL NAME</label>
                    <div class="relative">
                        <input type="text" name="name" value="{{ old('name', '') }}"
                            class="bg-[#F3F0F0] border border-[#DAD0D0] text-[#180705] text-sm w-full py-3 px-4 
                                   focus:outline-none focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] 
                                   placeholder-[#690D0B]/40 transition-all duration-300 rounded"
                            required placeholder="Enter your name">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="fas fa-user text-[#690D0B]/50 text-sm"></i>
                        </div>
                    </div>
                    @error('name')
                        <p class="text-xs text-[#E91815] mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs text-[#690D0B] mb-2 tracking-widest">EMAIL</label>
                    <div class="relative">
                        <input type="email" name="email" value="{{ old('email', '') }}"
                            class="bg-[#F3F0F0] border border-[#DAD0D0] text-[#180705] text-sm w-full py-3 px-4 
                                   focus:outline-none focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] 
                                   placeholder-[#690D0B]/40 transition-all duration-300 rounded"
                            required placeholder="user@domain.com">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="fas fa-envelope text-[#690D0B]/50 text-sm"></i>
                        </div>
                    </div>
                    @error('email')
                        <p class="text-xs text-[#E91815] mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs text-[#690D0B] mb-2 tracking-widest">PASSWORD</label>
                    <div class="relative password-field">
                        <input type="password" name="password"
                            class="bg-[#F3F0F0] border border-[#DAD0D0] text-[#180705] text-sm w-full py-3 px-4 
                                   focus:outline-none focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] 
                                   placeholder-[#690D0B]/40 transition-all duration-300 rounded"
                            placeholder="Enter Password" required>
                        <button type="button"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer toggle-password"
                            aria-label="Toggle password visibility">
                            <i class="fas fa-eye-slash text-[#690D0B]/50 text-sm"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-xs text-[#E91815] mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-xs text-[#690D0B] mb-2 tracking-widest">CONFIRM PASSWORD</label>
                    <div class="relative password-field">
                        <input type="password" name="password_confirmation"
                            class="bg-[#F3F0F0] border border-[#DAD0D0] text-[#180705] text-sm w-full py-3 px-4 
                                   focus:outline-none focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] 
                                   placeholder-[#690D0B]/40 transition-all duration-300 rounded"
                            placeholder="Re-enter Password" required>
                        <button type="button"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer toggle-password"
                            aria-label="Toggle password visibility">
                            <i class="fas fa-eye-slash text-[#690D0B]/50 text-sm"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="text-xs text-[#E91815] mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full py-3 px-4 bg-gradient-to-r from-[#E91815] to-[#690D0B] text-white 
                           font-medium rounded tracking-widest text-sm 
                           hover:from-[#690D0B] hover:to-[#E91815] hover:shadow-lg hover:shadow-[#E91815]/30 
                           transition-all duration-300 group">
                    <span class="group-hover:tracking-wider transition-all duration-300 text-center">SUBMIT</span>
                    <i
                        class="fas fa-arrow-right-long ml-2 text-xs opacity-0 group-hover:opacity-100 group-hover:ml-3 transition-all duration-300"></i>
                </button>

                <!-- Login link -->
                <div class="text-center text-xs text-[#690D0B] tracking-wider pt-4 font-light">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-[#E91815] hover:text-[#690D0B] transition-colors">LOG
                        IN</a>
                </div>

            </form>
        </div>
    </div>
    <script>
        document.querySelectorAll(".password-field .toggle-password").forEach((btn) => {
            btn.addEventListener("click", () => {
                const wrapper = btn.closest(".password-field");
                const input = wrapper.querySelector("input");
                const icon = btn.querySelector("i");
                const show = input.type === "password";

                input.type = show ? "text" : "password";
                icon.classList.toggle("fa-eye-slash", !show);
                icon.classList.toggle("fa-eye", show);
            });
        });
    </script>
</x-layout>
