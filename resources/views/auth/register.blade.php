<x-layout backgroundImage='/images/bg-blood.jpg' title="Register">
    <!-- Left Pane -->
    <x-left-pane />
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
    </div>
</x-layout>
