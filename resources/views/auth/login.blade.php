<x-layout title="Login">
    <div class="h-full overflow-y-auto flex items-center justify-center scrollbar-none px-4">
        <div class="bg-white dark:bg-gray-900 rounded-xl p-5 pt-3 w-full max-w-md border border-[#DAD0D0] dark:border-gray-700 shadow-xl transition-colors duration-300">
            
            <!-- Home + Theme Toggle -->
            <div class="flex items-center justify-between">
                <a href="/">
                    <i class="fa-solid fa-home text-[#690D0B] dark:text-gray-300 hover:text-[#E91815] transition-colors"></i>
                </a>
                <x-theme-toggle />
            </div>

            <!-- Logo -->
            <div class="flex justify-center mb-10">
                <div
                    class="w-16 h-16 rounded-lg bg-gradient-to-br from-[#E91815]/20 to-[#690D0B]/20 
                           flex items-center justify-center border border-[#DAD0D0] dark:border-gray-700 shadow-inner">
                    <i class="fas fa-heart-pulse text-[#E91815] dark:text-red-400 text-2xl"></i>
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-2xl font-playfair font-medium text-center mb-2 text-[#180705] dark:text-gray-100 tracking-wider">
                Vital Link
            </h1>
            <div class="text-center">
                <span class="text-sm text-[#180705] dark:text-gray-300">WELCOME BACK, </span>
                <span class="text-[#690D0B]/80 dark:text-gray-400 text-center text-xs mb-8 tracking-widest font-light">
                    PLEASE AUTHENTICATE
                </span>
            </div>

            <!-- Form -->
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                @method('POST')
                
                <!-- Email -->
                <div>
                    <label class="block text-xs text-[#690D0B] dark:text-gray-300 mb-2 tracking-widest">EMAIL</label>
                    <div class="relative">
                        <input type="email" name="email"
                            class="bg-[#F3F0F0] dark:bg-gray-800 border border-[#DAD0D0] dark:border-gray-700 
                                   text-[#180705] dark:text-gray-100 text-sm w-full py-3 px-4 
                                   focus:outline-none focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] 
                                   placeholder-[#690D0B]/40 dark:placeholder-gray-500 
                                   transition-all duration-300 rounded"
                            placeholder="user@domain.com">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="fas fa-envelope text-[#690D0B]/50 dark:text-gray-400 text-sm"></i>
                        </div>
                    </div>
                    @error('email')
                        <p class="text-xs text-[#E91815] dark:text-red-400 mt-2">{{$message}}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs text-[#690D0B] dark:text-gray-300 mb-2 tracking-widest">PASSWORD</label>
                    <div class="relative password-field">
                        <input type="password" name="password"
                            class="bg-[#F3F0F0] dark:bg-gray-800 border border-[#DAD0D0] dark:border-gray-700 
                                   text-[#180705] dark:text-gray-100 text-sm w-full py-3 px-4 
                                   focus:outline-none focus:ring-2 focus:ring-[#E91815]/40 focus:border-[#E91815] 
                                   placeholder-[#690D0B]/40 dark:placeholder-gray-500 
                                   transition-all duration-300 rounded"
                            placeholder="Enter Password" required>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer toggle-password">
                            <i class="fas fa-eye-slash text-[#690D0B]/50 dark:text-gray-400 text-sm"></i>
                        </div>
                    </div>
                    @error('password')
                        <p class="text-xs text-[#E91815] dark:text-red-400 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full py-3 px-4 bg-gradient-to-r from-[#E91815] to-[#690D0B] text-white 
                           font-medium rounded tracking-widest text-sm 
                           hover:from-[#690D0B] hover:to-[#E91815] hover:shadow-lg hover:shadow-[#E91815]/30 
                           transition-all duration-300 group">
                    <span class="group-hover:tracking-wider transition-all duration-300 text-center">AUTHENTICATE</span>
                    <i class="fas fa-arrow-right-long ml-2 text-xs opacity-0 group-hover:opacity-100 group-hover:ml-3 transition-all duration-300"></i>
                </button>

                <!-- Register link -->
                <div class="text-center text-xs text-[#690D0B] dark:text-gray-400 tracking-wider pt-4 font-light">
                    Don't have an account? 
                    <a href="{{ route('register') }}" 
                       class="text-[#E91815] hover:text-[#690D0B] dark:text-red-400 dark:hover:text-gray-300 transition-colors">
                       REGISTER
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
