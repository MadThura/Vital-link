<x-layout backgroundImage='/images/bg-blood.jpg' title="Login">
    <!-- Left Pane -->
    <x-left-pane />

    <!-- Right Pane -->
    <div class="w-[35%] flex items-center justify-center p-6">
        <div
            class="bg-white/15 backdrop-blur-md rounded-2xl p-8 w-full max-w-md shadow-lg hover:bg-white/20 transition-colors">
            <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data" class="flex flex-col">
                @csrf
                <x-input-field id="email" type="email" name="email" :value="old('email')"
                    placeholder="Enter your email" />
                <x-input-field id="password" type="password" name="password" placeholder="Enter your password" />
                <x-submit-button name="Submit" />
            </form>

            <p class="text-center text-sm mt-4 text-gray-400">
                Don't have an account?
                <a href="{{ route('register') }}"
                    class="text-gray-400 hover:text-red-400 transition-colors underline">Register</a>
            </p>
        </div>
    </div>
</x-layout>
